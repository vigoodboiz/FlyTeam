@extends('welcome')

@section('content')

    <main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        <div class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a href="index.html">Trang chủ</a></li>
                                <li class="breadcrumb__content--menu__items"><span>Chính sách bảo mật</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End breadcrumb section -->

        <!-- Start privacy policy section -->
        <div class="privacy__policy--section section--padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="privacy__policy--content">
                            <h2 class="privacy__policy--content__title">Chúng tôi là</h2>
                            <p class="privacy__policy--content__desc">Trang web của chúng tôi là: <a href="mailto:info@example.com">info@example.com</a></p>
                        </div>
                        <div class="privacy__policy--content section_2">
                            <h2 class="privacy__policy--content__title">Dữ liệu cá nhân nào chúng tôi thu thập và lý do chúng tôi thu thập dữ liệu đó</h2>
                            <h3 class="privacy__policy--content__subtitle">Bình luận</h3>
                            <p class="privacy__policy--content__desc">Khi khách truy cập để lại nhận xét trên trang web, chúng tôi sẽ thu thập dữ liệu hiển thị trong biểu mẫu nhận xét cũng như địa chỉ IP của khách truy cập và chuỗi tác nhân người dùng trình duyệt để giúp phát hiện thư rác.</p>
                            <p class="privacy__policy--content__desc">Một chuỗi ẩn danh được tạo từ địa chỉ email của bạn có thể được cung cấp cho dịch vụ Gravatar để xem bạn có đang sử dụng nó hay không. Chính sách quyền riêng tư của dịch vụ Gravatar có tại đây: https://automattic.com/privacy/. Sau khi phê duyệt bình luận của bạn, ảnh hồ sơ của bạn sẽ được hiển thị công khai trong bình luận của bạn.</p>
                            <h3 class="privacy__policy--content__subtitle">Phương tiện truyền thông</h3>
                            <p class="privacy__policy--content__desc">Nếu bạn tải hình ảnh lên trang web, bạn nên tránh tải lên hình ảnh có chứa dữ liệu vị trí được nhúng (EXIF GPS). Khách truy cập vào trang web có thể tải xuống và trích xuất bất kỳ dữ liệu vị trí nào từ hình ảnh trên trang web.</p>
                            <h3 class="privacy__policy--content__subtitle">Cookies</h3>
                            <p class="privacy__policy--content__desc">Nếu bạn để lại nhận xét trên trang web của chúng tôi, bạn có thể chọn tham gia lưu tên, địa chỉ email và trang web của mình vào cookie. Những điều này nhằm mục đích thuận tiện cho bạn để bạn không phải điền lại thông tin chi tiết của mình khi để lại nhận xét khác. Những cookie này sẽ tồn tại trong một năm.</p>
                            <p class="privacy__policy--content__desc">Nếu bạn có tài khoản và đăng nhập vào trang này, chúng tôi sẽ đặt cookie tạm thời để xác định xem trình duyệt của bạn có chấp nhận cookie hay không. Cookie này không chứa dữ liệu cá nhân và bị loại bỏ khi bạn đóng trình duyệt</p>
                            <p class="privacy__policy--content__desc">Khi bạn đăng nhập, chúng tôi cũng sẽ thiết lập một số cookie để lưu thông tin đăng nhập và các lựa chọn hiển thị trên màn hình của bạn. Cookie đăng nhập tồn tại trong hai ngày và cookie tùy chọn màn hình tồn tại trong một năm. Nếu bạn chọn “Ghi nhớ tôi”, thông tin đăng nhập của bạn sẽ tồn tại trong hai tuần. Nếu bạn đăng xuất khỏi tài khoản của mình, cookie đăng nhập sẽ bị xóa.</p>
                            <p class="privacy__policy--content__desc">Nếu bạn chỉnh sửa hoặc xuất bản một bài viết, một cookie bổ sung sẽ được lưu trong trình duyệt của bạn. Cookie này không bao gồm dữ liệu cá nhân và chỉ cho biết ID bài đăng của bài viết bạn vừa chỉnh sửa. Nó hết hạn sau 1 ngày.</p>
                            <h3 class="privacy__policy--content__subtitle">Nội dung được nhúng từ các trang web khác</h3>
                            <p class="privacy__policy--content__desc">Các bài viết trên trang này có thể bao gồm nội dung được nhúng (ví dụ: video, hình ảnh, bài viết, v.v.). Nội dung được nhúng từ các trang web khác hoạt động theo cách giống hệt như khi khách truy cập đã truy cập trang web đó.</p>
                            <p class="privacy__policy--content__desc">Các trang web này có thể thu thập dữ liệu về bạn, sử dụng cookie, nhúng theo dõi bổ sung của bên thứ ba và giám sát sự tương tác của bạn với nội dung được nhúng đó, bao gồm theo dõi tương tác của bạn với nội dung được nhúng nếu bạn có tài khoản và đăng nhập vào trang web đó</p>
                        </div>
                        <div class="privacy__policy--content section_3">
                            <h2 class="privacy__policy--content__title">Chúng tôi lưu giữ dữ liệu của bạn trong bao lâu</h2>
                            <p class="privacy__policy--content__desc">Nếu bạn để lại nhận xét, nhận xét đó và siêu dữ liệu của nó sẽ được giữ lại vô thời hạn. Điều này là để chúng tôi có thể tự động nhận ra và phê duyệt mọi nhận xét tiếp theo thay vì giữ chúng trong hàng đợi kiểm duyệt.</p>
                            <p class="privacy__policy--content__desc">Đối với người dùng đăng ký trên trang web của chúng tôi (nếu có), chúng tôi cũng lưu trữ thông tin cá nhân họ cung cấp trong hồ sơ người dùng của họ. Tất cả người dùng có thể xem, chỉnh sửa hoặc xóa thông tin cá nhân của mình bất kỳ lúc nào (ngoại trừ việc họ không thể thay đổi tên người dùng của mình). Quản trị viên trang web cũng có thể xem và chỉnh sửa thông tin đó</p>
                        </div>
                        <div class="privacy__policy--content section_3">
                            <h2 class="privacy__policy--content__title">Bạn có quyền gì đối với dữ liệu của mình</h2>
                            <p class="privacy__policy--content__desc">Nếu bạn có tài khoản trên trang web này hoặc đã để lại nhận xét, bạn có thể yêu cầu nhận tệp xuất dữ liệu cá nhân mà chúng tôi lưu giữ về bạn, bao gồm mọi dữ liệu bạn đã cung cấp cho chúng tôi. Bạn cũng có thể yêu cầu chúng tôi xóa mọi dữ liệu cá nhân mà chúng tôi lưu giữ về bạn. Điều này không bao gồm bất kỳ dữ liệu nào chúng tôi có nghĩa vụ lưu giữ cho mục đích hành chính, pháp lý hoặc bảo mật.</p>
                        </div>
                        <div class="privacy__policy--content section_3">
                            <h2 class="privacy__policy--content__title">Nơi chúng tôi gửi dữ liệu của bạn</h2>
                            <p class="privacy__policy--content__desc">Nhận xét của khách truy cập có thể được kiểm tra thông qua dịch vụ phát hiện thư rác tự động.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End privacy policy section -->

        <!-- Start feature section -->
        <section class="feature__section section--padding pt-0">
            <div class="container">
                <div class="feature__inner d-flex justify-content-between">
                    <div class="feature__items d-flex align-items-center">
                        <div class="feature__icon">

                            <img src="{{asset('becute/assets/img/other/feature1.webp')}}" alt="img">
                        </div>
                        <div class="feature__content">
                            <h2 class="feature__content--title h3">Miễn phí vận chuyển</h2>
                            <p class="feature__content--desc">Miễn phí vận chuyển cho đơn hàng trên 2.000.000đ</p>
                        </div>
                    </div>
                    <div class="feature__items d-flex align-items-center">
                        <div class="feature__icon ">

                            <img src="{{asset('becute/assets/img/other/feature2.webp')}}" alt="img">
                        </div>
                        <div class="feature__content">
                            <h2 class="feature__content--title h3">Hỗ trợ 24/7</h2>
                            <p class="feature__content--desc">Liên hệ với chúng tôi 24 tiếng</p>
                        </div>
                    </div>
                    <div class="feature__items d-flex align-items-center">
                        <div class="feature__icon">

                            <img src="{{asset('becute/assets/img/other/feature3.webp')}}" alt="img">
                        </div>
                        <div class="feature__content">
                            <h2 class="feature__content--title h3">100% hoàn tiền</h2>
                            <p class="feature__content--desc">Bạn có 30 ngày để trả hàng</p>
                        </div>
                    </div>
                    <div class="feature__items d-flex align-items-center">
                        <div class="feature__icon">

                            <img src="{{asset('becute/assets/img/other/feature4.webp')}}" alt="img">
                        </div>
                        <div class="feature__content">
                            <h2 class="feature__content--title h3">Thanh toán an toàn</h2>
                            <p class="feature__content--desc">Chúng tôi đảm bảo thanh toán an toàn</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End feature section -->

    </main>
    @endsection
