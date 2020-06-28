<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChefConfirm extends Mailable
{
    use Queueable, SerializesModels;

    public $item;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($item, $user)
    {
        $this->item = $item;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.chef-confirm')
            ->subject('Get Home Cooked - Order Received!');
    }
}
