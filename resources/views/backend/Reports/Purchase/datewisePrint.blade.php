@extends('layouts.master')
@section('title')
    Datewise Sales Report Print
@endsection
@section('content')

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

<div class="content-wrapper p-0 m-0">

    <section class="content p-0 m-0">
        <div class="row">
            <div class="col-lg-12 m-0">
                <div class="card m-0">
                    <div class="col-lg-12">
                        <div class="row">
                            <h3 class="col-lg-6">Datewise Sales Report</h3>
                            <div class="col-lg-6">
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
                    <!-- <div class="card-header text-center p-0 m-0">
                        <h3>Datewise Purchase Report</h3>
                    </div> -->

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Date</th>
                                <th>Purchase No.</th>
                                <th>Supplier</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-right">SubTotal (Tk.)</th>
                                <th class="text-right">Discount (Tk.)</th>
                                <th class="text-right">Payable (Tk.)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($purchases as $data)
                            <tr>
                                <td>{{ $i++ }}.</td>
                                <td>{{ \Carbon\Carbon::parse($data->date)->isoFormat('D/MM/YYYY') }}</td>
                                <td>{{ $data->purchase_no }}</td>
                                <td>{{ !empty($data->supplier) ? $data->supplier : 'Cash Purchase' }}</td>
                                <td class="text-center">{{ $data->total_qty }}</td>
                                <td class="text-right">{{ $data->sub_total }}</td>
                                <td class="text-right">{{ $data->discount }} {{ $data->disc_type == 1 ? '%' : '৳' }}</td>
                                <td class="text-right">{{ $data->payable }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                         <tfoot>
                            <tr>
                                <td class="text-right" colspan="4"><b>Total : </b></td>
                                <td class="text-center"><b>{{ $tQty }}</b></td>
                                <td class="text-right"><b>{{ $tSub }}</b></td>
                                <td class="text-right"><b>{{ $tDis }}</b></td>
                                <td class="text-right"><b>{{ $tPay }}</b></td>
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

    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>

@endsection
