@extends('layouts.main')
@section('title')
    Current Stock
@endsection
@section('header')
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Current Stock</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">List</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right">
                <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                    <option selected>Aug 19</option>
                    <option value="1">July 19</option>
                    <option value="2">Jun 19</option>
                </select>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-group">
            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-right">Cost (Tk.)</th>
                            <th class="text-right">Price (Tk.)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($current_st as $data)
                        <tr>
                            <td>{{ $i++ }}.</td>
                            <td>{{ $data->name }} ({{ $data->code }})</td>
                            <td>{{ $data->category }}</td>
                            <td class="text-center">{{ $data->quantity }}</td>
                            <td class="text-right">{{ $data->cost }}</td>
                            <td class="text-right">{{ $data->price }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                     <tfoot>
                        <tr>
                            <td class="text-right" colspan="3">Total : </td>
                            <td class="text-center">{{ $tQty }}</td>
                            <td class="text-right">{{ $tCst }}</td>
                            <td class="text-right">{{ $tPrc }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('customJs')
@endsection
