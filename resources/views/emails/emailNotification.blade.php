@component('mail::message')
# Welcome to my page OwO

Thank you kamsahamida

@component('mail::button', ['url' => 'https://www.google.com/webhp?hl=en&sa=X&ved=0ahUKEwiW8suv0Iz0AhXXH7cAHbjbCNUQPAgI'])
View Profile
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
