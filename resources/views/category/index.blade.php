@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @include('category.comp', ['categories' => $categories])
            </div>
        </div>
    </div>


@endsection