@component('mail::message')
# Greetings

Please click the button below to change your password.

@component('mail::button', ['url' => $link ])
Change Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent