<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Id: {{$product->id}}</h1>
<h1>Name: {{$product->name}}</h1>
<h1>Price: {{$product->price}}</h1>
<h1>Desc: {{$product->desc}}</h1>
<a href="{{route('product.index')}}">
    <button>Back</button>
</a>
</body>
</html>
