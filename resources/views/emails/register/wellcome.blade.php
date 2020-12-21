@component('mail::message')
# Introduction

The body of your message.
Wellcome Dear {{$user->name}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
