$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('button').click(function () {
        let html;
        let id;
        let inpName = $('#name');
        let inpPrice = $('#price');
        let inpDesc = $('#desc');
        let name, price, desc;
        let footer;
        let modalBody = $('.modal-body');
        let modalFooter = $('.modal-footer');

        switch ($(this).text()) {
            case "Tạo":
                html = "<div class=\"mb-3\">";
                html += "<input type=\"text\" class=\"form-control\" name=\"name\" id=\"name\" placeholder=\"Name\">";
                html += "</div>";
                html += "<div class=\"mb-3\">";
                html += "<input type=\"number\" class=\"form-control\" min=\"0\" name=\"price\" id=\"price\" placeholder=\"Price\">";
                html += "</div>";
                html += "<div class=\"mb-3\">";
                html += "<textarea class=\"form-control\" aria-label=\"With textarea\" id=\"desc\" name=\"desc\" placeholder=\"Desc\"></textarea>";
                html += "</div>";

                modalBody.html(html);

                footer = "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\" id=\"closeModal\">Close</button>";
                footer += "<button type=\"button\" class=\"btn btn-success\" id=\"createBtn\">Thêm</button>";
                modalFooter.html(footer);

                break;
            case "Thêm":
                name = inpName.val();
                price = inpPrice.val();
                desc = inpDesc.val();

                $.ajax({
                    url: window.origin + "/create",
                    method: 'POST',
                    data: {
                        name: name,
                        price: price,
                        desc: desc
                    },
                    success: function (res) {
                        html = "<tr>";
                        html += "<th scope=\"row\">" + res.id + "</th>";
                        html += "<td>" + res.name + "</td>";
                        html += "<td>" + res.price + "</td>";
                        html += "<td>" + res.desc + "</td>";
                        html += "<td>";
                        html += "<button type=\"button\" class=\"btn btn-secondary edit\" id=\"edit_" + res.id + "\" data-bs-toggle=\"modal\" data-bs-target=\"#staticBackdrop\">Sửa</button>";
                        html += "<button type=\"button\" class=\"btn btn-danger delete\" id=\"delete_" + res.id + ">Xóa</button>";
                        html += "</td>";
                        html += "</tr>";

                        $('#closeModal').trigger('click');
                        $('#content').append(html);

                        inpName.val('');
                        inpPrice.val('');
                        inpDesc.val('');
                    },
                    error: function (err) {

                    }
                })
                break;
            case "Xem":
                id = $(this).attr('id').slice(5);
                $.ajax({
                    url: window.origin + "/show/" + id,
                    method: 'GET',
                    success: function (res) {
                        console.log(res);

                        let name = res.name;
                        let price = res.price;
                        let desc = res.desc;

                        html = "<h1>Name:</h1>";
                        html += "<h3 class='bg-primary'>" + name + "</h3>";
                        html += "<h1>Price:</h1>";
                        html += "<h3 class='bg-primary'>"+ price +"</h3>";
                        html += "<h1>Desc:</h1>";
                        html += "<h4 class='bg-primary'>"+ desc +"</h4>";
                        modalBody.html(html);

                        modalFooter.html('');
                    },
                    error: function (err) {

                    }
                })
                break;
            case "Sửa":
                id = $(this).attr('id').slice(5);
                $.ajax({
                    url: window.origin + "/show/" + id,
                    method: 'GET',
                    success: function (res) {
                        console.log(res);

                        let name = res.name;
                        let price = res.price;
                        let desc = res.desc;

                        html = "<div class=\"mb-3\">";
                        html += "<input type=\"text\" class=\"form-control\" name=\"name\" id=\"name\" placeholder=\"Name\" value="+ name +">";
                        html += "</div>";
                        html += "<div class=\"mb-3\">";
                        html += "<input type=\"number\" class=\"form-control\" min=\"0\" name=\"price\" id=\"price\" placeholder=\"Price\" value="+price+">";
                        html += "</div>";
                        html += "<div class=\"mb-3\">";
                        html += "<textarea class=\"form-control\" aria-label=\"With textarea\" id=\"desc\" name=\"desc\" placeholder=\"Desc\">"+desc+"</textarea>";
                        html += "</div>";

                        modalBody.html(html);

                        footer = "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\" id=\"closeModal\">Close</button>";
                        footer += "<button type=\"button\" class=\"btn btn-success\" id=\"save_"+id+"\">Lưu</button>";
                        modalFooter.html(footer);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                })
                break;
            case "Lưu":
                alert(123);
                id = $(this).attr('id').slice(5);
                name = inpName.val();
                price = inpPrice.val();
                desc = inpDesc.val();

                alert(name);
                return;

                $.ajax({
                    url: window.origin + "/update/" + id,
                    method: 'POST',
                    data: {
                        id: id,
                        name: name,
                        price: price,
                        desc: desc
                    },
                    success: function (res) {
                        html = "<th scope=\"row\">" + res.id + "</th>";
                        html += "<td>" + res.name + "</td>";
                        html += "<td>" + res.price + "</td>";
                        html += "<td>" + res.desc + "</td>";
                        html += "<td>";
                        html += "<button type=\"button\" class=\"btn btn-secondary edit\" id=\"edit_" + res.id + "\" data-bs-toggle=\"modal\" data-bs-target=\"#staticBackdrop\">Sửa</button>";
                        html += "<button type=\"button\" class=\"btn btn-danger delete\" id=\"delete_" + res.id + "\">Xóa</button>";
                        html += "</td>";

                        $('#closeModal').trigger('click');
                        let row = "row_"+id;
                        $('#'+row).html(html);

                        inpName.val('');
                        inpPrice.val('');
                        inpDesc.val('');
                    },
                    error: function (err) {

                    }
                })
                break;
            case "Xóa":
                id = $(this).attr('id').slice(7);
                $.ajax({
                    url: window.origin + "/delete/" + id,
                    method: 'GET',
                    success: function (res) {
                        let idRow = '#row'+id;
                        $("#"+"row_"+id).remove();
                    },
                    error: function (err) {
                        console.error(err);
                    }
                })
                break;
        }
    });

    $('#createBtn').click(function () {


    });

    $('.edit').click(function () {
        let id = $(this).attr('id').slice(5);
    });
});
