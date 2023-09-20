@extends('layouts.app')
@extends('layouts.errors')
@extends('layouts.navbar')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">


@section('title', 'Create page')

@section('content')

<form action="{{ route('company.store') }}" method="POST" class="custom-form">
    @csrf
    <h3>Create a new company</h3> <hr>

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name')}}" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email')}}" class="form-control">
    </div>

    <div class="form-group">
        <label for="logo">Logo:</label>
        <input type="text" id="logo" name="logo" value="{{ old('logo')}}" class="form-control">
        <small class="text-muted">Enter the logo URL or file path.</small>
    </div>

    <div class="form-group">
        <label for="website">Website:</label>
        <input type="text" id="website" name="website" value="{{ old('website')}}" class="form-control">
    </div>

    <div class="form-group">
        <label for="country_id">Country:</label>
        <select id="country_id" name="country_id" class="form-control">
            @foreach($countries as $country)
                <option value="{{ $country['id'] }}">{{ $country['name'] }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>



@endsection