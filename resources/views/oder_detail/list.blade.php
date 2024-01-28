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
                <th scope="col">PRODUCT_ID</th>
                <th scope="col">ODER_ID</th>
                <th scope="col">PRICE</th>
                <th scope="col">QUANTITY</th>
                <th scope="col">OPPTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listOder_detail as $oder)
            <tr>
                <th scope="row">{{$oder->id}}</th>
                <td>{{$oder->product_id}}</td>
                <td>{{$oder->oder_id}}</td>
                <td>{{$oder->price}}</td>
                <td>{{$oder->quantity}}</td>
                <td>
                    <a href="{{route('addOder_detail')}}" class="btn btn-success">ADD</a>
                    <a onclick="confirm('bạn có muốn xóa không?')" href="{{route('deleteOder_detail',['id'=>$oder->id])}}" class="btn btn-danger">DELETE</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>