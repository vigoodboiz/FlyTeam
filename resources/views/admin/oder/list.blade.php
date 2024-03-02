@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1><br>
    <table class="table">

        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">USER_ID</th>
                <th scope="col">DATE</th>
                <th scope="col">TOTAL</th>
                <th scope="col">ADDRESS</th>
                <th scope="col">OPPTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listOder as $oder)
                <tr>
                    <th scope="row">{{ $oder->id }}</th>
                    <td>{{ $oder->user_id }}</td>
                    <td>{{ $oder->date }}</td>
                    <td>{{ $oder->total }}</td>
                    <td>{{ $oder->address }}</td>
                    <td>

                        @can('order_edit')
                            <a href="{{ route('editoder', ['id' => $oder->id]) }}" class="btn btn-primary"><i
                                    class="fa-solid fa-pen"></i></a>
                        @endcan
                        @can('order_delete')
                            <a onclick="return confirm('Bạn có muốn xóa không?')"
                                href="{{ route('deleteoder', ['id' => $oder->id]) }}" class="btn btn-danger"><i
                                    class="fa fa-trash mr-0"></i></a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
