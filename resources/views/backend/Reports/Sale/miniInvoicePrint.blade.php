<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        .text {
            text-align: center;
            font-family: monospace;
        }

        .left-align {
            float: left;
        }

        .tbl {
            padding-right: 10px;
            width: 10px;
            float: left;
            text-align: right;
            font-family: monospace;
        }

        .tbl1 {
            padding-left: 10px;
            padding-right: 10px;
            width: 100px;
            float: left;
            text-align: left;
            font-family: monospace;
        }

        .tbl2 {
            width: 60px;
            float: left;
            text-align: right;
            font-family: monospace;
        }

        .tbl3 {
            width: 40px;
            float: left;
            text-align: center;
            font-family: monospace;
        }

        @media print {
            @page {
                size: auto;
            }
        }
    </style>
</head>

<body onload="window.print(); window.history.back()" style="width: 350px; min-height: 350px;">
        @foreach ($company as $data)
        <div class="text" style="width:320px;">
            <h3>{{ $data->title }}</h3> 
            @if ($data->phone != null) Phone : {{ $data->phone }} @endif<br>
            @if ($data->email != null) Email : {{ $data->email }} @endif<br>
            @if ($data->address != null) Address : {{ $data->address }} @endif<br>
            @if ($data->website != null) Website : {{ $data->website }} @endif
        </div>
        @endforeach
        @foreach($sales as $data)
        <div class="text" style="width: 320px;">
            <hr>
            <div class="center-align">
                Invoice No # <b>{{ $data->sale_no }}</b><br>
                Date : {{ $data->date }} <br>
            </div>
        </div>
        <div class="text" style="width: 320px;">
            <hr>
            @if ($data->customer != null)
            <div style="float: left; text-align: left;">
                Name : {{ $data->customer }} <br>
                Phone : {{ $data->phone }} 
            </div><br><br>
            @else Sale on Cash
            @endif
        </div>
        
        <div class="text" style="width: 320px;">
            <hr>
            <div class="tbl">SL.</div>
            <div class="tbl1">Description</div>
            <div class="tbl3">Qty.</div>
            <div class="tbl2">Price</div>
            <div class="tbl2">Total</div>
            <br>
            <hr>
            <?php $i = 1; ?>
            @foreach($sales_dt as $item)
                <div class="tbl">{{ $i++ }}.</div>
                <div class="tbl1" style="font-size: 12px;">
                    {{ $item->name }} ({{$item->code}})
                </div>
                <div class="tbl3">{{ $item->quantity }}</div>
                <div class="tbl2">{{ $item->price }}</div>
                <div class="tbl2">{{ $item->total }}</div>
                <br><br>
            @endforeach
            <hr>
            <div class="text" style="width: 300px;">
                <div>
                    <div class="text" style="float: right;">Total Quantity
                        : {{ $data->total_qty  }}
                    </div><br>
                    <div class="text" style="float: right;">SubTotal
                        : {{ $data->sub_total  }} Tk
                    </div><br>
                    <div class="text" style="float: right;">Discount 
                        : {{ $data->discount }} 
                        @if ($data->disc_type == 1) %
                        @elseif ($data->disc_type == 2) Tk
                        @endif
                    </div><br>
                    <div class="text" style="float: right;">Payable
                        : {{ $data->payable  }} Tk</div>
                    <br>
                    <div class="text" style="float: right;">Paid
                        : {{ $data->paid  }} Tk
                    </div><br>
                    <div class="text" style="float: right;">Return
                        : {{ $data->return  }} Tk
                    </div><br>
                    <div class="text" style="float: right;">Due
                        : {{ $data->due  }} Tk
                    </div><br>
                </div>
            </div>
        </div>
        <br>
        <div class="navbar-fixed-bottom text" style="text-align: left;">
            Develop By {{ config('app.url') }}<br>
            <?php echo "Printing Time: " . date("D, d M Y h:i:s a"); ?><br>
        </div>
        @break
        @endforeach
</body>
</html>