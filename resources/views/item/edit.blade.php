@extends("layouts.admin")

@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Post</div>

                <div class="card-body">
                    <form method="POST" action="{{isset($item)?route('admin.item.update',['item'=>$item->id]):route('admin.item.store') }}" >
                        @csrf
                        @if(isset($item))
                            @method('PUT')
                        @endif    
                    
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Enter Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{isset($card)?$card->name: old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="slug" class="col-md-4 col-form-label text-md-right">Enter Slug</label>

                            <div class="col-md-6">
                                <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ isset($card)?$card->title:old('slug') }}"  autocomplete="slug" autofocus>

                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
              </div>

                       

                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">Choose Cateogry</label>

                            <div class="col-md-6">
                                <select name="category_id"  class="form-control @error('post') is-invalid @enderror">
                                    @foreach($categories as $category)
                                        {{isset($item)&&$item->category_id==$category->id?'category=""' : ''}}
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   {{isset($item)? "Update Item" : "Create New Item"}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection('content')