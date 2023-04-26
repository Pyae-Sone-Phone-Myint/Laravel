@extends('layouts.master')

@section('title')
    Create Page
@endsection

@section('content')
    <h4>Create</h4>


    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class=" mb-3">
            <label class=" form-label" for="">Name</label>
            <input type="text" name="title" class=" form-control" id="">
        </div>
        <div class=" mb-3">
            <label class=" form-label" for="">Description</label>
            <textarea name="description" rows="6" class=" form-control"></textarea>
        </div>

        <button class="btn btn-primary">Save Category</button>
    </form>
@endsection
