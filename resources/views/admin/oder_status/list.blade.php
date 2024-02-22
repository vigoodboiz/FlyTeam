@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1> <br>
    <table class="table">

        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ODER_ID</th>
                <th scope="col">STATUS</th>
                <th scope="col">OPPTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listOder_status as $oder)
                <tr>
                    <th scope="row">{{ $oder->id }}</th>
                    <td>{{ $oder->oder_id }}</td>
                    <td>{{ $oder->status }}</td>
                    <td>
                        @can('orderStt_create')
                            <a href="{{ route('addOder_status') }}" class="btn btn-success">ADD</a>
                        @endcan
                        @can('orderStt_edit')
                            <a href="{{ route('editOder_status', ['id' => $oder->id]) }}" class="btn btn-primary">EDIT</a>
                        @endcan
                        @can('orderStt_delete')
                            <a onclick="return confirm('bạn có muốn xóa không?')"
                                href="{{ route('deleteOder_status', ['id' => $oder->id]) }}" class="btn btn-danger">DELETE</a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
