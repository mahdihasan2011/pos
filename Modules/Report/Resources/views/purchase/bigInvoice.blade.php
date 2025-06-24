@extends('layouts.master')
@section('title')
    Purchase Invoice
@endsection
@section('content')
<div class="content-wrapper">

    <section class="content pt-2">
        <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                {{--  <div class="callout callout-info">
                  <h5><i class="fas fa-info"></i> Note:</h5>
                  This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                </div>  --}}
                <div class="invoice p-3">
                  <div class="row">
                    <div class="col-lg-12">
                      <h4>
                        <img src="{{ asset($company->logo) }}" alt="Company Logo" style="height: 50px;">
                        <small class="float-right">
                            <a href="{{ route('purchase.report.invoice.print',['id'=>$purchases->purchase_no]) }}"
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
                          <strong>{{ !empty($purchases->customer) ? $purchases->customer : "Cash Purchase" }}</strong><br>
                          {{ !empty($purchases->address) ? "Address : ".$purchases->address : "" }}<br>
                          {{ !empty($purchases->phone) ? "Phone : ".$purchases->phone : "" }}<br>
                          {{ !empty($purchases->email) ? "Email : ".$purchases->email : "" }}<br>
                        </address>
                    </div>
                    <div class="col-sm-4 invoice-col">
                        <b>Invoice No # {{ $purchases->purchase_no }}</b><br><br>
                        <b>Purchase Date :</b> {{ \Carbon\Carbon::parse($purchases->date)->isoFormat('D/MM/YYYY') }}<br>
                        <b>Bill Account : {{ $purchases->payable }} Tk.</b>
                    </div>
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
                    <div class="col-lg-8">
                      {{--  <p class="lead">Payment Methods:</p>
                      <img src="../../dist/img/credit/visa.png" alt="Visa">
                      <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                      <img src="../../dist/img/credit/american-express.png" alt="American Express">
                      <img src="../../dist/img/credit/paypal2.png" alt="Paypal">  --}}

{{--                      @foreach ($company as $data)--}}
{{--                      @if ($data->invoice_note != null)--}}
{{--                      <p class="lead">Company Policy :</p>--}}
{{--                      <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">--}}
{{--                        {{ $data->invoice_note }}--}}
{{--                      </p>--}}
{{--                      @endif--}}
{{--                      @endforeach--}}
                    </div>
                    <div class="col-lg-4">
                      {{--  <p class="lead">Amount Due 2/22/2014</p>  --}}

                      <div class="table-responsive">
                        <table class="table">
                          <tr>
                            <th style="width:50%">Total Quantity :</th>
                            <td>{{ $purchases->total_qty }}</td>
                          </tr>
                          <tr>
                            <th>SubTotal : (Tk.)</th>
                            <td>{{ $purchases->sub_total }}</td>
                          </tr>
                          @if (!empty($purchases->discount))
                          <tr>
                            <th>Discount :</th>
                            <td>
                                {{ $purchases->discount }}
                                {{ ($purchases->disc_type = 1) ? '%' : 'Tk' }}
                            </td>
                          </tr>
                          @endif
                          @if (!empty($purchases->payable))
                          <tr>
                            <th>Payable : (Tk.)</th>
                            <td>{{ $purchases->payable }}</td>
                          </tr>
                          @endif
                          @if (!empty($purchases->paid))
                          <tr>
                            <th>Paid : (Tk.)</th>
                            <td>{{ $purchases->paid }}</td>
                          </tr>
                          @endif
                          @if (!empty($purchases->due))
                          <tr>
                            <th>Due : (Tk.)</th>
                            <td>{{ $purchases->due }}</td>
                          </tr>
                          @endif
                          @if (!empty($purchases->return))
                          <tr>
                            <th>Return : (Tk.)</th>
                            <td>{{ $purchases->return }}</td>
                          </tr>
                          @endif
                      </div>
                    </div>
                  </div>

                    {{--  <div class="row no-print">
                        <div class="col-lg-12">
                        <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                        <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                            Payment
                        </button>
                        <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                            <i class="fas fa-download"></i> Generate PDF
                        </button>
                        </div>
                    </div>  --}}
                </div>
              </div>
            </div>
        </div>
    </section>

</div>

@endsection
