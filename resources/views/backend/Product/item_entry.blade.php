@extends('layouts.master')
@section('title')
    Item Entry
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="row pt-2">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Item Entry</h3>
                    </div>
                    <div class="card-body">
                        <form id="SubmitItem" action="" method="POST"> 
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-3 col-md-6 col-xs-12">
                                    <label for="category">Category <span style="color:gray">*</span></label>
                                    <select class="form-control select2" 
                                        data-dropdown-css-class="select2-primary" id="category" 
                                        data-placeholder="Select Category" required>
                                        {{-- <option value="">Select Category</option> --}}
                                        {{-- @foreach ($category as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>

                                <div class="form-group col-lg-3 col-md-6 col-xs-12">
                                    <label for="subcategory">Sub-Category <span style="color:gray">*</label>
                                    <select class="form-control select2 select2-primary" 
                                        data-dropdown-css-class="select2-primary" id="subcategory" 
                                        data-placeholder="Select Sub-Category" required>
                                        {{-- <option value="">Select Sub-Category</option> --}}
                                        {{-- @foreach ($sub_cate as $sub_cate)
                                        <option value="{{ $sub_cate->name }}">{{ $sub_cate->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>

                                <div class="form-group col-lg-3 col-md-6 col-xs-12">
                                    <label for="group">Group <span style="color:gray">*</label>
                                    <select class="form-control select2 select2-primary" 
                                        data-dropdown-css-class="select2-primary" id="group" 
                                        data-placeholder="Select Group" required>
                                        <option value="">Select Group</option>
                                        {{-- @foreach ($group as $group)
                                        <option value="{{ $group->name }}">{{ $group->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>

                                <div class="form-group col-lg-3 col-md-6 col-xs-12">
                                    <label for="brand">Brand <span style="color:gray">*</label>
                                    <select class="form-control select2 select2-primary" 
                                        data-dropdown-css-class="select2-primary" id="brand" 
                                        data-placeholder="Select Brand" required>
                                        <option value="">Select Brand</option>
                                        {{-- @foreach ($brand as $brand)
                                        <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>

                                <div class="form-group col-lg-3 col-md-6 col-xs-12">
                                    <label for="type">Type <span style="color:gray">*</label>
                                    <select class="form-control select2 select2-primary" 
                                        data-dropdown-css-class="select2-primary" id="type"
                                        data-placeholder="Select Type" name="type">
                                        <option value="">Select Type</option>
                                        {{-- @foreach ($type as $data)
                                        <option value="{{ $data->name }}">{{ $data->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>

                                <div class="form-group col-lg-3 col-md-6 col-xs-12">
                                    <label for="code">Item Code <span style="color:gray">*</label>
                                    <input id="code" name="code" class="form-control" readonly 
                                        type="text" placeholder="Item Code" value=" ">
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <label for="name">Item Name <span style="color:gray">*</label>
                                    <input id="name" class="form-control" 
                                        type="text" placeholder="Item Name" required>
                                </div>
                                
                                {{--  <div class="form-group col-lg-3 col-md-6 col-xs-12">
                                    <label for="thumbnail">Thumbnail</label>
                                    <input id="thumbnail" class="form-control" 
                                        type="file">
                                </div>  --}}

                                <div class="form-group col-lg-3 col-md-6 col-xs-12">
                                    <label for="cost">Cost Price <span style="color:gray">*</label>
                                    <input id="cost" class="form-control" 
                                        type="text" placeholder="Cost Price" required>
                                </div>

                                <div class="form-group col-lg-3 col-md-6 col-xs-12">
                                    <label for="price">Sale Price <span style="color:gray">*</label>
                                    <input id="price" class="form-control" 
                                        type="text" placeholder="Sale Price" required>
                                </div>
                                
                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <label for="details">Item Details</label>
                                    <textarea id="details" class="form-control" 
                                        type="text" placeholder="Item Details"></textarea>
                                </div>
                                {{--  <div class="form-group col-lg-6 col-xs-12">
                                    <div class="row">
                                        <div class="form-group col-lg-4 col-md-4 col-xs-12">
                                            <select id="size" class="form-control select2bs4" 
                                                data-color="btn-info" data-placeholder="Select Size">
                                                <option value=""> Select Size </option>
                                                @foreach ($size as $data)
                                                <option value="{{ $data->name }}"> {{ $data->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4 col-md-4 col-xs-12">
                                            <select class="form-control select2 select2-danger" 
                                                data-dropdown-css-class="select2-danger" id="color"
                                                data-placeholder="Select Color">
                                                <option>Select Color</option>
                                                @foreach ($color as $data)
                                                <option value="{{ $data->name }}"> {{ $data->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-3 col-md-3 col-xs-8">
                                            <input id="stock" class="form-control" type="number"
                                                placeholder="Quantity" min="1">
                                        </div>
                                        <div class="form-group col-lg-1 col-md-1 col-xs-2">
                                            <button type="button" class="btn btn-primary btn-sm">
                                                <i class="fa fa-plus-circle"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>  --}}

                                {{--  <div class="col-lg-12 col-xs-12">
                                    <table class="table table-sm table-bordered table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Size</th>
                                                <th>Color</th>
                                                <th>Stock Quantity</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr class="text-center">
                                                <th style="width:30%;">
                                                    <select class="form-control select2bs4" 
                                                            data-color="btn-info" style="width:100%;"
                                                            id="size" data-placeholder="Select Size">
                                                        <option value=""> Select Size </option>
                                                        @foreach ($size as $data)
                                                        <option value="{{ $data->name }}">{{ $data->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </th>
                                                <th style="width:30%;">
                                                    <select class="form-control select2" 
                                                            style="width:100%;" id="color" 
                                                            data-dropdown-css-class="select2-danger" 
                                                            data-placeholder="Select Color">
                                                        <option value="">Select Color</option>
                                                        @foreach ($color as $data)
                                                        <option value="{{ $data->name }}">{{ $data->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </th>
                                                <th style="width:30%;">
                                                    <input id="stock" class="form-control" required
                                                        type="number" placeholder="Stock Quantity" min="1">
                                                </th>
                                                <th style="width:10%;">
                                                    <button type="button" 
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fa fa-plus-circle"></i>
                                                    </button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>Small</td>
                                                <td>Red</td>
                                                <td>5</td>
                                                <td>
                                                    <button type="button" 
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fa fa-times-circle"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>  --}}
                            </div>
                        </form>

                        <div class="row">

                            <div class="col-lg-8 col-md-12 col-xs-12">
                                <table class="table table-sm table-bordered table-striped colorlist">
                                    <form id="ItemData"> @csrf
                                        <thead>
                                            <tr class="text-center">
                                                <th style="width:30%;">Size</th>
                                                <th style="width:30%;">Color</th>
                                                <th style="width:30%;">Stock Quantity</th>
                                                <th style="width:10%;">
                                                    <button type="button" id="addrow"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fa fa-plus-circle"></i>
                                                    </button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </form>
                                </table>
                            </div>

                            <div class="col-lg-4 col-md-6 col-xs-12">
                                <table class="table table-sm table-bordered table-striped imlist">
                                    <form id="ItemImage" enctype="multipart/form-data"
                                        action="" method="POST">
                                        @csrf
                                        <thead>
                                            <tr class="text-center">
                                                <th style="width:80%;">
                                                    <input name="image" class="form-control-sm" 
                                                        type="file" title="Product Image" required/>
                                                    <input name="code" type="hidden" value="">
                                                </th>
                                                <th style="width:10%;">
                                                    <button type="button" id="addim"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fa fa-plus-circle"></i>
                                                    </button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </form>
                                </table>
                            </div>

                        </div>

                        <div class="text-center">
                            <button type="reset" class="btn btn-danger btn-sm"
                                onClick="window.location.reload();">
                                <i class="fa fa-trash"></i> 
                                <b style="font-size:15px;">Clear</b>
                            </button>
                            <button type="button" class="btn btn-success btn-sm"
                                onclick="submitForms()">
                                <i class="fa fa-check-circle"></i> 
                                <b style="font-size:15px;">Save Item</b>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> 


@endsection