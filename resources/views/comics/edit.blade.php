@extends('layouts.layout')

@section('title')
    Update {{$comic->title}}
@endsection

@section('content')
<form method="POST" action="{{route('comics.update',  $comic->id)}}">
    
    @csrf
    @method('PUT')
    <div>
        <label for="title">Titolo:</label>
        <input type="text" name="title" required maxlength="50" value="{{$comic->title}}">
    </div>

    <div>
        <label for="description">Descrizione:</label>
        <input type="text" name="description" cols="20" rows="10" required value="{{$comic->description}}"></input type="text">
    </div>

    <div>
        <label for="thumb">Url dell'immagine:</label>
        <input type="url" pattern="https://.*" name="thumb" required value="{{$comic->thumb}}">
    </div>

    <div>
        <label for="price">Prezzo:</label>
        <input type="number" name='price' min='0' step='.01' max='9999.99' required value="{{$comic->price}}">
    </div>

    <div>
        <label for="series">Serie:</label>
        <input type="text" name="series" required maxlength="50" value="{{$comic->series}}">
    </div>

    <div>
        <label for="sale_date">Data della vendita:</label>
        <input type="date" name="sale_date" required value="{{$comic->date}}">
    </div>

    <div>
        <label for="type">Genere:</label>
        <input type="text" name="type" required maxlength="20" value="{{$comic->type}}">
    </div>

    <input type="submit" value="Aggiorna">

</form>

<a href="{{route('comics.show', $comic->id)}}">Annulla</a>
@endsection