@extends('layout')

@section('content')
@include('partials._create')

@auth
<h1 style="text-align: center;"><b>Welcome Home 😁👍</b></h1>
@endauth
@guest
    <h1 style="text-align: center; justify-content: center;"><b>Login or register to add passwords</b></h1>
@endguest
@endsection
