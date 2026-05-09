@extends('layout')

@section('content')
    <h1 class="h4 mb-4">{{ $pet['name'] ?? '-' }}</h1>

    <div class="card bg-secondary bg-opacity-10 border-secondary mb-4" style="max-width: 600px;">
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-3">Status</dt>
                <dd class="col-sm-9">{{ $pet['status'] ?? '-' }}</dd>

                <dt class="col-sm-3">Photo URLs</dt>
                <dd class="col-sm-9">
                    @if(!empty($pet['photoUrls']))
                        <ul class="mb-0 ps-3">
                            @foreach($pet['photoUrls'] as $url)
                                <li><a href="{{ $url }}" target="_blank" class="text-info">{{ $url }}</a></li>
                            @endforeach
                        </ul>
                    @else
                        -
                    @endif
                </dd>

                <dt class="col-sm-3">Tags</dt>
                <dd class="col-sm-9">
                    @if(!empty($pet['tags']))
                        {{ implode(', ', array_column($pet['tags'], 'name')) }}
                    @else
                        -
                    @endif
                </dd>
            </dl>
        </div>
    </div>

    <a href="{{ url('/pets') }}" class="btn btn-outline-secondary btn-sm">&larr; Wróć do listy</a>
@endsection
