@extends('layouts.master')

@section('title')
Category
@endsection

@section('content')
<h4>Category</h4>

<table class=" table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Control</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>
            <td>{{Str::words(($category->description), 7, '...')}}</td>
            <td>
                <a href="{{route('category.show',$category->id)}}" class=" btn btn-outline-primary">Detail</a>
                <a href="{{route('category.edit', $category->id)}}" class=" btn btn-outline-info">Edit</a>
                <form class=" d-inline-block" action="{{route("category.destroy", $category->id)}}" method="post">
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
                <a class=" btn btn-sm btn-primary" href="{{ route('category.create') }}">Create Item</a>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

{{$categories->links()}}
@endsection
