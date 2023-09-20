@extends('layouts.app')
@extends('layouts.errors')
@extends('layouts.navbar')

@section('title', 'Index page')
@section('content')

<div class="container">
    <h2 class="text-center">List of all companies</h2> <br>
        @include('company.search')
 
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Website</th>
                <th>Country</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
       
            @foreach($companies as $company)
            <tr>
                <td>{{ $company->id }}</td>
                <td><a href="{{ route('company.show', ['id' => $company->id]) }}"> {{ $company->name }} </a></td>
                <td>{{ $company->email }}</td>
                <td>
                <img src="{{ $company->logo }}" alt="Company Logo" height="50">
                </td>
                <td><a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></td>
                <td>{{ $company->countryname }}</td> 
                <td><a href="{{ route('company.edit', ['id' => $company->id]) }}" class="btn btn-warning"> Edit</a></td>
                <td>
                    <form action="{{ route('company.delete', ['id' => $company->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>      
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
