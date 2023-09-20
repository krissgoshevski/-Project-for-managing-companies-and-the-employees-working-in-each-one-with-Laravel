@extends('layouts.app') <!-- Заменете 'layouts.app' со вашата лажици, доколку користите различна лажица -->

@section('content')
    <div class="container">
        <h1>Детали за компанијата</h1>

        <ul>
            <li><strong>Име на компанија:</strong> {{ $company->name }}</li>
            <li><strong>Е-пошта:</strong> {{ $company->email }}</li>
            <li><strong>Лого:</strong> <img src="{{ asset('storage/' . $company->logo) }}" alt="Лого на компанијата"></li>
            <li><strong>Веб-сајт:</strong> <a href="{{ $company->website }}">{{ $company->website }}</a></li>
            <li><strong>Country:</strong> <a href="{{ $company->country->name }}">{{ $company->country->name }}</a></li>

            <!-- Додадете ги другите детали што сакате да ги прикажете -->
        </ul>
        
        <a href="{{ route('company.index') }}">Назад кон листата со компании</a>
    </div>
@endsection
