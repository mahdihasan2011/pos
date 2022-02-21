@extends('layouts.master')
@section('title','Expenses')
@section('content')
<div class="content-wrapper">

    <section class="content pt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Expense <small>( List )</small></h3>
                        @can('expense_create')
                        <button class="btn btn-primary btn-sm float-right" type="button" data-toggle="modal" data-target="#add-modal-sm"><i class="fas fa-plus-circle"></i> New Expense</button>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Comment</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($data as $data)
                                <tr>
                                    <td>{{ $i++ }}.</td>
                                    <td>{{ \Carbon\Carbon::parse($data->date)->isoFormat('D/MM/YYYY') }}</td>
                                    <td>{{ $data->expense_type }}</td>
                                    <td>{{ $data->amount }}</td>
                                    <td>{{ $data->comment }}</td>
                                    <td class="project-actions text-center">
                                        @can('expense_update')
                                        <button type="button" value="{{ $data->id }}" class="btn btn-primary edIT btn-xs" data-toggle="modal" data-target="#edit-modal-sm">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        @endcan
                                        @can('expense_delete')
                                        <button class="btn btn-danger NewDelete btn-xs" value="{{ $data->id }}"><i class="fas fa-trash-alt"></i>
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
                    <h4 class="modal-title">Add Expense</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="adD">@csrf
                    <div class="modal-body">
                        @can('expense_date')
                        <div class="form-group">
                            <label for="date">Date <span class="text-secondary">*</span></label>
                            <input type="date" value="{{ $today }}" id="date" class="form-control form-control-sm" required/>
                        </div>
                        @endcan
                        <div class="form-group">
                            <label for="type">Type <span class="text-secondary">*</span></label>
                            <select id="type" class="form-control form-control-sm select2" required>
                                <option value="">Select Expense Type</option>
                                @foreach($expense_types as $expenses)
                                <option value="{{ $expenses->id }}">{{ $expenses->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount <span class="text-secondary">*</span></label>
                            <input id="amount" class="form-control form-control-sm" type="number" placeholder="Expense Amount" required>
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <input id="comment" class="form-control form-control-sm" type="text" placeholder="Expense Comment">
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
                    <h4 class="modal-title">Edit Expense</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updatE">@csrf
                    <div class="modal-body">
                        <input class="id" type="hidden"/>
                        @can('expense_date')
                        <div class="form-group">
                            <label for="date">Date <span class="text-secondary">*</span></label>
                            <input type="date" class="form-control form-control-sm date" />
                        </div>
                        @endcan
                        <div class="form-group">
                            <label for="type">Type <span class="text-secondary">*</span></label>
                            <select class="form-control form-control-sm select2 type" required>
                                <option value="">Select Expense Type</option>
                                @foreach($expense_types as $expenses)
                                    <option value="{{ $expenses->id }}">{{ $expenses->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount <span class="text-secondary">*</span></label>
                            <input class="form-control form-control-sm amount" type="number" placeholder="Expense Amount" required>
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <input class="form-control form-control-sm comment" type="text" placeholder="Expense Comment">
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
                text: "You Want to Delete this Expense ??",
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
                    ' Expense has been Deleted Successfully.',
                    'success'
                )
                $.ajax({
                    url: "{{ route('expense.destroy') }}",
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
                    ' Expense has not Deleted. ',
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
                url: "{{ route('expense.store') }}",
                data: {
                    '_token'   : $('input[name=_token]').val(),
                    'date'     : $("#date").val(),
                    'type'     : $("#type").val(),
                    'amount'   : $("#amount").val(),
                    'comment'  : $("#comment").val(),
                },
                success: function () {
                    $("#adD").trigger("reset");
                    $(".expensesave").attr('disabled', false);
                    $(".expensesave").html('Save');
                    $('#add-modal-sm').modal('hide');
                    {{--  $('#example1').DataTable().ajax.reload();  --}}
                    $(function() {
                        Toast.fire({
                        type: 'success',
                        title: '&nbsp; Expense Added Successfully. '
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
                url: "{{ route('expense.edit') }}",
                data: {id: id},
                success: function (data) {
                    $('.id').val(data[0]['id']);
                    $('.date').val(data[0]['date']);
                    $('.type').val(data[0]['type']).change();
                    $('.amount').val(data[0]['amount']);
                    $('.comment').val(data[0]['comment']);
                }
            });
        });
        $('#updatE').on('submit', function (e) {
            $(".expenUp").attr('disabled', true);
            $(".expenUp").html('Updating...');
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('expense.update') }}",
                data: {
                    '_token'    : $('input[name=_token]').val(),
                    'id'        : $(".id").val(),
                    'date'      : $(".date").val(),
                    'type'      : $(".type").val(),
                    'amount'    : $(".amount").val(),
                    'comment'   : $(".comment").val(),
                },
                success: function () {
                    $(".expenUp").attr('disabled', false);
                    $(".expenUp").html('Update');
                    $('#edit-modal-sm').modal('hide');
                    $(function() {
                        Toast.fire({
                        type: 'info',
                        title: '&nbsp; Expense Updated Successfully. '
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
