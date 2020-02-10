@component('mail::message')
# Magic link

Hey, we received a request from you for a login access to your dokular account.

Click this button to sign in.

@component('mail::button', ['url' => $url, 'color' => 'success'])
Sign In
@endcomponent


@endcomponent
