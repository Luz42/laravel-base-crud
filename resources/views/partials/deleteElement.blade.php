<div>
    <form id="deleteElement{{$comic->id}}" action="{{route('comics.destroy', $comic->id)}}" method="POST">
        @csrf
        @method('DELETE')
    </form>
    <button onclick="askConfirm({{$comic->id}})">{{__('Rimuovi')}}</button>
</div>    