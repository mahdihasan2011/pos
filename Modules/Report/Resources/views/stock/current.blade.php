@extends('layouts.master')
@section('title', 'Current Stock Report')
@section('content')
<div class="content-wrapper">
    <section class="content pt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{ __('Stock Report') }} <small>( {{ __('Current') }} )</small>
                            </h3>
                            <form action="{{ route('stock.report.current.print') }}" method="GET" target="_blank">
                                @csrf
                                <button class="btn btn-info float-right" type="submit">
                                    <i class="fas fa-print"></i>
                                </button>
                            </form>
                        </div>
                        <div class="card-body">
                            <table id="example4" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th><i class="fas fa-hashtag"></i></th>
                                    <th>Product Description</th>
                                    <th class="text-center">P.&nbsp;Qty.</th>
                                    <th class="text-center">Stock&nbsp;Qty.</th>
                                    <th class="text-right">P.&nbsp;Price (Tk.)</th>
                                    <th class="text-right">Total&nbsp;P.&nbsp;Price (Tk.)</th>
                                    <th class="text-right">Sale&nbsp;Price (Tk.)</th>
                                    <th class="text-right">Total&nbsp;S.&nbsp;Price (Tk.)</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th colspan="2" class="text-right">Total : </th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                    <th></th>
                                    <th class="text-right"></th>
                                    <th></th>
                                    <th class="text-right"></th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach ($current_st as $data)
                                    @php
                                        $purchase_qty = \Illuminate\Support\Facades\DB::table('purchase_items')
                                                    ->selectRaw('SUM(quantity) as qty')
                                                    ->where('product_id', $data->product_id)
                                                    ->first();
                                    @endphp
                                    <tr>
                                        <td></td>
                                        <td>{{ $data->product }} ({{ $data->code }})</td>
                                        <td data-sort="{{ $purchase_qty->qty }}" class="text-center">{{ $purchase_qty->qty }}</td>
                                        <td data-sort="{{ $data->quantity }}" data-sort="{{ $data->quantity }}" class="text-center">{{ $data->quantity }}</td>
                                        <td data-sort="{{ $data->cost }}" class="text-right">{{ $data->cost }}</td>
                                        <td data-sort="{{ $purchase_qty->qty * $data->cost }}" class="text-right">{{ $purchase_qty->qty * $data->cost }}</td>
                                        <td data-sort="{{ $data->price }}" class="text-right">{{ $data->price }}</td>
                                        <td data-sort="{{ $data->quantity * $data->price }}" class="text-right">{{ $to = $data->quantity * $data->price }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('customJs')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example4').DataTable({
                "responsive": true,
                "autoWidth": false,
                // "order": [[ 0, 'false' ]],
                // "ordering": false,
                // "order": [],
                // "columnDefs": [ {
                //     "targets"  : 'no-sort',
                //     "ordering": false,
                // }],
                // "ordering": false,
                "columnDefs": [{
                    "targets": 1,
                    "orderable": false,
                }],
                "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    var index = iDisplayIndexFull + 1;
                    $("td:first", nRow).html(index);
                    return nRow;
                },
                /*initComplete: function () {
                    this.api().columns([1]).every( function () {
                        var column = this;
                        var select = $('<select style="bor der: hidden; color: blue; font-weight: bolder;" title="{{ __('Select Product') }}"><option value="">--{{ __('Select Product') }}--</option></select>')
                            .appendTo( $(column.header()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            });
                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        });
                    });
                },*/
                "footerCallback": function(row, data, start, end, display) {
                    var api = this.api();
                    api.columns([2,3], {
                        page: 'current'
                    }).every(function() {
                        var sum = this
                            .nodes()
                            .reduce(function(a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat($(b).attr('data-sort')) || 0;
                                return parseFloat(x + y);
                            }, 0);
                        $(this.footer()).html(sum);
                    });
                    api.columns([5,7], {
                        page: 'current'
                    }).every(function() {
                        var sum = this
                            .nodes()
                            .reduce(function(a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat($(b).attr('data-sort')) || 0;
                                // return x + y;
                                return parseFloat(x + y).toFixed(2);
                                // result.toFixed(2)
                            }, 0);
                        $(this.footer()).html(sum);
                    });
                }
            });
        });
    </script>

@endsection
