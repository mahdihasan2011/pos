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
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Description</th>
                                    <th class="text-center">P.&nbsp;Qty.</th>
                                    <th class="text-center">Stock&nbsp;Qty.</th>
                                    <th class="text-right">P.&nbsp;Price (Tk.)</th>
                                    <th class="text-right">Sale&nbsp;Price (Tk.)</th>
{{--                                    <th class="text-right">Total Price (Tk.)</th>--}}
                                    <th class="text-center"><i class="fa fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                    $to = 0;
                                    $total = 0;
                                @endphp
                                @foreach ($current_st as $data)
                                @php
                                $purchase_qty = \Illuminate\Support\Facades\DB::table('purchase_items')
                                            ->selectRaw('SUM(quantity) as qty')
                                            ->where('product_id', $data->product_id)
                                            ->first();
                                @endphp
                                <tr>
                                    <td>{{ $i++ }}.</td>
                                    <td>{{ $data->product }} ({{ $data->code }})</td>
                                    <td class="text-center">{{ $purchase_qty->qty }}</td>
                                    <td class="text-center">{{ $data->quantity }}</td>
                                    <td class="text-right">{{ $data->cost }}</td>
                                    <td class="text-right">{{ $data->price }}</td>
{{--                                    <td class="text-right">{{ $to = $data->quantity * $data->price }}</td>--}}
                                    <td class="text-center">
                                        @can('stock_adjustment')
                                        <button type="button" value="{{ $data->id }}" class="btn btn-primary btn-xs edIT" data-toggle="modal" data-target="#adjust-modal-sm">
                                            <i class="far fa-edit" data-toggle="tooltip" data-placement="top" title="Stock Adjustment"></i>
                                        </button>
                                        @endcan
                                        @can('stock_delete')
                                        <button class="btn btn-danger btn-xs stockdelete" data-toggle="tooltip" data-placement="top" title="Stock Remove" value="{{ $data->id }}">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                        @endcan
                                    </td>
                                </tr>
                                @php $total += $to @endphp
                                @endforeach
                            </tbody>
{{--                             <tfoot>--}}
{{--                                <tr>--}}
{{--                                    <th class="text-right" colspan="2">Total : </th>--}}
{{--                                    <td class="text-center"></td>--}}
{{--                                    <th class="text-center">{{ $tQty }}</th>--}}
{{--                                    <th class="text-right">{{ $tCst }}</th>--}}
{{--                                    <th class="text-right">{{ $tPrc }}</th>--}}
{{--                                    <th class="text-right">{{ $total }}</th>--}}
{{--                                    <td class="text-right"></td>--}}
{{--                                </tr>--}}
{{--                            </tfoot>--}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!--Adjustment modal Start-->
    <div class="modal fade" id="adjust-modal-sm">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Stock Adjustment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updatE">@csrf
                    <div class="modal-body">
                        <input class="id" type="hidden"/>
                        <div class="form-group">
                            <label for="quantity">Stock Quantity</label>
                            <input class="form-control form-control-sm quantity"
                                type="text" placeholder="Stock Quantity" required>
                        </div>
<!--                        <div class="form-group">
                            <label for="price">Purchase Price</label>
                            <input class="form-control form-control-sm cost"
                                type="text" placeholder="Purchase Price">
                        </div>-->
                        <div class="form-group">
                            <label for="price">Sale Price</label>
                            <input class="form-control form-control-sm price"
                                type="text" placeholder="Sale Price">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success btn-sm stockupdate">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!--Adjustment modal Ends-->

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
        timer: 2500
    });
    $(document).ready(function () {
        $('body').on('click', '.stockdelete', function () {
            var id = $(this).val();
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You want to remove this product from Stock ??",
                type: 'question',
                showCancelButton: true,
                confirmButtonText: ' Yes, remove it ! ',
                cancelButtonText: ' No, cancel ! ',
                cancelButtonColor: 'orange',
                confirmButtonColor: 'green',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                // swalWithBootstrapButtons.fire(
                //     ' Removed ! ',
                //     ' Product has been removed form stock successfully.',
                //     'success'
                // )
                $.ajax({
                    url: "{{ route('stock.destroy') }}",
                    type: 'GET',
                    data: { id: id, },
                    success: function (data){
                        $("#example1").load(location + " #example1");
                        $(function() {
                            Toast.fire({
                                type: data.type,
                                title: '&nbsp; '+data.message+'.'
                            })
                        });
                    }
                });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Toast.fire({
                        type: 'warning',
                        title: ' &nbsp; Product not removed from stock.'
                    })
                };
            });
        });
        $('body').on('click', '.edIT', function () {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{ route('stock.edit') }}",
                data: {id: id},
                success: function (data) {
                    $('.id').val(data[0]['id']);
                    $('.quantity').val(data[0]['quantity']);
                    $('.cost').val(data[0]['cost']);
                    $('.price').val(data[0]['price']);
                }
            });
        });
        $('#updatE').on('submit', function (e) {
            $(".stockupdate").html('Updating...');
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('stock.update') }}",
                data: {
                    '_token'    : $('input[name=_token]').val(),
                    'id'        : $(".id").val(),
                    'quantity'  : $(".quantity").val(),
                    'cost'      : $(".cost").val(),
                    'price'     : $(".price").val(),
                },
                success: function (data) {
                    $(".stockupdate").html('Update');
                    $('#adjust-modal-sm').modal('hide');
                    $(function() {
                        Toast.fire({
                            type: data.type,
                            title: ' &nbsp; '+data.message+''
                        })
                    });
                    // location.reload();
                    $("#example1").load(location + " #example1");
                    // $('#example1').DataTable().ajax.reload();
                },
                error: function (error) {
                    $(".stockupdate").html('Update');
                    $('#adjust-modal-sm').modal('hide');
                    $(function() {
                        Toast.fire({
                            type: 'error',
                            title: ' &nbsp;'+error+''
                        })
                    });
                }
            });
        });

    });
</script>

@endsection
