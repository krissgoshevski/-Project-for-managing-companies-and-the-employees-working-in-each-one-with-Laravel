@extends('layouts.app')
@extends('layouts.errors')
@extends('layouts.navbar')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">

@section('title', 'Edit page')

@section('content')
<!-- 1. vo edit e istoto od create samo so se dodava valu e= "{ { comp any - > nam e }}"-->
<!-- 2. i vo action delot se dodava id-to odnosno za koja kompanija treba da se pravi update -->
<form action="{{ route('company.update', ['id' => $company->id]) }}" method="POST" class="custom-form">
    @csrf
    @method('PUT')


    <h3>Edit {{ $company->name }} company</h3>
    

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $company->name }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $company->email }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="logo">Logo:</label>
        <input type="text" id="logo" name="logo" value="{{ $company->logo }}" class="form-control">
        <small class="text-muted">Enter the logo URL or file path.</small>
    </div>

    <div class="form-group">
        <label for="website">Website:</label>
        <input type="text" id="website" name="website" value="{{ $company->website }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="country_id">Country:</label>
        <select id="country_id" name="country_id" class="form-control">
            @foreach($countries as $country)
                <option value="{{ $country['id'] }}" {{ $company->country_id == $country['id'] ? 'selected' : '' }}> {{ $country['name'] }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection
