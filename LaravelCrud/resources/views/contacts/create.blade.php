<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.0/lux/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Contacts</title>
</head>

<body class="container bg-secondary vh-100">

    <h1 class="mt-3">Contacts</h1>
    <p>Create a new contact</p>
    <div class="row">

        <form action="/" method="post" class=" row col-12 col-md-6 mx-auto">
            @csrf
            <div class="form-group input-group-sm col-12 col-md-6">
                <label for="inputFirstname">Firstname:</label>
                <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" id="inputFirstname"
                    aria-describedby="helpFirstname" placeholder="Ex: Jon" value="{{ old('firstname') }}">
                <small id="helpFirstname" class="form-text text-muted">Contact's firstname</small>
            </div>
            <div class="form-group input-group-sm col-12 col-md-6">
                <label for="inputSurname">Surname:</label>
                <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" id="inputSurname" aria-describedby="helpSurname"
                    placeholder="Ex: Doe" value="{{ old('surname') }}">
                <small id="helpSurname" class="form-text text-muted">Contact's surname</small>
            </div>

            <div class="form-group input-group-sm col-12">
                <label for="inputNickname">Nickname:</label>
                <input type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname"
                    id="inputNickname" aria-describedby="helpNickname" placeholder="Ex: JonD" value="{{ old('nickname') }}" onkeyup="nospaces(this)">
                <small id="helpNickname" class="form-text text-muted">Contact's nickname. @error('nickname')Nickname already in use, choose another! @enderror</small>
            </div>

            <div class="form-group input-group-sm col-12">
                <label for="inputEmail">Email:</label>
                <input type="email" class="form-control" name="email"
                    id="inputEmail" aria-describedby="helpEmail" placeholder="Ex: email@email.com" value="{{ old('email') }}">
                <small id="helpEmail" class="form-text text-muted">Contact's email.</small>
            </div>

            <div class="form-group input-group-sm col-12">
                <label for="inputPhone">Phone:</label>
                <input type="tel" class="form-control" name="phone" id="inputPhone"
                    aria-describedby="helpPhone" placeholder="Ex: (00) 01234-5678" value="{{ old('phone') }}">
                <small id="helpPhone" class="form-text text-muted">Contact's phone</small>
            </div>

            <div class="form-group input-group-sm col-12">
                <label for="inputBirthday">Birthday:</label>
                <input type="date" class="form-control" name="birthday" id="inputBirthday"
                    aria-describedby="helpBirthday" value="{{ old('birthday') }}">
                <small id="helpBirthday" class="form-text text-muted">Contact's birthday</small>
            </div>

            <div class="d-grid gap-2 col-12 mt-3">
                <button type="submit" class="btn btn-outline-success" type="button">Save</button>
            </div>

        </form>

        <main class="col-12 col-md-6 mt-3 ">
            @isset($contacts)
                @foreach ($contacts as $contact)
                <div class="card mb-3">
                    <div class="card-body boder-dark">
                        <div class="row">
                            <h4 class="col-6 card-title">{{ $contact->firstname}} {{ $contact->surname}}</h4>
                            <h4 class="col-6 text-success text-end">{{$contact->isFavorite ? "Favorite " : null}}</h4>
                        </div>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $contact->nickname}}</h6>
                        @isset($contact->phone)
                            <p class="card-text my-0">Phone: {{ $contact->phone}}</p>
                        @endisset
                        @isset($contact->email)
                            <p class="card-text my-0">Email: {{ $contact->email}}</p>
                        @endisset
                        @isset($contact->birthday)
                            <p class="card-text my-0">Birthday: {{ $contact->birthday}}</p>
                        @endisset
                        <a href="/contacts/delete/{{$contact->id}}" class="card-link text-danger">Delete</a>
                        <a href="/contacts/favorite/{{$contact->id}}" class="card-link text-warning">{{$contact->isFavorite ? "Remove of Favorites" : "Set as Favorite"}}</a>
                    </div>
                </div>
                @endforeach
            @endisset

        </main>
    </div>

    <script>
        $(document).ready(function(){
            $('#inputPhone').inputmask('(99) 99999-9999');
        });
        $('#inputNickname').keyup(function() {
            this.value = this.value.replace(/\s/g,'');
        });

    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>
