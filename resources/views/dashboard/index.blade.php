@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <h4>Dashboard Home Page</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa at architecto sunt magni esse. Expedita libero magni
        accusamus laudantium cupiditate delectus, possimus distinctio, voluptate temporibus impedit quis nostrum atque
        deleniti.</p>

    @if (session('auth'))
        <div class="alert alert-info">{{ session('auth')->name }}</div>
    @endif

    <form action="{{ route('auth.logout') }}" method="POST">
        @csrf
        <button class="btn btn-primary">Logout</button>
    </form>
@endsection
