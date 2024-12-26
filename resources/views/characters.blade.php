@extends('layouts.paginated')

@section('top-section')
    <div class="container p-4 mt-3 mb-3 shadow-lg bg-light rounded">
        <h1>Characters</h1>
    </div>
@endsection

@section('filters')
    <div class="container p-4 mt-3 mb-3 shadow-lg bg-light rounded">
        <form id="filter-form" action={{ route('characters.index') }}>
            @csrf
            <div class="row">
                <div class="col-md-32">
                    <input type="hidden" name="page" value=1/>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ $filters['name'] ?? '' }}">
                </div>
                <div class="col-md-3">
                    <label for="status">Status</label>
                    <select id="status" name="status">
                        <option value="" {{ ($filters['status'] ?? '') == '' ? 'selected' : '' }}>All</option>
                        <option value="alive" {{ ($filters['status'] ?? '') == 'alive' ? 'selected' : '' }}>Alive</option>
                        <option value="dead" {{ ($filters['status'] ?? '') == 'dead' ? 'selected' : '' }}>Dead</option>
                        <option value="unknown" {{ ($filters['status'] ?? '') == 'unknown' ? 'selected' : '' }}>Unknown</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender">
                        <option value="" {{ ($filters['gender'] ?? '') == '' ? 'selected' : '' }}>All</option>
                        <option value="female" {{ ($filters['gender'] ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="male" {{ ($filters['gender'] ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="genderless" {{ ($filters['gender'] ?? '') == 'genderless' ? 'selected' : '' }}>Genderless</option>
                        <option value="unknown" {{ ($filters['gender'] ?? '') == 'unknown' ? 'selected' : '' }}>Unknown</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="species">Species</label>
                    <input type="text" id="species" name="species" value="{{ $filters['species'] ?? '' }}">
                </div>
                <div class="col-md-3">
                    <input type="submit" value="Search">
                </div>
            </div>
        </form>
    </div>
@endsection

@section('table-content')
    <div class="container p-4 mt-3 mb-3 shadow-lg bg-light rounded">
        <table id="datatableCharacters" class="table table-striped table-bordered table-responsive" style="width: 100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Status</th>
                <th>Species</th>
                <th>Gender</th>
                <th>Image</th>
                <th>Episodes</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($pagedResponse->results as $character)
                <tr>
                    <td>
                        <a href="{{ route('characters.detail', ['id' => $character->id]) }}">
                            {{ $character->id }}
                        </a>
                    </td>
                    <td>{{ $character->name }}</td>
                    <td>{{ $character->status }}</td>
                    <td>{{ $character->species }}</td>
                    <td>{{ $character->gender }}</td>
                    <td>
                        <img src="{{ $character->image }}" alt="{{ $character->name }}" width="50">
                    </td>
                    <td>
                        @include('link_list',
                                [
                                    'entities' => $character->episode,
                                    'routeName' => 'episodes.detail'
                                ]
                            )
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection