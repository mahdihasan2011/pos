@extends('layouts.master')
@section('title')
    Product Entry
@endsection
@section('content')
<div class="content-wrapper">

    <section class="content pt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Product <small>( Entry )</small></h3>
                        <small style="float: right; color:gray">* This Fields Must Be Filled.</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="POST" id="SAVForm" name="pro_sub" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                    <div class="col-lg-3 form-group">
                                        <label for="category">Category <span style="color:gray">*</span></label>
                                        <select class="form-control form-control-sm select2 category" data-placeholder="Select Category" name="category" required>
                                            <option value="">Select Category</option>
                                            @foreach ($category as $data)
                                            <option value="{{ $data->id }}" data-id="{{ $data->details }}">{{ $data->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="brand">Brand</label>
                                        <select class="form-control form-control-sm select2 brand" data-placeholder="Select Brand" name="brand">
                                            <option value="0">Select Brand</option>
                                            @foreach ($brand as $data)
                                            <option value="{{ $data->id }}" data-id="{{ $data->details }}">{{ $data->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="size">Size</label>
                                        <select class="form-control form-control-sm select2 size" data-placeholder="Select Size" name="size" >
                                            <option value="0" data-id="00">Select Size</option>
                                            @foreach ($size as $data)
                                            <option value="{{ $data->id }}" data-id="{{ $data->details }}">{{ $data->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="color">Color</label>
                                        <select class="form-control form-control-sm select2 color" data-placeholder="Select Color" name="color">
                                            <option value="0" data-id="00">Select Color</option>
                                            @foreach ($color as $data)
                                            <option value="{{ $data->id }}" data-id="{{ $data->details }}">{{ $data->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-9 form-group">
                                        <label for="name">Product Name <span style="color:gray">*</span></label>
                                        <input name="name" id="name" type="text" required
                                               value="{{ old('name') }}" placeholder="Product Name"
                                               class="form-control form-control-sm @error('name') is-invalid @enderror">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert" style="color:red;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="code">Product Code</label>
                                        <input name="code" id="code" type="text" required
                                               value="" placeholder="Product Code"
                                               class="form-control form-control-sm" readonly>
                                        {{--@error('code')
                                            <span class="invalid-feedback" role="alert"
                                                style="color:red;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror--}}
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="purchase_price">Purchase Price <span style="color:gray">*</span></label>
                                        <input name="purchase_price" class="form-control form-control-sm" value="{{ old('purchase_price') }}" type="text" id="purchase_price" placeholder="Purchase Price" required>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="cost">Cost <span style="color:gray">*</span></label>
                                        <input name="cost" class="form-control form-control-sm" value="{{ old('cost') }}" type="text" id="cost" placeholder="Cost" required>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="total_cost">Total Cost </label>
                                        <input name="total_cost" class="form-control form-control-sm" value="{{ old('total_cost') }}" type="text" id="total_cost" placeholder="Total Cost" readonly>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="profit">Profit (%) <span style="color:gray">*</span></label>
                                        <input name="profit" class="form-control form-control-sm" value="{{ old('profit') }}" type="text" id="profit" placeholder="Profit in Percentage ( % )" required>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="price">Sale Price <span style="color:gray">*</span></label>
                                        <input name="sale_price" class="form-control form-control-sm" value="{{ old('sale_price') }}" type="text" id="price" placeholder="Sale Price" required>
                                    </div>
                                    <div class="col-lg-9 form-group">
                                        <label for="image">Product Image</label>
                                        <input name="image" type="file" value="{{ old('image') }}" class="form-control form-control-sm">
                                    </div>
                                </div>
                            <div class="modal-footer justify-content-between center">
                                @can('product_list')
                                <a href="{{ route('product.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-reply"></i> Product List</a>
                                @endcan
                                {{--                            <a href="{{ route('product.entry') }}" class="btn btn-warning btn-sm">Reset</a>--}}
                                {{--                            <button type="reset" class="btn btn-info btn-sm">Clear</button>  --}}
                                @can('product_create')
                                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> <b>Save</b></button>
                                @endcan
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
@section('customJs')
    <script>
        $(document).ready(function() {
            $('.size').find(':selected').data('id', '00');
            $('.color').find(':selected').data('id', '00');
            let year = new Date().getFullYear().toString().substr(-2);
            let cat = '00';
            // let brnd = '00';
            let size = '00';
            let clr = '00';
            let pid = {{ $pid }};
            /*itemcode += cat;
            itemcode += brnd;
            itemcode += size;
            itemcode += clr;
            itemcode += pid;*/
            let itemcode = year+cat+size+clr+pid;
            $("#code").val(itemcode);
            $('.category').on('change', function () {
                cat = $(this).find(':selected').data('id');
                concatcode(year,cat,size,clr,pid);
            });
            // $('.brand').on('change', function () {
            //     let brand = $(this).find(':selected').data('id');
            //     concatcode(year,cat,brnd,size,clr,pid);
            // });
            $('.size').on('change', function () {
                size = $(this).find(':selected').data('id');
                concatcode(year,cat,size,clr,pid);
            });
            $('.color').on('change', function () {
                clr = $(this).find(':selected').data('id');
                concatcode(year,cat,size,clr,pid);
            });
        });
        function concatcode(year,cat,size,clr,pid) {
            let itemcode = year+cat+size+clr+pid;
            $("#code").val(itemcode);
        }
        /*$(function() {
            $("form[name='pro_sub']").validate({
                rules: {
                    name: "required",
                    category: "required",
                    // code: "required",
                    //email: {
                    //  required: true,
                    //  email: true
                    //},
                    //password: {
                    //  required: true,
                    //  minlength: 5
                    //}
                },
                messages: {
                    name: "Please enter Product Name",
                    category: "Please enter Product Category",
                    // code: "Please enter Product Code",
                    //password: {
                    //  required: "Please provide a password",
                    //  minlength: "Your password must be at least 5 characters long"
                    //},
                    //email: "Please enter a valid email address"
                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });*/

        $(function() {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
                },buttonsStyling: false
            })
            $('.SAV').click(function() {
                $("form[name='pro_sub']").validate({
                    rules: {
                        name: "required",
                        category: "required",
                        purchase_price: "required",
                        cost: "required",
                        profit: "required",
                        sale_price: "required",
                        // code: "required",
                        //email: {
                        //  required: true,
                        //  email: true
                        //},
                        //password: {
                        //  required: true,
                        //  minlength: 5
                        //}
                    },
                    messages: {
                        name: "Please enter Product Name",
                        category: "Please enter Product Category",
                        purchase_price: "Please enter Product Purchase Price",
                        cost: "Please enter Cost",
                        profit: "Please enter Profit",
                        sale_price: "Please enter Product SaleOld Price",
                        // code: "Please enter Product Code",
                        //password: {
                        //  required: "Please provide a password",
                        //  minlength: "Your password must be at least 5 characters long"
                        //},
                        //email: "Please enter a valid email address"
                    },
                    // Make sure the form is submitted to the destination defined
                    // in the "action" attribute of the form when valid
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You Want to Entry this Product ??",
                    type: 'question',
                    showCancelButton: true,
                    confirmButtonText: ' Yes, Confirm ! ',
                    cancelButtonText: ' No, Cancel ! ',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        document.getElementById("SAVForm").submit();
                        swalWithBootstrapButtons.fire(
                            ' Submitted ! ',
                            ' Product Entry Successful...',
                            'success'
                        )
                    {{-- $.ajax({
                        url: "{{ route('product.store') }}",
                        type: 'GET',
                        method: "POST",
                        data: new FormData(this),
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (){
                            setTimeout(function(){
                                location.reload();
                            }, 1000);
                        }
                    }); --}}
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) { swalWithBootstrapButtons.fire(
                        ' Canceled ',
                        ' Product Entry Cancel.. ',
                        'error'
                    )};
                });
            });
        });

        function calculation() {
            let purchase_price = $("#purchase_price").val();
            let cost = $("#cost").val();
            let total_cost = +purchase_price + +cost;
            $("#total_cost").val(total_cost.toFixed(2));
            const profit = $("#profit").val();
            const stotal = (total_cost * profit);
            const ptotal = (stotal / 100);
            const total = +ptotal + +total_cost;
            $("#price").val(total.toFixed(2));
            {{--  $("#price").val(Math.round(total).toFixed(2));  --}}
        }
        // function calcula() {
        //     let price = $("#price").val();
        //     let total_cost = $("#total_cost").val();
        //     const profit = price - total_cost;
        //     const profit = (profit / 100);
        //     const total = (total_cost * profit);
        //     $("#profit").val(total);
        // }
        $("#purchase_price").on('keyup', calculation);
        $("#cost").on('keyup', calculation);
        $("#profit").on('keyup', calculation);
        // $("#price").on('keyup', calcula);

        document.forms['pro_sub'].elements['category'].value = '{{ old('category') }}';
        document.forms['pro_sub'].elements['brand'].value = '{{ old('brand') }}';
        document.forms['pro_sub'].elements['color'].value = '{{ old('color') }}';
        document.forms['pro_sub'].elements['size'].value = '{{ old('size') }}';
    </script>

@endsection
