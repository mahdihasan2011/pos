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
        <div class="invo">
            @if ($company->title != null)
                <div style="font-size: 20px;">{{ $company->title }}</div>
            @endif
            @if ($company->address != null)
                <div>Address : {{ $company->address }}</div>
            @endif
            @if ($company->phone != null)
                <div>Phone : {{ $company->phone }}</div>
            @endif
            @if ($company->email != null)
                <div>Email : {{ $company->email }}</div>
            @endif
            @if ($company->website != null)
                <div>Website : {{ $company->website }}</div>
            @endif
        </div>
        <hr>
        <div class="invo">
            <table>
            <tr>
                <th style="text-align: left;">Invoice No # {{ $purchase->purchase_no }} | </th>
                <td style="text-align: right;">Date : {{ date_format(new DateTime($purchase->date), 'd/M/Y') }}</td>
            </tr>
            </table>
            @if ($purchase->supplier != null)
            <div style="text-align: left;">
                Customer : {{ $purchase->supplier }}
            </div>
                @if ($purchase->phone != null)
                <div style="text-align: left;">
                    Phone : {{ $purchase->phone }}
                </div>
                @endif
            @else
            <div style="text-align: center;">
                ============ Cash Purchase ============
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
                @foreach($purchase_dt as $item)
                <tr>
                    <td style="text-align: left;">{{ $i++ }}.</td>
                    <td style="text-align: left;">{{ $item->name }} ({{ $item->code }})</td>
                    <td>{{ $item->quantity }}</td>
                    <td style="text-align: right; padding-right: 10px; padding-left: 5px;">
                        {{ $item->cost }}
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
                <td style="text-align: right; width: 30%;"> {{ $purchase->total_qty  }}</td>
            </tr>
            <tr>
                <td style="text-align: right;">SubTotal : </td>
                <td style="text-align: right;"> {{ $purchase->sub_total  }} ৳</td>
            </tr>
            @if (!empty($purchase->discount))
            <tr>
                <td style="text-align: right;">Discount : </td>
                <td style="text-align: right;">
                    {{ $purchase->discount }}
                    {{ ($purchase->disc_type = 1) ? '%' : 'Tk' }}
                </td>
            </tr>
            @endif
            @if (!empty($purchase->payable))
            <tr>
                <td style="text-align: right;">Payable : </td>
                <td style="text-align: right;"> {{ $purchase->payable  }} ৳</td>
            </tr>
            @endif
            @if (!empty($purchase->paid))
            <tr>
                <td style="text-align: right;">Paid : </td>
                <td style="text-align: right;"> {{ $purchase->paid  }} ৳</td>
            </tr>
            @endif
            @if (!empty($purchase->return))
            <tr>
                <td style="text-align: right;">Return : </td>
                <td style="text-align: right;"> {{ $purchase->return  }} ৳</td>
            </tr>
            @endif
            @if (!empty($purchase->due))  
            <tr>
                <td style="text-align: right;">Due : </td>
                <td style="text-align: right;"> {{ $purchase->due  }} ৳</td>
            </tr>
            @endif
        </table>
        <hr>
        <div class="invo">
            Developed By https://mahdi.infrequentbd.com <br>
            @php echo "Printing Time: " . date("D, d M Y h:i:s a"); @endphp
        </div>
</body>
</html>
