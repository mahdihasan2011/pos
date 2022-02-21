@extends('layouts.master')
@section('title')
  Dashboard
@endsection
@section('content')
<div class="content-wrapper">

    <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-gradient-teal elevation-1">
                <i class="fas fa-cart-arrow-down"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Total Sales Due</span>
                <span class="info-box-number"><small>Tk. </small>{{ $sales_due }}</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-gradient-cyan elevation-1">
                <i class="fas fa-shopping-bag"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Total Purchase Due</span>
                <span class="info-box-number"><small>Tk. </small>{{ $purchase_due }}</span>
              </div>
            </div>
          </div>

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-gradient-gray elevation-1">
                <i class="fas fa-users"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Total Customers</span>
                <span class="info-box-number">{{ $customers }}</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-gradient-lightblue elevation-1">
                <i class="fa fa-users"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Total Suppliers</span>
                <span class="info-box-number">{{ $suppliers }}</span>
              </div>
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-primary">
              <!-- Loading (remove the following to stop the loading)-->
              {{-- <div class="overlay">
                <i class="fas fa-3x fa-sync-alt"></i>
              </div> --}}
              <!-- end loading -->
              <div class="inner">
                <h5>Tk. <b>{{ $today_sales }}</b>
                  {{-- <small>({{ $today_sales_qty }})</small> --}}
                {{-- <br><small>Quantity : {{ $today_sales_qty }}</small> --}}
                </h5>
                <p>Today Sales Amount</p>
              </div>
              <div class="icon">
                <i class="fas fa-cart-plus"></i>
              </div>
              <a href="#" class="small-box-footer">
                View Details <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
           <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-info">
              <div class="inner">
                <h5>Tk. <b>{{ $this_month_sale }}</b>
              </h5>
                <p>{{ $thisMonth }} Sale Amount</p>
              </div>
              <div class="icon">
                <i class="fas fa-cart-arrow-down"></i>
              </div>
              <a href="#" class="small-box-footer">
                View Details <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-orange">
              <div class="inner">
                <h5>Tk. <b>{{ $today_expense }}</b><br>
                </h5>
                <p>Today Expense Amount</p>
              </div>
              <div class="icon">
                <i class="fas fa-minus-circle"></i>
              </div>
              <a href="#" class="small-box-footer">
                View Details <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-success">
              <div class="inner">
                <h5>Tk. <b>000</b><br>
                </h5>
                <p>Gross Profit</p>
              </div>
              <div class="icon">
                <i class="fa fa-taka">৳</i>
              </div>
              <a href="#" class="small-box-footer">
                View Details <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-md-6">
            <div class="card collapsed-card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Sales Items</h3>
                <div class="card-tools">
                  {{-- <div class="card-tools pagination pagination-sm"> --}}
                    {{-- {{ $latest_items->links() }} --}}
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Description</th>
                      <th class="text-center">Quantity</th>
                      <th class="text-right">Price&nbsp;(Tk.)</th>
                      <th class="text-right">Total&nbsp;(Tk.)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <?php $i = 1; ?>
                      @foreach ($latest_items as $data)
                      <tr>
                        <td>{{ $i++ }}.</td>
                        <td>{{ $data->name }} ({{ $data->code }})</td>
                        <td class="text-center">{{ $data->MostSold }}</td>
                        <td class="text-right">{{ $data->price }}</td>
                        <td class="text-right">{{ $data->MostSold * $data->price }}</td>
                      </tr>
                      @endforeach
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer clearfix">
                <a href="{{ route('sales.report.datewise') }}" class="btn btn-sm btn-primary float-right">View All</a>
              </div>
            </div>
          </div>
            <div class="col-md-12">
                <div class="card">
<!--                    <div class="card-header border-transparent">
                        <h3 class="card-title">Months Sale & Purchase</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>-->
                    <div class="card-body p-0">
                        <div id="container"></div>
                    </div>
                </div>
            </div>
        </div>


      </div>
    </section>
    <!-- /.content -->
</div>
@endsection
@section('customJs')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script>
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Daily Sale & Purchase of {{ $thisMonth }}'
            },
            subtitle: {
                // text: 'Source: WorldClimate.com'
            },
            credits: {
                enabled: false
            },
            xAxis: {
                crosshair: true,
                // type: 'category'
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Amount (BDT)'
                }
            },
            legend: {
                enabled: true
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [
                {
                    name: 'Purchase',
                    data: [
                        @foreach ($purchaseData as $data)
                            {{ $data->payable }},
                        @endforeach
                    ]
                },
                {
                    name: 'Sale',
                    data: [
                        @foreach ($salesData as $data)
                            {{ $data->payable }},
                        @endforeach
                    ]
                },

            ]
        });
    </script>
@endsection
