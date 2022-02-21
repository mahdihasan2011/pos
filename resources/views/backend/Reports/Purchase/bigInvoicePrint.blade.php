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
                        <img src="{{ asset($company->logo) }}" alt="Company Logo" style="height: 50px;">
                      </h4>
                    </div>
                  </div>
                  <div class="row invoice-info">
                    <div class="col-lg-sm-4 invoice-col">
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
                        <b>Invoice No # {{ $purchases->purchase_no }}</b><br>
                        <br>
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
                    <div class="col-lg-7"></div>
                    <div class="col-lg-5">
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
                        </table>
                      </div>
                    </div>
                    <div class="col-lg-12 navbar-fixed-bottom">
                      <div style="float:left;">
                        Developed By https://mahdi.infrequentbd.com
                      </div>
                      <div style="float:right;">
                        @php echo "Printing Time: " . date("D, d M Y h:i:s a"); @endphp
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
