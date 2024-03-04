@extends('layouts.app')

@section('content')
<h1>{{ $title }}</h1><br>
<table class="table">

    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">ID</th>
            <th scope="col">ODER_ID</th>
            <th scope="col">STATUS</th>
            <th scope="col">OPPTION</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listDelivery_status as $oder)
        <tr>
            <td>{{ ++$i }}</td>
            <th scope="row">{{ $oder->id }}</th>
            <td>{{ $oder->oder_id }}</td>
            <td>{{ $oder->status }}</td>
            <td>
                @can('delivery_edit')
                <a href="{{ route('editDelivery_status', ['id' => $oder->id]) }}" class="btn btn-primary"><i class="fa-solid fa-pen"></i></a>
                @endcan
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