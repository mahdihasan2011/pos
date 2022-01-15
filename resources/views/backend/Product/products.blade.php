@extends('layouts.master')
@section('title','Item List')
@section('content')
<div class="content-wrapper">
    <section class="content pt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Item List </h3>
                        {{-- <button class="btn btn-primary btn-sm" type="button" style="float:right;"
                            data-toggle="modal" data-target="#add-modal-lg">Item Entry
                        </button> --}}
                        <a href="{{ route('product.entry') }}" class="btn btn-primary btn-sm float-right">
                            <i class="fas fa-share"></i> Item Entry
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>P. Price</th>
                                    <th>Cost</th>
                                    <th>Profit</th>
                                    <th>S. Price</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;?>
                                @foreach ($product as $data)
                                <tr>
                                    <td>{{ $i++ }}.</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->code }}</td>
                                    <td>{{ $data->category }}</td>
                                    <td>{{ $data->brand }}</td>
                                    <td>{{ $data->color }}</td>
                                    <td>{{ $data->size }}</td>
                                    <td>{{ $data->purchase_price }}</td>
                                    <td>{{ $data->cost }}</td>
                                    <td>{{ $data->profit }}</td>
                                    <td>{{ $data->sale_price }}</td>
                                    <td class="project-actions text-center">
                                        <button type="button" value="{{ $data->id }}" class="btn btn-primary
                                        editProduct btn-xs" data-toggle="modal" data-target="#edit-modal-lg" disabled>
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger NewDelete btn-xs" value="{{ $data->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Edit modal Start-->
    <div class="modal fade" id="edit-modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Item : Edit</h5>
                    <small style="color:gray; font-size: 11px; padding-top: 10px;">&nbsp; ( * This Fields Must Be Filled.)
                    </small>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('product.update') }}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="modal-body">
                        <div class="row">
                            <input name="id" id="pid" class="pid" type="hidden"/>
                            <div class="col-lg-3 form-group">
                                <label for="category">Category <span style="color:gray">*</span></label>
                                <select class="category form-control form-control-sm select2 bs4" data-placeholder="Select Category" name="category" required>
                                    <option value="">Select Category</option>
                                    @foreach ($category as $data)
                                    <option value="{{ $data->id }}" data-id="{{ $data->details }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="brand">Brand </label>
                                <select class="brand form-control form-control-sm select2" data-placeholder="Select Brand" name="brand">
                                    <option value="00">Select Brand</option>
                                    @foreach ($brand as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="size">Size </label>
                                <select class="size form-control form-control-sm select2" data-placeholder="Select Size" name="size">
                                    <option value="00" data-id="00">Select Size</option>
                                    @foreach ($size as $data)
                                    <option value="{{ $data->id }}" data-id="{{ $data->details }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="color">Color</label>
                                <select class="color form-control form-control-sm select2" data-placeholder="Select Color" name="color">
                                    <option value="00" data-id="00">Select Color</option>
                                    @foreach ($color as $data)
                                        <option value="{{ $data->id }}" data-id="{{ $data->details }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-9 form-group">
                                <label for="name">Item Name <span style="color:gray">*</span></label>
                                <input name="name" class="name form-control form-control-sm" type="text" placeholder="Item Name" required>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="code">Item Code </label>
                                <input name="code" class="code form-control form-control-sm"
                                       type="text" placeholder="Item Code" readonly>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="purchase_price">Purchase Price <span style="color:gray">*</span></label>
                                <input name="purchase_price" class="purchase_price form-control form-control-sm"
                                    type="text" id="purchase_price" placeholder="Purchase Price" required>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="cost">Cost <span style="color:gray">*</span></label>
                                <input name="cost" class="cost form-control form-control-sm"
                                    type="text" id="cost" placeholder="Cost" required>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="total_cost">Total Cost </label>
                                <input name="total_cost" class="total_cost form-control form-control-sm"
                                    type="text" placeholder="Total Cost" readonly>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="profit">Profit (%) <span style="color:gray">*</span></label>
                                <input name="profit" class="profit form-control form-control-sm"
                                       type="text" placeholder="Profit in Percentage ( % )" required>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="sale_price">Sale Price <span style="color:gray">*</span></label>
                                <input name="sale_price" class="sale_price form-control form-control-sm"
                                       type="text" placeholder="Sale Price" required>
                            </div>
                            <div class="col-lg-9 form-group">
                                <label for="image">Item Image</label>
                                <input name="image" type="file" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal" style="color: white;">Cancel</button>
{{--                        <button type="reset" class="btn btn-danger btn-sm">Clear</button>--}}
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Edit modal Ends-->

</div>
@endsection
@section('customJs')
<script type="text/javascript">
    $(document).ready(function () {
        let year = new Date().getFullYear().toString().substr(-2);
        let cat = '00';
        let size = '00';
        let clr = '00';
        let pid = $(".pid").val();
        let itemcode = year+cat+size+clr+pid;
        $(".code").val(itemcode);
        $('.category').on('change click', function () {
            cat = $(this).find(':selected').data('id');
            concatcode(year,cat,size,clr,pid);
        });
        $('.size').on('change click', function () {
            size = $(this).find(':selected').data('id');
            concatcode(year,cat,size,clr,pid);
        });
        $('.color').on('change click', function () {
            clr = $(this).find(':selected').data('id');
            concatcode(year,cat,size,clr,pid);
        });
        $(document).on('click', '.NewDelete', function() {
            var id = $(this).val();
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You Want to Delete this Item ??",
                type: 'question',
                showCancelButton: true,
                confirmButtonText: ' Yes, delete it ! ',
                cancelButtonText: ' No, cancel ! ',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    swalWithBootstrapButtons.fire(
                        ' Deleted ! ',
                        ' Item has been Deleted Successfully.',
                        'success'
                    )
                    $.ajax({
                        url: "{{ route('product.destroy') }}",
                        type: 'GET',
                        data: { id: id, },
                        success: function (){
                            setTimeout(function(){
                                location.reload();
                            }, 500);
                        }
                    });
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) { swalWithBootstrapButtons.fire(
                    ' Canceled ',
                    ' Item has not Deleted. ',
                    'error'
                )};
            });
        });
        $(document).on('click', '.editProduct', function () {
            let id = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{ route('product.edit') }}",
                data: {id: id},
                success: function (data) {
                    $('.pid').val(data[0]['id']);
                    $('.name').val(data[0]['name']);
                    $('.code').val(data[0]['code']);
                    // $('.category').val(data[0]['category']);
                    $('.category').val(data[0]['category']).change();
                    $('.brand').val(data[0]['brand']).change();
                    $('.color').val(data[0]['color']).change();
                    $('.size').val(data[0]['size']).change();
                    $('.purchase_price').val(data[0]['purchase_price']);
                    $('.cost').val(data[0]['cost']);
                    $('.total_cost').val(data[0]['purchase_price'] + data[0]['cost']);
                    $('.profit').val(data[0]['profit']);
                    $('.sale_price').val(data[0]['sale_price']);
                    pid = data[0]['id'];
                    concatcode(year,cat,size,clr,pid);
                }
            });
        });
        $(document).on('submit', '#updatE', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('product.update') }}",
                data: form.serialize(),
                success: function () {
                    $('#edit-modal-lg').modal('hide');
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 2500
                    });
                    $(function() {
                        Toast.fire({
                        type: 'info',
                        title: '&nbsp; Item Updated Successfully. '
                        })
                    });
                    setTimeout(function(){
                        location.reload();
                    }, 2000);
                },
                error: function (error) {
                    console.log(error);
                    alert('Data Not Saved');
                }
            });
        });
    });
    function concatcode(year,cat,size,clr,pid) {
        let itemcode = year+cat+size+clr+pid;
        $(".code").val(itemcode);
    }
    function calculation() {
        let purchase_price = $(".purchase_price").val();
        let cost = $(".cost").val();
        let total_cost = +purchase_price + +cost;
        $(".total_cost").val(total_cost.toFixed(2));
        const profit = $(".profit").val();
        const stotal = (total_cost * profit);
        const ptotal = (stotal / 100);
        const total = +ptotal + +total_cost;
        $(".sale_price").val(total.toFixed(2));
    }
    $(".purchase_price").on('keyup', calculation);
    $(".cost").on('keyup', calculation);
    $(".profit").on('keyup', calculation);
</script>
@endsection
