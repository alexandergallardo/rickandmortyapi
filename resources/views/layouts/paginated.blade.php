{{--
    Partial template with pagination support

    Input variables:

    @var Response $pagedResponse
    @var int $page
--}}

@extends('layouts.app')

@section('content')
    <div class="top-section">
        @yield('top-section')
    </div>

    <div class="filters">
        @yield('filters')
    </div>

    <div class="table-content">
        @yield('table-content')
    </div>

    <div class="container p-4 mt-3 mb-3 shadow-lg bg-light rounded">
        {{-- Pagination Links --}}
        <div class="pagination-bar">
            @if($pagedResponse->info->prev)
                <a href="{{ route(Route::currentRouteName(), array_merge(['page' => $page - 1], $filters ?? [])) }}">← Previous</a>
            @endif

            @if($pagedResponse->info->next)
                <a href="{{ route(Route::currentRouteName(), array_merge(['page' => $page + 1], $filters ?? [])) }}">Next →</a>
            @endif
        </div>
    </div>
@endsection