<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel</title>
  <link href="{{ url('css/style.css') }}" rel="stylesheet">

</head>

<body>
  <nav>
    <ul>
      <li><a href="{{route('home')}}">Home</a></li>
      <li><a href="{{route('dashboard')}}">Dashboard</a></li>
      <li><a href="{{route('posts')}}">Post</a></li>
    </ul>
    <ul>
      @auth
      <li><a href="/">{{ auth()->user()->name }}</a></li>
      <li>
        <form action="{{route('logout')}}" method="post">
          @csrf
          <button>Logout</button>
        </form>
      </li>
      @endauth

      @guest
      <li><a href="{{route('register')}}">Register</a></li>
      <li><a href="{{route('login')}}">Login</a></li>
      @endguest
    </ul>
  </nav>
  @yield('content')

</body>

</html>