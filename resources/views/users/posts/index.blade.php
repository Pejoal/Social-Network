@extends('layouts.app')

@section('content')
<h2>{{ $user->name }}</h2>
<h3>Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and recieved
  {{ $user->receivedLikes->count() }} {{ Str::plural('like', $user->receivedLikes->count()) }} </h3>
@if ($posts->count())
@foreach ($posts as $post)
<x-post :post="$post" />
@endforeach
{{ $posts->links() }}
@else
<p>{{ $user->name }} does not have any posts </p>
@endif
@endsection