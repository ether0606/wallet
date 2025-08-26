@extends('layouts.app')
@section('title',"category list")
@section('content')
    <a class="btn btn-info" href="{{route('rihan.create')}}">Add New</a>
    <table>
        <tr>
            <th>#SL</th>
            <th>Name</th>
            <th>Description</th>
            <th>Active</th>
            <th>Action</th>
        </tr>
        @forelse ($data as $d)
            <tr>
                <td>{{$d->id}}</td>
                <td>{{$d->name}}</td>
                <td>{{$d->description}}</td>
                <td>{{$d->is_active?"Active":"Inactive"}}</td>
                <td>
                    <a href="{{route('rihan.edit',$d->id)}}">Edit</a>
                    <form method="post" action="{{route('rihan.destroy',$d->id)}}">
                        @csrf
                        @method('delete')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No Data found</td>
            </tr>
        @endforelse
    </table>
@endsection
