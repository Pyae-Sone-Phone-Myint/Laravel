@extends('layouts.master')

@section('title')
    Inventory
@endsection

@section('content')
    <h4>Item List</h4>
    @if (request()->has('keyword'))
        [ Search result by '{{ request()->keyword }}' ]
    @endif
    @if (session('status'))
        <div class=" alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row justify-content-between mb-3">
        <div class=" col-md-3">
            <a href={{ route('item.create') }} class=" btn btn-outline-primary">Create</a>
        </div>
        <div class=" col-md-5">
            <form action="{{ route('item.index') }}" method="get">
                <div class=" input-group">
                    <input class=" form-control" type="text" name="keyword"
                        @if (request()->has('keyword')) value="{{ request()->keyword }}" @endif>

                    @if (request()->has('keyword'))
                        <a href="{{ route('item.index') }}" class="btn btn-danger">Clear</a>
                    @endif
                    <button class=" btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>

    <table class=" table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name
                    <a class=" btn btn-sm btn-outline-primary" href="{{ route('item.index',['name'=>'asc']) }}">ASC</a>
                    <a class=" btn btn-sm btn-outline-primary" href="{{ route('item.index',['name'=> 'desc']) }}">DESC</a>
                    <a class=" btn btn-sm btn-outline-primary" href="{{ route('item.index') }}">Clear</a>
                </th>
                <th>Price</th>
                <th>Stock</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>
                        <a href="{{ route('item.show', $item->id) }}" class=" btn btn-outline-primary">Detail</a>
                        <a href="{{ route('item.edit', $item->id) }}" class=" btn btn-outline-info">Edit</a>
                        <form class=" d-inline-block" action="{{ route('item.destroy', $item->id) }}" method="post">
                            @method('delete')
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

    {{ $items->links() }}
@endsection
