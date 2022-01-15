@extends('layouts.master')
@section('title')
    Sales Invoice 
@endsection
@section('content')
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
                        <img src="{{ asset($data->logo) }}" alt="Company Logo" style="height: 50px;">
                        {{ $data->title }}
                        @endforeach
                        <small class="float-right">
                            @foreach ($sales as $data)
                            <a href="{{ route('sales.report.invoice.print',['id'=>$data->sale_no]) }}" 
                              target="_blank" class="btn btn-primary btn-sm" title="Print Invoice">
                                Print <i class="fas fa-print"></i>
                            </a>
                            @break
                            @endforeach
                        </small>
                      </h4>
                    </div>
                  </div>
                  <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        From
                        @foreach ($company as $data)
                        <address>
                            <strong>{{ $data->name }}</strong><br>
                            @if ($data->address != null) {{ $data->address }} @endif<br>
                            @if ($data->phone != null) Phone : {{ $data->phone }} @endif<br>
                            @if ($data->email != null) Email : {{ $data->email }} @endif
                            @if ($data->website != null) Website : {{ $data->website }} @endif
                        </address>
                        @endforeach
                    </div>
                    @foreach ($sales as $data)
                    <div class="col-sm-4 invoice-col">
                        To
                        <address>
                            @if ($data->customer != null) <strong>{{ $data->customer }}</strong><br>
                            @if ($data->address != null) {{ $data->address }} @endif<br>
                            @if ($data->phone != null) Phone : {{ $data->phone }} @endif<br>
                            @if ($data->email != null) Email : {{ $data->email }} @endif
                            @else <b>Cash</b>
                            @endif
                        </address>
                    </div>
                    <div class="col-sm-4 invoice-col">
                        <b>Invoice No # {{ $data->sale_no }}</b><br>
                        <br>
                        <b>Sale Date :</b> {{ $data->date }}<br>
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
                          <th>Sale Price</th>
                          <th>Quantity</th>
                          <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $sl = 1; @endphp
                            @foreach ($sales_dt as $data)
                            <tr>
                                <td>{{ $sl++ }}.</td>
                                <td>{{ $data->name }} ({{ $data->code }})</td>
                                <td>{{ $data->price }}</td>
                                <td>{{ $data->quantity }}</td>
                                <td>{{ $data->total }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
    
                  <div class="row">
                    <div class="col-lg-8">
                      @foreach ($company as $data)
                      @if ($data->invoice_note != null)
                      <p class="lead">Company Policy :</p>
                      <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        {{ $data->invoice_note }}
                      </p>
                      @endif
                      @endforeach
                    </div>
                    <div class="col-lg-4">
    
                      <div class="table-responsive">
                        @foreach ($sales as $data)
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
  
@endsection