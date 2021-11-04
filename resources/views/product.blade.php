@include('templates.ad_header')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">New Product</h4>
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <div class="template-demo">
                                <a  href="{{url('export-products')}}">
                                    <button type="button" class="btn btn-primary btn-lg btn-block">
                                       Export Product
                                    </button>
                                </a>
                            </div>

                        </div>
                        <div class="col-md-4 col-xs-12">
                            <div class="template-demo">
                                <a data-toggle="modal" data-target="#AddNewProduct">
                                    <button type="button" class="btn btn-primary btn-lg btn-block">
                                        Add New Product
                                    </button>
                                </a>
                            </div>

                        </div>


                    </div>

                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Product List</h4>
                    <div class="row">
                        <div class="col-12">

                            <div class="table-responsive">

                                <table id="table-products" class="table">
                                    <thead>
                                        <tr class="bg-primary text-white">
                                            <th>Product_id#</th>
                                            <th>Product Title</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Created_At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php if (isset($product_data) && !empty($product_data)) { ?>
                                            <?php foreach ($product_data as $key => $value) { ?>

                                                <tr>
                                                    <td><?php echo (isset($value->product_id) ? $value->product_id : 'Null') ?></td>
                                                    <td><?php echo (isset($value->title) ? $value->title  : 'Null') ?></td>
                                                    <td><?php echo (isset($value->description) ? $value->description  : 'Null') ?></td>
                                                    <td><?php echo (isset($value->price) ? $value->price  : '') ?></td>
                                                    <td><?php echo (isset($value->created_at) ? $value->created_at : 'Null') ?></td>


                                                    <td class="actions-links">
                                                        <a data-toggle="modal" data-target="#EditProduct" data-whatever="<?php echo $value->product_id ?>"><i class="mdi mdi-pencil-box"></i></a>
                                                        <a type="button" onclick="Delete_Product('<?php echo $value->product_id ?>')"><i class="mdi mdi-archive red"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<!-- -Model--->
<div class="modal fade" id="AddNewProduct" tabindex="-1" role="dialog" aria-labelledby="AddNewProduct" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert" role="alert" style="display: none;">
                </div>
                <form class="submit-form" id="add-new-Role" action="{{url('add-product')}}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Type Title">
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control" cols="15" rows="5" placeholder="Type Description..."></textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" name="price" class="form-control" min='0' placeholder="Enter Price">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="add-form" class="btn btn-primary">Add Record</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>


<!-- -Model EditProduct--->
<div class="modal fade" id="EditProduct" tabindex="-1" role="dialog" aria-labelledby="EditProduct" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert" role="alert" style="display: none;">

                </div>
                <form class="submit-form" id="add-new-Role" action="{{url('update-product-record')}}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="title" id="title" class="form-control">
                        <input type="hidden" name="product_id" id="product_id" class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea name="description" id="description" class="form-control" cols="15" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" name="price" id="price" class="form-control" min='0'>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="add-form" class="btn btn-primary">Update Record</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>




<script>
    ///load Data Table
    let table = $('#table-products').DataTable();

    ///Submit Form 
    $('.submit-form').submit(function(e) {
        e.preventDefault();
        e.stopPropagation();
        let form = $(this).serialize();
        let url = $(this).attr('action');
        $(".error").remove();
        $('.alert').removeClass('alert-fill-success');
        $('.alert').removeClass('alert-fill-warning');
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            dataType: 'html',
            success: function(data) {
                let res = JSON.parse(data);
                switch (res.code) {
                    case 'success':
                        $('.alert').addClass('alert-fill-success');
                        $('.alert').html(res.message);
                        $('.alert').show();
                        setTimeout(function() {
                            window.location.reload();
                        }, 3500);
                        break;
                    case 'warning':
                        $('.alert').addClass('alert-fill-warning');
                        $('.alert').html(res.message);
                        $('.alert').show();
                        setTimeout(function() {
                            $('.alert').hide();
                        }, 3500);
                        break;
                    case 'error': 
                            $('[name=title]').parent().append('<span style="color:red; font-size:11px" class="error">' + res.message.title[0] + '</span>');
                            $('[name=description]').parent().append('<span style="color:red; font-size:11px" class="error">' + res.message.description[0] + '</span>');
                            $('[name=price]').parent().append('<span style="color:red; font-size:11px" class="error">' + res.message.price[0] + '</span>');
                       
                        break;

                }
            }

        });
    })

    //Model EditProduct Part:4
    $('#EditProduct').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var product_id = button.data('whatever');
        var csrf_token = $("meta[name=csrf-token]").attr("content");

        $.ajax({
            type: 'POST',
            url: "get-single-product",
            data: {
                product_id: product_id,
                _token: csrf_token,
            },
            dataType: 'html',
            success: function(data) {
                let res = JSON.parse(data);
                switch (res.code) {
                    case 'success':
                        ///enter values in form  
                        $('#product_id').val(res.data[0]['product_id']);
                        $('#title').val(res.data[0]['title']);
                        $('#description').val(res.data[0]['description']);
                        $('#price').val(res.data[0]['price']);


                        break;
                    case 'warning':
                        setTimeout(function() {
                            window.location.reload();
                        }, 3500);
                        break;

                }
            }
        });

    });


    ///delete product
    function Delete_Product(product_id) {
        var csrf_token = $("meta[name=csrf-token]").attr("content");
        var result = confirm("Want to delete?");
        if (result) {
            $.ajax({
                type: 'POST',
                url: "delete-single-product",
                data: {
                    product_id: product_id,
                    _token: csrf_token,
                },
                dataType: 'html',
                success: function(data) {
                    let res = JSON.parse(data);
                    switch (res.code) {
                        case 'success':
                            alert('Record deleted successfully!')
                            setTimeout(function() {
                                window.location.reload();
                            }, 1500);

                            break;


                    }
                }
            });
        }


    }


    $(document).keypress(function(e) {
        $('.error').hide();
    });
</script>

@include('templates.ad_footer')