<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        .invo {
            text-align: center;
            font-family: monospace;
            width: 340px;
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
        <div class="invo">
            <b style="font-size: 20px;">{{ $data->title }}</b> 
            <!-- <br> -->
            @if ($data->phone != null) 
            <div>Phone : {{ $data->phone }}</div>
            @endif
            @if ($data->email != null) 
            <div>Email : {{ $data->email }}</div>
            @endif
            @if ($data->address != null) 
                <div>Address : {{ $data->address }}</div>
            @endif  
            @if ($data->website != null) 
                <div>Website : {{ $data->website }}</div>
            @endif
        </div>
        @endforeach
        <hr>
        @foreach($sales as $data)
        <div class="invo">
            <div style="text-align: left;">
                Invoice No # <b>{{ $data->sale_no }}</b>
            </div>
            <div style="text-align: left;">
                Date : {{ $data->date }}
            </div>
            @if ($data->customer != null)
            <div style="text-align: left;">
                Name : {{ $data->customer }} 
            </div>
            <div style="text-align: left;">
                Phone : {{ $data->phone }} 
            </div>
            @else 
            <div style="text-align: left;">
                Sale on Cash
            </div>
            @endif
        </div>
        <hr>
        <table class="invo">
            <thead>
                <tr>
                    <th style="text-align: left;">SL.</th>
                    <th style="text-align: left;">Description</th>
                    <th>Qty.</th>
                    <th>Price</th>
                    <th style="text-align: right;">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach($sales_dt as $item)
                <tr>
                    <td style="text-align: left;">{{ $i++ }}.</td>
                    <td style="text-align: left;">{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td style="text-align: right; padding-right: 10px; padding-left: 5px;">
                        {{ $item->price }}
                    </td>
                    <td style="text-align: right;">{{ $item->total }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <table class="invo">
            <tr>
                <td style="text-align: right; width: 70%;">Total Quantity : </td>
                <td style="text-align: right; width: 30%;"> {{ $data->total_qty  }}</td>
            </tr>
            <tr>
                <td style="text-align: right;">SubTotal : </td>
                <td style="text-align: right;"> {{ $data->sub_total  }} ৳</td>
            </tr>
            <tr>
                <td style="text-align: right;">Discount : </td>
                <td style="text-align: right;"> 
                    {{ $data->discount }} 
                    @if ($data->disc_type == 1) %
                    @elseif ($data->disc_type == 2) ৳
                    @endif
                </td>
            </tr>
            <tr>
                <td style="text-align: right;">Payable : </td>
                <td style="text-align: right;"> {{ $data->payable  }} ৳</td>
            </tr>
            <tr>
                <td style="text-align: right;">Paid : </td>
                <td style="text-align: right;"> {{ $data->paid  }} ৳</td>
            </tr>
            <tr>
                <td style="text-align: right;">Return : </td>
                <td style="text-align: right;"> {{ $data->return  }} ৳</td>
            </tr>
            <tr>
                <td style="text-align: right;">Due : </td>
                <td style="text-align: right;"> {{ $data->due  }} ৳</td>
            </tr>
        </table>
        <hr>
        <div class="invo">
            Develop By {{ config('app.url') }}<br>
            <?php echo "Printing Time: " . date("D, d M Y h:i:s a"); ?><br>
        </div>
        @break
        @endforeach
</body>
</html>