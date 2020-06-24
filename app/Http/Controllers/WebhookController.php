<?php

namespace App\Http\Controllers;

use App\Notifications\PaymentFailed;
use App\Notifications\PaymentUpdated;
use Illuminate\Support\Carbon;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;
use Laravel\Cashier\Subscription;


class WebhookController extends CashierController
{

    public function handleInvoicePaymentSucceeded($payload)
    {
        // handle event
        if ($user = $this->getUserByStripeId($payload['data']['object']['customer'])) {
            $user->notify(new PaymentUpdated());
        }
        return $this->successMethod();
    }

    // this updates the subscription database entry from cancelled to renew
    public function handleCustomerSubscriptionCreated($payload)
    {
        // grab the user
        if ($user = $this->getUserByStripeId($payload['data']['object']['customer'])) {
            $data = $payload['data']['object'];
            // grab user's subscription
            $user->subscriptions->first(function (Subscription $subscription) use ($data) {

                $plans = [
                    'price_1GwCl5IOPhNaXwPAjftecbYZ' => 'standard',
                ];
                $plan_name = isset($plans[$data['plan']['id']]) ? $plans[$data['plan']['id']] : false;

                if ($plan_name) {

                    // Update the previous fields that were on the canceled subscription
                    $subscription->name = $plan_name;
                    $subscription->stripe_id = $data['id'];
                    $subscription->stripe_plan = $data['plan']['id'];
                    $subscription->quantity = $data['quantity'];
                    $subscription->stripe_status = $data['status'];

                    // Trial ending date
                    if (isset($data['trial_end'])) {
                        $trial_ends = Carbon::createFromTimestamp($data['trial_end']);

                        if (!$subscription->trial_ends_at || $subscription->trial_ends_at->ne($trial_ends)) {
                            $subscription->trial_ends_at = $trial_ends;
                        }
                    }

                    // Cancellation date
                    if (isset($data['cancel_at_period_end'])) {
                        if ($data['cancel_at_period_end']) {
                            $subscription->ends_at = $subscription->onTrial()
                                ? $subscription->trial_ends_at
                                : Carbon::createFromTimestamp($data['current_period_end']);
                        } else {
                            $subscription->ends_at = null;
                        }
                    }

                    $subscription->save();
                }
            });
        }
        return $this->successMethod();
    }

    // after 1st attempt, notify user
    public function handleInvoicePaymentFailed($payload)
    {
        if ($user = $this->getUserByStripeId($payload['data']['object']['customer'])) {
            $data = $payload['data']['object'];

            if ($data['attempt_count'] === 1) {
                $user->notify(new PaymentFailed());
            }
        }
        return $this->successMethod();
    }
}
