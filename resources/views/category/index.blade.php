@extends('layouts.master')

@section('title')
    Category
@endsection

@section('content')
    <h4>Category</h4>

    <div class="row justify-content-between">
        <div class=" col-md-3">
            <a href="{{ route('category.create') }}" class=" btn btn-primary">Create</a>
        </div>
        <div class=" col-md-6">
            <form action="{{ route('category.index') }}" method="get">
                <div class=" input-group">

                    <input type="text" name="keyword" class=" form-control"
                        value="@if (request()->has('keyword')) {{ request()->keyword }} @endif">
                    @if (request()->has('keyword'))
                        <a href="{{ route('category.index') }}" class=" btn btn-danger">clear</a>
                    @endif
                    <button class=" btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if (session('status'))
        <div class=" alert alert-info">{{ session('status') }}</div>
    @endif


    <table class=" table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name
                    <a href="{{ route('category.index', ['title' => 'asc']) }}" class=" btn btn-sm btn-outline-primary">asc</a>
                    <a href="{{ route('category.index', ['title' => 'desc']) }}" class=" btn btn-sm btn-outline-primary">desc</a>
                    <a href="{{ route('category.index') }}" class=" btn btn-sm btn-outline-primary">clear</a>
                </th>
                <th>Description</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ Str::words($category->description, 7, '...') }}</td>
                    <td>
                        <a href="{{ route('category.show', $category->id) }}" class=" btn btn-outline-primary">Detail</a>
                        <a href="{{ route('category.edit', $category->id) }}" class=" btn btn-outline-info">Edit</a>
                        <form class=" d-inline-block" action="{{ route('category.destroy', $category->id) }}"
                            method="post">
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
                        <a class=" btn btn-sm btn-primary" href="{{ route('category.create') }}">Create Item</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $categories->links() }}
@endsection
