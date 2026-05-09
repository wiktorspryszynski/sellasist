@extends('layout')

@section('content')
    <h1 class="h4 mb-4">Dodaj peta</h1>

    <div class="card bg-secondary bg-opacity-10 border-secondary text-light" style="max-width: 600px;">
        <div class="card-body">
            <form action="{{ url('/pets') }}" method="POST">
                @csrf
                @include('pets._form', ['pet' => []])
                <button type="submit" class="btn btn-primary">Dodaj peta</button>
            </form>
        </div>
    </div>
@endsection
