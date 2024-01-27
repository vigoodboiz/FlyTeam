<form action="{{ route('categories.store') }}" method="POST">


    @csrf
    <div>
        <label for="name">Category Name:</label>
        <input type="text" name="name" id="name">
    </div>
    <button type="submit">Add Category</button>
</form>