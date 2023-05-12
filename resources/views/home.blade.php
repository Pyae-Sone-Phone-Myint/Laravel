@extends('layouts.master')

@section('title')
    Home Page
@endsection

@section('content')
    <h4>Home page</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa at architecto sunt magni esse. Expedita libero magni
        accusamus laudantium cupiditate delectus, possimus distinctio, voluptate temporibus impedit quis nostrum atque
        deleniti.</p>

    <div class=" alert alert-success">
        {{ route('item.index', [15, 'id' => 'ggg']) }}
    </div>
@endsection
