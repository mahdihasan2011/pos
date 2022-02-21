@extends('layouts.master')
@section('title')
    Supplier
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content pt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Supplier <small>( List )</small></h3>
                        @can('supplier_create')
                        <a href="javascript:void(0)" class="btn btn-primary btn-sm"
                            style="float: right;" id="AddCustomer">Add</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Phone</th>
{{--                            <th>E-mail</th>--}}
                            <th>Category</th>
                            <th>Balance</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1 ;
                            @endphp
                            @foreach ($supplier as $data)
                            <tr id="customer_id_{{ $data->id }}">
                                <td>{{ $i++ }}</td>
                                {{--  <td>{{ $data->id }}</td>  --}}
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->phone }}</td>
{{--                                <td>{{ $data->email }}</td>--}}
                                <td>{{ $data->category }}</td>
                                <td>{{ $data->balance }}</td>
                                <td>{{ $data->address }}</td>
                                <td>
                                    @can('supplier_update')
                                    <a href="javascript:void(0)" id="EditCustomer"
                                        data-id="{{ $data->id }}" class="btn btn-primary btn-xs">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endcan
                                    @can('supplier_delete')
                                    <a href="javascript:void(0)" id="DeleteCustomer"
                                        data-id="{{ $data->id }}" class="DeleteCustomer btn btn-danger btn-xs">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                    @endcan
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
                                    name="name" id="name" placeholder="Enter Supplier Name Here ...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-sm-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control form-control-sm phone"
                                    name="phone" id="phone" placeholder="Enter Supplier Phone Number Here ...">
                            </div>
                        </div>
<!--                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-sm-label">E-mail</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control form-control-sm email"
                                    name="email" id="email" placeholder="Enter Supplier E-mail ID Here ...">
                            </div>
                        </div>-->
                        <div class="form-group row">
                            <label for="category" class="col-sm-2 col-form-sm-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-control form-control-sm category" name="category"
                                    id="category" title="Select Supplier Category">
                                    <option value="Normal">Normal (Blue)</option>
                                    <option value="Vip">Vip (Yellow)</option>
                                    <option value="Special">Special (Orange)</option>
                                    <option value="Blocked">Blocked (Red)</option>
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
                                <textarea class="form-control form-control-sm address"
                                    name="address" id="address" rows="2"
                                    placeholder="Enter Supplier Address Here ..."></textarea>
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
    <script>
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
            /*  Add Supplier */
            $('#AddCustomer').click(function () {
                $('#CustomerSave').val("create-customer");
                $('#CustomerForm').trigger("reset");
                $('#CustomerSave').html("Save");
                $('#ModalHeader').html("Add <small>( Supplier Information )</small>");
                $('#CustomerModal').modal('show');
            });
            /* Edit Supplier */
            $('body').on('click', '#EditCustomer', function () {
                var id = $(this).data('id');
                $.get('edit/' + id , function (data) {
                    $('#ModalHeader').html("Edit <small>( Supplier Information )</small>");
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
            /* Delete Supplier */
            $('body').on('click', '.DeleteCustomer', function () {
                var id = $(this).data("id");
                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You Want to Delete this Supplier ??",
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
                            type: "get",
                            url: "{{ url('supplier/destroy') }}"+'/'+id,
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
                                        title: ' Supplier Information Deleted Successfully. '
                                    })
                                });
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) { swalWithBootstrapButtons.fire(
                        ' Canceled ',
                        ' Supplier Delete Canceled.. ',
                        'warning'
                    )};
                });
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
                    var actionType = $('#CustomerSave').val();
                    $('#CustomerSave').html('Submitting...');
                    if (actionType == "create-customer") {
                        $.ajax({
                            url: "{{ route('supplier.store') }}",
                            type: "POST",
                            dataType: 'json',
                            data: $('#CustomerForm').serialize(),
                            success: function (data)
                            {
                            var user = '<tr id="customer_id_' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.phone + '</td><td>' + data.category + '</td><td>' + data.balance + '</td><td>' + data.address + '</td>';
                                user += '<td><a href="javascript:void(0)" id="EditCustomer" data-id="' + data.id + '" class="btn btn-primary btn-xs"><i class="fas fa-edit"></i></a> ';
                                user += '<a href="javascript:void(0)" id="DeleteCustomer" data-id="' + data.id + '" class="DeleteCustomer btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i></a></td></tr>';
                                $('#example1').prepend(user);
                                $('#CustomerForm').trigger("reset");
                                $('#CustomerModal').modal('hide');
                                $('#CustomerSave').html('Save');
                                $(function() {
                                    Toast.fire({
                                    type: 'success',
                                    title: ' Supplier Information Added Successfully. '
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
                            url: "{{ route('supplier.update') }}",
                            type: "POST",
                            dataType: 'json',
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
                            var user = '<tr id="customer_id_' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.phone + '</td><td>' + data.category + '</td><td>' + data.balance + '</td><td>' + data.address + '</td>';
                                user += '<td><a href="javascript:void(0)" id="EditCustomer" data-id="' + data.id + '" class="btn btn-primary btn-xs"><i class="fas fa-edit"></i></a> ';
                                user += '<a href="javascript:void(0)" id="DeleteCustomer" data-id="' + data.id + '" class="DeleteCustomer btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i></a></td></tr>';
                                $("#customer_id_" + data.id).replaceWith(user);
                                $('#CustomerForm').trigger("reset");
                                $('#CustomerModal').modal('hide');
                                $('#CustomerSave').html('Save');
                                $(function() {
                                    Toast.fire({
                                    type: 'success',
                                    title: ' Supplier Information Updated Successfully. '
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

@endsection
