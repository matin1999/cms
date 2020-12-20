@component('mail::message')
    # Introduction

    The body of your message.
    Hi Dear {{$post->author->name}}

    Post {{$post->title}} deleted

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
