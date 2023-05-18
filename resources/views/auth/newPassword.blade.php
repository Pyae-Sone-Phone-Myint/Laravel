@extends('layouts.master')

@section('title')
    New Password
@endsection


@section('content')
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <h4>New Password</h4>
    <hr>

    <form action="{{ route('auth.newPasswordChange') }}" method="POST">
        @csrf
        <input type="hidden" name="user_token" value="{{$user_token}}">
        <div class=" mb-3">
            <label class=" form-label" for="">Password</label>
            <input type="password" name="password" class=" form-control  @error('password') is-invalid @enderror"
                id="">
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
        <button class="btn btn-primary">Change</button>
    </form>
@endsection
