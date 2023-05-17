@extends('layouts.master')

@section('title')
    Login page
@endsection


@section('content')
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <h4>Login page</h4>
    <form action="{{route("auth.check")}}" method="POST">
        @csrf
        <div class=" mb-3">
            <label class=" form-label" for="">Email</label>
            <input type="email" value="{{ old('email') }}" name="email"
                class=" form-control  @error('email') is-invalid @enderror" id="">
            @error('email')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class=" mb-3">
            <label class=" form-label" for="">Password</label>
            <input type="password" name="password"
                class=" form-control  @error('password') is-invalid @enderror" id="">
            @error('password')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary">Login</button>
    </form>
    <hr>
@endsection
