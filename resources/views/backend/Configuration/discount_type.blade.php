@extends('layouts.master')
@section('title')
    Discount Type
@endsection
@section('content')
<div class="content-wrapper">

    <section class="content pt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Discount Type <small>( List )</small></h3>
                        @can('discount_type_create')
                        <button class="btn btn-primary btn-sm float-right" type="button" data-toggle="modal"
                                data-target="#add-modal-sm">Add New Discount Type
                        </button>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Category Name</th>
                                    <th>Type</th>
                                    <th>Discount ( % )</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($data as $data)
                                <tr>
                                    <td>{{ $i++ }}.</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->ctype }}</td>
                                    <td>{{ $data->amount }}</td>
                                    <td class="project-actions text-center">
                                        @can('discount_type_update')
                                        <button type="button" value="{{ $data->id }}"
                                            class="btn btn-primary edIT btn-xs"
                                            data-toggle="modal" data-target="#edit-modal-sm">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        @endcan
                                        @can('discount_type_delete')
                                        <button class="btn btn-danger NewDelete btn-xs"
                                            value="{{ $data->id }}"><i class="fas fa-trash-alt"></i>
                                        </button>
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

<!--Add modal Start-->
    <div class="modal fade" id="add-modal-sm">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Discount Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="adD">@csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Category  Name <span class="text-secondary">*</span></label>
                            <input name="name" class="form-control form-control-sm"
                                type="text" placeholder="Category Name" required>
                        </div>
                        <div class="form-group">
                            <label for="ctype">Type</label>
                            <select name="ctype" class="form-control form-control-sm">
                                <option value="Customer">Customer</option>
                                <option value="Supplier">Supplier</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="amount">Discount ( % ) <span class="text-secondary">*</span></label>
                            <input name="amount" class="form-control form-control-sm"
                                   type="number" placeholder="Discount ( % )" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!--Add modal Ends-->

<!--Edit modal Start-->
    <div class="modal fade" id="edit-modal-sm">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Discount Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updatE">@csrf
                    <div class="modal-body">
                        <input class="id" type="hidden"/>
                        <div class="form-group">
                            <label for="name">Category  Name <span class="text-secondary">*</span></label>
                            <input class="form-control form-control-sm name"
                                   type="text" placeholder="Category Name" required>
                        </div>
                        <div class="form-group">
                            <label for="ctype">Type</label>
                            <select class="form-control form-control-sm ctype">
                                <option value="Customer">Customer</option>
                                <option value="Supplier">Supplier</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="amount">Discount ( % ) <span class="text-secondary">*</span></label>
                            <input class="form-control form-control-sm amount"
                                   type="number" placeholder="Discount ( % )" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button>
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
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: true
    });
    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000
    });
    $(document).ready(function () {
        $('body').on('click', '.NewDelete', function () {
            var id = $(this).val();
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You Want to Delete this Discount Type ??",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: ' Yes, delete it ! ',
                cancelButtonText: ' No, cancel ! ',
                cancelButtonColor: 'orange',
                confirmButtonColor: 'green',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                $.ajax({
                    url: "{{ route('discount.type.destroy') }}",
                    type: 'GET',
                    data: { id: id, },
                    success: function (){
                        $(function() {
                            $("#example1").load(location + " #example1");
                            Toast.fire({
                                type: 'info',
                                title: '&nbsp; Discount Type has been Deleted. '
                            })
                        });
                    }
                });
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) { swalWithBootstrapButtons.fire(
                    ' Cancelled ',
                    ' Discount Type has not Deleted. ',
                    'error'
                )};
            });
        });
        $('#adD').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('discount.type.store') }}",
                data: {
                    '_token'    : $('input[name=_token]').val(),
                    'name'      : $('input[name=name]').val(),
                    'ctype'     : $('select[name=ctype]').val(),
                    'amount'    : $('input[name=amount]').val(),
                },
                success: function () {
                    $('#add-modal-sm').modal('hide');
                    $("#example1").load(location + " #example1");
                    $('#adD').trigger("reset");

                    $(function() {
                        Toast.fire({
                        type: 'success',
                        title: '&nbsp; Discount Type Added Successfully. '
                        })
                    });
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
        $('body').on('click', '.edIT', function () {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{ route('discount.type.edit') }}",
                data: {id: id},
                success: function (data) {
                    $('.id').val(data[0]['id']);
                    $('.name').val(data[0]['name']);
                    $('.ctype').val(data[0]['ctype']);
                    $('.amount').val(data[0]['amount']);
                }
            });
        });
        $('#updatE').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('discount.type.update') }}",
                data: {
                    '_token' : $('input[name=_token]').val(),
                    'id'     : $(".id").val(),
                    'name'   : $(".name").val(),
                    'ctype'  : $(".ctype").val(),
                    'amount' : $(".amount").val(),
                },
                success: function () {
                    $('#edit-modal-sm').modal('hide');
                    $('#updatE').trigger("reset");
                    $("#example1").load(location + " #example1");

                    $(function() {
                        Toast.fire({
                        type: 'info',
                        title: '&nbsp; Discount Type Updated Successfully. '
                        })
                    });
                },
                error: function (error) {
                    console.log(error);
                    alert('Data Not Saved');
                }
            });
        });
    });
</script>

@endsection
