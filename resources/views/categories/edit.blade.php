<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Category Name:</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}">
    </div>
    <!-- <div>
        <label for="description">Category Description:</label>
        <textarea name="description" id="description">{{ $category->description }}</textarea>
    </div> -->
    <button type="submit">Update Category</button>
</form>
