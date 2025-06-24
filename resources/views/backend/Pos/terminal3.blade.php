@extends('layouts.pos_master')
@section('title')
    Point of Sale
@endsection
@section('customCSS')
	<style>
        /*.blink_me1 {*/
        /*    animation: blinker 1s linear infinite;*/
        /*}*/
        /*.blink_me05 {*/
        /*    animation: blinker 0.5s linear infinite;*/
        /*}*/
        /*.blink_me2 {*/
        /*    color: red;*/
        /*    font-size: 24px;*/
        /*    animation: blinker 2s linear infinite;*/
        /*}*/
        /*.PRODUCTS {*/
        /*	border: 1px solid gray;*/
        /*	border-radius: 3px;*/
        /*	text-align: center;*/
        /*	background: white;*/
        /*	color: grey;*/
		/*	opacity: 0.7;*/
		/*	transition: 0.3s;*/
		/*	box-shadow: 0 8px 15px 5px rgba(0,0,0,0.2), 0 6px 20px 5px rgba(0,0,0,0.19);*/
        /*}*/
        /*.PRODUCTS:hover {*/
		/*  	background: grey;*/
        /*	color: white;*/
		/*}*/
		/*.PRODUCTS:visited {*/
		/*  	background: darkgrey;*/
		/*}*/
		/*.PRODUCTS:checked {*/
		/*	background: darkgrey;*/
		/*}*/
		/*.BHid {*/
		/*	border: hidden;*/
		/*}*/
        /*@keyframes blinker {*/
        /*    50% {*/
        /*    opacity: 0;*/
        /*    }*/
        /*}*/
        .select2-search option[value="ADD"] {
            -webkit-border-radius:25px;
            -moz-border-radius:25px;
            border-radius:25px;
            color:blue;
            background-color:yellow;
        }
    </style>
@endsection
@section('content')
	<div class="content-wrapper pb-0">
		<section class="content pt-2">
	        <div class="row">
	            <div class="col-lg-12">
	                <form id="CartStore">
	                    <div class="card">
	                        <div class="card-body row py-1">
	                        	<div class="col-lg-7 col-7 " >
	                        		<div class=" ">

                                            <div class="position-sticky">
                                                <div class="btn-group w-100 mb-2">
                                                    <a class="btn btn-secondary active" href="javascript:void(0)" data-filter="all"> All items </a>
                                                    @foreach ($categries as $data)
                                                    <a class="btn btn-secondary" href="javascript:void(0)" data-filter="{{ $data->id }}">{{ $data->name }}</a>
                                                    @endforeach
                                                </div>
                                                <div class="mb-2">
                                                    <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Shuffle items </a>
                                                    <div class="float-right">
                                                        <select class="custom-select" style="width: auto;" data-sortOrder>
                                                            <option value="index"> Sort by Position </option>
                                                            <option value="sortData"> Sort by Custom Data </option>
                                                        </select>
                                                        <div class="btn-group">
                                                            <a class="btn btn-light active sortAsc" href="javascript:void(0)"
                                                               data-sortAsc> <i class="fas fa-sort-alpha-down"></i> </a>
                                                            <a class="btn btn-light sortDesc" href="javascript:void(0)"
                                                               data-sortDesc> <i class="fas fa-sort-alpha-down-alt"></i> </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive" style="height: 500px;">
                                                <div class="filter-container p-0 row">
<!--                                                    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                                        <a href="https://via.placeholder.com/1200/FFFFFF.png?text=1" data-toggle="lightbox" data-title="sample 1 - white">
                                                            <img src="https://via.placeholder.com/300/FFFFFF?text=1" class="img-fluid mb-2" alt="white sample"/>
                                                        </a>
                                                    </div>-->
                                                    @foreach ($products as $data)
                                                    <div class="filtr-item col-sm-2 PRODUCTS" data-sort="red sample"
                                                            data-category="{{ $data->category }}" data-id="{{ $data->id }}">
                                                        <a href="{{ asset($data->image) }}" data-toggle="lightbox" data-gallery="gallery-name"
                                                                data-title="{{ $data->name }} - ৳ {{ $data->price }}">
                                                            <img src="{{ asset($data->image) }}" class="img-fluid img-thumbnail rounded"
                                                                 alt="{{ $data->name }} - ৳ {{ $data->price }}"
                                                                 title="{{ $data->name }} - ৳ {{ $data->price }}"
                                                                 data-toggle="tooltip" data-placement="top"
                                                                 style="height: available; width: 100px;"/>
                                                        </a>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>

	                        		</div>
	                        	</div>
	                            <div class="col-lg-5 col-5 row">
                                    <div class="col-lg-9 col-9 table-responsive" style="height: 590px;">
    <!--	                            	 <input placeholder="Barcode Search" autofocus="true" type="search"
                                            class="form-control form-control-sm mt-2 mb-2 SEARCH sticky-top"
                                            title="Barcode Search" data-toggle="tooltip" data-placement="left">
                                        <div id="SEARCH_LIST"></div>-->
                                        <table id="CartExample" class="table table-sm table-head-fixed">
                                            <thead>
                                                <tr>
    {{--	                                            <th>SL.</th>--}}
                                                    <th>Description</th>
                                                    <th class="text-center">Quantity</th>
                                                    <th class="text-center">Price</th>
                                                    <th class="text-right">Total</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 1 @endphp
                                                @foreach ($carts as $data)
                                                <tr id="product_id_{{ $data->id }}">
    {{--	                                            <td class="form-control-sm">{{ $data->id }}.</td>--}}
                                                    <td>
                                                        {{ $data->name }} <!--<small>( {{ $data->code }} )</small>-->
                                                    </td>
                                                    <td>
                                                        <input class="QTY form-control form-control-sm text-center" value="{{ $data->quantity }}" name="quantity" data-id="{{ $data->code }}" type="text"/>
                                                    </td>
                                                    <td>
                                                        <input class="PRICE form-control form-control-sm text-right" value="{{ $data->price }}" data-id="{{ $data->code }}" name="price" type="text"/>
                                                    </td>
                                                    <td class="text-right">{{ $data->total }}</td>
                                                    <td class="text-right">
                                                        <a href="javascript:void(0)" data-id="{{ $data->id }}"
                                                            class="DEL btn btn-danger btn-xs">
                                                            <i class="fas fa-minus-circle"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <div class="text-left form-control-sm">Total Quantity:</div>
                                        <input class="text-center form-control form-control-sm TQTY BHid" name="total_qty" value="0" readonly/>
                                        <div class="text-left form-control-sm">SubTotal (৳):</div>
                                        <input class="text-right form-control form-control-sm SUBT BHid" name="sub_total" value="0" readonly/>
                                        <div class="text-left form-control-sm">Discount:</div>
                                        <div class="form-inline">
                                            <input class="text-center DISC col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 form-control form-control-sm"
                                                value="0" name="discount" type="number" required title="Input distount
                                                amount" data-toggle="tooltip" data-placement="top"/>
                                            <select name="disc_type" class="DISCTYPE col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4
                                            form-control form-control-sm px-0">
                                                <option id="1" value="1">%</option>
                                                <option id="2" value="2">৳</option>
                                            </select>
                                        </div>
                                        <div class="text-left form-control-sm">Vat ({{ $settings->vat_percentage }}%) : </div>
                                        <input class="text-right form-control form-control-sm VAT" value="0" name="vat" readonly>
                                        <div class="text-left form-control-sm">Payable (৳):</div>
                                        <input class="text-right form-control form-control-sm PAY BHid" value="0" name="payable" readonly>
                                        <div class="text-left form-control-sm">Paid (৳):</div>
                                        <input class="text-center form-control form-control-sm PAID" required
                                               name="paid" type="number" title="Input paid amount"
                                               data-toggle="tooltip" data-placement="top"/>
                                        <div class="text-left form-control-sm">Due (৳):</div>
                                        <input class="text-right form-control form-control-sm DUE BHid" value="0" name="due" readonly/>
                                        <div class="text-left form-control-sm">Return (৳):</div>
                                        <input class="text-right form-control form-control-sm RETURN BHid" value="0" name="return" readonly/>
                                        <div class="text-left form-control-sm">Payment Type:</div>
                                        <select class="payment_type form-control form-control-sm form-group" id="pay_type"
                                                name="payment_type" title="Payment Type" data-toggle="tooltip" data-placement="top" >
                                            <option value="Cash">Cash</option>
                                            <option value="Bkash">Bkash</option>
                                            <option value="Rocket">Rocket</option>
                                            <option value="Nagad">Nagad</option>
                                        </select>
                                        <input placeholder="Payment Number" type="number" name="payment_number" class="payment_number
                                        form-control form-control-sm">
                                        <div class="text-center py-3">
                                            <button class="btn btn-danger btn-sm CLEAR" type="button"
                                                title="Click to remove all items from the cart"
                                                data-toggle="tooltip" data-placement="top">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                            <button class="btn btn-success btn-sm CATSAV" type="submit"
                                                title="Click to Confirm Sale" data-toggle="tooltip" data-placement="top">
                                                <i class="fas fa-check-circle"></i>
{{--                                                <b>Confirm</b>--}}
                                            </button>
                                            @if (session('invoice'))
                                            <a href="{{ route('pos.mini.invoice',['id'=>session('invoice')]) }}"
                                               class="btn btn-info btn-sm" title="Invoice Print" target="_blank"
                                               title="Click to remove all items from the cart" data-toggle="tooltip"
                                               data-placement="top">
                                                <i class="fas fa-print"></i>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
	                            </div>
	                        </div>
	                    </div>
	                </form>
	            </div>
	        </div>
    	</section>
        <!------ Customer add modal ------>
        <div class="modal fade" id="CustomerModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="ModalHeader"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal" id="CustomerForm">
                        <div class="modal-body">
                            <input name="id" id="id" type="hidden">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-sm-label">Name <span style="color:gray">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm name"
                                           name="name" id="name" placeholder="Enter Customer Name Here ...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-2 col-form-sm-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control form-control-sm phone"
                                           name="phone" id="phone" placeholder="Enter Customer Phone Number Here ...">
                                </div>
                            </div>
                            <!--                            <div class="form-group row">
                                                            <label for="email" class="col-sm-2 col-form-sm-label">E-mail</label>
                                                            <div class="col-sm-10">
                                                                <input type="email" class="form-control form-control-sm email"
                                                                    name="email" id="email" placeholder="Enter Customer E-mail ID Here ...">
                                                            </div>
                                                        </div>-->
                            <div class="form-group row">
                                <label for="category" class="col-sm-2 col-form-sm-label">Category</label>
                                <div class="col-sm-10">
                                    <select class="form-control form-control-sm category" name="category"
                                    id="category" title="Select Supplier Category">
                                    @foreach($discount_type as $discount)
                                        <option value="{{ $discount->name }}">{{ $discount->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="balance" class="col-sm-2 col-form-sm-label">Balance</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control form-control-sm balance" value="0"
                                           name="balance" id="balance" placeholder="Enter Customer Balance Here ...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-2 col-form-sm-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control form-control-sm address"
                                              name="address" id="address" rows="2"
                                              placeholder="Enter Customer Address Here ..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-warning btn-sm"
                                    data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success btn-sm"
                                    id="CustomerSave" value="create"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</div>
@endsection
@section('customJs')
   	<script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 3000
        });
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: true
        });
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("select[name=customer]").on('change click', function(e) {
                var id = $(this).val();
                if (id === 'null') {
                    $('#CustomerSave').val("create-customer");
                    $('#CustomerForm').trigger("reset");
                    $('#CustomerSave').html("Save");
                    $('#ModalHeader').html("Add <small>( Customer Information )</small>");
                    $('#CustomerModal').modal('show');
                }
            });
            $('.SEARCH').on('keyup',function() {
                var value = $(this).val();
                $.ajax({
                    url:"{{ route('pos.product.search') }}",
                    type:"GET",
                    data: {'value':value},
                    success:function (data) {
                        if(data === 'wrong'){
                            Toast.fire({
                                type: 'info',
                                title: ' &nbsp; Product not found in stock. '
                            });
                        } else {
                            $('#SEARCH_LIST').html(data);
                        }
                    }
                })
            });
            $(document).on('click', 'li', function(){
                var code = $(this).text();
                $.ajax({
                    url:"{{ route('pos.product.add') }}",
                    type:"GET",
                    data: {'code':code},
                    success:function (response) {
                        $('#SEARCH_LIST').html("");
                        // var product = '<tr id="product_id_' + reponse.carts.id + '"><td class="form-control-sm">' + reponse.carts.id + '.</td><td>' + reponse.carts.name + ' <small>( ' + reponse.carts.code + ' )</small></td><td><input class="QTY form-control form-control-sm text-center" value="' + reponse.carts.quantity + '" name="quantity" data-id="' + reponse.carts.code + '" type="text"/></td><td><input class="PRICE form-control form-control-sm text-right" value="' + reponse.carts.price + '" data-id="' + reponse.carts.code + '" name="price" type="text"/></td><td class="text-right">' + reponse.carts.total + '</td>';
                        // product += '<td class="text-right"><a href="javascript:void(0)" data-id="' + reponse.carts.id + '" class="DEL btn btn-danger btn-xs"><i class="fas fa-minus-circle"></i></a></td></tr>';
                        // $('#CartExample').prepend(product);
                        $("#CartExample").load(location + " #CartExample");
                        $('.TQTY').val(response.tqty);
                        $('.SUBT').val(response.subt.toFixed(2));
                        $('.DISC').val('0');
                        $('.PAY').val(response.subt.toFixed(2));
                        $('.VAT').val(Math.round(response.vat));
                        $('.PAID').val('');
                        $('.DUE').val(response.subt.toFixed(2));
                        $('.RETURN').val('0');
                        $('.BILL').html(response.subt.toFixed(2));
                        Toast.fire({
                            type: 'success',
                            title: ' &nbsp; Product Added to Cart Successfully. '
                        });
                    }
                })
                $('.SEARCH').val("");
                $('#SEARCH_LIST').html("");
            });
            $('select[name="addProduct"]').change('select2:selected', function(e) {
                var id = $(this).val();
                if(id != '') {
                    $.ajax({
                        url: "{{ route('pos.item.add') }}",
                        type: "GET",
                        data: {id: id},
                        success: function (response) {
                            // var product = '<tr id="product_id_' + reponse.carts.id + '"><td class="form-control-sm">' + reponse.carts.id + '.</td><td>' + reponse.carts.name + ' <small>( ' + reponse.carts.code + ' )</small></td><td><input class="QTY form-control form-control-sm text-center" value="' + reponse.carts.quantity + '" name="quantity" data-id="' + reponse.carts.code + '" type="text"/></td><td><input class="PRICE form-control form-control-sm text-right" value="' + reponse.carts.price + '" data-id="' + reponse.carts.code + '" name="price" type="text"/></td><td class="text-right">' + reponse.carts.total + '</td>';
                            // product += '<td class="text-right"><a href="javascript:void(0)" data-id="' + reponse.carts.id + '" class="DEL btn btn-danger btn-xs"><i class="fas fa-minus-circle"></i></a></td></tr>';
                            // $('#CartExample').prepend(product);
                            $("#CartExample").load(location + " #CartExample");
                            $('.TQTY').val(response.tqty);
                            $('.SUBT').val(response.subt.toFixed(2));
                            $('.DISC').val('0');
                            $('.PAY').val(response.subt.toFixed(2));
                            $('.VAT').val(Math.round(response.vat));
                            $('.PAID').val('');
                            $('.DUE').val(response.subt.toFixed(2));
                            $('.RETURN').val('0');
                            $('.BILL').html(response.subt.toFixed(2));
                            Toast.fire({
                                type: 'success',
                                title: ' &nbsp; Product Added to Cart Successfully. '
                            });
                            $('select[name="addProduct"]').val('').change();
                        },
                        error: function (data) {
                            $(function () {
                                Toast.fire({
                                    type: 'error',
                                    title: ' &nbsp; Product Not Added to Cart. '
                                })
                            });
                        }
                    });
                }
            });
            $('.PRODUCTS').on('click', function(e) {
                var id = $(this).data('id');
                $.ajax({
                    url: "{{ route('pos.item.add') }}",
                    type: "GET",
                    data: { id:id },
                    success: function (response)
                    {
                        // var product = '<tr id="product_id_' + reponse.carts.id + '"><td class="form-control-sm">' + reponse.carts.id + '.</td><td>' + reponse.carts.name + ' <small>( ' + reponse.carts.code + ' )</small></td><td><input class="QTY form-control form-control-sm text-center" value="' + reponse.carts.quantity + '" name="quantity" data-id="' + reponse.carts.code + '" type="text"/></td><td><input class="PRICE form-control form-control-sm text-right" value="' + reponse.carts.price + '" data-id="' + reponse.carts.code + '" name="price" type="text"/></td><td class="text-right">' + reponse.carts.total + '</td>';
                        // product += '<td class="text-right"><a href="javascript:void(0)" data-id="' + reponse.carts.id + '" class="DEL btn btn-danger btn-xs"><i class="fas fa-minus-circle"></i></a></td></tr>';
                        // $('#CartExample').prepend(product);
                        $("#CartExample").load(location + " #CartExample");
                        $('.TQTY').val(response.tqty);
                        $('.SUBT').val(response.subt.toFixed(2));
                        $('.DISC').val('0');
                        $('.PAY').val(response.subt.toFixed(2));
                        $('.VAT').val(Math.round(response.vat));
                        $('.PAID').val('');
                        $('.DUE').val(response.subt.toFixed(2));
                        $('.RETURN').val('0');
                        $('.BILL').html(response.subt.toFixed(2));
                        Toast.fire({
                            type: 'success',
                            title: ' &nbsp; Product Added to Cart Successfully. '
                        });
                    },
                    error: function (data) {
                        $(function() {
                            Toast.fire({
                                type: 'error',
                                title: ' Product Not Added to Cart. '
                            })
                        });
                    }
                });
            });
            $('.sortAsc').on('click', function() {
                $(this).addClass('active');
                $('.sortDesc').removeClass('active');
            });
            $('.sortDesc').on('click', function() {
                $(this).addClass('active');
                $('.sortAsc').removeClass('active');
            });
        });
        $('body').on('click', '.DEL', function () {
            var id = $(this).data("id");
            swalWithBootstrapButtons.fire({
                title: 'Are you sure ?',
                text: "You want to remove this item from cart ??",
                type: 'question',
                showCancelButton: true,
                confirmButtonText: ' Yes ! Remove ',
                cancelButtonText: ' No ',
                cancelButtonColor: 'orange',
                confirmButtonColor: 'green',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('point-of-sale/item/remove') }}"+'/'+id,
                        success: function (data) {
                            // $("#product_id_" + id).remove();
                            $("#CartExample").load(location + " #CartExample");
                            $('.TQTY').val(data.tqty);
                            $('.SUBT').val(data.subt.toFixed(2));
                            $('.DISC').val('0');
                            $('.PAY').val(data.subt.toFixed(2));
                            $('.VAT').val(Math.round(data.vat));
                            $('.PAID').val('');
                            $('.DUE').val(data.subt.toFixed(2));
                            $('.RETURN').val('0');
                            $('.BILL').html(data.subt.toFixed(2));
                            $(function() {
                                Toast.fire({
                                    type: 'info',
                                    title: ' &nbsp;'+data.message+'',
                                })
                            });
                        },
                        error: function (error) {
                            $(function () {
                                Toast.fire({
                                    type: 'error',
                                    title: ' &nbsp;'+error.message+'',
                                })
                            });
                        }
                    });
                };
            })
        });
        $('body').on('keyup', '.PRICE', function () {
            var price   = $(this).val();
            var id      = $(this).data("id");
            $.ajax({
                url: '{{ route('pos.item.price') }}',
                type: 'GET',
                data: { id : id, price : price },
                success: function (data) {
                    $("#CartExample").load(location + " #CartExample");
                    $('.TQTY').val(data.tqty);
                    $('.SUBT').val(data.subt.toFixed(2));
                    $('.DISC').val('0');
                    $('.PAY').val(data.subt.toFixed(2));
                    $('.VAT').val(Math.round(data.vat));
                    $('.PAID').val('');
                    $('.DUE').val(data.subt.toFixed(2));
                    $('.RETURN').val('0');
                    $('.BILL').html(data.subt.toFixed(2));
                    $(function() {
                        Toast.fire({
                            type: 'success',
                            title: '&nbsp; '+data.message+'',
                        })
                    });
                },
                error: function (data) {
                    $(function() {
                        Toast.fire({
                            type: 'error',
                            title: '&nbsp; '+data.message+'',
                        })
                    });
                }
            });
        });
        $('body').on('keyup', '.QTY', function () {
            var qty = $(this).val();
            var id  = $(this).data("id");
            $.ajax({
                url: '{{ route('pos.item.quantity') }}',
                type: 'GET',
                data: { id : id, qty : qty },
                success: function (data) {
                    $("#CartExample").load(location + " #CartExample");
                    $('.TQTY').val(data.tqty);
                    $('.SUBT').val(data.subt.toFixed(2));
                    $('.DISC').val('0');
                    $('.PAY').val(data.subt.toFixed(2));
                    $('.VAT').val(Math.round(data.vat));
                    $('.PAID').val('');
                    $('.DUE').val(data.subt.toFixed(2));
                    $('.RETURN').val('0');
                    $('.BILL').html(data.subt.toFixed(2));
                    $(function() {
                        Toast.fire({
                            type: 'success',
                            title: '&nbsp; '+data.message+''
                        })
                    });
                },
                error: function (data) {
                    $(function() {
                        Toast.fire({
                            type: 'error',
                            title: '&nbsp; '+data.message+''
                        })
                    });
                }
            });
        });
        $(".DISCTYPE").on('change click', function () {
            var id  = $(".DISC").val();
            var dty = $(this).val();
            $.ajax({
                url: '{{ route('pos.discount.type') }}',
                type: 'GET',
                data: { disc : id, disc_type : dty },
                success: function (response) {
                    $('.PAY').val(response.payable.toFixed(2));
                    $('.BILL').html(response.payable.toFixed(2));
                    $('.VAT').val(Math.round(data.vat));
                    $('.PAID').val('');
                    $('.DUE').val(response.payable.toFixed(2));
                    $('.RETURN').val('0');
                    $(function() {
                        Toast.fire({
                            type: 'success',
                            title: '&nbsp; '+response.message+''
                        })
                    });
                }
            });
        });
        $(".DISC").on('keyup', function () {
            var id  = $(this).val();
            var dty = $(".DISCTYPE").val();
            $.ajax({
                url: '{{ route('pos.discount') }}',
                type: 'GET',
                data: { disc : id, disc_type : dty },
                success: function (response) {
                    $('.PAY').val(response.payable.toFixed(2));
                    $('.BILL').html(response.payable.toFixed(2));
                    $('.VAT').val(Math.round(data.vat));
                    $('.PAID').val('');
                    $('.DUE').val(response.payable.toFixed(2));
                    $('.RETURN').val('0');
                    $(function() {
                        Toast.fire({
                            type: 'success',
                            title: '&nbsp; '+response.message+''
                        })
                    });
                }
            });
        });
        $(".PAID").on('keyup', function () {
            var paid    = $(this).val();
            var pay     = $(".PAY").val();
            $.ajax({
                url: '{{ route('pos.paid.amount') }}',
                type: 'GET',
                data: { paid : paid, pay : pay },
                success: function (response) {
                    $('.DUE').val(response.due.toFixed(2));
                    $('.RETURN').val(response.return.toFixed(2));
                    // $(function() {
                    //     Toast.fire({
                    //         type: 'success',
                    //         title: '&nbsp; '+response.message+''
                    //     })
                    // });
                }
            });
        });
        $('.payment_number').hide();
        $('#pay_type').change(function(){
            var val = $(this).val();
            if(val == 'Cash') {
                $('.payment_number').hide();
            } else {
                $('.payment_number').show();
            }
        });
        if ($("#CustomerForm").length > 0) {
            $("#CustomerForm").validate({
                rules: {
                    name: {
                        required: true,
                    },
                    phone: {
                        // required: true,
                    },
                    email: {
                        // required: true,
                    },
                    category: {
                        required: true,
                    },
                    balance: {
                        required: true,
                    },
                    address: {
                        // required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Please enter Customer Name",
                    },
                    phone: {
                        required: "Please enter Customer Phone",
                    },
                    email: {
                        required: "Please enter Customer Email",
                    },
                    category: {
                        required: "Please select Customer Category",
                    },
                    balance: {
                        required: "Please enter Customer Balance",
                    },
                    address: {
                        required: "Please enter Customer Address",
                    },
                },
                submitHandler: function(form) {
                    var actionType = $('#CustomerSave').val();
                    $('#CustomerSave').attr('disabled', true);
                    $('#CustomerSave').html('Submitting...');
                    if (actionType == "create-customer") {
                        $.ajax({
                            url: "{{ route('pos.customer.store') }}",
                            type: "POST",
                            dataType: 'json',
                            data: $('#CustomerForm').serialize(),
                            success: function (data) {
                                $('#CustomerForm').trigger("reset");
                                $('#CustomerModal').modal('hide');
                                $('#CustomerSave').html('Save');
                                $('#CustomerSave').attr('disabled', false);
                                $(function() {
                                    Toast.fire({
                                        type: 'success',
                                        title: ' &nbsp;'+data.message+' '
                                    })
                                });
                                $('select[name="customer"]').val(data.info.id);
                                $('select[name="customer"]').append('<option value="'+data.info.id+'" selected="selected">'+ data.info.name +'</option>');
                            },
                            error: function (error) {
                                $(function() {
                                    Toast.fire({
                                        type: 'error',
                                        title: ' &nbsp;'+error.message+' '
                                    })
                                });
                                $('#CustomerSave').html('Save');
                                $('#CustomerSave').attr('disabled', false);
                            }
                        });
                    }
                }
            })
        }
        if ($("#CartStore").length > 0) {
            $("#CartStore").validate({
                rules: {
                    customer: {
                        required: true,
                    },
                    total_qty: {
                        required: true,
                    },
                    sub_total: {
                        required: true,
                    },
                    paid: {
                        required: true,
                    },
                },
                messages: {
                    customer: {
                        required: "Please select a customer",
                    },
                    total_qty: {
                        required: "Total quantity is required",
                    },
                    sub_total: {
                        required: "Sub-total price is required",
                    },
                    paid: {
                        required: "Paid amount is required",
                    },
                },
                submitHandler: function(form) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-success',
                            cancelButton: 'btn btn-danger'
                        },buttonsStyling: false
                    })
                    swalWithBootstrapButtons.fire({
                        title: 'Are you sure?',
                        text: "You want to confirm this Sale ??",
                        type: 'question',
                        showCancelButton: true,
                        confirmButtonText: ' Yes, Confirm ! ',
                        cancelButtonText: ' No, Cancel ! ',
                        cancelButtonColor: 'orange',
                        confirmButtonColor: 'green',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                type: "POST",
                                url: "{{ route('pos.item.store') }}",
                                data: {
                                    '_token'        : $('input[name=_token]').val(),
                                    // 'invoice_no'       : $(".sale_no").val(),
                                    // 'date'		: $('input[name=sale_date]').val(),
                                    'customer'	    : $('select[name=customer]').val(),
                                    'total_qty'     : $('input[name=total_qty]').val(),
                                    'sub_total'     : $('input[name=sub_total]').val(),
                                    'discount'      : $('input[name=discount]').val(),
                                    'disc_type'     : $('select[name=disc_type]').val(),
                                    'payable'       : $('input[name=payable]').val(),
                                    'vat'           : $('.VAT').val(),
                                    'paid'          : $('input[name=paid]').val(),
                                    'return'        : $('input[name=return]').val(),
                                    'due'           : $('input[name=due]').val(),
                                    'payment_type'  : $('select[name=payment_type]').val(),
                                    'payment_number': $('input[name=payment_number]').val(),
                                },
                                success: function (response) {
                                    $("#CartExample").load(location + " #CartExample");
                                    $('.TQTY').val(0);
                                    $('.SUBT').val(0);
                                    $('.DISC').val(0);
                                    $('.PAY').val(0);
                                    $('.PAID').val('');
                                    $('.DUE').val(0);
                                    $('.RETURN').val(0);
                                    $('.VAT').val(0);
                                    $('.BILL').html(0);
                                    $(function() {
                                        Toast.fire({
                                            type: 'success',
                                            title: '&nbsp; '+response.message+''
                                        })
                                    });
                                },
                                error: function (error) {
                                    $(function() {
                                        Toast.fire({
                                            type: 'error',
                                            title: '&nbsp; '+error.message+''
                                        })
                                    });
                                }
                            });
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            swalWithBootstrapButtons.fire(
                                ' Canceled ',
                                ' Sale Canceled ... ',
                                'error'
                            )};
                    });
                }
            })
        }
        $('.CLEAR').click(function() {
            swalWithBootstrapButtons.fire({
                title: 'Are you sure ?',
                text: "You want to remove all items from this Cart ??",
                type: 'question',
                showCancelButton: true,
                confirmButtonText: ' Yes, clear it ! ',
                cancelButtonText: ' No, cancel ! ',
                cancelButtonColor: 'orange',
                confirmButtonColor: 'green',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{ route('pos.cart.clear') }}",
                        type: 'GET',
                        success: function (data){
                            $("#CartExample").load(location + " #CartExample");
                            $('.TQTY').val(0);
                            $('.SUBT').val(0);
                            $('.DISC').val(0);
                            $('.PAY').val(0);
                            $('.PAID').val('');
                            $('.DUE').val(0);
                            $('.RETURN').val(0);
                            $('.VAT').val(0);
                            $('.BILL').html(0);
                            $(function() {
                                Toast.fire({
                                    type: 'success',
                                    title: '&nbsp; '+data.message+'',
                                })
                            });
                        }
                    });
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) { swalWithBootstrapButtons.fire(
                    ' Canceled ',
                    ' Items from Cart. ',
                    'error'
                )};
            });
        });
        $('.filter-container').filterizr({gutterPixels: 3});
        $('.btn[data-filter]').on('click', function() {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
        });
    </script>
@endsection
