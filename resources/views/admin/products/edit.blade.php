@extends('layouts.app')
@section('content')

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')


    <div class="form-group">
    <label for="id_category">ID Category:</label>
    <select name="id_category" class="form-control" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $product->id_category ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>
            

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
    </div>

    <div class="form-group">
        <label for="brand">Brand:</label>
        <input type="text" name="brand" class="form-control" value="{{ $product->brand }}" required>
    </div>

    <div class="form-group">
        <label for="describe">Describe:</label>
        <input type="text" name="describe" class="form-control" value="{{ $product->describe }}" required>
    </div>

    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
    </div>

    <div class="form-group">
        <label for="price_sale">Sale Price:</label>
        <input type="number" name="price_sale" class="form-control" value="{{ $product->price_sale }}" required>
    </div>

    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" name="image" class="form-control-file">
        <img src="{{ Storage::url('images/' . $product->image) }}" alt="Product Image" style="max-width: 200px;">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection