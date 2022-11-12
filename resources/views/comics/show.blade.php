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
<div>
    <form action="{{route('comics.destroy', $comic->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="ELIMINA">
    </form>
</div>    
<div>
    <a href="{{route('comics.index')}}">Home</a>
</div> 
@endsection