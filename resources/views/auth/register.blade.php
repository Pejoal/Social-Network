@extends('layouts.app')

@section('content')
<h2>Register Page</h2>
<form action="{{ route('register') }}" method="post" class="form">
  @csrf
  @if (session('status'))
  <p class="status">
  {{ session('status') }}
  </p>
  @endif
  <input type="text" value="{{old('name')}}" name="name" placeholder="Name" class="@error('name') error @enderror">
  @error('name')
  <output>{{$message}}</output>
  @enderror
  <input type="text" value="{{old('username')}}" name="username" placeholder="User Name"
    class="@error('name') error @enderror">
  @error('username')
  <output>{{$message}}</output>
  @enderror
  <input type="email" value="{{old('email')}}" name="email" placeholder="Email" class="@error('name') error @enderror">
  @error('email')
  <output>{{$message}}</output>
  @enderror
  <input type="password" name="password" placeholder="Password" class="@error('name') error @enderror">
  @error('password')
  <output>{{$message}}</output>
  @enderror
  <input type="password" name="password_confirmation" placeholder="Repeat Password"
    class="@error('name') error @enderror">
  @error('password_confirmation')
  <output>{{$message}}</output>
  @enderror
  <button type="submit">Register</button>
</form>
@endsection