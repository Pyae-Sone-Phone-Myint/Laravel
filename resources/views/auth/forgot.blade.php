@extends('layouts.master')

@section('title')
    Email
@endsection


@section('content')
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <h4>Email</h4>
    <hr>
    {{-- @if (session('message'))
        <div class="alert alert-info">{{session('message')}}</div>
    @endif --}}

    <form action="{{ route('auth.emailCheck') }}" method="POST">
        @csrf

        <div class=" mb-3">
            <label class=" form-label" for="">Enter your email</label>
            <input type="email" name="email"
                class=" form-control  @error('email') is-invalid @enderror" id="">
            @error('email')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Send</button>
    </form>
@endsection
