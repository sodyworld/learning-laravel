<img class="img-thumbnail" src="{{$message->image}}">
<p class="card-text">
    <div class="text-muted">Escrito por 
        <a href="/user/{{$message->user->username}}">{{$message->user->username}} </a>
    </div>
    {{$message->description}}
    <a href="/messages/{{$message->id}}">Leer mas</a>
</p>
<div class="card-text text-muted float-right">
    {{$message->created_at}}
</div>