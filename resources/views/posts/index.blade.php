@extends('layouts.app')

@section('content')
<h2>Posts Index Page</h2>
<form action="{{ route('posts') }}" class="form" method="POST">
  @csrf

  <textarea name="body" id="body" placeholder="Enter A Post" rows="10"
    class="@error('body') error @enderror">{{ old('body') }}</textarea>

  @error('body')
  <output>{{$message}}</output>
  @enderror

  <button type="submit">Post</button>
</form>
@if ($posts->count())
@foreach ($posts as $post)
<x-post :post="$post" />
@endforeach
{{ $posts->links() }}
@else
<p>There are no Posts </p>
@endif

@endsection