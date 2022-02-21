@extends('layouts.master')
@section('title')
    Expense Type
@endsection
@section('content')
<div class="content-wrapper">

    <section class="content pt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Expense Type <small>( List )</small></h3>
                        @can('expense_type_create')
                        <button class="btn btn-primary btn-sm float-right" type="button"
                            data-toggle="modal" data-target="#add-modal-sm">Add New Expense Type
                        </button>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Name</th>
                                    <th>Details</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($data as $data)
                                <tr>
                                    <td>{{ $i++ }}.</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->details }}</td>
                                    <td class="project-actions text-center">
                                        @can('expense_type_update')
                                        <button type="button" value="{{ $data->id }}"
                                            class="btn btn-primary edIT btn-xs"
                                            data-toggle="modal" data-target="#edit-modal-sm">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        @endcan
                                        @can('expense_type_delete')
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
                    <h4 class="modal-title">Add Expense Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="adD">@csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name <span style="color:gray">*</span></label>
                            <input id="name" class="form-control form-control-sm" type="text"
                                placeholder="Expense Type Name" required>
                        </div>
                        <div class="form-group">
                            <label for="details">Details </label>
                            <input id="details" class="form-control form-control-sm"
                                type="text" placeholder="Expense Type Details" >
                        </div>
                    </div>
                    <div class="modal-footer justify -content-between">
                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm expensesave">Save</button>
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
                    <h4 class="modal-title">Edit Expense Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updatE">@csrf
                    <div class="modal-body">
                        <input class="id" type="hidden"/>
                        <div class="form-group">
                            <label for="name">Name <span style="color:gray">*</span></label>
                            <input class="form-control form-control-sm name"
                                type="text" placeholder="Expense Type Name" required>
                        </div>
                        <div class="form-group">
                            <label for="details">Details </label>
                            <input class="form-control form-control-sm details"
                                type="text" placeholder="Expense Type Details">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success btn-sm expenUp">Update</button>
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
    $(function() {
        $('body').on('click', '.NewDelete', function () {
            var id = $(this).val();
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You Want to Delete this Expense Type ??",
                type: 'question',
                showCancelButton: true,
                confirmButtonText: ' Yes, delete it ! ',
                cancelButtonText: ' No, cancel ! ',
                cancelButtonColor: 'orange',
                confirmButtonColor: 'green',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                swalWithBootstrapButtons.fire(
                    ' Deleted ! ',
                    ' Expense Type has been Deleted Successfully.',
                    'success'
                )
                $.ajax({
                    url: "{{ route('expense.type.destroy') }}",
                    type: 'GET',
                    data: { id: id, },
                    success: function (){
                        $("#example1").load(location + " #example1");
                    }
                });
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) { swalWithBootstrapButtons.fire(
                    ' Cancelled ',
                    ' Expense Type has not Deleted. ',
                    'error'
                )};
            });
        });
    });

    $(document).ready(function () {
        $('#adD').on('submit', function (e) {
            $(".expensesave").attr('disabled', true);
            $(".expensesave").html('Saving...');
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('expense.type.store') }}",
                data: {
                    '_token'    : $('input[name=_token]').val(),
                    'name'      : $("#name").val(),
                    'details'   : $("#details").val(),
                },
                success: function () {
                    $(".expensesave").attr('disabled', false);
                    $(".expensesave").html('Save');
                    $("#adD").trigger("reset");
                    $('#add-modal-sm').modal('hide');
                    {{--  $('#example1').DataTable().ajax.reload();  --}}
                    $(function() {
                        Toast.fire({
                        type: 'success',
                        title: '&nbsp; Expense Type Added Successfully. '
                        })
                    });
                    $("#example1").load(location + " #example1");
                },
                error: function (error) {
                    $(".expensesave").attr('disabled', false);
                    $(".expensesave").html('Save');
                    console.log(error);
                    alert('Data Not Saved');
                }
            });
        });
        $('body').on('click', '.edIT', function () {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{ route('expense.type.edit') }}",
                data: {id: id},
                success: function (data) {
                    $('.id').val(data[0]['id']);
                    $('.name').val(data[0]['name']);
                    $('.details').val(data[0]['details']);
                }
            });
        });
        $('#updatE').on('submit', function (e) {
            $(".expenUp").attr('disabled', true);
            $(".expenUp").html('Updating...');
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('expense.type.update') }}",
                data: {
                    '_token'    : $('input[name=_token]').val(),
                    'id'        : $(".id").val(),
                    'name'      : $(".name").val(),
                    'details'   : $(".details").val(),
                },
                success: function () {
                    $(".expenUp").attr('disabled', false);
                    $(".expenUp").html('Update');
                    $('#edit-modal-sm').modal('hide');
                    $(function() {
                        Toast.fire({
                        type: 'info',
                        title: '&nbsp; Expense Type Updated Successfully. '
                        })
                    });
                    $("#example1").load(location + " #example1");
                },
                error: function (error) {
                    $(".expenUp").attr('disabled', false);
                    $(".expenUp").html('Update');
                    console.log(error);
                    alert('Data Not Saved');
                }
            });
        });
    });
</script>

@endsection
