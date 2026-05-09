@extends('layout')

@section('content')
    <h1 class="h4 mb-4">Edytuj peta</h1>

    <div class="card bg-secondary bg-opacity-10 border-secondary text-light" style="max-width: 600px;">
        <div class="card-body">
            <form action="{{ url('/pets/' . $pet['id']) }}" method="POST">
                @csrf
                @method('PUT')
                @include('pets._form')
                <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
            </form>
        </div>
    </div>
@endsection
