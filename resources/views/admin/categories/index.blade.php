@extends('layouts.app')
@section('content')
<<<<<<< HEAD
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Danh sách danh mục</h4>
                    </div>
                    <div>
                        @can('category_create')
                            <a href="{{ route('categories.create') }}" class="btn btn-primary add-list"><i
                                    class="las la-plus mr-3"></i>Thêm danh mục</a>
                        @endcan
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên danh mục</th>
                        <th>Ảnh danh mục</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>

                            <td><img src="{{ asset('images/' . $category->image) }}" alt="{{ $category->name }}"
                                    width="100"></td>
                            <td>
                                @can('category_edit')
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary"><i
                                            class="fa-solid fa-pen"></i></a>
                                @endcan
                                @can('category_delete')
                                    <form id="delete-form" action="{{ route('categories.destroy', $category->id) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" id="delete-button"><i
                                                class="fa fa-trash mr-0"></i></button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    @endsection
=======
    <h1>Categories</h1>
    @can('category_create')
        <button type="submit" class="btn btn-primary"><a href="{{ route('categories.create') }}">thêm</a></button>
    @endcan
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
                        @can('category_edit')
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary"><i
                                    class="fa-solid fa-pen"></i></a>
                        @endcan
                        @can('category_delete')
                            <form id="delete-form" action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="showDeleteConfirmation()"><i
                                        class="fa fa-trash mr-0"></i></button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
@endsection
>>>>>>> 7f4b2cb8dffac4783173be1a8795b9a6a3c82cd8
