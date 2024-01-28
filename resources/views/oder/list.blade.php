<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
</head>

<body>
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
            @foreach($listOder as $oder)
            <tr>
                <th scope="row">{{$oder->id}}</th>
                <td>{{$oder->user_id}}</td>
                <td>{{$oder->date}}</td>
                <td>{{$oder->total}}</td>
                <td>{{$oder->address}}</td>
                <td>
                    <a href="{{route('addOder')}}" class="btn btn-success">ADD</a>
                    <a onclick="confirm('bạn có muốn xóa không?')" href="{{route('deleteoder',['id'=>$oder->id])}}" class="btn btn-danger">DELETE</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>