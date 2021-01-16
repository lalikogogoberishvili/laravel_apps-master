@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Items</div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Manipulate</th>
                            </tr>

                            @foreach ($itmes as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td>
                                        <form method="POST"
                                            action="{{ route('admin.item.destroy', ['item' => $item->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                            <a href="{{ route('admin.item.edit', ['item' => $item->id]) }}"
                                                class="btn btn-sm btn-success">Edit</a>
                                        </form>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </table>
                        <a href="{{route('admin.item.create')}}">Create New Item</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection