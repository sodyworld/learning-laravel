@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
    @endif
</div>
<div class="content">
        <form action="/message/create" method="post" enctype="multipart/form-data">
            <div class="form-group" @if($errors->has('message')) has-danger @endif>
                {{csrf_field()}}
                <input type="text" name="message" class="form-control" placeholder="Que estas pensando">
                @if($errors->has('message'))
                    @foreach($errors->get('message') as $error)
                        <div class="form-control-feedback">{{$error}}</div>
                    @endforeach
                @endif
                <input type="file" class="form-control-file" name="image">
            </div>
        </form>
        @forelse($messages as $message)
            <div class="col-6">
                @include('messages.message')
            </div>
        @empty
            <p> No hay registros !!!  </p>
        @endforelse 
</div>
@endsection