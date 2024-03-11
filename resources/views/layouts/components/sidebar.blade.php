<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('dashboard') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Admin</li><!-- /.menu-title -->
<<<<<<< HEAD
                <ul class="nav navbar-nav">

                    @can('user_access')
                        <li><a href="{{ route('users.index') }}"> <i class="bi bi-person-circle text-Danger"></i> Quản lý
                                người dùng</a></li>
                    @endcan
                    @can('permission_access')
                        <li><a href="{{ route('permissions.index') }}"> <i class="fa fa-bars"></i> Quản lý phân quyền</a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li><a href="{{ route('roles.index') }}"> <i class="fa fa-id-card-o"></i> Quản lý vai trò</a></li>
                    @endcan
                    @can('member_access')
                        <li><a href="{{ route('members.index') }}"> <i class="bi bi-people text-Danger"></i> Quản lý khách
                                hàng</a>
                        </li>
                    @endcan
                    @can('product_access')
                        <li></i><a href="{{ route('products.index') }}"><i class="bi bi-inboxes-fill text-Danger"></i> Quản
                                lý sản phẩm</a></li>
                    @endcan
                    @can('category_access')
                        <li><a href="{{ route('categories.index') }}"><i class="bi bi-grid-3x3-gap text-Danger"></i> Quản
                                lý danh mục</a>
                        </li>
                    @endcan
                    @can('order_access')
                        <li><a href="{{ route('listOder') }}"><i class="bi bi-bag-fill text-Danger"></i> Quản lý đơn
=======
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
                        @can('order_detail')
                            <li><i class="bi bi-cart4"></i><a href="{{ route('listOder_detail') }}">Chi tiết đơn hàng</a>
                            </li>
                        @endcan
                        @can('delivery_access')
                            <li><i class="bi bi-truck text-Danger"></i><a href="{{ route('listDelivery_status') }}">Trạng
                                    thái giao hàng</a></li>
                        @endcan
                        @can('statistics_access')
                            <li><i class="bi bi-graph-up-arrow text-Danger"></i><a
                                    href="{{ route('statistics.index') }}">Thống kê</a>
                            </li>
                        @endcan
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Thống kê</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-line-chart"></i><a href="charts-chartjs.html">Chart JS</a></li>
                        <li><i class="menu-icon fa fa-area-chart"></i><a href="charts-flot.html">Flot Chart</a></li>
                        <li><i class="menu-icon fa fa-pie-chart"></i><a href="charts-peity.html">Peity Chart</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa-solid fa-person-chalkboard"></i></i>Trang khách
                        hàng</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa-solid fa-person"></i><a href="{{ route('home') }}">Trang khách
>>>>>>> 7f4b2cb8dffac4783173be1a8795b9a6a3c82cd8
                                hàng</a></li>
                    @endcan
                    @can('comment_access')
                        <li><a href="{{ route('route_comment_index') }}"><i class="bi bi-chat-quote text-Danger"></i> Quản
                                lý
                                bình luận</a></li>
                    @endcan
                    @can('coupon_access')
                        <li><a href="{{ route('list_coupon') }}"><i class="bi bi-gift-fill text-Danger"></i> Quản lý
                                khuyến
                                mại</a></li>
                    @endcan
                    @can('orderStt_access')
                        <li><a href="{{ route('listOder_status') }}"><i class="bi bi-minecart text-Danger"></i> Trạng
                                thái đơn hàng</a></li>
                    @endcan
                    @can('order_detail')
                        <li><a href="{{ route('listOder_detail') }}"><i class="bi bi-cart4"></i> Chi tiết đơn hàng</a>
                        </li>
                    @endcan
                    @can('delivery_access')
                        <li><a href="{{ route('listDelivery_status') }}"><i class="bi bi-truck text-Danger"></i> Trạng
                                thái giao hàng</a></li>
                    @endcan
                    @can('statistics_access')
                        <li><a href="{{ route('statistics.index') }}"><i class="bi bi-graph-up-arrow text-Danger"></i>
                                Thống
                                kê</a>
                        </li>
                    @endcan
                    <li><a href="{{ route('home') }}"><i class="fa-solid fa-person"></i> Trang khách
                            hàng</a></li>
                </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
