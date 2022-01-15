@extends('layouts.master')
@section('title')
    Purchase Invoice Print
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
        <div class="container-fluid p-0 m-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="invoice p-3">
                  <div class="row">
                    <div class="col-12">
                      <h4>
                        @foreach ($company as $data)
                        <img src="{{ asset($data->logo) }}" alt="Company Logo" style="height: 50px;">
                        {{ $data->title }}
                      </h4>
                    </div>
                  </div>
                  <div class="row invoice-info">
                    <div class="col-lg-sm-4 invoice-col">
                        From
                        <address>
                            <strong>{{ $data->name }}</strong><br>
                            @if ($data->address != null) {{ $data->address }} @endif<br>
                            @if ($data->phone != null) Phone : {{ $data->phone }} @endif<br>
                            @if ($data->email != null) Email : {{ $data->email }} @endif
                            @if ($data->website != null) Website : {{ $data->website }} @endif
                        </address>
                        @endforeach
                    </div>
                    @foreach ($purchases as $data)
                    <div class="col-sm-4 invoice-col">
                        To
                        <address>
                            @if ($data->supplier != null) <strong>{{ $data->supplier }}</strong><br>
                            @if ($data->address != null) {{ $data->address }} @endif<br>
                            @if ($data->phone != null) Phone : {{ $data->phone }} @endif<br>
                            @if ($data->email != null) Email : {{ $data->email }} @endif
                            @else <b>Cash</b>
                            @endif
                        </address>
                    </div>
                    <div class="col-sm-4 invoice-col">
                        <b>Invoice No # {{ $data->purchase_no }}</b><br>
                        <br>
                        <b>Purchase Date :</b> {{ $data->date }}<br>
                        <b>Bill Account : </b> {{ $data->payable }} Tk.
                    </div>
                    @break
                    @endforeach
                  </div>
    
                  <div class="row">
                    <div class="col-lg-12 table-responsive">
                      <table class="table table-striped">
                        <thead>
                        <tr>
                          <th>SL.</th>
                          <th>Description</th>
                          <th>Cost Price</th>
                          <th>Quantity</th>
                          <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $sl = 1; @endphp
                            @foreach ($purchase_dt as $data)
                            <tr>
                                <td>{{ $sl++ }}.</td>
                                <td>{{ $data->name }} ({{ $data->code }})</td>
                                <td>{{ $data->cost }}</td>
                                <td>{{ $data->quantity }}</td>
                                <td>{{ $data->total }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
    
                  <div class="row">
                    <div class="col-lg-7">
                      @foreach ($company as $data)
                      @if ($data->invoice_note != null)
                      <p class="lead">Company Policy :</p>
                      <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        {{ $data->invoice_note }}
                      </p>
                      @endif
                      @endforeach
                    </div>
                    <div class="col-lg-5">
                      <div class="table-responsive">
                        @foreach ($purchases as $data)
                        <table class="table">
                          <tr>
                            <th style="width:50%">Total Quantity :</th>
                            <td>{{ $data->total_qty }}</td>
                          </tr>
                          <tr>
                            <th>SubTotal : (Tk.)</th>
                            <td>{{ $data->sub_total }}</td>
                          </tr>
                          <tr>
                            <th>Discount :</th>
                            <td>
                                {{ $data->discount }}
                                @if ($data->disc_type = 1) %
                                @elseif ($data->disc_type = 2) Tk
                                @endif
                            </td>
                          </tr>
                          <tr>
                            <th>Payable : (Tk.)</th>
                            <td>{{ $data->payable }}</td>
                          </tr>
                          <tr>
                            <th>Paid : (Tk.)</th>
                            <td>{{ $data->paid }}</td>
                          </tr>
                          <tr>
                            <th>Due : (Tk.)</th>
                            <td>{{ $data->due }}</td>
                          </tr>
                          <tr>
                            <th>Return : (Tk.)</th>
                            <td>{{ $data->return }}</td>
                          </tr>
                        </table>
                        @break
                        @endforeach
                      </div>
                    </div>
                    <div class="col-lg-12 navbar-fixed-bottom">
                      <div style="float:left;">
                        Develop By {{ config('app.url') }}
                      </div>
                      <div style="float:right;">
                        <?php echo "Printing Time: " . date("D, d M Y h:i:s a"); ?>
                      </div>
                    </div>
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