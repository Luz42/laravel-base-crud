@extends('layouts.layout')

@section('title')
    Comics
@endsection

@section('content')
    @foreach ($comics as $comic)
        <div>
            <h4>{{$comic['title']}}</h4>
            <a href="{{ route('comics.show', $comic->id) }}">Dettagli</a>
        </div>
    @endforeach
@endsection
