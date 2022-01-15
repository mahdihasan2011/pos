<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('public') }}/logo/infrequentbd.jpeg" alt="{{ config('app.name') }}"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @guest

        @else
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('public/master') }}/dist/img/user2-160x160.jpg"
                         class="img-circle elevation-2" alt="{{ Auth::user()->name }}">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{ route('home') }}" class="nav-link {{ ( $controller == 'HomeController'
              && $action == 'index' ) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    @role('admin|superadmin')
                        <li class="nav-item has-treeview">
                            <a href="#"
                               class="nav-link {{ ( $controller == 'RoleController' || $controller == 'UserController' ) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Setup
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('user.role.index') }}"
                                       class="nav-link {{ ( $controller == 'UserController' ) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User Role</p>
                                    </a>
                                </li>
                                @role('superadmin')
                                    <li class="nav-item">
                                        <a href="{{ route('role.index') }}"
                                           class="nav-link {{ ( $controller == 'RoleController' ) ? 'active' : '' }}">
                                            <i class="fas fa-circle nav-icon"></i>
                                            <p>Role List</p>
                                        </a>
                                    </li>
                                @endrole
                            </ul>
                        </li>
                    @endrole

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link {{ ( $controller == 'CompanyController' ||
              $controller == 'CustomerController' || $controller == 'SupplierController' ) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cog fa-spin fa-3x fa-fw"></i>
                            <p>Configuration
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('company.index') }}" class="nav-link">
                                    <i class="fas fa-university nav-icon"></i>
                                    <p>Company</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('customer.index') }}" class="nav-link">
                                    <i class="fas fa-user-circle nav-icon"></i>
                                    <p>Customer</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('supplier.index') }}" class="nav-link">
                                    <i class="far fa-user-circle nav-icon"></i>
                                    <p>Supplier</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
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
                            <li class="nav-item">
                                <a href="{{ route('product.entry') }}" class="nav-link">
                                    <i class="fas fa-cubes nav-icon"></i>
                                    <p>Item Entry</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('product.index') }}" class="nav-link">
                                    <i class="fas fa-th-list nav-icon"></i>
                                    <p>Item List</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-th-large"></i>
                                    <p>Item Setup</p>
                                    <i class="fas fa-angle-left right"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('category.index') }}" class="nav-link">
                                            <i class="fas fa-cube nav-icon"></i>
                                            <p>Category</p>
                                        </a>
                                    </li>
                                <!--                  <li class="nav-item">
                    <a href="{{ route('group.index') }}" class="nav-link">
                      <i class="fas fa-sitemap nav-icon"></i>
                      <p>Group</p>
                    </a>
                  </li>-->
                                    <li class="nav-item">
                                        <a href="{{ route('brand.index') }}" class="nav-link">
                                            <i class="fas fa-podcast nav-icon"></i>
                                            <p>Brand</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('color.index') }}" class="nav-link">
                                            <i class="fas fa-adjust nav-icon fa-spin fa-3x fa-fw"></i>
                                            <p>Color</p>
                                        </a>
                                    </li>
                                <!--                  <li class="nav-item">
                    <a href="{{ route('type.index') }}" class="nav-link">
                      <i class="fas fa-map-signs nav-icon"></i>
                      <p>Type</p>
                    </a>
                  </li>-->
                                    <li class="nav-item">
                                        <a href="{{ route('size.index') }}" class="nav-link">
                                            <i class="fas fa-map-pin nav-icon"></i>
                                            <p>Size</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link {{ ( $controller == 'PurchaseController' ) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cart-plus"></i>
                            <p>Purchase Management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('purchase.item') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Purchase</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link {{ ( $controller == 'SaleController' ) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cart-arrow-down"></i>
                            <p>Sales Management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('sale.item') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sales</p>
                                </a>
                            </li>
                        <!--              <li class="nav-item">
                <a href="{{ route('pos.terminal') }}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>POS</p>
                </a>
              </li>-->
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link {{ ( $controller == 'StockController' ) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-server"></i>
                            <p>Stock Management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('stock.current') }}" class="nav-link">
                                    <i class="fas fa-circle nav-icon"></i>
                                    <p>Current Stock</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link {{ ( $controller == 'Reports\PurchaseController' ||
                $controller == 'Reports\SaleController' ) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-print"></i>
                            <p>Reports
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
                        </ul>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        @endguest

    </div>
    <!-- /.sidebar -->
</aside>
