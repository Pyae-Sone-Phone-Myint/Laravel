@extends('layouts.master')

@section('title')
    Edit Page
@endsection

@section('content')
    <h4>Edit</h4>


    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @method('put')
        @csrf
        <div class=" mb-3">
            <label class=" form-label" for="">Name</label>
            <input type="text" name="title" value="{{ old('title', $category->title) }}"
                class=" form-control @error('title')
                is-invalid
            @enderror">
            @error('title')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class=" mb-3">
            <label class=" form-label" for="">Description</label>
            <textarea name="description" rows="6"
                class=" form-control @error('description')
                is-invalid
            @enderror">{{ old('description', $category->description) }}</textarea>
            @error('description')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Update Category</button>
    </form>
@endsection
