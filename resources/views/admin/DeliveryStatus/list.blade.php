@extends('layouts.app')

@section('content')
<h1>{{ $title }}</h1><br>
<table class="table">

    <thead>
        <tr>
            <th scope="col">ODER_ID</th>
            <th scope="col">USER</th>
            <th scope="col">PRODUCT NAME</th>
            <th scope="col">STATUS_ODER</th>
            <th scope="col">STATUS</th>
            <th scope="col">OPPTION</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listDelivery_status as $oder)
        <tr>
            <th scope="row">{{ $oder->id }}</th>
            <td>{{ $oder->user->name }}</td>
            <td>{{ $oder->product->name }}</td>
            <td>{{ $oder->payment_status }}</td>
            <td class="form-group">
                <select class="form-control delivery-select" data-delivery-id="{{ $oder->id }}">
                    <option value="Đang Xử Lý" {{ $oder->delivery_status == 'Đang Xử Lý' ? 'selected' : '' }}>Đang Xử Lý</option>
                    <option value="Đang Giao Hàng" {{ $oder->delivery_status == 'Đang Giao Hàng' ? 'selected' : '' }}>Đang Giao Hàng</option>
                    <option value="Đã Giao Hàng" {{ $oder->delivery_status == 'Đã Giao Hàng' ? 'selected' : '' }}>Đã Giao Hàng</option>
                </select>
            </td>
            <td>
                @can('delivery_delete')
                <a onclick="return confirm('bạn có muốn xóa không?')" href="{{ route('deleteDelivery_status', ['id' => $oder->id]) }}" class="btn btn-danger"><i class="fa fa-trash mr-0"></i></a>
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $listDelivery_status->links() }}
@endsection

@section('update-delivery')
<script>
    $(document).ready(function() {
        $('.delivery-select').on('change', function() {
            var oderId = $(this).data('delivery-id');
            var newStatus = $(this).val();

            $.ajax({
                url: '{{ route('updateDelivery_status') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: oderId,
                    status: newStatus
                },
                success: function(response) {
                    // Xử lý thành công
                    console.log(response);
                },
                error: function(xhr) {
                    // Xử lý lỗi
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection