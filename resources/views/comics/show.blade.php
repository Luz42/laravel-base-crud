<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>

            <li><h4>{{$comic['title']}}</h4></li>
            <li><p>{{$comic['description']}}</p></li>
            <li><img src="{{$comic['thumb']}}" alt="Immagine di:{{$comic['title']}}"></li>
            <li><p>{{$comic['price']}}</p></li>
            <li><p>{{$comic['series']}}</p></li>
            <li><p>{{$comic['sale_date']}}</p></li>
            <li><p>{{$comic['type']}}</p></li>

    </ul>
</body>
</html>