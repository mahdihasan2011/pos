<nav class="main-header navbar navbar-expand-md navbar-light navbar-light">
    <div class="container-fluid">
	 	<a href="javascript:void(0)" class="navbar-brand">
	      	<img src="{{ asset('public') }}/logo/infrequentbd.jpeg" alt="{{ config('app.name') }}"
	        	class="brand-image img-circle elevation-3" style="opacity: 1;">
	      	<span class="brand-text font-weight-light">{{ config('app.name') }}</span>
	    </a>
        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <input type="date" value="{{ $today }}" name="sale_date" class="form-control form-control-sm" title="Change Date"/>
                </li>
            </ul>
            &nbsp;
            <select name="addProduct" class="select2 form-control form-control-sm" data-live-search="true"
                    data-style="btn-primary" data-placeholder="Choose Product" title="Choose Product" >
                <option value="">Choose Product</option>
                @foreach ($products as $data)
                    <option value="{{ $data->id }}">{{ $data->name }} - {{ $data->code }} &nbsp; ({{ $data->quantity }})</option>
                @endforeach
            </select>
            &nbsp;
            <select name="customer" class="newselect2 form-control form-control-sm customercls"
                    title="Select Customer" data-placeholder="Select Customer" data-live-search="true"
                    data-style="btn-primary" required>
                <option value="">Select Customer</option>
                <option value="Cash">Cash</option>
                @foreach ($customers as $data)
                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                @endforeach
            </select>
            &nbsp;
            <button class="btn btn-primary btn-sm" data-target="#CustomerModal" type="button" data-toggle="modal" title="Add Customer"><i class="fas fa-user-plus"></i>
            </button>
        </div>

      	<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <li class="nav-item">
                Bill (৳) :&nbsp;<b class="blink_me2 BILL"></b>
            </li>
        @guest
			<li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
       	@else
	        <li class="nav-item">
                <a class="nav-item navbar-brand navbar -toggler" data-widget="pushmenu" href="#" role="button" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-label="Toggle navigation" aria-expanded="false" type="button" data-toggle="collapse">
                    <span class="navbar-toggler-icon"></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" role="button"
			      	href="{{ route('logout') }}" onclick="event.preventDefault();
			      	document.getElementById('logout-form').submit();" title="Logout">
			      	<i class="fas fa-sign-out-alt"></i>
			    </a>
			    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			        @csrf
			    </form>
		  	</li>
	  	@endguest
      	</ul>
    </div>
</nav>
