@extends('layouts.app')
@section('content')


<h1>Categories</h1>


<h2></h2>

    <button type="submit" class="btn btn-primary"><a href="{{ route('categories.create') }}">thêm</a></button>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>

                    <td><img src="{{ asset('images/' . $category->image) }}" alt="{{ $category->name }}" width="100"></td>


            <td>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen"></i></a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash mr-0"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $categories->links() }}
@endsection

