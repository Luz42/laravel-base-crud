@extends('layouts.layout')

@section('title')
    Add New Comic
@endsection

@section('content')
    <form action="{{route('comics.store')}}" method="post">
        @csrf
        <div>
            <label for="title">Titolo:</label>
            <input @error('title') class="is-invalid" @enderror type="text" name="title"  maxlength="50">
            @error('title')
                <span>{{$message}}</span>
            @enderror
        </div>

        <div>
            <label for="description">Descrizione:</label>
            <textarea @error('description') class="is-invalid" @enderror name="description" cols="20" rows="1" ></textarea>
            @error('description')
                <span>{{$message}}</span>
            @enderror
        </div>

        <div>
            <label for="thumb">Url dell'immagine:</label>
            <input @error('thumb') class="is-invalid" @enderror type="url" pattern="https://.*" name="thumb" >
            @error('thumb')
                <span>{{$message}}</span>
            @enderror
        </div>

        <div>
            <label for="price">Prezzo:</label>
            <input @error('price') class="is-invalid" @enderror type="number" name='price' min='0' step='.01' max='9999.99' >
            @error('price')
                <span>{{$message}}</span>
            @enderror
        </div>

        <div>
            <label for="series">Serie:</label>
            <input @error('series') class="is-invalid" @enderror type="text" name="series"  maxlength="50">
            @error('series')
                <span>{{$message}}</span>
            @enderror
        </div>

        <div>
            <label for="sale_date">Data della vendita:</label>
            <input @error('sale_date') class="is-invalid" @enderror type="date" name="sale_date" >
            @error('sale_date')
                <span>{{$message}}</span>
            @enderror
        </div>

        <div>
            <label for="type">Genere:</label>
            <input @error('type') class="is-invalid" @enderror type="text" name="type"  maxlength="20">
            @error('type')
                <span>{{$message}}</span>
            @enderror
        </div>

        <input type="submit" value="Aggiungi">

    </form>

    {{-- POSSIBILE ALTERNATIVA PER LA GESTIONE DEGLI ERRORI --}}
    {{-- @if($errors->any())
         @dump($errors)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif --}}

    <div>
        <a href="{{route('comics.index')}}">Back</a>
    </div>
@endsection