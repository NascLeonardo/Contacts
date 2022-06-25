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

<body class="container-fluid bg-secondary vh-100 p-0">


    <nav class="navbar navbar-expand-sm navbar-dark bg-primary p-1">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Agenda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/Contacts">Contacts
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Contacts/Create">Create</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <div class="p-1 h-100">
      
    <h1 class="mt-3">Contacts</h1>
    <p>List of contact</p>
    <div class="row">

        <main class="col-12 mt-3 ">
            @isset($contacts)
                @foreach ($contacts as $contact)
                    <div class="card col-12 col-md-4 mb-3">
                        <div class="card-body border-dark">
                            <div class="row">
                                <h4 class="col-6 card-title">{{ $contact->firstname }} {{ $contact->surname }}</h4>
                                <h4 class="col-6 text-success text-end">{{ $contact->isFavorite ? 'Favorite ' : null }}</h4>
                            </div>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $contact->nickname }}</h6>
                            @isset($contact->phone)
                                <p class="card-text my-0">Phone: {{ $contact->phone }}</p>
                            @endisset
                            @isset($contact->email)
                                <p class="card-text my-0">Email: {{ $contact->email }}</p>
                            @endisset
                            @isset($contact->birthday)
                                <p class="card-text my-0">Birthday: {{ $contact->birthday }}</p>
                            @endisset
                            <a href="/Contacts/Delete/{{ $contact->id }}" class="card-link text-danger">Delete</a>
                            <a href="/Contacts/Favorite/{{ $contact->id }}"
                                class="card-link text-warning">{{ $contact->isFavorite ? 'Remove of Favorites' : 'Set as Favorite' }}</a>
                              
                              <a href="/Contacts/Edit/{{ $contact->id }}"
                                class="card-link text-warning">Edit</a>
                        </div>
                    </div>
                @endforeach
            @endisset

        </main>
    </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>
