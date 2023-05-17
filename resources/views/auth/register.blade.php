@extends('layouts.master')

@section('title')
    Register page
@endsection

@section('content')
    <h4>Register page</h4>

    <hr>
    <form action="{{route("auth.store")}}" method="POST">
        @csrf
        <div class=" mb-3">
            <label class=" form-label" for="">Name</label>
            <input type="text" value="{{ old('name') }}" name="name"
                class=" form-control  @error('name') is-invalid @enderror" id="">
            @error('name')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
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
        <div class=" mb-3">
            <label class=" form-label" for="">Confirmed Password</label>
            <input type="password" name="password_confirmation"
                class=" form-control  @error('password_confirmation') is-invalid @enderror" id="">
            @error('password_confirmation')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <button class="btn btn-primary">Register</button>
    </form>


@endsection
