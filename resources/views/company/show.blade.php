@extends('layouts.app')
@extends('layouts.errors')
@extends('layouts.navbar')

@section('title', 'Show page')

@section('content')
    <div class="container">
        <h1>Details of {{ $company->name }} company</h1>

        <ul>
            <li><strong>Name:</strong> {{ $company->name }}</li>
            <li><strong>Email:</strong> {{ $company->email }}</li>
            <li><strong>Logo:</strong> <img src="{{ $company->logo }}" alt="Company Logo" height="200px" width="200px"></li>
            <li><strong>Website:</strong> <a href="{{ $company->website }}">{{ $company->website }}</a></li>
            <li><strong>Country:</strong> <a href="{{ $company->country->name }}">{{ $company->country->name }}</a></li>

        </ul>
        
        <a href="{{ route('company.index') }}">Back to view all companies</a>
    </div>
@endsection
