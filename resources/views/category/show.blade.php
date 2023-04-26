@extends('layouts.master')

@section('title')
    Category Detail
@endsection

@section('content')
    <h4>Detail Category</h4>

    <table class=" table">
        <tr>
            <td>Name</td>
            <td>{{$category->title}}</td>
        </tr>
        <tr>
            <td>Description</td>
            <td>{{$category->description}}</td>
        </tr>
        <tr>
            <td>Created at</td>
            <td>{{$category->created_at}}</td>
        </tr>
        <tr>
            <td>Updated at</td>
            <td>{{$category->updated_at}}</td>
        </tr>
    </table>

@endsection
