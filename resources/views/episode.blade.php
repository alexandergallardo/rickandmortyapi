@extends('layouts.app')

@section('content')
    <div class="container p-4 mt-3 mb-3 shadow-lg bg-light rounded">
        <h1>Episode Details</h1>
    </div>
    <div class="container p-4 mt-3 mb-3 shadow-lg bg-light rounded">
        <div class="row">
            <div class="col-sm-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Episode {{ $episode->episode }}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Name: {{ $episode->name }}</li>
                        <li class="list-group-item">Air Date: {{ $episode->air_date }}</li>
                        <li class="list-group-item">Created: {{ $episode->created }}</li>
                    </ul>
                    <div class="card-body">
                        <p><strong>Characters:</strong></p>
                        <div class="episodes-list">
                            @include('link_list',
                                [
                                    'entities' => $episode->characters,
                                    'routeName' => 'characters.detail'
                                ]
                            )
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection