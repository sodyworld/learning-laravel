@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <form action="/manga/store" method="post">
            {{csrf_field()}}
            <div class="form-group @if($errors->has('name')) has-danger @endif" >
               <input type="text" name="name" class="form-control" placeholder="Nombre">
                @if ($errors->has('name'))
                    @foreach($errors->get('name') as $error)
                        <div class="form-control-feedback">{{$error}}</div>
                    @endforeach
                @endif
            </div>

        </form>
    </div>
</div>
