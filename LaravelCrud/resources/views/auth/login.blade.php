<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="Contacts" content="Agenda of Contacts" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.0/lux/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Contacts</title>
</head>

<body class="container-fluid bg-secondary vh-100 p-0 my-auto">

    <div class="p-5 h-100  ">


        <div class="row d-flex h-100 justify-content-center align-content-center">

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


        </div>

    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>
