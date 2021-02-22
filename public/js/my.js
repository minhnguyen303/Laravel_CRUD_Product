function toDateString(date) {
    date = new Date(date);
    return date.toDateString();
}

$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('button').click(function () {
        let html;
        let id = $('#idProduct');

        let name = $('#nameProduct');
        let price = $('#priceProduct');
        let desc = $('#descProduct');

        let btnClose = $('.btn-close');

        switch ($(this).text()) {
            case "Tạo":

                $('#titleAddProduct').show();
                $('#titleEditProduct').hide();
                $('#titleShowProduct').hide();
                $('#titleDeleteProduct').hide();
                $('#bodyAddAndEditProduct').show();
                $('#bodyShowProduct').hide();
                $('#bodyDeleteProduct').hide();
                $('#btnAddProduct').show();
                $('#btnUpdateProduct').hide();
                $('#btnDeleteProduct').hide();

                break;
            case "Thêm":
                btnClose.trigger('click');
                $.ajax({
                    url: window.origin + "/create",
                    method: 'POST',
                    data: {
                        name: name.val(),
                        price: price.val(),
                        desc: desc.val()
                    },
                    success: function (res) {
                        html = "<tr>";
                        html += "<th scope=\"row\">" + res.id + "</th>";
                        html += "<td>" + res.name + "</td>";
                        html += "<td>" + res.price + "</td>";
                        html += "<td>" + res.desc + "</td>";
                        html += "<td>";
                        html += "<button type=\"button\" class=\"btn btn-primary show\" id=\"show_" + res.id + "\" data-bs-toggle=\"modal\" data-bs-target=\"#modal\">Xem</button>";
                        html += "<button type=\"button\" class=\"btn btn-secondary edit\" id=\"edit_" + res.id + "\" data-bs-toggle=\"modal\" data-bs-target=\"#modal\">Sửa</button>";
                        html += "<button type=\"button\" class=\"btn btn-danger delete\" id=\"delete_" + res.id + "\">Xóa</button>";
                        html += "</td>";
                        html += "</tr>";

                        $('#content').append(html);

                        name.val('');
                        price.val('');
                        desc.val('');
                    },
                    error: function (err) {

                    }
                })
                break;
            case "Xem":
                $.ajax({
                    url: window.origin + "/show/" + $(this).attr('id').slice(5),
                    method: 'GET',
                    success: function (res) {
                        console.log(res);

                        $('#titleAddProduct').hide();
                        $('#titleEditProduct').hide();
                        $('#titleShowProduct').show();
                        $('#titleDeleteProduct').hide();
                        $('#bodyAddAndEditProduct').hide();
                        $('#bodyShowProduct').show();
                        $('#bodyDeleteProduct').hide();
                        $('#btnAddProduct').hide();
                        $('#btnUpdateProduct').hide();
                        $('#btnDeleteProduct').hide();

                        $('#showProductCreatedDate').text(toDateString(res.created_at));
                        $('#showProductName').text(res.name);
                        $('#showProductPrice').text(res.price);
                        $('#showProductDesc').text(res.desc);

                    },
                    error: function (err) {

                    }
                })
                break;
            case "Sửa":
                let idEdit = $(this).attr('id').slice(5);
                $.ajax({
                    url: window.origin + "/show/" + idEdit,
                    method: 'GET',
                    success: function (res) {

                        id.val(idEdit);
                        name.val(res.name);
                        price.val(res.price);
                        desc.val(res.desc);

                        $('#titleAddProduct').hide();
                        $('#titleEditProduct').show();
                        $('#titleShowProduct').hide();
                        $('#titleDeleteProduct').hide();
                        $('#bodyAddAndEditProduct').show();
                        $('#bodyShowProduct').hide();
                        $('#bodyDeleteProduct').hide();
                        $('#btnAddProduct').hide();
                        $('#btnUpdateProduct').show();
                        $('#btnDeleteProduct').hide();
                    },
                    error: function (err) {
                        console.log(err);
                    }
                })
                break;
            case "Lưu":
                btnClose.trigger('click');
                $.ajax({
                    url: window.origin + "/update/" + id.val(),
                    method: 'POST',
                    data: {
                        id: id.val(),
                        name: name.val(),
                        price: price.val(),
                        desc: desc.val()
                    },
                    success: function (res) {

                        $('#' + 'productName_' + res.id).text(res.name);
                        $('#' + 'productPrice_' + res.id).text(res.price);
                        $('#' + 'productDesc_' + res.id).text(res.desc);

                        id.val('');
                        name.val('');
                        price.val('');
                        desc.val('');
                    },
                    error: function (err) {

                    }
                })
                break;
            case "Xóa":
                let idDelete = $(this).attr('id').slice(7);
                id.val(idDelete);
                btnClose.click();
                if ($(this).attr('id') === 'btnDeleteProduct'){
                    $.ajax({
                        url: window.origin + "/delete/" + id.val(),
                        method: 'GET',
                        success: function (res) {
                            $("#"+"row_"+id.val()).remove();
                        },
                        error: function (err) {
                            console.error(err);
                        }
                    })
                }else {
                    $('#titleAddProduct').hide();
                    $('#titleEditProduct').hide();
                    $('#titleShowProduct').hide();
                    $('#titleDeleteProduct').show();
                    $('#bodyAddAndEditProduct').hide();
                    $('#bodyShowProduct').hide();
                    $('#bodyDeleteProduct').show();
                    $('#btnAddProduct').hide();
                    $('#btnUpdateProduct').hide();
                    $('#btnDeleteProduct').show();
                    $('#nameProductDelete').text(idDelete);
                }
                break;
        }
    });

    $('#createBtn').click(function () {


    });

    $('.edit').click(function () {
        let id = $(this).attr('id').slice(5);
    });
});
