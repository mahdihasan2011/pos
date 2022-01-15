@extends('layouts.master')
@section('title')
    Purchase
@endsection
@section('content')
    
    <style>
        .blink_me {
            animation: blinker 2s linear infinite;
        }
        .blink_me2 {
            animation: blinker 0.5s linear infinite;
        } 
        .blink_me3 {
            color: red;
            font-size: 24px;
            animation: blinker 2s linear infinite;
        } 
        @keyframes blinker {
            50% {
            opacity: 0;
            }
        }
        .MOBN {
            border: hidden;
            color: black;
        }
        .MOBV {
            border: hidden;
            color: blue;
        }
        .MOBS {
            border: hidden;
            color: green;
        }
        .MOBB {
            border: hidden;
            color: red;
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
                                    Purchase Invoice <b class="blink_me2">:</b> 
                                    <small class="blink _me" style="color: blue;">{{ $purchase }}</small>
                                    <input type="hidden" name="purchase_no" value="{{ $purchase }}"/>
                                </h5>
                            </div>
                            <div class="col-4 row form-group">
                                <select class="col-10 select 2bs4 form-control form-control-sm" 
                                    id="PRODUCT" name="product"
                                    data-placeholder="&nbsp; Choose Product">
                                    <option value="">Choose Product</option>
                                    @foreach ($products as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }} - {{ $data->code }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <h6 class="col-3 text-right form-inline" style="float: right;">
                                Total Bill : (Tk.)&nbsp;
                                <b class="blink_me3 BILL"> </b>
                                    {{--  <input class="BILL form-control form-control-sm blink_me3"   --}}
                                        {{--  readonly style="border: hidden; width: 150px;">  --}}
                            </h6>
                            <div class="col-3 row">
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
                            <div class="col-9 row">
                                <div class="col-9 row">
                                    <label>Mobile :</label>
                                    <div class="col-2">
                                        <input class="MOBN" readonly>
                                    </div>
                                    <div class="col-2">
                                        <input class="MOBV" readonly>
                                    </div>
                                    <div class="col-2">
                                        <input class="MOBS" readonly>
                                    </div>
                                    <div class="col-2">
                                        <input class="MOBB" readonly>
                                    </div>
                                </div>
                                <div class="col-3 row">
                                    <label class="col-6">Balance :</label>
                                    <div class="col-6">
                                        <input class="form-control form-control-sm BAL" 
                                            readonly style="border: hidden;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body row">
                        <div class="col-8 table-responsive row p-0 m-0" style="height: 330px;">
                            <table class="add2cart table table-head-fixed pb-0 mb-0">
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
                                    @foreach ($carts as $data)
                                    <tr>
                                        <td>{{ $data->sl }}.</td>
                                        <td colspan="2">
                                            {{ $data->name }} ( {{ $data->code }} )
                                        </td>
                                        <td class="form-inline">
                                            <input class="QTY form-control form-control-sm" 
                                                value="{{ $data->quantity }}" name="quantity" 
                                                type="number" style="width: 60px;"/>
                                            <a href="" class="btn btn-success btn-xs">
                                                <i class="fas fa-check-circle"></i>
                                            </a>
                                        </td>
                                        <td>{{ $data->price }}</td>
                                        <td>{{ $data->total }}</td>
                                        <td>
                                            <button class="btn btn-danger REMOVE btn-xs" 
                                                value="{{ $data->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
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
                                        <td class="text-right">Total Quantity : </td>
                                        <td>
                                            <input class="form-control form-control-sm TQTY" readonly 
                                                name="due" value="{{ $tqty }}" 
                                                style="border: hidden; width: 150px;"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">SubTotal : </td>
                                        <td>
                                            <input class="form-control form-control-sm SUBT" readonly
                                                name="due" value="{{ $subt }}"
                                                style="border: hidden; width: 150px;"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Discount : </td>
                                        <td class="form-inline">
                                            <input class="DISC col-7 form-control form-control-sm" 
                                                name="disc" type="number" required style="width: 80px;"/>
                                            <select class="DISCTYPE col-5 form-control form-control-sm" name="disc-type">
                                                <option id="1" value="1">%</option>
                                                <option id="2" value="2">Tk</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Payable Amount : </td>
                                        <td>
                                            <input class="form-control form-control-sm PAY" readonly
                                                name="payable" style="border: hidden; width: 150px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Paid Amount : </td>
                                        <td>
                                            <input class="form-control form-control-sm PAID" required
                                                name="paid" type="number" style="width: 150px;"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Due Amount : </td>
                                        <td>
                                            <input class="form-control form-control-sm DUE" readonly 
                                                name="due" style="border: hidden; width: 150px;"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Return Amount : </td>
                                        <td>
                                            <input class="form-control form-control-sm RETURN" readonly
                                                name="return" style="border: hidden; width: 150px;"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-11 text-center pt-0 mt-0">
                            {{--  <a href="{{ route('purchase.cart.clear') }}" class="btn btn-danger btn-sm"
                                onClick="confirm('Are You Sure ?? You Want To Clear All Items !!')">
                                Clear
                            </a>  --}}
                            <button type="button" class="btn btn-danger btn-sm CLEAR">Clear</button>
                            {{--  <button type="reset" class="btn btn-warning btn-sm">Reset</button>  --}}
                            <button type="submit" class="btn btn-success btn-sm">Save</button>
                        </div>
                    </div>
                    {{--  <div class="card-footer text-center">
                        <a href="{{ route('purchase.item.destroy') }}" class="btn btn-danger btn-sm">
                            Clear
                        </a>
                        <button type="reset" class="btn btn-warning btn-sm">Reset</button>
                        <button type="submit" class="btn btn-success btn-sm">Save</button>
                    </div>  --}}
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
                        {{--  <button type="reset" class="btn btn-danger btn-sm">Reset</button>  --}}
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
            /*  Add Customer */
            $('#AddCustomer').click(function () {
                $('#CustomerSave').val("create-customer");
                $('#CustomerForm').trigger("reset");
                $('#CustomerSave').html("Save");
                $('#ModalHeader').html("Add <small>( Customer Information )</small>");
                $('#CustomerModal').modal('show');
            });
    
            /* Edit Customer */
            $('body').on('click', '#EditCustomer', function () {
                var id = $(this).data('id');
                $.get('edit/' + id , function (data) {
                    $('#ModalHeader').html("Edit <small>( Customer Information )</small>");
                    $('#CustomerSave').val("edit-customer");
                    $('#CustomerSave').html("Update");
                    $('#CustomerModal').modal('show');
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#phone').val(data.phone);
                    $('#email').val(data.email);
                    $('#category').val(data.category);
                    $('#balance').val(data.balance);
                    $('#address').val(data.address);
                })
            });
            /* Delete Customer */
            $('body').on('click', '.DeleteCustomer', function () {
                var id = $(this).data("id");
                if(confirm("Are You sure want to delete ???")) 
                {
                    $.ajax({
                        type: "get",
                        url: "{{ url('customer/destroy') }}"+'/'+id,
                        success: function (data) {
                            $("#customer_id_" + id).remove();
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            $(function() { 
                                Toast.fire({
                                type: 'warning',
                                title: ' Customer Information Deleted Successfully. '
                                })
                            });
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }
                {{--  const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                    },buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You Want to Delete this Customer ??",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: ' Yes, delete it ! ',
                    cancelButtonText: ' No, cancel ! ',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                    swalWithBootstrapButtons.fire(
                        ' Deleted ! ',
                        ' Customer has been Deleted Successfully.',
                        'success'
                    )
                    $.ajax({
                        url: "{{ url('customer/destroy') }}"+'/'+id,
                        type: 'GET',
                        data: { id: id, },
                        success: function (){
                            setTimeout(function(){
                                location.reload();
                            }, 1000); 
                        }
                    });
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) { swalWithBootstrapButtons.fire(
                        ' Cancelled ',
                        ' Customer has not Deleted. ',
                        'error'
                    )};
                });  --}}
            });   
        });
    
        if ($("#CustomerForm").length > 0) 
        {
            $("#CustomerForm").validate({
                rules: {
                    name: {
                        required: true,
                        },
                    phone: {
                        required: true,
                    },          
                    email: {
                        required: true,
                    },          
                    category: {
                        required: true,
                    },          
                    balance: {
                        required: true,
                    },          
                    address: {
                        required: true,
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
                    $('#CustomerSave').html('Submitting...');
                    if (actionType == "create-customer") {
                        $.ajax({
                            url: "{{ route('customer.store') }}",
                            type: "POST",
                            dataType: 'json',
                            data: $('#CustomerForm').serialize(),
                            success: function (data) 
                            {
                            var user = '<tr id="customer_id_' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.phone + '</td><td>' + data.email + '</td><td>' + data.category + '</td><td>' + data.balance + '</td><td>' + data.address + '</td>';
                                user += '<td><a href="javascript:void(0)" id="EditCustomer" data-id="' + data.id + '" class="btn btn-primary btn-xs"><i class="fas fa-edit"></i></a> ';
                                user += '<a href="javascript:void(0)" id="DeleteCustomer" data-id="' + data.id + '" class="DeleteCustomer btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i></a></td></tr>';
                                $('#example1').prepend(user);
                                $('#CustomerForm').trigger("reset");
                                $('#CustomerModal').modal('hide');
                                $('#CustomerSave').html('Save');
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                $(function() { 
                                    Toast.fire({
                                    type: 'success',
                                    title: ' Customer Information Added Successfully. '
                                    })
                                });
                            },
                            error: function (data) {
                                console.log('Error:', data);
                                $('#CustomerSave').html('Save');
                            }
                        });
                    } else {
                        $.ajax({
                            url: "{{ route('customer.update') }}",
                            type: "POST",
                            dataType: 'json',
                            {{--  data: $('#CustomerForm').serialize(),  --}}
                            data: {
                                'id'        : $("#id").val(),
                                'name'      : $("#name").val(),
                                'phone'     : $("#phone").val(),
                                'email'     : $("#email").val(),
                                'category'  : $("#category").val(),
                                'balance'   : $("#balance").val(),
                                'address'   : $("#address").val(),
                            },
                            success: function (data) 
                            {
                            var user = '<tr id="customer_id_' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.phone + '</td><td>' + data.email + '</td><td>' + data.category + '</td><td>' + data.balance + '</td><td>' + data.address + '</td>';
                                user += '<td><a href="javascript:void(0)" id="EditCustomer" data-id="' + data.id + '" class="btn btn-primary btn-xs"><i class="fas fa-edit"></i></a> ';
                                user += '<a href="javascript:void(0)" id="DeleteCustomer" data-id="' + data.id + '" class="DeleteCustomer btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i></a></td></tr>';
                                $("#customer_id_" + data.id).replaceWith(user);
                                $('#CustomerForm').trigger("reset");
                                $('#CustomerModal').modal('hide');
                                $('#CustomerSave').html('Save');
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                $(function() { 
                                    Toast.fire({
                                    type: 'success',
                                    title: ' Customer Information Updated Successfully. '
                                    })
                                });
                            },
                            error: function (data) {
                                console.log('Error:', data);
                                $('#CustomerSave').html('Save');
                            }
                        });
                    }
                }
            })
        }
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
                        $('.MOBN').val(data[0]['phone']) 
                    } else {
                        $('.MOBN').val(null) 
                    }
                    if (data[0]['category']==='Vip') { 
                        $('.MOBV').val(data[0]['phone']) 
                    } else { 
                        $('.MOBV').val(null) 
                    }
                    if (data[0]['category']==='Special') { 
                        $('.MOBS').val(data[0]['phone']) 
                    } else { 
                        $('.MOBS').val(null) 
                    }
                    if (data[0]['category']==='Blocked') { 
                        $('.MOBB').val(data[0]['phone'])
                    } else { 
                        $('.MOBB').val(null) 
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
                type: 'get',
                data: { id:id },
                success: function (data) {
                    {{--  location.reload();  --}}
                    $(".add2cart").load(location + " .add2cart");
                    $(".addtwocart").load(location + " .addtwocart");
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
                        $(".addtwocart").load(location + " .addtwocart");
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
                        $(".addtwocart").load(location + " .addtwocart");
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

    <script>
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
            $('.BILL').val(Math.round(totalP));
            {{--  document.getelementsbyclassname("BILL").innerHTML = totalP;  --}}
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
                $('.DUE').val(Math.round(bal)); }
        }
        $(".PAID").on('keyup', doIt);
        $(".SUBT").on('change', doIt);
        $(".DISC").on('keyup', doIt);
        $(".DISCTYPE").on('change', doIt);
        $('.PAY').on('keyup', doIt());
    </script>


@endsection