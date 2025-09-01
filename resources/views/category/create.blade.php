@extends('layouts.app')
@section('pageTitle',"Category Create")

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Add New Category</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> </h6>

        </div>
        <div class="card-body">
            <form action="{{route('category.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-8">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control">
                        @if ($errors->has('name'))
                            <span class="text-danger"> {{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <label for="">Status</label>
                        <select name="is_active" class="form-control">
                            <option value="">select status</option>
                            <option {{old('is_active')=="1"?"selected":""}} value="1">Active</option>
                            <option {{old('is_active')=="0"?"selected":""}} value="0">Inactive</option>
                        </select>
                        @if ($errors->has('is_active'))
                            <span class="text-danger"> {{ $errors->first('is_active') }}</span>
                        @endif
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
