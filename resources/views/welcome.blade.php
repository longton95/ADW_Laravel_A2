@component('mail::message')
# Welcome to CoinChecker

You have just registered you email with CoinChecker click the button below to get started.

@component('mail::button', ['url' => 'http://localhost/'])
Get Started
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
