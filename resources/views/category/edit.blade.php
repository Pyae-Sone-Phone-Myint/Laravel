@extends('layouts.master')

@section('title')
    Edit Page
@endsection

@section('content')
    <h4>Edit</h4>


    <form action="{{ route('category.update',$category->id) }}" method="POST">
        @method('put')
        @csrf
        <div class=" mb-3">
            <label class=" form-label" for="">Name</label>
            <input type="text" name="title" value="{{$category->title}}" class=" form-control" id="">
        </div>
        <div class=" mb-3">
            <label class=" form-label" for="">Description</label>
            <textarea name="description" rows="6" class=" form-control">{{$category->description}}</textarea>
        </div>

        <button class="btn btn-primary">Update Category</button>
    </form>
@endsection
