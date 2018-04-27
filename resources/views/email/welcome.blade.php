@component('mail::message')
# Introduction

Hello, **{{ $user->name }}**

Thank you for signing up !

@component('mail::panel')
  "Lorem ipsum dolor sit amet consectetur adipisicing elit."
@endcomponent

@component('mail::button', ['url' => 'www.mycoolblog.test'])
  Check it out
@endcomponent

Cheers,<br>
{{ config('app.name') }}
@endcomponent
