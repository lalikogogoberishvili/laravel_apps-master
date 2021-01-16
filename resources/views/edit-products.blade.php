@extends("layouts.main2")

@section("content")

<div class="card">
    <form action="{{route('products.update')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$product->id}}">    
        <div class="card-header">
            <h3>Edit Products</h3>
        </div>

        <div class="card-body">
            <div class="card-group">
                <label >Name</label>
                <input name="name" type="text" value="{{$product->name}}" class="form-control" >
            </div>
            <div class="card-group">
                <label >Price</label>
                <input name="price" type="number" value="{{$product->Price}}" class="form-control" >
            </div>
            <div class="card-group">
                <label >Category</label>
                <input name="category" type="text" value="{{$product->category}}" class="form-control" >
            </div>
        </div>

        <div class="card-footer">
            <button class="btn btn-success">Save</button>
        </div>
    </form>    
</div>

@endsection