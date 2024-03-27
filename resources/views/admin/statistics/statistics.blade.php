@extends('layouts.app')

@section('content')
    <canvas id="column-chart" width="800" height="400"></canvas>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-1">
                        <i class="fa-solid fa-briefcase"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text"><span class="count">{{ $totalProducts }}</span></div>
                            <div class="stat-heading">Sản phẩm</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h1>Top 5 khách hàng mua hàng nhiều nhất</h1>
    <table class="table table-borderless">
        <thead>
            <tr>
                <th>Tên khách hàng</th>
                <th>Số đơn hàng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($topBuyers as $buyer)
                <tr>
                    <td>{{ $buyer->user->name }}</td>
                    <td>{{ $buyer->total_orders }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if ($topViewedProducts->count() > 0)
        {{-- <h2>Top 10 sản phẩm được xem nhiều nhất</h2>
        <ul>
            @foreach ($topViewedProducts as $product)
                <li>{{ $product->name }} - Số lượt xem: {{ $product->view_count }}</li>
            @endforeach
        </ul> --}}
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <h4 class="card-header" style="text-align: center">Top 10 sản phẩm có lượt xem nhiều nhất</h4>

                    <div class="card-body">
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topViewedProducts as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td><span style="color: blue">{{ $product->view_count }} lượt xem</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <ul>
                            @foreach ($topViewedProducts as $product)
                                <li>{{ $product->name }} - Số lượt xem: <span
                                        style="color: blue">{{ $product->view_count }}</span></li>
                            @endforeach
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    @else
        <p>Không có dữ liệu để hiển thị.</p>
    @endif
@endsection
@section('js_Statistic')
    <script>
        // Lấy dữ liệu từ controller
        var products = @json($products);
        var categories = @json($categories);

        // Tạo mảng chứa các nhãn và giá trị từ dữ liệu
        var categoryLabels = [];
        var productValues = [];

        categories.forEach(function(category) {
            categoryLabels.push(category.name);
            var count = products.filter(function(products) {
                return products.id_category == category.id;
            }).length;
            productValues.push(count);
        });


        var ctx = document.getElementById('column-chart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: categoryLabels,
                datasets: [{
                    label: 'Number of Products',
                    data: productValues,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
