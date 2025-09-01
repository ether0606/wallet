@extends('layouts.app')
@section('pageTitle',"Item list")

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Item List</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{route('item.create')}}" class="btn btn-primary float-right">Add New</a>
            </h6>
            <form action="{{route('item.index')}}" method="get">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{request()->name}}" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <label for="">Status</label>
                        <select name="is_active" class="form-control">
                            <option value="">select status</option>
                            <option {{request()->is_active=="1"?"selected":""}} value="1">Active</option>
                            <option {{request()->is_active=="0"?"selected":""}} value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="col-sm-4 mt-4 pt-1">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="{{route('item.index')}}" class="btn btn-success">Reset</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#SL</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($datas as $data)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->categories?->name}}</td>
                                <td>{{$data->tags?->pluck('name')}}</td>
                                <td>{{$data->description}}</td>
                                <td>
                                    <a href="{{route('item.edit',$data->id)}}" class="btn btn-info">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger" onclick="$('#delete{{$data->id}}').submit()">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="delete{{$data->id}}" action="{{route('item.destroy',$data->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No Data found</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                {{$datas->links()}}
            </div>
        </div>
    </div>

@endsection
