@extends('layouts.auth')
@section('content')
<div class="row d-flex h-100 justify-content-center align-content-center">

    <form action="/register" method="post" class=" row col-12 col-md-8 mx-md-0 ">
        @csrf
        <h3 class="text-start">Registration</h3>
        <div class="form-group input-group-sm col-12">
            <label for="inputName">Name:</label>
            <input type="text" class="form-control  border-1 border-primary @error('name') is-invalid @enderror" name="name"
                id="inputName" aria-describedby="helpName" placeholder="Ex: Jon Doe"
                value="{{ old('name') }}">
            <small id="helpNamename" class="form-text text-muted">Your Name.</small>
            @error('name')
                <span class="invalid-feedback is-invalid" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

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

        <div class="form-group input-group-sm col-12 col-md-6">
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

        <div class="form-group input-group-sm col-12 col-md-6">
            <label for="inputPasswordConfirmation">Confirm Password:</label>
            <input type="password" class="form-control border-1 border-primary @error('password_confirmation') is-invalid @enderror"
                name="password_confirmation" id="inputPasswordConfirmation"
                aria-describedby="helpPasswordConfirmation" value="{{ old('password_confirmation') }}">
            <small id="helpPasswordConfirmation" class="form-text text-muted">Confirm Your Password</small>
            @error('password_confirmation')
                <span class="invalid-feedback is-invalid" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="d-grid gap-2 col-12 mt-3">
            <button type="submit" class="btn btn-primary" type="button">Register</button>
        </div>
        <a href="/Auth/Login">Already have an account? Login now!</a>

    </form>


</div>
@endsection
