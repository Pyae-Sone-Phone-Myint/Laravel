@extends('layouts.master')

@section('title')
    Inventory
@endsection

@section('content')
    <h4>Inventory</h4>

    <table class=" table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->stock}}</td>
                <td>
                    <a href="{{route('item.show',$item->id)}}" class=" btn btn-outline-primary">Detail</a>
                    <a href="{{route('item.edit', $item->id)}}" class=" btn btn-outline-info">Edit</a>
                    <form class=" d-inline-block" action="{{route("item.destroy", $item->id)}}" method="post">
                        @method("delete")
                        @csrf
                        <button class="btn btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class=" text-center">
                    There is no record <br>
                    <a class=" btn btn-sm btn-primary" href="{{ route('item.create') }}">Create Item</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
