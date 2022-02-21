<div class="scroll-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="sidebar-item {{ ( $controller == 'DashboardController' && $action == 'index' ) ? 'selected' : '' }}">
                <a class="sidebar-link sidebar-link active" href="{{ route('dashboard') }}" aria-expanded="false">
                    <i data-feather="home" class="feather-icon"></i>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>

            <li class="list-divider"></li>
            <li class="nav-small-cap">
                <span class="hide-menu">Sales Management</span>
            </li>
            <li class="sidebar-item {{ ( $controller == 'PoSController' ) ? 'selected' : '' }}">
                <a class="sidebar-link" href="{{ route('pos.point_of_sale') }}" aria-expanded="false">
                    <i data-feather="crosshair" class="feather-icon"></i>
                    <span class="hide-menu">Point of sale</span>
                </a>
            </li>
            <li class="sidebar-item {{ ( $controller == 'StockController' ) ? 'selected' : '' }}">
                <a class="sidebar-link sidebar-link" href="{{ route('stock.current') }}" aria-expanded="false">
                    <i data-feather="bar-chart" class="feather-icon"></i>
                    <span class="hide-menu">Current Stock</span>
                </a>
            </li>

            <li class="list-divider"></li>
            <li class="nav-small-cap">
                <span class="hide-menu">Product Management</span>
            </li>
            <li class="sidebar-item {{ ( $controller == 'PurchaseController' ) ? 'selected' : '' }}">
                <a class="sidebar-link sidebar-link" href="{{ route('purchase.index') }}" aria-expanded="false">
                    <i data-feather="layers" class="feather-icon"></i>
                    <span class="hide-menu">Product Purchase</span>
                </a>
            </li>
            <li class="sidebar-item {{ ( $controller == 'ProductController' ||
                    $controller == 'CategoryController' || $controller == 'BrandController' ||
                    $controller == 'GroupController' || $controller == 'SizeController' ||
                    $controller == 'TypeController' || $controller == 'ColorController' ) ? 'selected' : '' }}">
                <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <i data-feather="grid" class="feather-icon"></i>
                    <span class="hide-menu">Products</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level base-level-line {{ ( $controller == 'ProductController' ||
                        $controller == 'CategoryController' || $controller == 'BrandController' ||
                        $controller == 'GroupController' || $controller == 'SizeController' ||
                        $controller == 'TypeController' || $controller == 'ColorController' ) ? 'in' : '' }}">
                    <li class="sidebar-item {{ ( $controller == 'ProductController' ) ? 'selected' : '' }}">
                        <a href="{{ route('product.index') }}" class="sidebar-link
                            {{ ( $controller == 'ProductController' && $action == 'index' ) ? 'active' : '' }}">
                            <span class="hide-menu"> List</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ ( $controller == 'ProductController' && $action == 'entry' ) ? 'selected' : '' }}">
                        <a href="{{ route('product.entry') }}" class="sidebar-link {{ ( $controller == 'ProductController' && $action == 'entry' ) ? 'active' : '' }}">
                            <span class="hide-menu"> Entry</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ ( $controller == 'ProductController' ||
                            $controller == 'CategoryController' || $controller == 'BrandController' ||
                            $controller == 'GroupController' || $controller == 'SizeController' ||
                            $controller == 'TypeController' || $controller == 'ColorController' ) ? 'selected' : '' }}">
                        <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false">
                            <span class="hide-menu">Setup</span>
                        </a>
                        <ul aria-expanded="false" class="collapse second-level base-level-line {{ (
                                $controller == 'CategoryController' || $controller == 'BrandController' ||
                                $controller == 'GroupController' || $controller == 'SizeController' ||
                                $controller == 'TypeController' || $controller == 'ColorController' ) ? 'in' : '' }}">
                            <li class="sidebar-item {{ ( $controller == 'CategoryController' ) ? 'selected' : '' }}">
                                <a href="{{ route('category.index') }}" class="sidebar-link {{ ( $controller == 'CategoryController' ) ? 'active' : '' }}">
                                    <span class="hide-menu"> Category</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{ ( $controller == 'BrandController' ) ? 'selected' : '' }}">
                                <a href="{{ route('brand.index') }}" class="sidebar-link {{ ( $controller == 'BrandController' ) ? 'active' : '' }}">
                                    <span class="hide-menu"> Brand</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{ ( $controller == 'ColorController' ) ? 'selected' : '' }}">
                                <a href="{{ route('color.index') }}" class="sidebar-link {{ ( $controller == 'ColorController' ) ? 'active' : '' }}">
                                    <span class="hide-menu"> Color</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{ ( $controller == 'SizeController' ) ? 'selected' : '' }}">
                                <a href="{{ route('size.index') }}" class="sidebar-link {{ ( $controller == 'SizeController' ) ? 'active' : '' }}">
                                    <span class="hide-menu"> Size</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="list-divider"></li>
            <li class="nav-small-cap">
                <span class="hide-menu">Report Management</span>
            </li>
            <li class="sidebar-item {{ ( $controller == 'Reports\PurchaseController' || $controller == 'Reports\SaleController' ) ? 'selected' : '' }}">
                <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <i data-feather="book-open" class="feather-icon"></i>
                    <span class="hide-menu">Report</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level base-level-line {{ ( $controller == 'Reports\PurchaseController' || $controller == 'Reports\SaleController' ) ? 'in' : '' }}">
                    <li class="sidebar-item {{ ( $controller == 'Reports\PurchaseController' ) ? 'selected' : '' }}">
                        <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false">
                            <span class="hide-menu">Purchase</span>
                        </a>
                        <ul aria-expanded="false" class="collapse second-level base-level-line {{ ( $controller == 'Reports\PurchaseController' ) ? 'in' : '' }}">
                            <li class="sidebar-item {{ ( $controller == 'Reports\PurchaseController' && $action == 'datewise' ) ? 'selected' : '' }}">
                                <a href="{{ route('purchase.report.datewise') }}" class="sidebar-link {{ ( $controller == 'Reports\PurchaseController' && $action == 'datewise' ) ? 'active' : '' }}">
                                    <span class="hide-menu"> Supplier Wise</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="sidebar-item {{ ( $controller == 'Reports\SaleController' ) ? 'selected' : '' }}">
                        <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false">
                            <span class="hide-menu">Sale</span>
                        </a>
                        <ul aria-expanded="false" class="collapse second-level base-level-line {{ ( $controller == 'Reports\SaleController' ) ? 'in' : '' }}">
                            <li class="sidebar-item {{ ( $controller == 'Reports\SaleController' && $action == 'datewise' ) ? 'selected' : '' }}">
                                <a href="{{ route('sales.report.datewise') }}" class="sidebar-link {{ ( $controller == 'Reports\SaleController' && $action == 'datewise' ) ? 'active' : '' }}">
                                    <span class="hide-menu"> Date Wise</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>

            <li class="list-divider"></li>
            <li class="nav-small-cap"><span class="hide-menu">Others</span></li>
            <li class="sidebar-item {{ ( $controller == 'CompanyController' ||
                    $controller == 'CustomerController' || $controller == 'SupplierController' ||
                    $controller == 'UserController' || $controller == 'RoleController' ||
                    $controller == 'SettingController' ) ? 'selected' : '' }}">
                <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <i data-feather="settings" class="feather-icon"></i>
                    <span class="hide-menu">Configuration</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level base-level-line {{ (
                    $controller == 'CompanyController' || $controller == 'CustomerController' ||
                    $controller == 'SupplierController' || $controller == 'UserController' ||
                    $controller == 'RoleController' || $controller == 'SettingController' ) ? 'in' : '' }}">
                    <li class="sidebar-item {{ ( $controller == 'CompanyController' ) ? 'selected' : '' }}">
                        <a href="{{ route('company.index') }}" class="sidebar-link {{ ( $controller == 'CompanyController' && $action == 'index' ) ? 'active' : '' }}">
                            <span class="hide-menu"> Company</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ ( $controller == 'CustomerController' && $action == 'entry' ) ? 'selected' : '' }}">
                        <a href="{{ route('customer.index') }}" class="sidebar-link {{ ( $controller == 'CustomerController' && $action == 'index' ) ? 'active' : '' }}">
                            <span class="hide-menu"> Customer</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ ( $controller == 'SupplierController' && $action == 'entry' ) ? 'selected' : '' }}">
                        <a href="{{ route('supplier.index') }}" class="sidebar-link {{ ( $controller == 'SupplierController' && $action == 'index' ) ? 'active' : '' }}">
                            <span class="hide-menu"> Supplier</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ ( $controller == 'UserController' && $action == 'entry' ) ? 'selected' : '' }}">
                        <a href="{{ route('user.role.index') }}" class="sidebar-link {{ ( $controller == 'UserController' && $action == 'index' ) ? 'active' : '' }}">
                            <span class="hide-menu"> User List</span>
                        </a>
                    </li>
                    @role('superadmin')
                    <li class="sidebar-item {{ ( $controller == 'RoleController' && $action == 'entry' ) ? 'selected' : '' }}">
                        <a href="{{ route('role.index') }}" class="sidebar-link {{ ( $controller == 'RoleController' && $action == 'index' ) ? 'active' : '' }}">
                            <span class="hide-menu"> Role List</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ ( $controller == 'SettingController' && $action == 'entry' ) ? 'selected' : '' }}">
                        <a href="{{ route('settings.index') }}" class="sidebar-link {{ ( $controller == 'SettingController' && $action == 'index' ) ? 'active' : '' }}">
                            <span class="hide-menu"> Settings</span>
                        </a>
                    </li>
                    @endrole
                </ul>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link sidebar-link" href="{{ route('logout') }}" aria-expanded="false"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                    <i data-feather="log-out" class="feather-icon"></i>
                    <span class="hide-menu">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
