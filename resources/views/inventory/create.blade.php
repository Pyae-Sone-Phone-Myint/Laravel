@extends('layouts.master')

@section('title')
    Create Page
@endsection

@section('content')
    <h4>Create</h4>


    <form action="{{ route('item.store') }}" method="POST">
        @csrf
        <div class=" mb-3">
            <label class=" form-label" for="">Item Name</label>
            <input type="text" name="name" class=" form-control" id="">
        </div>
        <div class=" mb-3">
            <label class=" form-label" for="">Item Price</label>
            <input type="number" name="price" class=" form-control" id="">
        </div>
        <div class=" mb-3">
            <label class=" form-label" for="">Stock</label>
            <input type="number" name="stock" class=" form-control" id="">
        </div>

        <button class="btn btn-primary">Save Item</button>
    </form>
@endsection
