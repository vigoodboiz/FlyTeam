<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('dashboard') }}"><i class="menu-icon fa fa-laptop"></i>Trang quản trị </a>
                </li>
                <li class="menu-title">Admin</li><!-- /.menu-title -->
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
                    {{-- @can('member_access')
                        <li><a href="{{ route('members.index') }}"> <i class="bi bi-people text-Danger"></i> Quản lý khách
                                hàng</a>
                        </li>
                    @endcan --}}
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
                        <li><a href="{{ route('listOder') }}"><i class="bi bi-bag-fill text-Danger"></i> Quản lý đơn hàng
                            @endcan
                            {{-- @can('comment_access')
                        <li><a href="{{ route('route_comment_index') }}"><i class="bi bi-chat-quote text-Danger"></i> Quản
                                lý
                                bình luận</a></li>
                    @endcan --}}
                            @can('coupon_access')
                        <li><a href="{{ route('list_coupon') }}"><i class="bi bi-gift-fill text-Danger"></i> Quản lý
                                khuyến
                                mại</a></li>
                    @endcan
                    {{-- @can('orderStt_access')
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
                    --}}
                    <li><a href="{{ route('home') }}"><i class="fa-solid fa-person"></i> Trang khách
                            hàng</a></li>
                </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
