@extends('layouts.app')
@section('title',"Edit Category")

@push('styles')
    <style>
        label{
            color: red;
        }
    </style>
@endpush

@section('content')
<div class="row">
    <div class="col-sm-6">
        <form method="post" action="{{route('rihan.update',$rihan->id)}}">
        @csrf
        @method('PATCH')
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{$rihan->name}}"><br>
        <label>Description</label>
        <input type="text" name="description" class="form-control" value="{{$rihan->description}}"><br>

        <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection

