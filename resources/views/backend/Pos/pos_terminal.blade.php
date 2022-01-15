@extends('layouts.pos_master')
@section('title')
    Point of Sales
@endsection
@section('content')

	<style>
        .blink_me1 {
            animation: blinker 1s linear infinite;
        }
        .blink_me05 {
            animation: blinker 0.5s linear infinite;
        }
        .blink_me2 {
            color: red;
            font-size: 24px;
            animation: blinker 2s linear infinite;
        }
        .PRODUCTS {
        	border: 1.5px solid blue;
        	border-radius: 3px;
        	text-align: center;
        	background-color: white;
        	color: darkblue;
			opacity: 0.7;
			transition: 0.3s;
			box-shadow: 0 8px 15px 5px rgba(0,0,0,0.2), 0 6px 20px 5px rgba(0,0,0,0.19);
        }
        .PRODUCTS:hover {
		  	background: blue;
        	color: white;
		}
		.PRODUCTS:visited {
		  	background: skyblue;
		}
		.PRODUCTS:checked {
			background: red;
		}
		.BHid {
			border: hidden;
		}
        @keyframes blinker {
            50% {
            opacity: 0;
            }
        }
    </style>

	<div class="content-wrapper">
		<section class="content pt-2">
	        <div class="row">
	            <div class="col-lg-12">
	                <form id="CartStore">
	                    <div class="card">
	                        <div class="card-body row">
	                        	<div class="col-lg-4 table-responsive" style="height: 600px;">
	                        		<div class="col-lg-11.5 row p-2">
                                    @foreach ($products as $data)
                                        <button class="col-lg-6 PRODUCTS btn-sm" type="button" value="{{ $data->id }}">
                                            <img src="{{ asset($data->image) }}" alt="{{ $data->name }}"
                                                 width="200px;" height="200px;" title="{{ $data->name }} - ৳ {{ $data->price }}">
                                            {{ $data->name }} - ৳ {{ $data->price }}
                                        </button>
                                    @endforeach
	                        		</div>
	                        	</div>
	                            <div class="col-lg-6 table-responsive" style="">
	                            	 <input placeholder="Search Product Code / Barcode" autofocus=""
	                            		class="form-control form-control-sm mt-2 mb-2 SEARCH" type="text">
									<div id="SEARCH_LIST"></div>
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
	                            <div class="col-lg-2">
                                    <div class="text-left form-control-sm">Total Quantity : </div>
                                    <input class="text-center form-control form-control-sm TQTY BHid" name="total_qty" value="0" readonly/>
                                    <div class="text-left form-control-sm">SubTotal (‎৳) : </div>
                                    <input class="text-right form-control form-control-sm SUBT BHid" name="sub_total" value="0" readonly/>
                                    <div class="text-left form-control-sm">Discount : </div>
                                    <div class="form-inline">
                            			<input class="text-center DISC col-lg-8 form-control form-control-sm"
	                            			value="0" name="discount" type="number"required/>
                                        <select class="DISCTYPE col-lg-4 form-control form-control-sm pr-0 pl-1">
                                            <option id="1" value="1">%</option>
                                            <option id="2" value="2">Tk</option>
                                        </select>
                                    </div>
                                    <div class="text-left form-control-sm">Payable Amount (‎৳) : </div>
                                    <input class="text-right form-control form-control-sm PAY BHid" value="0" name="payable" readonly>
                                    <div class="text-left form-control-sm">Paid Amount (‎৳) : </div>
                                    <input class="text-center form-control form-control-sm PAID" required value="0" name="paid" type="number"/>
                                    <div class="text-left form-control-sm">Due Amount (‎৳) : </div>
                                    <input class="text-right form-control form-control-sm DUE BHid" value="0" name="due" readonly/>
                                    <div class="text-left form-control-sm">Return Amount (‎৳) : </div>
                                    <input class="text-right form-control form-control-sm RETURN BHid" value="0" name="return" readonly/>
                                    <div class="text-left form-control-sm">Payment Type : </div>
                                    <select class="payment_type form-control form-control-sm" id="pay_type" title="Payment Type">
                                        <option value="Cash">Cash</option>
                                        <option value="Bkash">Bkash</option>
                                        <option value="Rocket">Rocket</option>
                                        <option value="Nagad">Nagad</option>
                                    </select>
                                    <input placeholder="Payment Number" type="number" class="payment_number form-control form-control-sm">
									<div class="text-center pt-2">
	                            		<button class="btn btn-danger btn-sm CLEAR" type="button">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-success btn-sm CATSAV" type="button">
                                            <i class="fas fa-check-circle"></i><b>Confirm</b>
                                        </button>
                                        @if (session('invoice'))
                                        <a href="{{ route('pos.mini.invoice',['id'=>session('invoice')]) }}"class="btn btn-info btn-sm" title="Invoice Print" target="_blank">
                                            <i class="fas fa-print"></i>
                                        </a>
	                                    @endif
	                            	</div>
	                            </div>
	                        </div>
	                    </div>
	                </form>
	            </div>
	        </div>
    	</section>

	  	<div class="modal fade" id="CustomerModal">
	        <div class="modal-dialog">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <h4 class="modal-title">Add Customer</h4>
	                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                        <span aria-hidden="true">&times;</span>
	                    </button>
	                </div>
	                <form action="{{ route('pos.customer.store') }}" method="POST" class="form-horizontal">
	                    @csrf
	                    <div class="modal-body">
	                        <div class="form-group row">
	                            <label for="name" class="col-sm-2 col-form-sm-label">
	                                Name <span style="color:gray">*</span>
	                            </label>
	                            <div class="col-sm-10">
	                                <input type="text" class="form-control form-control-sm" required
	                                    name="name" placeholder="Enter Customer Name Here ...">
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label for="phone" class="col-sm-2 col-form-sm-label">
	                                Phone <span style="color:gray">*</span>
	                            </label>
	                            <div class="col-sm-10">
	                                <input type="number" class="form-control form-control-sm" required
	                                    name="phone" placeholder="Enter Customer Phone Number Here ...">
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label for="email" class="col-sm-2 col-form-sm-label">E-mail</label>
	                            <div class="col-sm-10">
	                                <input type="email" class="form-control form-control-sm"
	                                    name="email" placeholder="Enter Customer E-mail ID Here ...">
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label for="category" class="col-sm-2 col-form-sm-label">Category</label>
	                            <div class="col-sm-10">
	                                <select class="form-control form-control-sm"
	                                    name="category" title="Select Customer Category">
	                                    <option value="Normal">Normal</option>
	                                    <option value="Vip">Vip</option>
	                                    <option value="Special">Special</option>
	                                    <option value="Blocked">Blocked</option>
	                                </select>
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label for="balance" class="col-sm-2 col-form-sm-label">Balance</label>
	                            <div class="col-sm-10">
	                                <input type="number" class="form-control form-control-sm" value="0"
	                                    name="balance" placeholder="Enter Customer Balance Here ...">
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label for="address" class="col-sm-2 col-form-sm-label">Address</label>
	                            <div class="col-sm-10">
	                                <textarea class="form-control form-control-sm" name="address" rows="2"
	                                    placeholder="Enter Customer Address Here ..."></textarea>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="modal-footer justify-content-between center">
	                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
	                        <button type="submit" class="btn btn-success btn-sm">Save</button>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>

	</div>
@endsection
@section('customJs')
   	<script type="text/javascript">
        $(document).ready(function () {
            $('.SEARCH').on('keyup',function() {
                var value = $(this).val();
                $.ajax({
                    url:"{{ route('pos.product.search') }}",
                    type:"GET",
                    data: {'value':value},
                    success:function (data) {
                        $('#SEARCH_LIST').html(data);
                    }
                })
            });
            $(document).on('click', 'li', function(){
                var code = $(this).text();
                $.ajax({
                    url:"{{ route('pos.product.add') }}",
                    type:"GET",
                    data: {'code':code},
                    success:function (reponse) {
                        $('#SEARCH_LIST').html("");
                        var product = '<tr id="product_id_' + reponse.carts.id + '"><td class="form-control-sm">' + reponse.carts.id + '.</td><td>' + reponse.carts.name + ' <small>( ' + reponse.carts.code + ' )</small></td><td><input class="QTY form-control form-control-sm text-center" value="' + reponse.carts.quantity + '" name="quantity" data-id="' + reponse.carts.code + '" type="text"/></td><td><input class="PRICE form-control form-control-sm text-right" value="' + reponse.carts.price + '" data-id="' + reponse.carts.code + '" name="price" type="text"/></td><td class="text-right">' + reponse.carts.total + '</td>';
	                    product += '<td class="text-right"><a href="javascript:void(0)" data-id="' + reponse.carts.id + '" class="DEL btn btn-danger btn-xs"><i class="fas fa-minus-circle"></i></a></td></tr>';
	                    // $('#CartExample').prepend(product);
                        $("#CartExample").load(location + " #CartExample");
	                    $('.TQTY').val(reponse.tqty);
                        $('.SUBT').val(reponse.subt);
                        $('.DISC').val('0');
                        $('.PAY').val(Math.round(reponse.subt));
                        $('.PAID').val('0');
                        $('.DUE').val(Math.round(reponse.subt));
                        $('.RETURN').val('0');
                        $('.BILL').html(Math.round(reponse.subt));
                     	const Toast = Swal.mixin({
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 4000,
                        });
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
                        success: function (reponse) {
                            var product = '<tr id="product_id_' + reponse.carts.id + '"><td class="form-control-sm">' + reponse.carts.id + '.</td><td>' + reponse.carts.name + ' <small>( ' + reponse.carts.code + ' )</small></td><td><input class="QTY form-control form-control-sm text-center" value="' + reponse.carts.quantity + '" name="quantity" data-id="' + reponse.carts.code + '" type="text"/></td><td><input class="PRICE form-control form-control-sm text-right" value="' + reponse.carts.price + '" data-id="' + reponse.carts.code + '" name="price" type="text"/></td><td class="text-right">' + reponse.carts.total + '</td>';
                            product += '<td class="text-right"><a href="javascript:void(0)" data-id="' + reponse.carts.id + '" class="DEL btn btn-danger btn-xs"><i class="fas fa-minus-circle"></i></a></td></tr>';
                            // $('#CartExample').prepend(product);
                            $("#CartExample").load(location + " #CartExample");
                            $('.TQTY').val(reponse.tqty);
                            $('.SUBT').val(reponse.subt);
                            $('.DISC').val('0');
                            $('.PAY').val(Math.round(reponse.subt));
                            $('.PAID').val('0');
                            $('.DUE').val(Math.round(reponse.subt));
                            $('.RETURN').val('0');
                            $('.BILL').html(Math.round(reponse.subt));
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top',
                                showConfirmButton: false,
                                timer: 4000,
                            });
                            Toast.fire({
                                type: 'success',
                                title: ' &nbsp; Product Added to Cart Successfully. '
                            });
                            $('select[name="addProduct"]').val('').change();
                        },
                        error: function (data) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top',
                                showConfirmButton: false,
                                timer: 3000
                            });
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
            	var id = $(this).val();
	            $.ajax({
	                url: "{{ route('pos.item.add') }}",
	                type: "GET",
	                data: { id:id },
	                success: function (reponse)
	                {
	                var product = '<tr id="product_id_' + reponse.carts.id + '"><td class="form-control-sm">' + reponse.carts.id + '.</td><td>' + reponse.carts.name + ' <small>( ' + reponse.carts.code + ' )</small></td><td><input class="QTY form-control form-control-sm text-center" value="' + reponse.carts.quantity + '" name="quantity" data-id="' + reponse.carts.code + '" type="text"/></td><td><input class="PRICE form-control form-control-sm text-right" value="' + reponse.carts.price + '" data-id="' + reponse.carts.code + '" name="price" type="text"/></td><td class="text-right">' + reponse.carts.total + '</td>';
	                    product += '<td class="text-right"><a href="javascript:void(0)" data-id="' + reponse.carts.id + '" class="DEL btn btn-danger btn-xs"><i class="fas fa-minus-circle"></i></a></td></tr>';
	                    // $('#CartExample').prepend(product);
                        $("#CartExample").load(location + " #CartExample");
	                    $('.TQTY').val(reponse.tqty);
                        $('.SUBT').val(reponse.subt);
                        $('.DISC').val('0');
                        $('.PAY').val(Math.round(reponse.subt));
                        $('.PAID').val('0');
                        $('.DUE').val(Math.round(reponse.subt));
                        $('.RETURN').val('0');
                        $('.BILL').html(Math.round(reponse.subt));
                     	const Toast = Swal.mixin({
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 4000,
                        });
                        Toast.fire({
                            type: 'success',
                            title: ' &nbsp; Product Added to Cart Successfully. '
                        });
	                },
	                error: function (data) {
	                    const Toast = Swal.mixin({
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $(function() {
                            Toast.fire({
                            type: 'error',
                            title: ' Product Not Added to Cart. '
                            })
                        });
	                }
	            });
			});
            $('.CATSAV').on('click', function () {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                    },buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You Want to Confirm this Products Sale ??",
                    type: 'question',
                    showCancelButton: true,
                    confirmButtonText: ' Yes, Confirm ! ',
                    cancelButtonText: ' No, Cancel ! ',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('pos.item.store') }}",
                            data: {
                                '_token'        : $('input[name=_token]').val(),
                                'sale_no'       : $(".sale_no").val(),
                                'sale_date'		: $('input[name=sale_date]').val(),
                                'customer'      : $('.customercls').val(),
                                'due_amount'	: $('.DueBal').val(),
                                'total_qty'     : $('input[name=total_qty]').val(),
                                'sub_total'     : $('input[name=sub_total]').val(),
                                'discount'      : $('input[name=discount]').val(),
                                'disc_type'     : $(".DISCTYPE").val(),
                                'payable'       : $('input[name=payable]').val(),
                                'paid'          : $('input[name=paid]').val(),
                                'return'        : $('input[name=return]').val(),
                                'due'           : $('input[name=due]').val(),
                                'payment_type'  : $('.payment_type').val(),
                                'payment_number': $('.payment_number').val(),
                            },
                            success: function () {
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                $(function() {
                                    Toast.fire({
                                    type: 'success',
                                    title: ' &nbsp; Products Sale Completed Successfully... '
                                    })
                                });
                                setTimeout(function(){
                                    location.reload();
                                }, 3000);
                            },
                            error: function (error) {
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                $(function() {
                                    Toast.fire({
                                    type: 'error',
                                    title: ' &nbsp; Products Sale Error !! '
                                    })
                                });
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                        ' Canceled ',
                        ' Products Sale Canceled ... ',
                        'error'
                    )};
                });
            });
            $(".customercls").on('change click', function(e) {
                var id = $(this).val();
                if (id !== 'Cash') {
                    $.ajax({
                        url: '{{ route('pos.customer.details') }}',
                        type: 'get',
                        data: { id:id },
                        success: function (data) {
                            if (data[0]['category']==='Normal') {
                                $('.MOB').html(data[0]['phone']);
                                $('.MOB').css("color", "blue");
                            }
                            if (data[0]['category']==='Vip') {
                                $('.MOB').html(data[0]['phone']);
                                $('.MOB').css("color", "yellow");
                            }
                            if (data[0]['category']==='Special') {
                                $('.MOB').html(data[0]['phone']);
                                $('.MOB').css("color", "orange");
                            }
                            if (data[0]['category']==='Blocked') {
                                $('.MOB').html(data[0]['phone']);
                                $('.MOB').css("color", "red");
                            }
                            $('.BAL').html(data[0]['balance']);
                            $('.DueBal').val(data[0]['balance']);
                        },
                    });
                } else {
                    $('.MOB').html(null);
                    $('.BAL').html(null);
                }
            });
        });
        $('body').on('click', '.DEL', function () {
            var id = $(this).data("id");
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
                },buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Are you sure ?',
                text: "You Want to Remove this Product from Cart ??",
                type: 'question',
                showCancelButton: true,
                confirmButtonText: ' Yes ! Remove ',
                cancelButtonText: ' No ',
                reverseButtons: true
            }).then((result) => {
                    if (result.value) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('pos/item/delete') }}"+'/'+id,
                        success: function (data) {
                        	// $("#product_id_" + id).remove();
                            $("#CartExample").load(location + " #CartExample");
                            $('.TQTY').val(data.tqty);
                            $('.SUBT').val(data.subt);
                            $('.DISC').val('0');
                            $('.PAY').val(Math.round(data.subt));
                            $('.PAID').val('0');
                            $('.DUE').val(Math.round(data.subt));
                            $('.RETURN').val('0');
                            $('.BILL').html(Math.round(data.subt));
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            $(function() {
                                Toast.fire({
                                type: 'info',
                                title: '&nbsp; Product Removed from Cart Successfully. '
                                })
                            });
                        },
                        error: function (data) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            $(function () {
                                Toast.fire({
                                    type: 'error',
                                    title: ' &nbsp; Product Not Removed from Cart. '
                                })
                            });
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    { swalWithBootstrapButtons.fire(
                        ' Canceled ',
                        ' Product not Removed from Cart. ',
                        'error'
                    )};
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
                    $('.SUBT').val(data.subt);
                    $('.DISC').val('0');
                    $('.PAY').val(Math.round(data.subt));
                    $('.PAID').val('0');
                    $('.DUE').val(Math.round(data.subt));
                    $('.RETURN').val('0');
                    $('.BILL').html(Math.round(data.subt));
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $(function() {
                        Toast.fire({
                        type: 'success',
                        title: '&nbsp; Price Updated Successfully. '
                        })
                    });
                },
                error: function (data) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $(function() {
                        Toast.fire({
                        type: 'error',
                        title: '&nbsp; Price Not Updated. '
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
                    $('.SUBT').val(data.subt);
                    $('.DISC').val('0');
                    $('.PAY').val(Math.round(data.subt));
                    $('.PAID').val('0');
                    $('.DUE').val(Math.round(data.subt));
                    $('.RETURN').val('0');
                    $('.BILL').html(Math.round(data.subt));
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $(function() {
                        Toast.fire({
                        type: 'success',
                        title: '&nbsp; Quantity Updated Successfully. '
                        })
                    });
                },
                error: function (data) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $(function() {
                        Toast.fire({
                        type: 'error',
                        title: '&nbsp; Quantity Not Updated. '
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
                success: function (reponse) {
                    $('.PAY').val(Math.round(reponse.payable));
                    $('.BILL').html(Math.round(reponse.payable));
                    $('.PAID').val('0');
                    $('.DUE').val(Math.round(reponse.payable));
                    $('.RETURN').val('0');
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
                success: function (reponse) {
                    $('.PAY').val(Math.round(reponse.payable));
                    $('.BILL').html(Math.round(reponse.payable));
                    $('.PAID').val('0');
                    $('.DUE').val(Math.round(reponse.payable));
                    $('.RETURN').val('0');
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
                success: function (reponse) {
                    $('.DUE').val(Math.round(reponse.due));
                    $('.RETURN').val(Math.round(reponse.return));
                }
            });
        });
        $('#bkash_pay').hide();
        $('#rocket_pay').hide();
        $('#nagad_pay').hide();
        $('.payment_number').hide();
        $('#pay_type').change(function(){
            var val = $(this).val();
            if(val == 'Cash') {
               $('.payment_number').hide();
            } else {
                $('.payment_number').show();
            }
        });
    </script>

@endsection
