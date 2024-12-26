@extends('layouts.app')

@section('content')
    <div class="container p-4 mt-3 mb-3 shadow-lg bg-light rounded">
        <h1>Character Detail</h1>
    </div>
    <div class="container p-4 mt-3 mb-3 shadow-lg bg-light rounded">
        <div class="row">
            <div class="col-sm-4 mb-3">
                <div class="card">
                    <img class="card-img-top" src="{{ $character->image }}" alt="{{ $character->name }}">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $character->name }}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Status: {{ $character->status }}</li>
                        <li class="list-group-item">Specie: {{ $character->species }}</li>
                        <li class="list-group-item">Type: {{ $character->type }}</li>
                        <li class="list-group-item">Gender: {{ $character->gender }}</li>
                        <li class="list-group-item">Origin: {{ $character->origin->name }}</li>
                        <li class="list-group-item">Location: {{ $character->location->name }}</li>
                    </ul>
                    <div class="card-body">
                        <p><strong>Episodes:</strong></p>
                        <div class="episodes-list">
                            @include('link_list',
                                [
                                    'entities' => $character->episode,
                                    'routeName' => 'episodes.detail'
                                ]
                            )
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection