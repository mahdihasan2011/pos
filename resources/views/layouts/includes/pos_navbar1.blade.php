<nav class="main-header navbar navbar-expand-md navbar-light navbar-light">
    <div class="container">
	 	<a href="{{ url('/') }}" class="navbar-brand">
	      	<img src="{{ asset('public') }}/logo/infrequentbd.jpeg" alt="{{ config('app.name') }}"
	        	class="brand-image img-circle elevation -3" style="opacity: 1;">
	      	<span class="brand-text font-weight-light">{{ config('app.name') }}</span>
	    </a>
      	@guest

		@else
		<a class="nav-item navbar-brand navbar -toggler" data-widget="pushmenu" href="#" role="button" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-label="Toggle navigation" aria-expanded="false" type="button" data-toggle="collapse">
        	<span class="navbar-toggler-icon"></span>
		</a>
		@endguest

      	<div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->

	        <ul class="navbar-nav">
				<!-- <li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button">
						<i class="fas fa-bars"></i>
					</a>
				</li> -->
			 	<!-- <li class="nav-item">
					<a href="#" class="nav-link">Home</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">Contact</a>
				</li> -->
	        </ul>

        	<!-- SEARCH FORM -->
	        <form class="form-inline ml-0 ml-md-3">
	          	<div class="input-group input-group-sm">
	            	<input class="form-control form-control-navbar" type="search"
	            		placeholder="Search" aria-label="Search">
	            	<div class="input-group-append">
	              		<button class="btn btn-navbar" type="submit">
	                		<i class="fas fa-search"></i>
	              		</button>
	            	</div>
	          	</div>
	        </form>
	  	</div>

      	<!-- Right navbar links -->
      	<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
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
