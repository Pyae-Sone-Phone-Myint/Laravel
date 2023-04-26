@extends('layouts.master')

@section('title')
    Inventory
@endsection

@section('content')
    <h4>Detail Item</h4>

    <table class=" table">
        <tr>
            <td>Name</td>
            <td>{{$item->name}}</td>
        </tr>
        <tr>
            <td>Price</td>
            <td>{{$item->price}}</td>
        </tr>
        <tr>
            <td>Stock</td>
            <td>{{$item->stock}}</td>
        </tr>
        <tr>
            <td>Created at</td>
            <td>{{$item->created_at}}</td>
        </tr>
        <tr>
            <td>Updated at</td>
            <td>{{$item->updated_at}}</td>
        </tr>
    </table>

@endsection
