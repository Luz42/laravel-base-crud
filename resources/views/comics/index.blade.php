@extends('layouts.layout')

@section('title')
    {{__('Comics')}}
@endsection

@section('content')

    <div>
        <a href="{{route('comics.create')}}">{{__('Aggiungi un nuovo fumetto!')}}</a>
    </div>
    @foreach ($comics as $comic)
        <div>
            <h4>{{$comic['title']}}</h4>
            <a href="{{ route('comics.show', $comic->id) }}">{{__('Dettagli')}}</a>
        </div>
    @endforeach
@endsection
