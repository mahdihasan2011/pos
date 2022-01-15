@extends('layouts.master')
@section('title')
    Type
@endsection
@section('content')
<div class="content-wrapper">

    <section class="content pt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Type <small>( List )</small></h3>
                        <button class="btn btn-primary btn-sm" type="button" style="float:right;"
                            data-toggle="modal" data-target="#add-modal-sm">Add Type
                        </button>

                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Type Name</th>
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
                                        <button type="button" value="{{ $data->id }}"
                                            class="btn btn-primary edIT btn-xs"
                                            data-toggle="modal" data-target="#edit-modal-sm">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger NewDelete btn-xs"
                                            value="{{ $data->id }}"><i class="fas fa-trash-alt"></i>
                                        </button>
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
                    <h4 class="modal-title">Add Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="adD">@csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Type Name</label>
                            <input id="name" class="form-control form-control-sm"
                                type="text" placeholder="Type Name" required>
                        </div>
                        <div class="form-group">
                            <label for="details">Type Details</label>
                            <input id="details" class="form-control form-control-sm"
                                type="text" placeholder="Type Details">
                        </div>
                    </div>
                    <div class="modal-footer justify -content-between">
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
                    <h4 class="modal-title">Edit Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updatE">@csrf
                    <div class="modal-body">
                        <input class="id" type="hidden"/>
                        <div class="form-group">
                            <label for="name">Type Name</label>
                            <input class="form-control form-control-sm name"
                                type="text" placeholder="Type Name" required>
                        </div>
                        <div class="form-group">
                            <label for="details">Type Details</label>
                            <input class="form-control form-control-sm details"
                                type="text" placeholder="Type Details">
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
    $(function() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
            },buttonsStyling: false
        })
        $('.NewDelete').click(function() {
            var id = $(this).val();
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You Want to Delete this Type ??",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: ' Yes, delete it ! ',
                cancelButtonText: ' No, cancel ! ',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                swalWithBootstrapButtons.fire(
                    ' Deleted ! ',
                    ' Type has been Deleted Successfully.',
                    'success'
                )
                $.ajax({
                    url: "{{ route('type.destroy') }}",
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
                    ' Type has not Deleted. ',
                    'error'
                )};
            });
        });
    });

    $(document).ready(function () {
        $('#adD').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('type.store') }}",
                data: {
                    '_token'    : $('input[name=_token]').val(),
                    'name'      : $("#name").val(),
                    'details'   : $("#details").val(),
                },
                success: function () {
                    $('#add-modal-sm').modal('hide');
                    {{--  $('#example1').DataTable().ajax.reload();  --}}
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $(function() {
                        Toast.fire({
                        type: 'success',
                        title: '&nbsp; Type Added Successfully. '
                        })
                    });
                    setTimeout(function(){
                        location.reload();
                    }, 3000);
                },
                error: function (error) {
                    console.log(error);
                    alert('Data Not Saved');
                }
            });
        });
        $('.edIT').on('click', function () {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{ route('type.edit') }}",
                data: {id: id},
                success: function (data) {
                    $('.id').val(data[0]['id']);
                    $('.name').val(data[0]['name']);
                    $('.details').val(data[0]['details']);
                }
            });
        });
        $('#updatE').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('type.update') }}",
                data: {
                    '_token'    : $('input[name=_token]').val(),
                    'id'        : $(".id").val(),
                    'name'      : $(".name").val(),
                    'details'   : $(".details").val(),
                },
                success: function () {
                    $('#edit-modal-sm').modal('hide');
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 2500
                    });
                    $(function() {
                        Toast.fire({
                        type: 'info',
                        title: '&nbsp; Type Updated Successfully. '
                        })
                    });
                    setTimeout(function(){
                        location.reload();
                    }, 2000);
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
