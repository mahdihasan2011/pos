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
                        <img src="{{ asset($company->logo) }}" alt="Company Logo" style="height: 50px;">
                        <small class="float-right">
                            <a href="{{ route('sales.report.invoice.print',['id'=>$sales->sale_no]) }}"
                              target="_blank" class="btn btn-primary btn-sm" title="Print Invoice">
                                Print <i class="fas fa-print"></i>
                            </a>
                        </small>
                      </h4>
                    </div>
                  </div>
                  <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        From
                        <address>
                            <strong>{{ !empty($company->title) ? $company->title : "" }}</strong><br>
                            {{ !empty($company->address) ? "Address : ".$company->address : "" }}<br>
                            {{ !empty($company->phone) ? "Phone : ".$company->phone : "" }}<br>
                            {{ !empty($company->email) ? "Email : ".$company->email : "" }}<br>
                            {{ !empty($company->website) ? "Website : ".$company->website : "" }}
                        </address>
                    </div>
                    <div class="col-sm-4 invoice-col">
                        To
                        <address>
                          <strong>{{ !empty($sales->customer) ? $sales->customer : "Guest Sale" }}</strong><br>
                          {{ !empty($sales->address) ? "Address : ".$sales->address : "" }}<br>
                          {{ !empty($sales->phone) ? "Phone : ".$sales->phone : "" }}<br>
                          {{ !empty($sales->email) ? "Email : ".$sales->email : "" }}<br>
                        </address>
                    </div>
                    <div class="col-sm-4 invoice-col">
                        <b>Invoice No # {{ $sales->sale_no }}</b><br>
                        <b>Sale Date :</b> {{ \Carbon\Carbon::parse($sales->date)->isoFormat('D/MM/YYYY') }}<br>
                        <b>Bill Account : {{ $sales->payable }} Tk.</b>
                    </div>
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
                      @if ($company->invoice_note != null)
                      <p class="lead">Company Policy :</p>
                      <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        {{ $company->invoice_note }}
                      </p>
                      @endif
                    </div>
                    <div class="col-lg-4">

                      <div class="table-responsive">
                        <table class="table">
                          <tr>
                            <th style="width:50%">Total Quantity :</th>
                            <td>{{ $sales->total_qty }}</td>
                          </tr>
                          <tr>
                            <th>SubTotal : (Tk.)</th>
                            <td>{{ $sales->sub_total }}</td>
                          </tr>
                          @if (!empty($sales->discount))
                          <tr>
                            <th>Discount :</th>
                            <td>
                                {{ $sales->discount }}
                                {{ ($sales->disc_type = 1) ? '%' : 'Tk' }}
                            </td>
                          </tr>
                          @endif
                          @if (!empty($sales->vat))
                          <tr>
                            <th>Vat : (Tk.)</th>
                            <td>{{ $sales->vat }}</td>
                          </tr>
                          @endif
                          @if (!empty($sales->payable))
                          <tr>
                            <th>Payable : (Tk.)</th>
                            <td>{{ $sales->payable }}</td>
                          </tr>
                          @endif
                          @if (!empty($sales->paid))
                          <tr>
                            <th>Paid : (Tk.)</th>
                            <td>{{ $sales->paid }}</td>
                          </tr>
                          @endif
                          @if (!empty($sales->due))
                          <tr>
                            <th>Due : (Tk.)</th>
                            <td>{{ $sales->due }}</td>
                          </tr>
                          @endif
                          @if (!empty($sales->return))
                          <tr>
                            <th>Return : (Tk.)</th>
                            <td>{{ $sales->return }}</td>
                          </tr>
                          @endif
                        </table>
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
