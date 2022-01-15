@extends('layouts.master')
@section('title')
    Sales
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
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-4 row">
                                    <h5 class="col-lg-12">
                                        Sales Invoice <b class="blink_me05">:</b> 
                                        <small style="color: #0000ff;">{{ $sale }}</small>
                                        <input type="hidden" class="sale_no" value="{{ $sale }}"/>
                                    </h5>
                                </div>
                                <div class="col-lg-5 row form-group">
                                    <select class="col-lg-10 select2bs4 form-control form-control-sm" 
                                        data-live-search="true" data-style="btn-primary"
                                        name="addProduct" data-placeholder="Choose Product">
                                        <option value="">Choose Product</option>
                                        @foreach ($products as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }} - {{ $data->code }} &nbsp; ({{ $data->quantity }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <h6 class="col-lg-3 text-right form-inline" style="float: right;">
                                    Total Bill (Tk.) : &nbsp;
                                    <b class="blink_me2 BILL"></b>
                                </h6>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 row">
                                    <div class="col-lg-10">
                                        <select class="select2 form-control form-control-sm" 
                                            name="customer" id="CUST" title="Select Customer" 
                                            data-placeholder="Select Customer">
                                            <option value="Cash">Cash</option>
                                            @foreach ($customers as $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}<br> ( {{ $data->phone }} )</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary btn-sm" type="button" 
                                            data-toggle="modal" data-target="#CustomerModal" title="Add Customer">
                                            <i class="fas fa-user-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-9 row">
                                    <div class="col-lg-3 row">
                                        <label class="col-lg-5 text-right">Mobile:</label>
                                        <div class="col-lg-7 text-left">
                                            <div class="MOB"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 row">
                                        <label class="col-lg-5 text-right">Balance:</label>
                                        <div class="col-lg-7 text-left">
                                            <div class="BAL"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <select class="payment_type form-control form-control-sm" 
                                            id="pay_type" title="Payment Type">
                                            <option value="Cash">Cash</option>
                                            <option value="Bkash">Bkash</option>
                                            <option value="Rocket">Rocket</option>
                                            <option value="Nagad">Nagad</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3" id="payment_number">
                                        <input placeholder="Payment Number" type="number"
                                            class="payment_number form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body row">
                            <div class="col-lg-8 table-responsive row" style="height: 440px;">
                                <table id="CartExample" class="table table-head-fixed">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th colspan="2">Description</th>
                                            <th>Quantity</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-right">Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1 @endphp
                                        @foreach ($carts as $data)
                                        <tr>
                                            <td class="form-control-sm">{{ $i++ }}.</td>
                                            <td colspan="2">
                                                {{ $data->name }} <small>( {{ $data->code }} )</small>
                                            </td>
                                            <td class="form-inline">
                                                <input class="QTY form-control form-control-sm text-center" 
                                                    value="{{ $data->quantity }}" name="quantity" 
                                                    data-id="{{ $data->code }}" type="text" 
                                                    style="width: 70px;"/>
                                            </td>
                                            <td class="text-right">
                                                <input class="PRICE form-control form-control-sm text-right" 
                                                    value="{{ $data->price }}" data-id="{{ $data->code }}" 
                                                    name="quantity" type="text" style="width: 100px;"/>
                                            </td>
                                            <td class="text-right">{{ $data->total }}</td>
                                            <td>
                                                <a href="javascript:void(0)" data-id="{{ $data->id }}" 
                                                    class="DEL btn btn-danger btn-xs">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-4">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="text-right form-control-sm">Total Quantity : </td>
                                            <td>
                                                <input class="text-center form-control form-control-sm TQTY" 
                                                    name="total_qty" value="0" readonly
                                                    style="border: hidden; width: 150px;"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right form-control-sm">SubTotal (Tk.) : </td>
                                            <td>
                                                <input class="text-right form-control form-control-sm SUBT" 
                                                    name="sub_total" value="0" readonly
                                                    style="border: hidden; width: 150px;"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right form-control-sm">Discount : </td>
                                            <td class="form-inline">
                                                <input class="text-center DISC col-lg-8 form-control form-control-sm" 
                                                    value="0" name="discount" type="number" 
                                                    required style="width: 80px;"/>
                                                <select class="DISCTYPE col-lg-4 form-control form-control-sm">
                                                    <option id="1" value="1">%</option>
                                                    <option id="2" value="2">Tk</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right form-control-sm">Payable Amount (Tk.) : </td>
                                            <td>
                                                <input class="text-right form-control form-control-sm PAY" 
                                                    value="0" name="payable" readonly style="border: hidden; width: 150px;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right form-control-sm">Paid Amount (Tk.) : </td>
                                            <td>
                                                <input class="text-center form-control form-control-sm PAID" 
                                                    required value="0" name="paid" type="number" style="width: 150px;" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right form-control-sm">Due Amount (Tk.) : </td>
                                            <td>
                                                <input class="text-right form-control form-control-sm DUE" 
                                                    value="0" name="due" readonly style="border: hidden; width: 150px;"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right form-control-sm">Return Amount (Tk.) : </td>
                                            <td>
                                                <input class="text-right form-control form-control-sm 
                                                    RETURN" value="0" name="return" readonly
                                                    style="border: hidden; width: 150px;"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">
                                                <button class="btn btn-danger btn-sm CLEAR" type="button">
                                                    Clear Cart
                                                </button>
                                            </td>
                                            <td class="text-left">
                                                <button class="btn btn-success btn-sm CATSAV" type="button">
                                                    Confirm Sales
                                                </button>
                                                <a href="" class="btn btn-info btn-sm" target="_blank">
                                                    <i class="fas fa-print"></i>
                                                </a>
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

    <div class="modal fade" id="CustomerModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Customer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('sale.customer.store') }}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="col-lg-2 col-lg-form-sm-label">
                                Name <span style="color:gray">*</span>
                            </label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control form-control-sm" required
                                    name="name" placeholder="Enter Customer Name Here ...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-lg-2 col-lg-form-sm-label">
                                Phone <span style="color:gray">*</span>
                            </label>
                            <div class="col-lg-10">
                                <input type="number" class="form-control form-control-sm" required
                                    name="phone" placeholder="Enter Customer Phone Number Here ...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-lg-2 col-lg-form-sm-label">E-mail</label>
                            <div class="col-lg-10">
                                <input type="email" class="form-control form-control-sm" 
                                    name="email" placeholder="Enter Customer E-mail ID Here ...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-lg-2 col-lg-form-sm-label">Category</label>
                            <div class="col-lg-10">
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
                            <label for="balance" class="col-lg-2 col-lg-form-sm-label">Balance</label>
                            <div class="col-lg-10">
                                <input type="number" class="form-control form-control-sm" value="0"
                                    name="balance" placeholder="Enter Customer Balance Here ...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-lg-2 col-lg-form-sm-label">Address</label>
                            <div class="col-lg-10">
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
    <script type="text/javascript">
        $(document).ready(function() {
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
                            url: "{{ route('sale.item.store') }}",
                            data: {
                                '_token'        : $('input[name=_token]').val(),
                                'sale_no'       : $(".sale_no").val(),
                                'customer'      : $('#CUST').val(),
                                'amount'        : $('.BAL').val(),
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
        });
    </script> 
    
    <script>
        $(document).ready(function() {
            $('select[name="addProduct"]').change('select2:selecting', function(e) {
                var id = $(this).val();
                $.ajax({
                    url: '{{ route('sale.item.add') }}',
                    type: 'GET',
                    data: { id:id },
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
        });
    </script>

    <script>
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
                        url: "{{ url('sale/item/delete') }}"+'/'+id,
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
                                type: 'warning',
                                title: '&nbsp; Product Removed from Cart Successfully. '
                                })
                            });
                        },
                        error: function (data) {
                            console.log('Error:', data);
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
                url: '{{ route('sale.item.price') }}',
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
                        type: 'info',
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
                url: '{{ route('sale.item.quantity') }}',
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
                        type: 'info',
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
    </script>

    <script>
        $(".DISCTYPE").on('change', function () {
            var id  = $(".DISC").val();
            var dty = $(this).val();
            $.ajax({
                url: '{{ route('sale.discount.type') }}',
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
                url: '{{ route('sale.discount') }}',
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
                url: '{{ route('sale.paid.amount') }}',
                type: 'GET',
                data: { paid : paid, pay : pay },
                success: function (reponse) {
                    $('.DUE').val(Math.round(reponse.due));
                    $('.RETURN').val(Math.round(reponse.return));
                }
            });
        });
    </script>

    <script>
        $('#bkash_pay').hide();
        $('#rocket_pay').hide();
        $('#nagad_pay').hide();
        $('#payment_number').hide();
        $('#pay_type').change(function(){
            var val = $(this).val();
            if(val == 'Cash') {
               $('#payment_number').hide();
            } else {
                $('#payment_number').show();
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#CUST").change('select2:selecting', function(e) {
                var id = $(this).val();
                $.ajax({
                    url: '{{ route('sale.customer.details') }}',
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
                    }
                });
            });
        });
    </script>

@endsection