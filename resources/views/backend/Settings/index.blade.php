@extends('layouts.master')
@section('title','Settings')
@section('content')
    <div class="content-wrapper">
        <section class="content pt-2">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
<!--                                <li class="nav-item">
                                    <a class="nav-link setting" href="#setting" data-toggle="tab">
                                        Settings
                                    </a>
                                </li>-->
                                <li class="nav-item">
                                    <a class="nav-link edit active" href="#edit" data-toggle="tab">
                                        Edit Settings
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class=" tab-pane" id="setting">
                                    <div class="timeline timeline-inverse">
                                        @if (!empty($data))
                                            <div>
                                                <i class="fas fa-phone bg-orange"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header border-0 p-2">
                                                        <a href="#" style="color: orange;">{{ $data->purchase_code_initial }}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-envelope bg-warning"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header border-0 p-2">
                                                        <a href="#" style="color:rgb(255, 208, 0);">{{ $data->sale_code_initial }}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-globe bg-red"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header border-0 p-2">
                                                        <a href="#" style="color: red;">{{ $data->item_code_initial }}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-globe bg-red"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header border-0 p-2">
                                                        <a href="#" style="color: red;">{{ $data->purchase_terminal }}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-globe bg-red"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header border-0 p-2">
                                                        <a href="#" style="color: red;">{{ $data->sale_terminal }}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-globe bg-red"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header border-0 p-2">
                                                        <a href="#" style="color: red;">{{ $data->menu_position }}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-globe bg-red"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header border-0 p-2">
                                                        <a href="#" style="color: red;">{{ $data->brand_logo_variant }}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-globe bg-red"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header border-0 p-2">
                                                        <a href="#" style="color: red;">{{ $data->navbar_variant }}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-globe bg-red"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header border-0 p-2">
                                                        <a href="#" style="color: red;">{{ $data->sidebar_variant }}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-globe bg-red"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header border-0 p-2">
                                                        <a href="#" style="color: red;">{{ $data->vat_percentage }}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="far fa-clock bg-gray"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="active tab-pane" id="edit">
                                    @if (!empty($data))
                                        <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">@csrf
                                            <input name="id" value="{{ $data->id }}" type="hidden"/>
                                            <div class="form-group row">
                                                <label class="col-sm-2">Purchase Code Initial</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="purchase_code_initial" class="form-control form-control-sm"
                                                           value="{{ $data->purchase_code_initial }}" title="Purchase Code Initial" placeholder="Purchase Code Initial">
                                                    @if($errors->has('purchase_code_initial'))
                                                        <small style="color: red;">{{ $errors->first('purchase_code_initial') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2">Sale Code Initial</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="sale_code_initial" class="form-control form-control-sm"
                                                           value="{{ $data->sale_code_initial }}" title="Sale Code Initial" placeholder="Sale Code Initial">
                                                    @if($errors->has('sale_code_initial'))
                                                        <small style="color: red;">{{ $errors->first('sale_code_initial') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2">Item Code Initial</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="item_code_initial" class="form-control form-control-sm"
                                                           value="{{ $data->item_code_initial }}" title="Item Code Initial" placeholder="Item Code Initial">
                                                    @if($errors->has('item_code_initial'))
                                                        <small style="color: red;">{{ $errors->first('item_code_initial') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2">Purchase Terminal</label>
                                                <div class="col-sm-10">
                                                    <select name="purchase_terminal" class="form-control form-control-sm pur" title="Select" placeholder="Select">
                                                        <option value="">Select</option>
                                                        <option value="normal">Normal</option>
                                                    </select>
                                                    @if($errors->has('purchase_terminal'))
                                                        <small style="color: red;">{{ $errors->first('purchase_terminal') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2">Sale Terminal</label>
                                                <div class="col-sm-10">
                                                    <select name="sale_terminal" class="form-control form-control-sm sal" title="Select" placeholder="Select">
                                                        <option value="">Select</option>
                                                        <option value="1">Normal terminal</option>
                                                        <option value="2">Terminal with item image</option>
                                                        <option value="3">New Terminal design</option>
                                                    </select>
                                                    @if($errors->has('sale_terminal'))
                                                        <small style="color: red;">{{ $errors->first('sale_terminal') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2">Menu Position</label>
                                                <div class="col-sm-10">
                                                    <select name="menu_position" class="form-control form-control-sm men" title="Select" placeholder="Select">
                                                        <option value="">Select</option>
                                                        <option value="null">Expanded Sidebar & Hidden</option>
                                                        <option value="sidebar-mini">Expanded Sidebar & Collapsed</option>
                                                        <option value="sidebar-collapse">Hidden Sidebar</option>
                                                        <option value="sidebar-collapse sidebar-mini">Collapsed Sidebar</option>
                                                        <option value="sidebar-collapse layout-top-nav" disabled>Top Menubar & Sidebar (coming soon...)</option>
                                                        <option value="layout-top-nav" disabled>Top Menubar (coming soon...)</option>
                                                    </select>
                                                    @if($errors->has('menu_position'))
                                                        <small style="color: red;">{{ $errors->first('menu_position') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2">Navbar Variant</label>
                                                <div class="col-sm-10">
                                                    <select name="navbar_variant" class="form-control form-control-sm navb" title="Select" placeholder="Select">
                                                        <option value="">Select</option>
                                                        <option value="light">Light</option>
                                                        <option value="dark">Dark</option>
                                                        <option value="blue">Blue</option>
                                                        <option value="green">Green</option>
                                                        <option value="lightblue">Sky Blue</option>
                                                        <option value="orange">Orange</option>
                                                        <option value="yellow">Yellow</option>
                                                        <option value="red">Red</option>
                                                        <option value="white">White</option>
                                                        <option value="cyan">Cyan</option>
                                                        <option value="gray">Gray</option>
                                                        <option value="lime">Lime</option>
                                                        <option value="pink">Pink</option>
                                                        <option value="purple">Purple</option>
                                                        <option value="olive">Olive</option>
                                                        <option value="maroon">Maroon</option>
                                                        <option value="navy">Navy</option>
                                                    </select>
                                                    @if($errors->has('navbar_variant'))
                                                        <small style="color: red;">{{ $errors->first('navbar_variant') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2">Brand Logo Variant</label>
                                                <div class="col-sm-10">
                                                    <select name="brand_logo_variant" class="form-control form-control-sm brn" title="Select" placeholder="Select">
                                                        <option value="">Select</option>
                                                        <option value="light">Light</option>
                                                        <option value="dark">Dark</option>
                                                        <option value="blue">Blue</option>
                                                        <option value="green">Green</option>
                                                        <option value="lightblue">Sky Blue</option>
                                                        <option value="orange">Orange</option>
                                                        <option value="yellow">Yellow</option>
                                                        <option value="red">Red</option>
                                                        <option value="cyan">Cyan</option>
                                                        <option value="gray">Gray</option>
                                                        <option value="lime">Lime</option>
                                                        <option value="pink">Pink</option>
                                                        <option value="purple">Purple</option>
                                                        <option value="olive">Olive</option>
                                                        <option value="maroon">Maroon</option>
                                                        <option value="navy">Navy</option>
                                                    </select>
                                                    @if($errors->has('brand_logo_variant'))
                                                        <small style="color: red;">{{ $errors->first('brand_logo_variant') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2">Sidebar Variant</label>
                                                <div class="col-sm-10">
                                                    <select name="sidebar_variant" class="form-control form-control-sm sid" title="Select" placeholder="Select">
                                                        <option value="">Select</option>
                                                        <option value="sidebar-light sidebar-light-primary">Light</option>
                                                        <option value="sidebar-dark sidebar-dark-light">Dark</option>
                                                    </select>
                                                    @if($errors->has('sidebar_variant'))
                                                        <small class="text-danger">{{ $errors->first('sidebar_variant') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2">FLat Sidebar</label>
                                                <div class="col-sm-10">
                                                    <input type="checkbox" name="flat_sidebar"
                                                        {{ (!empty($settings->flat_sidebar) &&
                                                        $settings->flat_sidebar == "on") ? "checked" : "" }}
                                                        data-bootstrap-switch data-off-color="gray" data-on-color="primary"
                                                        data-off-text="Disable" data-on-text="Enable">
                                                    @if($errors->has('flat_sidebar'))
                                                        <small class="text-danger">{{ $errors->first('flat_sidebar') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2">Sidebar Child Menu</label>
                                                <div class="col-sm-10">
                                                    <input type="checkbox" name="sidebar_child_menu"
                                                        {{ (!empty($settings->sidebar_child_menu) &&
                                                        $settings->sidebar_child_menu == "on") ? "checked" : "" }}
                                                        data-bootstrap-switch data-off-color="gray" data-on-color="primary"
                                                        data-off-text="Disable" data-on-text="Enable">
                                                    @if($errors->has('sidebar_child_menu'))
                                                        <small class="text-danger">{{ $errors->first('sidebar_child_menu') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2">Vat Percentage (%)</label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="vat_percentage" value="{{ $settings->vat_percentage }}" class="form-control
                                                    form-control-sm">
                                                    @if($errors->has('vat_percentage'))
                                                        <small class="text-danger">{{ $errors->first('vat_percentage') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fas fa-check-circle"></i> Update Settings
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    @else
                                        <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">@csrf
                                            <div class="form-group row">
                                                <label class="col-sm-2">Purchase Code Initial</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="purchase_code_initial" class="form-control form-control-sm"
                                                           value="{{ old('purchase_code_initial') }}" title="Purchase Code Initial" placeholder="Purchase Code Initial">
                                                    @if($errors->has('purchase_code_initial'))
                                                        <small style="color: red;">{{ $errors->first('purchase_code_initial') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2">Sale Code Initial</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="sale_code_initial" class="form-control form-control-sm"
                                                           value="{{ old('sale_code_initial') }}" title="Sale Code Initial" placeholder="Sale Code Initial">
                                                    @if($errors->has('sale_code_initial'))
                                                        <small style="color: red;">{{ $errors->first('sale_code_initial') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2">Item Code Initial</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="item_code_initial" class="form-control form-control-sm"
                                                           value="{{ old('item_code_initial') }}" title="Item Code Initial" placeholder="Item Code Initial">
                                                    @if($errors->has('item_code_initial'))
                                                        <small style="color: red;">{{ $errors->first('item_code_initial') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2">Purchase Terminal</label>
                                                <div class="col-sm-10">
                                                    <select name="purchase_terminal" class="form-control form-control-sm" title="Select" placeholder="Select">
                                                        <option value="">Select</option>
                                                        <option value="normal" selected>Normal</option>
                                                    </select>
                                                    @if($errors->has('purchase_terminal'))
                                                        <small style="color: red;">{{ $errors->first('purchase_terminal') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row navbar-">
                                                <label class="col-sm-2">Sale Terminal</label>
                                                <div class="col-sm-10">
                                                    <select name="sale_terminal" class="form-control form-control-sm" title="Select" placeholder="Select">
                                                        <option value="">Select</option>
                                                        <option value="1" selected>Normal terminal</option>
                                                        <option value="2">Terminal with item image</option>
                                                        <option value="3">New Terminal design</option>
                                                    </select>
                                                    @if($errors->has('sale_terminal'))
                                                        <small style="color: red;">{{ $errors->first('sale_terminal') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2">Menu Position</label>
                                                <div class="col-sm-10">
                                                    <select name="menu_position" class="form-control form-control-sm" title="Select" placeholder="Select">
                                                        <option value="">Select</option>
                                                        <option value="null" selected>Expanded Sidebar & Hidden</option>
                                                        <option value="sidebar-mini">Expanded Sidebar & Collapsed</option>
                                                        <option value="sidebar-collapse">Hidden Sidebar</option>
                                                        <option value="sidebar-collapse sidebar-mini">Collapsed Sidebar</option>
                                                        <option value="sidebar-collapse layout-top-nav" disabled>Top Menubar & Sidebar (coming soon...)</option>
                                                        <option value="layout-top-nav" disabled>Top Menubar (coming soon...)</option>
                                                    </select>
                                                    @if($errors->has('menu_position'))
                                                        <small style="color: red;">{{ $errors->first('menu_position') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2">Navbar Variant</label>
                                                <div class="col-sm-10 navbar-">
                                                    <select name="navbar_variant" class="form-control form-control-sm" title="Select" placeholder="Select">
                                                        <option value="">Select</option>
                                                        <option value="blue">Blue</option>
                                                        <option value="green">Green</option>
                                                        <option value="light">Light</option>
                                                        <option value="dark">Dark</option>
                                                        <option value="lightblue">Sky Blue</option>
                                                        <option value="orange">Orange</option>
                                                        <option value="yellow">Yellow</option>
                                                        <option value="red">Red</option>
                                                        <option value="white">White</option>
                                                        <option value="cyan">Cyan</option>
                                                        <option value="gray">Gray</option>
                                                        <option value="lime">Lime</option>
                                                        <option value="pink">Pink</option>
                                                        <option value="purple">Purple</option>
                                                        <option value="olive">Olive</option>
                                                        <option value="maroon">Maroon</option>
                                                        <option value="navy">Navy</option>
                                                    </select>
                                                    @if($errors->has('navbar_variant'))
                                                        <small style="color: red;">{{ $errors->first('navbar_variant') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2">Brand Logo Variant</label>
                                                <div class="col-sm-10">
                                                    <select name="brand_logo_variant" class="form-control form-control-sm" title="Select" placeholder="Select">
                                                        <option value="">Select</option>
                                                        <option value="blue">Blue</option>
                                                        <option value="green">Green</option>
                                                        <option value="dark">Dark</option>
                                                        <option value="lightblue">Sky Blue</option>
                                                        <option value="orange">Orange</option>
                                                        <option value="yellow">Yellow</option>
                                                        <option value="red">Red</option>
                                                        <option value="cyan">Cyan</option>
                                                        <option value="gray">Gray</option>
                                                        <option value="lime">Lime</option>
                                                        <option value="pink">Pink</option>
                                                        <option value="purple">Purple</option>
                                                        <option value="olive">Olive</option>
                                                        <option value="maroon">Maroon</option>
                                                        <option value="navy">Navy</option>
                                                    </select>
                                                    @if($errors->has('brand_logo_variant'))
                                                        <small style="color: red;">{{ $errors->first('brand_logo_variant') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2">Sidebar Variant</label>
                                                <div class="col-sm-10">
                                                    <select name="sidebar_variant" class="form-control form-control-sm" title="Select" placeholder="Select">
                                                        <option value="">Select</option>
                                                        <option value="sidebar-light sidebar-light-dark">Light</option>
                                                        <option value="sidebar-dark sidebar-dark-light">Dark</option>
                                                    </select>
                                                    @if($errors->has('sidebar_variant'))
                                                        <small style="color: red;">{{ $errors->first('sidebar_variant') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2">FLat Sidebar</label>
                                                <div class="col-sm-10">
                                                    <input type="checkbox" name="flat_sidebar"
                                                       data-bootstrap-switch data-off-color="gray" data-on-color="primary"
                                                       data-off-text="Disable" data-on-text="Enable">
                                                    @if($errors->has('flat_sidebar'))
                                                        <small class="text-danger">{{ $errors->first('flat_sidebar') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2">Sidebar Child Menu</label>
                                                <div class="col-sm-10">
                                                    <input type="checkbox" name="sidebar_child_menu"
                                                       data-bootstrap-switch data-off-color="gray" data-on-color="primary"
                                                       data-off-text="Disable" data-on-text="Enable">
                                                    @if($errors->has('sidebar_child_menu'))
                                                        <small class="text-danger">{{ $errors->first('sidebar_child_menu') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2">Vat Percentage (%)</label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="vat_percentage" class="form-control form-control-sm">
                                                    @if($errors->has('vat_percentage'))
                                                        <small class="text-danger">{{ $errors->first('vat_percentage') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('customJs')
    @if($errors->has('purchase_code_initial') || $errors->has('sale_code_initial') || $errors->has
    ('item_code_initial') || $errors->has('purchase_terminal') || $errors->has('sale_terminal') || $errors->has('menu_position') || $errors->has('brand_logo_variant') || $errors->has('navbar_variant') || $errors->has('sidebar_variant'))
        <script type="text/javascript">
            $("#setting").removeClass('active');
            $(".setting").removeClass('active');
            $("#edit").addClass('active');
            $(".edit").addClass('active');
        </script>
    @endif
    <script type="text/javascript">
        $(document).ready(function() {
            var pur = '{{ $data->purchase_terminal }}';
            var sal = '{{ $data->sale_terminal }}';
            var men = '{{ $data->menu_position }}';
            var brn = '{{ $data->brand_logo_variant }}';
            var navb = '{{ $data->navbar_variant }}';
            var sid = '{{ $data->sidebar_variant }}';
            $('.pur').val(pur);
            $('.sal').val(sal);
            $('.men').val(men);
            $('.brn').val(brn);
            $('.navb').val(navb);
            $('.sid').val(sid);
        });
    </script>
@endsection
