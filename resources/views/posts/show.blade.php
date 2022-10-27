@extends('layouts.app')

@section('content')
<h2>Dashboard Page</h2>
<x-post :post="$post" />
@endsection