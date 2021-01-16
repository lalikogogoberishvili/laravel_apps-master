@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <section>
                        <a href="{{route('admin.item.index')}}">View Cards</a>
                    </section>
                    <section>
                        <a href="{{route('admin.category.index')}}">View Categories</a>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection