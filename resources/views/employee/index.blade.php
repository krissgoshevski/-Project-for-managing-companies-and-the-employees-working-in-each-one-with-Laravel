@extends('layouts.app')
@extends('layouts.errors')
@extends('layouts.navbar')

@section('title', 'Index page')
@section('content')

<div class="container">
    <h2 class="text-center">List of all employees</h2> <br>
     <!--   @include('company.search') -->
 
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Firstname</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Company</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->firstname }}</td>
                <td>{{ $employee->surname }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->company->name }}</td> 
                <td><a href="{{ route('employee.edit', ['id' => $employee->id]) }}" class="btn btn-warning"> Edit</a></td>
                <td>
                    <form action="{{ route('employee.delete', ['id' => $employee->id]) }}" method="POST">
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
