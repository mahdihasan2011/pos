<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/master') }}/favicon.ico">
<title>{{ config('app.name') }} Invoice Print</title>

<head>
    <style type="text/css">
        @media print {
            @page {
                size: auto;
            }
        }
    </style>
</head>

<body>
<div class="content-wrapper">

    <section class="content pt-2">
        <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="invoice p-3">
                  <div class="row">
                    <div class="col-lg-12">
                      <h4>
                        @foreach ($company as $data)
                        <img src="{{ asset($data->logo) }}" alt="&nbsp; Company Logo"
                          style="height: 50px;">
                        {{ $data->title }}
                      </h4>
                    </div>
                  </div>
                  <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
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
                    <div class="col-lg-6">
                      @foreach ($company as $data)
                      @if ($data->invoice_note != null)
                      <p class="lead">Company Policy :</p>
                      <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        {{ $data->invoice_note }}
                      </p>
                      @endif
                      @endforeach
                    </div>
                    <div class="col-lg-6">
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
</body>
