@extends('page')
@section('body')
    <h1 id="demo"></h1>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal">Tạo</button>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Desc</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody id="content">
        @if(!($products == null))
            @foreach($products as $product)
                <tr id="row_{{$product->id}}">
                    <th scope="row">{{$product->id}}</th>
                    <td id="productName_{{$product->id}}">{{$product->name}}</td>
                    <td id="productPrice_{{$product->id}}">{{$product->price}}</td>
                    <td id="productDesc_{{$product->id}}">{{$product->desc}}</td>
                    <td>
                        <button type="button" class="btn btn-primary show" id="show_{{$product->id}}" data-bs-toggle="modal" data-bs-target="#modal">Xem</button>
                        <button type="button" class="btn btn-secondary edit" id="edit_{{$product->id}}" data-bs-toggle="modal" data-bs-target="#modal">Sửa</button>
                        <button type="button" class="btn btn-danger delete" id="delete_{{$product->id}}" data-bs-toggle="modal" data-bs-target="#modal">Xóa</button>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <th colspan="5" class="text-center">Không có dữ liệu</th>
            </tr>
        @endif
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleAddProduct">Thêm sản phẩm</h5>
                    <h5 class="modal-title" id="titleEditProduct">Sửa sản phẩm</h5>
                    <h5 class="modal-title" id="titleShowProduct">Thông tin sản phẩm</h5>
                    <h5 class="modal-title" id="titleDeleteProduct">Xóa sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="bodyAddAndEditProduct">
                        <input type="text" name="idProduct" id="idProduct" value="" hidden>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="nameProduct" id="nameProduct" placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" min="0" name="priceProduct" id="priceProduct" placeholder="Price">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" aria-label="With textarea" id="descProduct" name="descProduct" placeholder="Desc"></textarea>
                        </div>
                    </div>
                    <div id="bodyShowProduct">
                        <h1>Created date:</h1>
                        <h3 class='text-primary border border-4 rounded p-3' id="showProductCreatedDate"></h3>
                        <h1>Name:</h1>
                        <h3 class='text-primary border border-4 rounded p-3' id="showProductName"></h3>
                        <h1>Price:</h1>
                        <h3 class='text-primary border border-4 rounded p-3' id="showProductPrice"></h3>
                        <h1>Desc:</h1>
                        <h4 class='text-primary border border-4 rounded p-3' id="showProductDesc"></h4>
                    </div>
                    <div id="bodyDeleteProduct">
                        <h5>Bạn có chắc muốn xóa sản phẩm có ID là:</h5>
                        <h4 class='text-primary border border-4 rounded p-3' id="nameProductDelete"></h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-success" id="btnAddProduct">Thêm</button>
                    <button type="button" class="btn btn-success" id="btnUpdateProduct">Lưu</button>
                    <button type="button" class="btn btn-danger" id="btnDeleteProduct">Xóa</button>
                </div>
            </div>
        </div>
    </div>

@endsection
