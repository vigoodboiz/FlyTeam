<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
 </head>
 <body>
 <form action="{{route('addOder_status')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">oder_id :</label>
        <input name="oder_id" type="text" class="form-control" id="formGroupExampleInput" placeholder="oder_id">
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">status :</label>
        <input name="status" type="text" class="form-control" id="formGroupExampleInput" placeholder="status">
    </div><br>
    
    <button type="submit" class="btn btn-success">ADD</button>
    <a href="{{route('listOder_status')}}" class="btn btn-success">LIST</a>
</form>
 </body>
 </html>