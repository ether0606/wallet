@extends('layouts.app')
@section('pageTitle',"Item Create")

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Add New Item</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> </h6>

        </div>
        <div class="card-body">
            <form action="{{route('item.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control">
                        @if ($errors->has('name'))
                            <span class="text-danger"> {{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @forelse ($category as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                            @empty

                            @endforelse
                        </select>
                        @if ($errors->has('category_id'))
                            <span class="text-danger"> {{ $errors->first('category_id') }}</span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <label for="">Tag</label>
                        <select name="tags[]" multiple class="form-control">
                            <option value="">Select Tag</option>
                            @forelse ($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @empty

                            @endforelse
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control">{{old('description')}}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>

@endsection
