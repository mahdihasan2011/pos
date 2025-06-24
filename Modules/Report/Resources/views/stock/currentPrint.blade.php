@extends('layouts.master')
@section('title')
    Current Stock Report Print
@endsection
@section('customCSS')

    <style type="text/css">
        @media print {
            @page {
                size: auto;
            }
            .header {
                display: none;
            }
            .main-footer {
                display: none;
            }
            .content {
                margin: 0px;
                padding: 0px;
            }
            .content-wrapper {
                margin: 0px;
                padding: 0px;
            }
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper p-0 m-0">

        <section class="content p-0 m-0">
            <div class="row">
                <div class="col-lg-12 m-0">
                    <div class="card m-0">
                        <div class="col-lg-12">
                            <div class="row">
                                <h3 class="col-lg-6" style="width: 50%;">Current Stock Report</h3>
                                <div class="col-lg-6" style="width: 50%;">
                                    <img class="" src="{{ asset($company->logo) }}" alt="Company Logo"
                                         style="height: 50px; float: left;">
                                    <address class="col-lg-10" style="float: right;">
                                        <strong>{{ !empty($company->title) ? $company->title : "" }}</strong><br>
                                        {{ !empty($company->address) ? "Address : ".$company->address : "" }}<br>
                                        {{ !empty($company->phone) ? "Phone : ".$company->phone : "" }}<br>
                                        {{ !empty($company->email) ? "Email : ".$company->email : "" }}<br>
                                        {{ !empty($company->website) ? "Website : ".$company->website : "" }}
                                    </address>
                                </div>
                            </div>
                        </div>

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Product Description</th>
                                <th class="text-center">P.&nbsp;Qty.</th>
                                <th class="text-center">Stock&nbsp;Qty.</th>
                                <th class="text-right">P.&nbsp;Price (Tk.)</th>
                                <th class="text-right">Total&nbsp;P.&nbsp;Price (Tk.)</th>
                                <th class="text-right">Sale&nbsp;Price (Tk.)</th>
                                <th class="text-right">Total&nbsp;S.&nbsp;Price (Tk.)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                                $t = 0;
                                $tq = 0;
                                $toc = 0;
                                $top = 0;
                                $totalc = 0;
                                $totalp = 0;
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
                                    <td class="text-center">{{ $t = $purchase_qty->qty }}</td>
                                    <td class="text-center">{{ $data->quantity }}</td>
                                    <td class="text-right">{{ $data->cost }}</td>
                                    <td class="text-right">{{ $toc = $purchase_qty->qty * $data->cost }}</td>
                                    <td class="text-right">{{ $data->price }}</td>
                                    <td class="text-right">{{ $top = $data->quantity * $data->price }}</td>
                                </tr>
                            @php
                                $tq += $t;
                                $totalc += $toc;
                                $totalp += $top;
                            @endphp
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="text-right" colspan="2">Total : </th>
                                <th class="text-center">{{ $tq }}</th>
                                <th class="text-right">{{ $sQty }}</th>
                                <th></th>
                                <th class="text-right">{{ $totalc }}</th>
                                <th></th>
                                <th class="text-right">{{ $totalp }}</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="navbar-fixed-bottom">
                            <div style="float: left;">
                                Developed By https://mahdi.infrequentbd.com
                            </div>
                            <div style="float: right;">
                                <?php echo "Printing Time: " . date("D, d M Y h:i:s a"); ?>
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
        window.addEventListener("load", window.print());
    </script>
@endsection
