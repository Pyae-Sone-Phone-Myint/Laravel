@extends('layouts.master')

@section('title')
    Edit Page
@endsection

@section('content')
    <h4>Update Item</h4>


    <form action="{{ route('item.update',$item->id) }}" method="POST">
        @method('put')
        @csrf
        <div class=" mb-3">
            <label class=" form-label" for="">Item Name</label>
            <input type="text" value="{{$item->name}}" name="name" class=" form-control" id="">
        </div>
        <div class=" mb-3">
            <label class=" form-label" for="">Item Price</label>
            <input type="number" name="price" value="{{$item->price}}" class=" form-control" id="">
        </div>
        <div class=" mb-3">
            <label class=" form-label" for="">Stock</label>
            <input type="number" name="stock" class=" form-control" value="{{$item->stock}}" id="">
        </div>

        <button class="btn btn-primary">Update Item</button>
    </form>
@endsection
