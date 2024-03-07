<!-- resources/views/statistics.blade.php -->
@extends('layouts.app')

@section('content')

 

    <canvas id="column-chart" width="800" height="400"></canvas>


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