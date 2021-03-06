<div class="card">
    <div class="card-header">Categories</div>

    <div class="card-body">
        <table class="table" id="categories-table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>

            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <button data-deleteurl="{{ route('admin.category.destroy', ['category' => $category->id]) }}"
                            onclick="deleteCategory(event)" class="btn btn-sm btn-danger">Delete</button>
                        <a href="{{ route('admin.category.edit', ['category' => $category->id]) }}"
                            class="btn btn-sm btn-success">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

<script>
    function refreshCategoryTable() {
        $("#categories-table").load(location.href + " #categories-table");
    }
    function deleteCategory(e) {
        e.preventDefault();
        $.ajax({
            url: $(e.target).data('deleteurl'),
            type: 'DELETE',
            success: function(data) {
                refreshCategoryTable();
            }
        });
    }
 </script>   