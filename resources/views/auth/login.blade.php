@extends('layouts.app')

@section('content')
<h2>Login Page</h2>
<form action="{{ route('login') }}" method="post" class="form">
  @csrf
  @if (session('status'))
  <p class="status">
    {{ session('status') }}
  </p>
  @endif
  <input type="email" value="{{old('email')}}" name="email" placeholder="Email" class="@error('name') error @enderror">
  @error('email')
  <output>{{$message}}</output>
  @enderror

  <input type="password" name="password" placeholder="Password" class="@error('name') error @enderror">
  @error('password')
  <output>{{$message}}</output>
  @enderror

  <label for="remember">Remember Me</label>
  <input type="checkbox" name="remember" id="remember">

  <button type="submit">Login</button>

</form>
@endsection