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
<form action="" method="post">
    @csrf
    <input type="text" name="name" id="" placeholder="Name" value="{{$product->name}}">
    <input type="text" name="price" id="" placeholder="Price" value="{{$product->price}}">
    <input type="text" name="desc" id="" placeholder="Desc" value="{{$product->desc}}">
    <button type="submit">Save</button>
    <a href="{{route('product.index')}}"><button type="button">Back</button></a>
</form>
</body>
</html>
