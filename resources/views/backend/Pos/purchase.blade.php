@extends('layouts.master')
@section('title')
{{ !empty($title) ? $title : "POS Terminal" }}
@endsection
@section('customCSS')
<style></style>
@endsection
@section('content')
<div class="content-wrapper pb-0">
    <section class="content pt-1">
        <div class="row">
            <div class="col-12">
                <form id="CartStore">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 form-group">
                                    Invoice&nbsp;#&nbsp;<small>{{ $invoice_no }}</small>
                                    <input type="hidden" name="invoice_no" value="{{ $invoice_no }}" />
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 form-group">
                                    @can('purchase_date')
                                    <input type="date" value="{{ $today }}" name="date"
                                        class="form-control form-control-sm" />
                                    @endcan
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 form-group">
                                    <select name="supplier" class="select2 form-control form-control-sm"
                                        data-placeholder="Select" data-live-search="true" data-style="btn-primary"
                                        title="Select Supplier" data-toggle="tooltip" data-placement="top" required>
                                        <option value="">Select Supplier</option>
                                        <option value="null">Add Supplier</option>
                                        <option value="Cash" selected>Cash</option>
                                        @foreach ($users as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-6 form-group">
                                    <select class="select2 form-control form-control-sm" data-live-search="true"
                                        data-style="btn-primary" name="addProduct" data-placeholder="Select Product"
                                        title="Select Product" data-toggle="tooltip" data-placement="top">
                                        <option value="">Select Product</option>
                                        @foreach ($products as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }} - {{ $data->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body row py-1">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                                <table id="CartExample" class="table table-sm table-head-fixed">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
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
                                            <td class="form-control-sm">{{ $i++ }}.</td>
                                            <td>
                                                {{ $data->name }}
                                                <!--<small>( {{ $data->code }} )</small>-->
                                            </td>
                                            <td>
                                                <input class="QTY form-control form-control-sm text-center" type="text"
                                                    name="quantity" value="{{ $data->quantity }}"
                                                    data-id="{{ $data->code }}" />
                                            </td>
                                            <td>
                                                <input class="PRICE form-control form-control-sm text-right" type="text"
                                                    name="price" value="{{ $data->price }}"
                                                    data-id="{{ $data->code }}" />
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
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                <table class="table table-sm ">
                                    <tbody>
                                        <tr>
                                            <th class="text-right form-control-sm">Total Quantity : </th>
                                            <td>
                                                <input class="text-center form-control form-control-sm TQTY"
                                                    name="total_qty" value="0" readonly />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right form-control-sm">SubTotal (৳) : </th>
                                            <td>
                                                <input class="text-right form-control form-control-sm SUBT"
                                                    name="sub_total" value="0" readonly />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right form-control-sm">Discount : </th>
                                            <td class="form-inline">
                                                <input class="text-center DISC col-xl-8 col-lg-8 col-md-8 col-sm-8
                                                    col-8 form-control form-control-sm" value="0" name="discount"
                                                    type="number" required title="Input discount amount"
                                                    data-toggle="tooltip" data-placement="top" />
                                                <select class="DISCTYPE col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4
                                                    form-control form-control-sm" name="disc_type"
                                                    title="Discount type" data-toggle="tooltip" data-placement="top">
                                                    <option id="1" value="1">%</option>
                                                    <option id="2" value="2">৳</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right form-control-sm">Payable Amount (৳) : </th>
                                            <td>
                                                <input class="text-right form-control form-control-sm PAY" value="0"
                                                    name="payable" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right form-control-sm">Paid Amount (৳) : </th>
                                            <td>
                                                <input class="text-center form-control form-control-sm PAID" required
                                                    value="" name="paid" type="number" title="Input paid amount"
                                                    data-toggle="tooltip" data-placement="top" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right form-control-sm">Due Amount (৳) : </th>
                                            <td>
                                                <input class="text-right form-control form-control-sm DUE" value="0"
                                                    name="due" readonly />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right form-control-sm">Return (৳) : </th>
                                            <td>
                                                <input class="text-right form-control form-control-sm RETURN" value="0"
                                                    name="return" readonly />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right form-control-sm">Payment Type : </th>
                                            <td>
                                                <select class="payment_type form-control form-control-sm" id="pay_type"
                                                    name="payment_type" title="Payment Type" data-toggle="tooltip"
                                                    data-placement="top">
                                                    <option value="Cash">Cash</option>
                                                    <option value="Bkash">Bkash</option>
                                                    <option value="Rocket">Rocket</option>
                                                    <option value="Nagad">Nagad</option>
                                                </select>
                                                <input placeholder="Payment Number" type="number" name="payment_number"
                                                    class="payment_number form-control form-control-sm my-2"
                                                    title="Payment Number" data-toggle="tooltip" data-placement="top">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">
                                                <button class="btn btn-danger btn-sm CLEAR" type="button"
                                                    title="Remove all items from cart" data-toggle="tooltip"
                                                    data-placement="top">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </td>
                                            <td class="text-left">
                                                <button class="btn btn-success btn-sm CATSAV" type="submit"
                                                    title="Confirm Purchase" data-toggle="tooltip" data-placement="top">
                                                    <i class="fas fa-check-circle"></i>&nbsp;<b>Confirm</b>
                                                </button>
                                                @if (session('purchase_no'))
                                                <a href="{{ route('purchase.mini.invoice',['id'=>session('purchase_no')]) }}"
                                                    class="btn btn-info btn-sm" target="_blank" title="Print Invoice"
                                                    data-toggle="tooltip" data-placement="top">
                                                    <i class="fas fa-print"></i>
                                                </a>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!------ modal ------>
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
                            <label for="name" class="col-sm-2 col-form-sm-label">Name <span
                                    style="color:gray">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm name" name="name" id="name"
                                    placeholder="Enter {{ $controller == 'PurchaseController' ? 'Supplier' : 'Customer' }} Name Here ...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-sm-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control form-control-sm phone" name="phone" id="phone"
                                    placeholder="Enter Supplier Phone Number Here ...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-sm-2 col-form-sm-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-control form-control-sm category" name="category" id="category"
                                    title="Select Supplier Category">
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
                                    name="balance" id="balance" placeholder="Enter Supplier Balance Here ...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-sm-label">Address</label>
                            <div class="col-sm-10">
                                <textarea class="form-control form-control-sm address" name="address" id="address"
                                    rows="2" placeholder="Enter Supplier Address Here ..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm" id="CustomerSave" value="create"></button>
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
            },buttonsStyling: false
        });
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("select[name=supplier]").on('change click', function(e) {
                var id = $(this).val();
                if (id === 'null') {
                    $('#CustomerSave').val("create-customer");
                    $('#CustomerForm').trigger("reset");
                    $('#CustomerSave').html("Save");
                    $('#ModalHeader').html("Add <small>( Supplier Information )</small>");
                    $('#CustomerModal').modal('show');
                }
            });
            $('select[name="addProduct"]').change('select2:selected', function(e) {
                var id = $(this).val();
                if(id != '') {
                    $.ajax({
                        url: "{{ route('purchase.item.add') }}",
                        type: "GET",
                        data: { id: id  },
                        success: function (response) {
                            // var product = '<tr id="product_id_' + response.carts.id + '"><td class="form-control-sm">' + response.carts.id + '.</td><td>' + response.carts.name + ' <small>( ' + response.carts.code + ' )</small></td><td><input class="QTY form-control form-control-sm text-center" value="' + response.carts.quantity + '" name="quantity" data-id="' + response.carts.code + '" type="text"/></td><td><input class="PRICE form-control form-control-sm text-right" value="' + response.carts.price + '" data-id="' + response.carts.code + '" name="price" type="text"/></td><td class="text-right">' + response.carts.total + '</td>';
                            // product += '<td class="text-right"><a href="javascript:void(0)" data-id="' + response.carts.id + '" class="DEL btn btn-danger btn-xs"><i class="fas fa-minus-circle"></i></a></td></tr>';
                            // $('#CartExample').prepend(product);
                            $("#CartExample").load(location + " #CartExample");
                            $('.TQTY').val(response.tqty);
                            $('.SUBT').val(response.subt.toFixed(2));
                            $('.DISC').val('0');
                            $('.PAY').val(Math.round(response.subt));
                            $('.PAID').val('');
                            $('.DUE').val(Math.round(response.subt));
                            $('.RETURN').val('0');
                            $('.BILL').html(Math.round(response.subt));
                            Toast.fire({
                                type: 'success',
                                title: ' &nbsp;'+response.message+'',
                            });
                            $('select[name="addProduct"]').val('').change();
                        },
                        error: function (error) {
                            $(function () {
                                Toast.fire({
                                    type: 'error',
                                    title: ' &nbsp;'+error+''
                                })
                            });
                        }
                    });
                }
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
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('purchase.item.remove', '') }}/" + id,
                        success: function (data) {
                            // $("#product_id_" + id).remove();
                            $("#CartExample").load(location + " #CartExample");
                            $('.TQTY').val(data.tqty);
                            $('.SUBT').val(data.subt.toFixed(2));
                            $('.DISC').val('0');
                            $('.PAY').val(Math.round(data.subt));
                            $('.PAID').val('');
                            $('.DUE').val(Math.round(data.subt));
                            $('.RETURN').val('0');
                            $('.BILL').html(Math.round(data.subt));
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
                url: "{{ route('purchase.item.price') }}",
                type: 'GET',
                data: { id : id, price : price },
                success: function (data) {
                    $("#CartExample").load(location + " #CartExample");
                    $('.TQTY').val(data.tqty);
                    $('.SUBT').val(data.subt.toFixed(2));
                    $('.DISC').val('0');
                    $('.PAY').val(Math.round(data.subt));
                    $('.PAID').val('');
                    $('.DUE').val(Math.round(data.subt));
                    $('.RETURN').val('0');
                    $('.BILL').html(Math.round(data.subt));
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
                url: "{{ route('purchase.item.quantity') }}",
                type: 'GET',
                data: { id : id, qty : qty },
                success: function (data) {
                    $("#CartExample").load(location + " #CartExample");
                    $('.TQTY').val(data.tqty);
                    $('.SUBT').val(data.subt.toFixed(2));
                    $('.DISC').val('0');
                    $('.PAY').val(Math.round(data.subt));
                    $('.PAID').val('');
                    $('.DUE').val(Math.round(data.subt));
                    $('.RETURN').val('0');
                    $('.BILL').html(Math.round(data.subt));
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
        $(".DISCTYPE").on('change', function () {
            var id  = $(".DISC").val();
            var dty = $(this).val();
            $.ajax({
                url: "{{ route('purchase.discount.type') }}",
                type: 'GET',
                data: { disc : id, disc_type : dty },
                success: function (response) {
                    $('.PAY').val(Math.round(response.payable));
                    $('.BILL').html(Math.round(response.payable));
                    $('.PAID').val('');
                    $('.DUE').val(Math.round(response.payable));
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
                url: "{{ route('purchase.discount') }}",
                type: 'GET',
                data: { disc : id, disc_type : dty },
                success: function (response) {
                    $('.PAY').val(Math.round(response.payable));
                    $('.BILL').html(Math.round(response.payable));
                    $('.PAID').val('');
                    $('.DUE').val(Math.round(response.payable));
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
                url: "{{ route('purchase.paid.amount') }}",
                type: 'GET',
                data: { paid : paid, pay : pay },
                success: function (response) {
                    $('.DUE').val(Math.round(response.due));
                    $('.RETURN').val(Math.round(response.return));
                    $(function() {
                        Toast.fire({
                            type: 'success',
                            title: '&nbsp; '+response.message+''
                        })
                    });
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
                        required: "Please enter Supplier Name",
                    },
                    phone: {
                        required: "Please enter Supplier Phone",
                    },
                    email: {
                        required: "Please enter Supplier Email",
                    },
                    category: {
                        required: "Please select Supplier Category",
                    },
                    balance: {
                        required: "Please enter Supplier Balance",
                    },
                    address: {
                        required: "Please enter Supplier Address",
                    },
                },
                submitHandler: function(form) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    var actionType = $('#CustomerSave').val();
                    $('#CustomerSave').attr('disabled', true);
                    $('#CustomerSave').html('Submitting...');
                    if (actionType == "create-customer") {
                        $.ajax({
                            url: "{{ route('purchase.supplier.store') }}",
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
                                $('select[name="supplier"]').append('<option value="'+data.info.id+'" selected="selected">'+ data.info.name +'</option>');
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
                    swalWithBootstrapButtons.fire({
                        title: 'Are you sure?',
                        text: "You want to confirm this Purchase ??",
                        type: 'question',
                        showCancelButton: true,
                        confirmButtonText: ' Yes, Confirm ! ',
                        cancelButtonText: ' No, Cancel ! ',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                type: "POST",
                                url: "{{ route('purchase.item.store') }}",
                                data: {
                                    '_token'        : $('input[name=_token]').val(),
                                    'invoice_no'    : $('input[name=invoice_no]').val(),
                                    'date'		    : $('input[name=date]').val(),
                                    'user'	        : $('select[name="supplier"]').val(),
                                    'total_qty'     : $('input[name=total_qty]').val(),
                                    'sub_total'     : $('input[name=sub_total]').val(),
                                    'discount'      : $('input[name=discount]').val(),
                                    'disc_type'     : $('.DISCTYPE').val(),
                                    'payable'       : $('input[name=payable]').val(),
                                    'paid'          : $('input[name=paid]').val(),
                                    'return'        : $('input[name=return]').val(),
                                    'due'           : $('input[name=due]').val(),
                                    'payment_type'  : $('select[name=payment_type]').val(),
                                    'payment_number': $('input[name=payment_number]').val(),
                                },
                                success: function (response) {
                                    $("#CartExample").load(location + " #CartExample");
                                    $('select[name="supplier"]').val('Cash').change();
                                    $('.TQTY').val(0);
                                    $('.SUBT').val(0);
                                    $('.DISC').val(0);
                                    $('.PAY').val(0);
                                    $('.PAID').val('');
                                    $('.DUE').val(0);
                                    $('.RETURN').val(0);
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
                        };
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
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{ route('purchase.cart.clear') }}",
                        type: 'GET',
                        success: function (data){
                            // location.reload();
                            $("#CartExample").load(location + " #CartExample");
                            $('.TQTY').val(0);
                            $('.SUBT').val(0);
                            $('.DISC').val(0);
                            $('.PAY').val(0);
                            $('.PAID').val('');
                            $('.DUE').val(0);
                            $('.RETURN').val(0);
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
</script>
@endsection