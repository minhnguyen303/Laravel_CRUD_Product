@extends('page')
@section('body')
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tạo</button>
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
        @if(!empty($products))
            @foreach($products as $product)
                <tr id="row_{{$product->id}}">
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->desc}}</td>
                    <td>
                        <button type="button" class="btn btn-primary show" id="show_{{$product->id}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Xem</button>
                        <button type="button" class="btn btn-secondary edit" id="edit_{{$product->id}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Sửa</button>
                        <button type="button" class="btn btn-danger delete" id="delete_{{$product->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal">Xóa</button>
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
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                {{-- Form create product --}}
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" min="0" name="price" id="price" placeholder="Price">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" aria-label="With textarea" id="desc" name="desc" placeholder="Desc"></textarea>
                    </div>
                </div>
                {{-- End Form --}}

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeModal">Close</button>
                    <button type="button" class="btn btn-success" form="formCreate" id="createBtn">Thêm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2>Bạn chắc muốn xóa ?</h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Xóa</button>
                </div>
            </div>
        </div>
    </div>
@endsection
