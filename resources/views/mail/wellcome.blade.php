@component('mail::message')
# Welcome Nam

Thank you for view email.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
