@component('mail::message')

# Order has been placed by a customer.

- Customer: {{ $user->name }}
- Customer Email: {{ $user->email }}
- Item: {{ $item->name }}
- Quantity: {{ $item->pivot->quantity }}

Please reach out to schedule pick-up.

@component('mail::button', ['url' => 'http://localhost:8000/stores'])
Visit HomeCooked
@endcomponent

@endcomponent