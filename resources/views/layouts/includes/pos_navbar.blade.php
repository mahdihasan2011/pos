<nav class="main-header navbar navbar-expand navbar-light navbar-{{ !empty($settings->navbar_variant) ? $settings->navbar_variant : "" }}">
    @guest
    @else
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <span class="navbar-toggler-icon"></span>
            </a>
        </li>
    </ul>
    @endguest
    <div class="form-inline">
        <select name="customer" class="select2 form-control form-control-sm input-group input-group-sm"
            data-placeholder="Select Customer" data-live-search="true" data-style="btn-primary"
            title="Select Customer" data-toggle="tooltip" data-placement="left">
            <option value="">Select Customer</option>
            <option class="bg-blue" value="null"><b style="color: cyan !important;"> Add Customer </b></option>
            <option value="Cash" selected>Cash Sale</option>
            @foreach ($users as $data)
                <option value="{{ $data->id }}">{{ $data->name }}</option>
            @endforeach
        </select>
        &nbsp;
        <select name="addProduct" class="select2 _new form-control form-control-sm input-group input-group-sm"
            data-placeholder="Search Product" data-live-search="true" data-style="btn-primary"
            title="Search Product" data-toggle="tooltip" data-placement="left">
            <option value="">Search Product</option>
            @foreach ($products as $data)
            <option value="{{ $data->id }}">{{ $data->name }} ({{ $data->quantity }})</option>
            @endforeach
        </select>
        &nbsp;
    </div>
    <div class="">
        <input placeholder="Barcode Search" autofocus="true" type="search"
               class="form-control form-control-sm SEARCH sticky-top w-100"
               title="Barcode Search" data-toggle="tooltip" data-placement="left">
        <div id="SEARCH_LIST" class=""></div>
    </div>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">Bill&nbsp;(BDT):&nbsp;<b class="BILL"></b></a>
        </li>
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}" title="Login" data-toggle="tooltip" data-placement="top"><i class="fas fa-sign-in-alt"></i></a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <!-- <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" role="button" href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();" title="Logout" data-toggle="tooltip" data-placement="top">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-house-user"></i>
                </a>
            </li>
        @endguest
    </ul>
</nav>
