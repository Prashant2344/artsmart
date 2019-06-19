@component('mail::message')
# Welcome to Art Smart

Thank you for singning up.

@component('mail::button', ['url' => url('/verification/'.$user->token)])
Confirmation
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
