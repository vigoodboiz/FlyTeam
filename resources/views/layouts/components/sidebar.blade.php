<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('dashboard') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Admin</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Danh sách quản lý</a>
                    <ul class="sub-menu children dropdown-menu">

                        @can('user_access')
                            <li><i class="bi bi-person-circle text-Danger"></i><a href="{{ route('users.index') }}">Quản lý
                                    người dùng</a></li>
                        @endcan
                        @can('permission_access')
                            <li><i class="fa fa-bars"></i><a href="{{ route('permissions.index') }}">Quản lý phân quyền</a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li><i class="fa fa-id-card-o"></i><a href="{{ route('roles.index') }}">Quản lý vai trò</a></li>
                        @endcan
                        @can('member_access')
                            <li><i class="bi bi-people text-Danger"></i><a href="{{ route('members.index') }}">Quản lý khách
                                    hàng</a>
                            </li>
                        @endcan
                        @can('product_access')
                            <li><i class="bi bi-inboxes-fill text-Danger"></i><a href="{{ route('products.index') }}">Quản
                                    lý sản phẩm</a></li>
                        @endcan
                        @can('category_access')
                            <li><i class="bi bi-grid-3x3-gap text-Danger"></i></i><a
                                    href="{{ route('categories.index') }}">Quản lý danh mục</a>
                            </li>
                        @endcan
                        @can('order_access')
                            <li><i class="bi bi-bag-fill text-Danger"></i><a href="{{ route('listOder') }}">Quản lý đơn
                                    hàng</a></li>
                        @endcan
                        @can('comment_access')
                            <li><i class="bi bi-chat-quote text-Danger"></i><a
                                    href="{{ route('route_comment_index') }}">Quản lý bình luận</a></li>
                        @endcan
                        @can('coupon_access')
                            <li><i class="bi bi-gift-fill text-Danger"></i></i><a href="{{ route('list_coupon') }}">Quản lý
                                    khuyến
                                    mại</a></li>
                        @endcan
                        @can('orderStt_access')
                            <li><i class="bi bi-minecart text-Danger"></i><a href="{{ route('listOder_status') }}">Trạng
                                    thái đơn hàng</a></li>
                        @endcan
                        @can('orderDetail_access')
                            <li><i class="bi bi-cart4"></i><a href="{{ route('listOder_detail') }}">Chi tiết đơn hàng</a>
                            </li>
                        @endcan
                        @can('delivery_access')
                            <li><i class="bi bi-truck text-Danger"></i><a href="{{ route('listDelivery_status') }}">Trạng
                                    thái giao hàng</a></li>
                        @endcan
                        @can('statistics_access')
                            <li><i class="bi bi-graph-up-arrow text-Danger"></i><a href="ui-typgraphy.html">Thống kê</a>
                            </li>
                        @endcan
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tables</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="tables-basic.html">Basic Table</a></li>
                        <li><i class="fa fa-table"></i><a href="tables-data.html">Data Table</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Basic Form</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
                    </ul>
                </li>

                <li class="menu-title">Icons</li><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Icons</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Font Awesome</a>
                        </li>
                        <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Themefy Icons</a></li>
                    </ul>
                </li>
                <li>
                    <a href="widgets.html"> <i class="menu-icon ti-email"></i>Widgets </a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Charts</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-line-chart"></i><a href="charts-chartjs.html">Chart JS</a></li>
                        <li><i class="menu-icon fa fa-area-chart"></i><a href="charts-flot.html">Flot Chart</a></li>
                        <li><i class="menu-icon fa fa-pie-chart"></i><a href="charts-peity.html">Peity Chart</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Maps</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.html">Google Maps</a></li>
                        <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Vector Maps</a></li>
                    </ul>
                </li>
                <li class="menu-title">Extras</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                        <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
