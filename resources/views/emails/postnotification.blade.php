@component('mail::message')
# New Post From {{ $post->site->url }}

#{{ $post->title }}

{{ $post->description }}
{{ config('app.name') }}
@endcomponent
