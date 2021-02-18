<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<table>
    <caption>
        <h1>Products List</h1>
        <a href="{{route('product.create')}}"><button>Create</button></a>
    </caption>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Desc</th>
        <th>Action</th>
    </tr>
    @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td><a href="{{route('product.show', $product->id)}}">{{$product->name}}</a></td>
            <td>{{$product->price}}</td>
            <td>{{$product->desc}}</td>
            <td>
                <a href="{{route('product.edit', $product->id)}}"><button>Edit</button></a>
                <a href="{{route('product.delete', $product->id)}}">
                    <button onclick="confirm('Do you want to delete')">Delete</button>
                </a>
            </td>
        </tr>
    @endforeach
</table>
{{$products->links()}}
</body>
</html>
