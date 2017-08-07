@extends('layouts.app')
@section('content')
<div class="jumbotron text-center">
    <h1>Comic</h1>
    <nav>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="/comic/chapter">Chapter</a>
            </li>
        </ul>
    </nav>
</div>
<ul>
    @forelse($mangas as $manga)
    <li>{{$manga->name}}</li>
    @empty
    <p> No hay registros !!!  </p>
    @endforelse
</ul>

@if(count($mangas))
    <div class="mt-2 mx-auto">
    {{$mangas->links('pagination::bootstrap-4')}}
    </div>
@endif