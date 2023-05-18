@extends('layouts.master')

@section('title')
    Verification
@endsection


@section('content')
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <h4>Verification</h4>
    <hr>

    <form action="{{ route('auth.verify_check') }}" method="POST">
        @csrf

        <div class=" mb-3">
            <label class=" form-label" for="">Verify Code</label>
            <input type="number" name="verify_code"
                class=" form-control  @error('verify_code') is-invalid @enderror" id="">
            @error('verify_code')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Change</button>
    </form>
@endsection
