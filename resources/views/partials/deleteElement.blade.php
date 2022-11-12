<div>
    <form id="deleteElement{{$comic->id}}" action="{{route('comics.destroy', $comic->id)}}" method="POST">
        @csrf
        @method('DELETE')
    </form>
    <button onclick="sayHello({{$comic->id}})">Rimuovi</button>
</div>    