@extends('layouts.layout')

@section('title')
    Add New Comic
@endsection

@section('content')
    <form action="{{route('comics.store')}}" method="post">
        @csrf
        <div>
            <label for="title">Titolo:</label>
            <input type="text" name="title" required maxlength="50">
        </div>

        <div>
            <label for="description">Descrizione:</label>
            <textarea name="description" cols="20" rows="1" required></textarea>
        </div>

        <div>
            <label for="thumb">Url dell'immagine:</label>
            <input type="url" pattern="https://.*" name="thumb" required>
        </div>

        <div>
            <label for="price">Prezzo:</label>
            <input type="number" name='price' min='0' step='.01' max='9999.99' required>
        </div>

        <div>
            <label for="series">Serie:</label>
            <input type="text" name="series" required maxlength="50">
        </div>

        <div>
            <label for="sale_date">Data della vendita:</label>
            <input type="date" name="sale_date" required>
        </div>

        <div>
            <label for="type">Genere:</label>
            <input type="text" name="type" required maxlength="20">
        </div>

        <input type="submit" value="Aggiungi">

    </form>

    <div>
        <a href="{{route('comics.index')}}">Back</a>
    </div>
@endsection