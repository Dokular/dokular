@component('mail::message')
# Your Order

Dear {{ $owner->user->first_name }}
Thank you for placing an order! Please note it would take 24 hours.
Below are your orders

@component('mail::table')
| Type       | Amount  |
| :---------- | :-------|
@foreach ($owner->orders  as $order)
| {{ $order->product->name }} | ${{ $order->price }} |
@endforeach
@endcomponent

@endcomponent
