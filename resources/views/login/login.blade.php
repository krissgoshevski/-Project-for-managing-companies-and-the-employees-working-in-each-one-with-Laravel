@extends('layouts.app')
@extends('layouts.errors')
@extends('layouts.navbar')

@section('title', 'Login form')
@section('content')


<form action="{{ route('admin.login') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Enter your email..">
    <input type="password" name="password" placeholder="Enter your password"> 
    <button type="submit">Log In</button>
</form>


@endsection