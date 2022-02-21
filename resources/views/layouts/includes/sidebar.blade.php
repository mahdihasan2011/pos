<aside class="main-sidebar elevation-4 {{ !empty($settings->sidebar_variant) ? $settings->sidebar_variant :
    "sidebar-light sidebar-light-primary" }}">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link navbar-{{ !empty($settings->brand_logo_variant) ?
    $settings->brand_logo_variant : "" }}">
        <img src="{{ asset('public') }}/logo/infrequentbd.jpeg" alt="{{ config('app.name') }}"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @guest
<!--            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column {{ !empty($settings->flat_sidebar) ?
                    "nav-flat" : "" }} {{ !empty($settings->sidebar_child_menu) ? "nav-child-indent" : "" }}"
                    data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{ route('login') }}" class="nav-link">
                            <i class="nav-icon fas fa-sign-in-alt"></i>
                            <p>Login</p>
                        </a>
                    </li>
                </ul>
            </nav>-->
        @else
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ !empty(Auth::user()->image) ? asset(Auth::user()->image) : asset('public/master/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="{{ Auth::user()->name }}">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column {{ !empty($settings->flat_sidebar) ?
                    "nav-flat" : "" }} {{ !empty($settings->sidebar_child_menu) ? "nav-child-indent" : "" }}"
                    data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item has-treeview {{ ( $controller == 'DashboardController' && $action == 'index' ) ? 'menu-open' : '' }}">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ ( $controller == 'DashboardController' && $action == 'index' ) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    @can('sale')
                    <li class="nav-item has-treeview {{ ( $controller == 'PoSController' && $action == 'pos' ) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ ( $controller == 'PoSController' && $action == 'pos' ) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cart-arrow-down"></i>
                            <p>Sale Management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('pos.point_of_sale') }}" class="nav-link {{ ( $controller ==
                                'PoSController' && $action == 'pos' ) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sales</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    @can('stock_list')
                    <li class="nav-item has-treeview {{ ( $controller == 'StockController' ) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ ( $controller == 'StockController' ) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-layer-group"></i>
                            <p>Stock Management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('stock.current') }}" class="nav-link {{ ( $controller == 'StockController' ) ? 'active' : '' }}">
                                    <i class="fas fa-circle nav-icon"></i>
                                    <p>Current Stock</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    @can('purchase')
                    <li class="nav-item has-treeview {{ ( $controller == 'PurchaseController' && $action == 'index' ) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ ( $controller == 'PurchaseController' && $action == 'index' ) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-shopping-bag"></i>
                            <p>Purchase Management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('purchase.index') }}" class="nav-link {{ ( $controller == 'PurchaseController' && $action == 'index' ) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Purchase</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    @endcan
                    @canany(['expense_list', 'expense_type_list'])
                        <li class="nav-item has-treeview {{ ( $controller == 'ExpenseController' || $controller == 'ExpenseTypeController' ) ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ ( $controller == 'ExpenseController' || $controller == 'ExpenseTypeController' ) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-money-bill-alt"></i>
                                <p>Accounts Management
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('expense_list')
                                    <li class="nav-item">
                                        <a href="{{ route('expense.index') }}" class="nav-link {{ ( $controller == 'ExpenseController' && $action == 'index' ) ? 'active' : '' }}">
                                            <i class="fas fa-circle nav-icon"></i>
                                            <p>Expenses</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('expense_type_list')
                                    <li class="nav-item">
                                        <a href="{{ route('expense.type.index') }}" class="nav-link {{ ( $controller == 'ExpenseTypeController' && $action == 'index' ) ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Expense Type</p>
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </li>
                    @endcan
                    @canany(['product_list', 'category_list', 'brand_list', 'color_list', 'size_list'])
                    <li class="nav-item has-treeview {{ ( $controller == 'ProductController' ||
                    $controller == 'CategoryController' || $controller == 'BrandController' ||
                    $controller == 'GroupController' || $controller == 'SizeController' ||
                    $controller == 'TypeController' || $controller == 'ColorController' ) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ ( $controller == 'ProductController' ||
                            $controller == 'CategoryController' || $controller == 'BrandController' ||
                            $controller == 'GroupController' || $controller == 'SizeController' ||
                            $controller == 'TypeController' || $controller == 'ColorController' ) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-archive"></i>
                            <p>Product Management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('product_create')
                            <li class="nav-item">
                                <a href="{{ route('product.entry') }}" class="nav-link {{ ( $controller == 'ProductController' ) ? 'active' : '' }}">
                                    <i class="fas fa-cubes nav-icon"></i>
                                    <p>Product Entry</p>
                                </a>
                            </li>
                            @endcan
                            @can('product_list')
                            <li class="nav-item">
                                <a href="{{ route('product.index') }}" class="nav-link {{ ( $controller == 'ProductController' ) ? 'active' : '' }}">
                                    <i class="fas fa-th-list nav-icon"></i>
                                    <p>Product List</p>
                                </a>
                            </li>
                            @endcan
                            @canany(['category_list', 'brand_list', 'color_list', 'size_list'])
                            <li class="nav-item has-treeview {{ ( $controller == 'CategoryController' || $controller == 'BrandController' || $controller == 'ColorController' || $controller == 'SizeController' ) ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link {{ ( $controller == 'CategoryController' || $controller == 'BrandController' || $controller == 'ColorController' || $controller == 'SizeController' ) ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-th-large"></i>
                                    <p>Product Setup</p>
                                    <i class="fas fa-angle-left right"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('category_list')
                                    <li class="nav-item">
                                        <a href="{{ route('category.index') }}" class="nav-link {{ ( $controller == 'CategoryController' ) ? 'active' : '' }}">
                                            <i class="fas fa-cube nav-icon"></i>
                                            <p>Category</p>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('brand_list')
                                    <li class="nav-item">
                                        <a href="{{ route('brand.index') }}" class="nav-link {{ ( $controller == 'BrandController' ) ? 'active' : '' }}">
                                            <i class="fas fa-podcast nav-icon"></i>
                                            <p>Brand</p>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('color_list')
                                    <li class="nav-item">
                                        <a href="{{ route('color.index') }}" class="nav-link {{ ( $controller == 'ColorController' ) ? 'active' : '' }}">
                                            <i class="fas fa-adjust nav-icon fa-spin fa-3x fa-fw"></i>
                                            <p>Color</p>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('size_list')
                                    <li class="nav-item">
                                        <a href="{{ route('size.index') }}" class="nav-link {{ ( $controller == 'SizeController' ) ? 'active' : '' }}">
                                            <i class="fas fa-map-pin nav-icon"></i>
                                            <p>Size</p>
                                        </a>
                                    </li>
                                    @endcan
                                </ul>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany
                    @canany(['user_role_list', 'role_list', 'settings', 'company_info', 'customer_list', 'supplier_list'])
                    <li class="nav-item has-treeview {{ ( $controller == 'RoleController' || $controller ==
                    'UserController' || $controller == 'SettingController' || $controller == 'CompanyController' || $controller == 'CustomerController' || $controller == 'SupplierController' ) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ ( $controller == 'RoleController' || $controller ==
                           'UserController' || $controller == 'SettingController' || $controller == 'CompanyController' || $controller == 'CustomerController' || $controller == 'SupplierController' ) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>Setup & Configuration
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('company_info')
                                <li class="nav-item">
                                    <a href="{{ route('company.index') }}" class="nav-link {{ ( $controller == 'CompanyController' ) ? 'active' : '' }}">
                                        <i class="fas fa-university nav-icon"></i>
                                        <p>Company</p>
                                    </a>
                                </li>
                            @endcan
                            @can('customer_list')
                                <li class="nav-item">
                                    <a href="{{ route('customer.index') }}" class="nav-link {{ ( $controller == 'CustomerController' ) ? 'active' : '' }}">
                                        <i class="fas fa-user-circle nav-icon"></i>
                                        <p>Customer</p>
                                    </a>
                                </li>
                            @endcan
                            @can('supplier_list')
                                <li class="nav-item">
                                    <a href="{{ route('supplier.index') }}" class="nav-link {{ ( $controller == 'SupplierController' ) ? 'active' : '' }}">
                                        <i class="far fa-user-circle nav-icon"></i>
                                        <p>Supplier</p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_role_list')
                            <li class="nav-item">
                                <a href="{{ route('user.role.index') }}"
                                   class="nav-link {{ ( $controller == 'UserController' ) ? 'active' : '' }}">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>User List</p>
                                </a>
                            </li>
                            @endcan
                            @can('role_list')
                            <li class="nav-item">
                                <a href="{{ route('role.index') }}"
                                   class="nav-link {{ ( $controller == 'RoleController' ) ? 'active' : '' }}">
                                   <i class="fas fa-id-card-alt nav-icon"></i>
                                    <p>Role List</p>
                                </a>
                            </li>
                            @endcan
                            @can('settings')
                            <li class="nav-item">
                                <a href="{{ route('settings.index') }}"
                                   class="nav-link {{ ( $controller == 'SettingController' ) ? 'active' : '' }}">
                                    <i class="fa fa-wrench nav-icon"></i>
                                    <p>Settings</p>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany
                    @canany(['purchase_report', 'sale_report'])
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link {{ ( $controller == 'Reports\PurchaseController' || $controller == 'Reports\SaleController' ) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-print"></i>
                            <p>Report Management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            {{-- <li class="nav-item">
                              <a href="{{ route('sale.item') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sales</p>
                              </a>
                            </li> --}}
                            @can('purchase_report')
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-circle"></i>
                                    <p>Pruchase</p>
                                    <i class="fas fa-angle-left right"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('purchase.report.datewise') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Supplier & Date Wise</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endcan
                            @can('sale_report')
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-circle"></i>
                                    <p>Sales</p>
                                    <i class="fas fa-angle-left right"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('sales.report.datewise') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Datewise</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        @endguest

    </div>
    <!-- /.sidebar -->
</aside>
