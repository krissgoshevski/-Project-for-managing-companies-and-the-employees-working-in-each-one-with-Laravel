@extends('layouts.app')
@extends('layouts.errors')
@extends('layouts.navbar')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">


@section('title', 'Edit page employee')

@section('content')

<form action="{{ route('employee.update', ['id' => $employee->id]) }}) }}" method="POST" class="custom-form">
    @csrf
    @method('PUT')

    <h3>Change information for <b>{{ $employee->firstname }}</b> employee</h3> <hr>

    <div class="form-group">
        <label for="firstname">Firstname:</label>
        <input type="text" id="firstname" name="firstname"  value="{{ $employee->firstname }}"  class="form-control">
    </div>

    <div class="form-group">
        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" value="{{ $employee->surname }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $employee->email }}" class="form-control">
    </div>

    
    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="phone" id="phone" name="phone" value="{{ $employee->phone }}" class="form-control">
    </div>



    <div class="form-group">
        <label for="company_id">Company:</label>
        <select id="company_id" name="company_id" class="form-control">
            @foreach($companies as $company)
                <option value="{{ $company['id'] }}" {{ $employee->company_id == $company['id'] ? 'selected' : '' }}> {{ $company['name'] }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection

