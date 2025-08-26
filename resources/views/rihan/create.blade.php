@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-6">
        <form method="post" action="{{route('rihan.store')}}">
            @csrf
            <label>Name</label>
            <input type="text" name="name" class="form-control"><br>
            <label>Description</label>
            <input type="text" name="description" class="form-control"><br>

            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</div>

@endsection

@section('title',"Add Category")
