@extends('layouts.layout')

@section('title')
    {{$comic['title']}}
@endsection

@section('content')
<ul>
    <li><h4>{{$comic['title']}}</h4></li>
    <li><p>{{$comic['description']}}</p></li>
    <li><img style='width:250px' src="{{$comic['thumb']}}" alt="Immagine di:{{$comic['title']}}"></li>
    <li><p>{{$comic['price']}}</p></li>
    <li><p>{{$comic['series']}}</p></li>
    <li><p>{{$comic['sale_date']}}</p></li>
    <li><p>{{$comic['type']}}</p></li>
</ul>

@include('partials.deleteElement')

<a href="{{route('comics.edit', $comic->id)}}">{{__('Aggiorna')}}</a>

<div>
    <a href="{{route('comics.index')}}">{{__('Home')}}</a>
</div> 
@endsection
