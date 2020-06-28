@component('mail::message')

# Order has been placed.

Reach out to the chef to schedule pick-up.

@component('mail::button', ['url' => 'http://localhost:8000/stores'])
Visit HomeCooked
@endcomponent

@endcomponent