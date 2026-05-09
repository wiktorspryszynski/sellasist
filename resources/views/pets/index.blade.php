@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0">Pets</h1>
    </div>

    <div class="mb-3 d-flex gap-2">
        @foreach(['available', 'pending', 'sold'] as $s)
            <a href="{{ url('/pets') }}?status={{ $s }}"
               class="btn btn-sm {{ $status === $s ? 'btn-primary' : 'btn-outline-secondary' }}">
                {{ $s }}
            </a>
        @endforeach
    </div>

    @if($error)
        <div class="alert alert-danger">{{ $error }}</div>
    @elseif(empty($pets))
        <p class="text-secondary">Brak petów o statusie <strong>{{ $status }}</strong>.</p>
    @else
        <table class="table table-dark table-hover table-bordered align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pets as $pet)
                    <tr>
                        <td>{{ $pet['id'] }}</td>
                        <td>{{ $pet['name'] ?? '-' }}</td>
                        <td>{{ $pet['status'] ?? '-' }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ url('/pets/' . $pet['id']) }}" class="btn btn-sm btn-outline-info">Show</a>
                                <a href="{{ url('/pets/' . $pet['id'] . '/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ url('/pets/' . $pet['id']) }}" method="POST"
                                      onsubmit="return confirm('Czy na pewno chcesz usunąć tego peta?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
