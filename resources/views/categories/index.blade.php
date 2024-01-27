<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
</head>
<body>
    <h1>Categories</h1>

    <h2><a href="{{ route('categories.create') }}">thêm</a></h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>

            <td><a href="{{ route('categories.edit', $category->id) }}">Edit</a></td>
            <td>
                 <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
       
        
        @endforeach                                                                                     

       
    </table>
</body>
</html>