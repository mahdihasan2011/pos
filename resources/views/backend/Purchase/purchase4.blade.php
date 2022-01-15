@extends('layouts.master')
@section('title')
    Purchase
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-5 row">
                                <h5 class="col-12 card- title">
                                    Purchase Invoice <b class="blink _me05">:</b> 
                                    <small style="color: blue;">{{ $purchase }}</small>
                                    <input type="hidden" name="purchase_no" value="{{ $purchase }}"/>
                                </h5>
                            </div>
                            <div class="col-4 row form-group">
                                <select class="col-10 select 2bs4 form-control form-control-sm" 
                                    id="PRODUCT" name="product"
                                    data-live-search="true" data-style="btn-primary"
                                    data-placeholder="&nbsp; Choose Product">
                                    <option value="">Choose Product</option>
                                    @foreach ($products as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }} - {{ $data->code }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <h6 class="col-3 text-right form-inline" style="float: right;">
                                Total Bill (Tk.) : &nbsp;
                                <b class="blink_me2 BILL" id="BILL"></b>
                            </h6>
                            {{--  <div class="col-4 row">
                                <div class="col-10">
                                    <select class="SUPP form-control form-control-sm" 
                                        name="supplier" data-placeholder="Select Supplier">
                                        <option value="">Select Supplier</option>
                                        @foreach ($suppliers as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-sm" type="button" 
                                        data-toggle="modal" data-target="#SupplierModal">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-8 row">
                                <div class="col-4 row">
                                    <label class="col-6 text-right">Mobile :</label>
                                    <div class="col-6 text-left">
                                        <input class="MOB" style="border: hidden;" readonly>
                                    </div>
                                </div>
                                <div class="col-4 row">
                                    <label class="col-6 text-right">Balance :</label>
                                    <div class="col-6 text-left">
                                        <input class="BAL" readonly style="border: hidden;">
                                    </div>
                                </div>
                            </div>  --}}
                        </div>
                    </div>
                    <div class="card-body row">
                        <div class="col-8 table-responsive row p-0 m-0" style="height: 330px;">
                            <table id="CartExample" class="add2cart table table-head-fixed pb-0 mb-0">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th colspan="2">Description</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1 ;
                                    @endphp
                                    @foreach ($carts as $data)
                                    <tr>
                                        {{--  <td class="form-control-sm">{{ $data->id }}.</td>  --}}
                                        <td class="form-control-sm">{{ $i++ }}.</td>
                                        <td colspan="2">
                                            {{ $data->name }} <small>( {{ $data->code }} )</small>
                                        </td>
                                        <td class="form-inline">
                                            <input class="QTY form-control form-control-sm" 
                                                value="{{ $data->quantity }}" name="quantity" 
                                                type="number" style="width: 60px;"/>
                                            <a href="#" class="btn btn-success btn-xs">
                                                <i class="fas fa-check-circle"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <input class="PRICE form-control form-control-sm" 
                                                value="{{ $data->price }}" data-id="{{ $data->id }}" 
                                                name="quantity" type="number" style="width: 90px;"/>
                                        </td>
                                        <td>{{ $data->total }}</td>
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
                        <div class="col-4 p-0 m-0">
                            <table class="addtwocart table p-0 m-0">
                                <tbody>
                                    <tr>
                                        <td class="text-right form-control-sm">Total Quantity : </td>
                                        <td>
                                            <div class="tqty">
                                                <input class="text-center form-control form-control-sm 
                                                    TQTY" name="due" value="{{ $tqty }}" readonly
                                                    style="border: hidden; width: 150px;"/>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right form-control-sm">SubTotal (Tk.) : </td>
                                        <td>
                                            <div class="subt">
                                                <input class="text-right form-control form-control-sm 
                                                    SUBT" readonly name="due" value="{{ $subt }}"
                                                    style="border: hidden; width: 150px;"/>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right form-control-sm">Discount : </td>
                                        <td class="form-inline">
                                            <input class="text-center DISC col-7 form-control 
                                                form-control-sm" value="" name="disc" 
                                                type="number" required style="width: 80px;"/>
                                            <select class="DISCTYPE col-4 form-control 
                                                form-control-sm" name="disc-type">
                                                <option id="1" value="1">%</option>
                                                <option id="2" value="2">Tk</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right form-control-sm">Payable Amount (Tk.) : </td>
                                        <td>
                                                <input class="text-right form-control form-control-sm 
                                                    PAY" value="" name="payable" readonly
                                                    style="border: hidden; width: 150px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right form-control-sm">Paid Amount (Tk.) : </td>
                                        <td>
                                                <input class="text-center form-control form-control-sm
                                                    PAID" value="" name="paid" type="number" 
                                                    style="width: 150px;" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right form-control-sm">Due Amount (Tk.) : </td>
                                        <td>
                                                <input class="text-right form-control form-control-sm
                                                    DUE" value="" name="due" readonly
                                                    style="border: hidden; width: 150px;"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right form-control-sm">Return Amount (Tk.) : </td>
                                        <td>
                                                <input class="text-right form-control form-control-sm 
                                                    RETURN" value="" name="return" readonly
                                                    style="border: hidden; width: 150px;"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-11 text-center pt-0 mt-0">
                            <button type="button" class="btn btn-danger btn-sm CLEAR">Clear</button>
                            <button type="submit" class="btn btn-success btn-sm">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="SupplierModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Supplier</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('purchase.supplier.store') }}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-sm-label">
                                Name <span style="color:gray">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" required
                                    name="name" placeholder="Enter Supplier Name Here ...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-sm-label">
                                Phone <span style="color:gray">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control form-control-sm" required
                                    name="phone" placeholder="Enter Supplier Phone Number Here ...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-sm-label">E-mail</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control form-control-sm" 
                                    name="email" placeholder="Enter Supplier E-mail ID Here ...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-sm-2 col-form-sm-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-control form-control-sm" 
                                    name="category" title="Select Supplier Category">
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
                                    name="balance" placeholder="Enter Supplier Balance Here ...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-sm-label">Address</label>
                            <div class="col-sm-10">
                                <textarea class="form-control form-control-sm" name="address" rows="2"
                                    placeholder="Enter Supplier Address Here ..."></textarea>
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

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            /* Delete Item */
            $('body').on('click', '.DeleteItem', function () {
                var id = $(this).data("id");
                if(confirm("Are you sure ?? You want to Remove this Item !!")) 
                {
                    $.ajax({
                        type: "get",
                        url: "{{ url('purchase/item/delete') }}"+'/'+id,
                        success: function (data) {
                            $("#purchase_id_" + id).remove();
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            $(function() { 
                                Toast.fire({
                                type: 'warning',
                                title: ' Item Removed from Cart Successfully. '
                                })
                            });
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }
            });   
        });
        /* Add Item 2 Cart*/
        $("#").on('change', function () {
        var id = $(this).val();
        $.ajax({
            url: '{{ route('purchase.item.add') }}',
            type: 'get',
            data: { id:id },
            success: function (data) {
                var user = '<tr id="purchase_id_' + data.id + '"><td class="form-control-sm">' + data.id + '</td><td colspan="2">' + data.name + '<small>(' + data.code + ')</small></td><td class="form-inline"><input class="QTY form-control form-control-sm" value="' + data.quantity + '" name="quantity" type="number" style="width: 60px;"/><a href="#" class="btn btn-success btn-xs"><i class="fas fa-check-circle"></i></a></td><td><input class="PRICE form-control form-control-sm" value="' + data.price + '" name="quantity" type="number" style="width: 90px;"/></td><td>' + data.total + '</td>';
                {{--  var user = '<tr id="purchase_id_' + data.id + '"><td class="form-control-sm">' + data.id + '</td><td colspan="2">' + data.name + '<small>(' + data.code + ')</small></td><td>' + data.quantity + '</td><td>' + data.price + '</td><td>' + data.total + '</td>';  --}}
                    user += '<td><a href="javascript:void(0)" id="DeleteItem" data-id="' + data.id + '" class="DeleteItem btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i></a></td></tr>';
                    $('#CartExample').prepend(user);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $(function() { 
                        Toast.fire({
                        type: 'info',
                        title: ' Item Added to Cart Successfully. '
                        })
                    });
                },
                error: function (data) {
                    console.log('Error:', data);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $(function() { 
                        Toast.fire({
                        type: 'error',
                        title: ' Item Not Added to Cart. '
                        })
                    });
                }
            });
        });
    </script>

    <script>
        $(".SUPP").on('change', function () {
            var id = $(this).val();
            $.ajax({
                url: '{{ route('purchase.supplier.details') }}',
                type: 'get',
                data: { id:id },
                success: function (data) {
                    if (data[0]['category']==='Normal') { 
                        $('.MOB').val(data[0]['phone']) 
                        $('.MOB').css("color", "blue");
                    }
                    if (data[0]['category']==='Vip') { 
                        $('.MOB').val(data[0]['phone']) 
                        $('.MOB').css("color", "yellow");
                    }
                    if (data[0]['category']==='Special') { 
                        $('.MOB').val(data[0]['phone']) 
                        $('.MOB').css("color", "orange");
                    }
                    if (data[0]['category']==='Blocked') { 
                        $('.MOB').val(data[0]['phone'])
                        $('.MOB').css("color", "red");
                    }
                    $('.BAL').val(data[0]['balance']);
                }
            });
        });
    </script>

    <script>
        $("#PRODUCT").on('change', function () {
            var id = $(this).val();
            $.ajax({
                url: '{{ route('purchase.item.add') }}',
                type: 'GET',
                data: { id:id },
                success: function (data) {
                    $(".add2cart").load(location + " .add2cart");
                    $(".tqty").load(location + " .tqty");
                    $(".subt").load(location + " .subt");
                    $('.DISC').val('');
                    {{--  $('.DISCTYPE').;  --}}
                    {{--  $('select[name="disc-type"]').empty();  --}}
                    $('.PAY').val('');
                    $('.PAID').val('');
                    $('.DUE').val('');
                    $('.RETURN').val('');
                    $('.BILL').html('');
                    {{--  $('select[name="product"]').value = null;  --}}
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $(function() { 
                        Toast.fire({
                        type: 'info',
                        title: ' Item Added to Cart Successfully. '
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
                        title: ' Item Not Added to Cart. '
                        })
                    });
                }
            });
        });
        $('.REMOVE').on('click', function () {
            var id = $(this).val();
            if(confirm("Are you sure ?? You want to Remove this Item !!")) 
            {
                $.ajax({
                    type: "get",
                    data: { id:id },
                    url: "{{ route('purchase.item.remove') }}",
                    success: function (data) {
                        $(".add2cart").load(location + " .add2cart");
                        $(".tqty").load(location + " .tqty");
                        $(".subt").load(location + " .subt");
                        $('.DISC').val('');
                        $('.PAY').val('');
                        $('.PAID').val('');
                        $('.DUE').val('');
                        $('.RETURN').val('');
                        $('.BILL').html('');
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $(function() { 
                            Toast.fire({
                            type: 'warning',
                            title: ' Item Removed from Cart Successfully. '
                            })
                        });
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });
        $('body').on('click', '.DEL', function () {
            var id = $(this).data("id");
            if(confirm("Are you sure ?? You want to Remove this Item !!")) 
            {
                $.ajax({
                    type: "GET",
                    url: "{{ url('purchase/item/delete') }}"+'/'+id,
                    success: function (data) {
                        $(".add2cart").load(location + " .add2cart");
                        $(".tqty").load(location + " .tqty");
                        $(".subt").load(location + " .subt");
                        $('.DISC').val('');
                        $('.PAY').val('');
                        $('.PAID').val('');
                        $('.DUE').val('');
                        $('.RETURN').val('');
                        $('.BILL').html('');
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $(function() { 
                            Toast.fire({
                            type: 'warning',
                            title: ' Item Removed from Cart Successfully. '
                            })
                        });
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });   
        $('.CLEAR').on('click', function () {
            var id = $(this).val();
            if(confirm("Are you sure ?? You want to Clear All Items from Cart !!")) 
            {
                $.ajax({
                    type: "get",
                    data: { id:id },
                    url: "{{ route('purchase.cart.clear') }}",
                    success: function (data) {
                        $(".add2cart").load(location + " .add2cart");
                        {{--  $(".addtwocart").load(location + " .addtwocart");  --}}
                        $(".tqty").load(location + " .tqty");
                        $(".subt").load(location + " .subt");
                        $('.DISC').val('');
                        $('.PAY').val('');
                        $('.PAID').val('');
                        $('.DUE').val('');
                        $('.RETURN').val('');
                        $('.BILL').html('');
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $(function() { 
                            Toast.fire({
                            type: 'warning',
                            title: ' All Items Removed from Cart Successfully. '
                            })
                        });
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });
        
    </script>

    {{--  <script>
        function doStuff() 
        {
            var d = $('.DISC').val();
            var s = $('.SUBT').val();
            if ($(".DISCTYPE").children(":selected").attr("id") == '1') {   
                var totalD = (s * d) / 100;
                var totalP = s - totalD;
            } else {
                var totalP = s - d;  
            }
            $(".PAY").val(Math.round(totalP));
            $('.BILL').innerHTML(Math.round(totalP));
        }
        $(".DISC").on('keyup', doStuff);
        $(".DISCTYPE").on('change', doStuff);
        $(".SUBT").on('keyup', doStuff());

        function doIt() 
        {
            var ro = 0;
            var pa = $('.PAID').val();
            var tp = $('.PAY').val();
            var cal = (pa - tp);
            if (cal > 0) {
                $('.DUE').val(Math.round(ro));
                $('.RETURN').val(Math.round(cal));
            } else {
                var bal = (tp - pa);
                $('.RETURN').val(Math.round(ro));
                $('.DUE').val(Math.round(bal)); 
            }
        }
        $(".PAID").on('keyup', doIt);
        $(".SUBT").on('change', doIt);
        $(".DISC").on('keyup', doIt);
        $(".DISCTYPE").on('change', doIt);
        $('.PAY').on('keyup', doIt());
    </script>  --}}

    <script>
        $(".DISCTYPE").on('change', function () {
            var id  = $(".DISC").val();
            var dty = $(this).val();
            $.ajax({
                url: '{{ route('purchase.discount.type') }}',
                type: 'GET',
                data: { disc : id, disc_type : dty },
                success: function (reponse) {
                    $('.PAY').val(Math.round(reponse)); 
                    $('.BILL').html(Math.round(reponse));
                    $('.PAID').val('');
                    $('.DUE').val('');
                    $('.RETURN').val('');
                    $('.BILL').html('');
                }
            });
        });
        $(".DISC").on('keyup', function () {
            var id  = $(this).val();
            var dty = $(".DISCTYPE").val();
            $.ajax({
                url: '{{ route('purchase.discount') }}',
                type: 'GET',
                data: { disc : id, disc_type : dty },
                success: function (reponse) {
                    $('.PAY').val(Math.round(reponse));
                    $('.BILL').html(Math.round(reponse));
                    $('.PAID').val('');
                    $('.DUE').val('');
                    $('.RETURN').val('');
                    $('.BILL').html('');
                }
            });
        });
        $(".PAID").on('keyup', function () {
            var paid    = $(this).val();
            var pay     = $(".PAY").val();
            $.ajax({
                url: '{{ route('purchase.paid.amount') }}',
                type: 'GET',
                data: { paid : paid, pay : pay },
                success: function (reponse) {
                    $('.DUE').val(Math.round(reponse.due));
                    $('.RETURN').val(Math.round(reponse.return));
                }
            });
        });
    </script>

@endsection