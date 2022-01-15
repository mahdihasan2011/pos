@extends('layouts.master')
@section('title')
    Current Stock
@endsection
@section('content')
<div class="content-wrapper">

    <section class="content pt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Stock List <small>( Current )</small></h3>
                        {{--  <button class="btn btn-primary btn-sm" type="button" style="float:right;"
                            data-toggle="modal" data-target="#add-modal-sm">Add Brand
                        </button>  --}}
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Description</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-right">Cost (Tk.)</th>
                                    <th class="text-right">Price (Tk.)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($current_st as $data)
                                <tr>
                                    <td>{{ $i++ }}.</td>
                                    <td>{{ $data->name }} ({{ $data->code }})</td>
                                    <td class="text-center">{{ $data->quantity }}</td>
                                    <td class="text-right">{{ $data->cost }}</td>
                                    <td class="text-right">{{ $data->price }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                             <tfoot>
                                <tr>
                                    <td class="text-right" colspan="2">Total : </td>
                                    <td class="text-center">{{ $tQty }}</td>
                                    <td class="text-right">{{ $tCst }}</td>
                                    <td class="text-right">{{ $tPrc }}</td>
                                </tr>
                            </tfoot>
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
                    <h4 class="modal-title">Add Brand</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="adD">@csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Brand Name</label>
                            <input id="name" class="form-control form-control-sm"
                                type="text" placeholder="Brand Name" required>
                        </div>
                        <div class="form-group">
                            <label for="details">Brand Details</label>
                            <input id="details" class="form-control form-control-sm"
                                type="text" placeholder="Brand Details">
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
                    <h4 class="modal-title">Edit Brand</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updatE">@csrf
                    <div class="modal-body">
                        <input class="id" type="hidden"/>
                        <div class="form-group">
                            <label for="name">Brand Name</label>
                            <input class="form-control form-control-sm name"
                                type="text" placeholder="Brand Name" required>
                        </div>
                        <div class="form-group">
                            <label for="details">Brand Details</label>
                            <input class="form-control form-control-sm details"
                                type="text" placeholder="Brand Details">
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
                text: "You Want to Delete this Brand ??",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: ' Yes, delete it ! ',
                cancelButtonText: ' No, cancel ! ',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                swalWithBootstrapButtons.fire(
                    ' Deleted ! ',
                    ' Brand has been Deleted Successfully.',
                    'success'
                )
                $.ajax({
                    url: "{{ route('brand.destroy') }}",
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
                    ' Brand has not Deleted. ',
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
                url: "{{ route('brand.store') }}",
                data: {
                    '_token'    : $('input[name=_token]').val(),
                    'name'      : $("#name").val(),
                    'details'   : $("#details").val(),
                },
                success: function () {
                    $('#add-modal-sm').modal('hide');
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    $(function() {
                        Toast.fire({
                        type: 'success',
                        title: '&nbsp; Brand Added Successfully. '
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
                url: "{{ route('brand.edit') }}",
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
                url: "{{ route('brand.update') }}",
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
                        title: '&nbsp; Brand Updated Successfully. '
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
