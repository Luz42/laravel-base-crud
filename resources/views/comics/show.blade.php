@extends('layouts.layout')

@section('title')
    {{$comic['title']}}
@endsection

@section('content')
<ul>
    <li><h4>{{$comic['title']}}</h4></li>
    <li><p>{{$comic['description']}}</p></li>
    <li><img src="{{$comic['thumb']}}" alt="Immagine di:{{$comic['title']}}"></li>
    <li><p>{{$comic['price']}}</p></li>
    <li><p>{{$comic['series']}}</p></li>
    <li><p>{{$comic['sale_date']}}</p></li>
    <li><p>{{$comic['type']}}</p></li>
</ul>    
@endsection