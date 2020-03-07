@component('mail::message')
# Your Order

Dear {{ ucfirst(trans($owner->user->first_name)) }},
<p>
Thank you for placing an order!
Please note your renewal would be processed within 24 hours.
</p>
Transaction id #<code>{{ $owner->transaction }}</code>
<br>
Below are your orders

@component('mail::table')
| Type       | Amount  |
| :---------- | :-------|
@foreach ($owner->orders  as $order)
| {{ ucfirst(trans($order->product->name )) }} | &#8358;{{ $order->price }} |
@endforeach
@endcomponent

![Some option text][logo]

[logo]: {{asset('images/dokular.png')}} "Logo"

@endcomponent
