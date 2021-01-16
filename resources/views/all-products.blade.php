@extends("layouts.main2")

@section("content")
    <div class="card">
        <div class="card-header">
            Create Product
        </div>
        <form action="{{route('products.store')}}" method="post">
        @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" placeholder="Enter Name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" name="Price" placeholder="Enter Price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    <input type="text" name="category" placeholder="Enter Category" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <button type=reset class="btn btn-danger">Cancel</button>
                <button class="btn btn-success">Save</button>
            </div>
        </form>
    </div>




    <div class="card">
        <div>
            <h3>All Products</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Cateogry</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->Price}}</td>
                            <td>{{$product->category}}</td>
                            <td>
                                <form action="{{route('products.delete')}}"method="post">
                                    @csrf
                                    <input type="hidden" value="{{$product->id}}" name="product_id">
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                                
                                <a href="{{route('products.edit')}}?product_id={{$product->id}}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection