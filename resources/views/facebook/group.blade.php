@extends('layouts.app')
@section('content')
<h1>Facebook Group</h1>
<ul>
    @forelse($groups as $group)
    <li>{{$group->name}}</li>
    @empty
    <p> No hay registros !!!  </p>
    @endforelse
</ul>
