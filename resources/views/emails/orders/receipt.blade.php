@component('mail::message')
# Your Order

Dear {{ $owner->user->first_name }}
Thank you for placing an order! Please note it would take 24 hours.
Below are your orders

{{ $owner }}

@endcomponent
