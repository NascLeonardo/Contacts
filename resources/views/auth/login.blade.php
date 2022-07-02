@extends('layouts.auth')
@section('content')
<form action="/login" method="post" class=" row col-12 col-md-8 mx-md-0 ">
    @csrf
    <h3 class="text-start">Login</h3>

    <div class="form-group input-group-sm col-12">
        <label for="inputEmail">Email:</label>
        <input type="email" class="form-control border-1 border-primary @error('email') is-invalid @enderror" name="email" id="inputEmail"
            aria-describedby="helpEmail" placeholder="Ex: email@email.com" value="{{ old('email') }}">
        <small id="helpEmail" class="form-text text-muted">Your email.</small>
        @error('email')
            <span class="invalid-feedback is-invalid" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group input-group-sm col-12">
        <label for="inputPassword">Password:</label>
        <input type="password" class="form-control border-1 border-primary @error('password') is-invalid @enderror" name="password"
            id="inputPassword" aria-describedby="helpPassword" value="{{ old('password') }}">
        <small id="helpPassword" class="form-text text-muted">Your Password</small>
        @error('password')
            <span class="invalid-feedback is-invalid" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="d-grid gap-2 col-12 mt-3">
        <button type="submit" class="btn btn-primary" type="button">Login</button>
    </div>
    <a href="/Auth/Register">Dont have an account? Register now!</a>
</form>
@endsection
