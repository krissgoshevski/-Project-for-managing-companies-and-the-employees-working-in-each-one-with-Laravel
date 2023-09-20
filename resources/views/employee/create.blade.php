@extends('layouts.app')
@extends('layouts.errors')
@extends('layouts.navbar')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">


@section('title', 'Create page')

@section('content')

<form action="{{ route('employee.store') }}" method="POST" class="custom-form">
    @csrf
    <h3>Create a new employee</h3> <hr>

    <div class="form-group">
        <label for="firstname">Firstname:</label>
        <input type="text" id="firstname" name="firstname" value="{{ old('firstname')}}" class="form-control">
    </div>

    <div class="form-group">
        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" value="{{ old('surname')}}" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email')}}" class="form-control">
    </div>

    
    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="phone" id="phone" name="phone" value="{{ old('phone')}}" class="form-control">
    </div>



    <div class="form-group">
        <label for="company_id">Company:</label>
        <select id="company_id" name="company_id" class="form-control">
            @foreach($companies as $company)
                <option value="{{ $company['id'] }}">{{ $company['name'] }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection