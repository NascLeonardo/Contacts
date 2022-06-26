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

<body class="container-fluid bg-secondary vh-100 h-100 p-0">

  <nav class="navbar navbar-sm navbar-expand-sm navbar-dark bg-primary p-1">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Agenda</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
        aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="/Contacts">Contacts
              <span class="visually-hidden">(current)</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/Contacts/Create">Create</a>
          </li>

        </ul>

      </div>
    </div>
  </nav>
  <div class="p-1 h-100">

    <h1 class="mt-3">Contacts</h1>
    <p>
      Edit contact
    </p>
    <div class="row">

      <form action="/Contacts/Update" method="post" class=" row col-12 col-md-6 mx-auto mx-md-0">
        @csrf
        <input type="text" class="d-none"id="inputId"
        name="id" value="{{ $contact->id}}">
        <div class="form-group input-group-sm col-12 col-md-6">
          <label for="inputFirstname">Firstname:</label>
          <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" id="inputFirstname"
          aria-describedby="helpFirstname" placeholder="Ex: Jon" value="{{ $contact->firstname }}">
          <small id="helpFirstname" class="form-text text-muted">Contact's firstname</small>
        </div>
        <div class="form-group input-group-sm col-12 col-md-6">
          <label for="inputSurname">Surname:</label>
          <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" id="inputSurname" aria-describedby="helpSurname"
          placeholder="Ex: Doe" value="{{ $contact->surname }}">
          <small id="helpSurname" class="form-text text-muted">Contact's surname</small>
        </div>

        

        <div class="form-group input-group-sm col-12">
          <label for="inputEmail">Email:</label>
          <input type="email" class="form-control" name="email"
          id="inputEmail" aria-describedby="helpEmail" placeholder="Ex: email@email.com" value="{{ $contact->email }}">
          <small id="helpEmail" class="form-text text-muted">Contact's email.</small>
        </div>

        <div class="form-group input-group-sm col-12">
          <label for="inputPhone">Phone:</label>
          <input type="tel" class="form-control" name="phone" id="inputPhone"
          aria-describedby="helpPhone" placeholder="Ex: (00) 01234-5678" value="{{ $contact->phone }}">
          <small id="helpPhone" class="form-text text-muted">Contact's phone</small>
        </div>

        <div class="form-group input-group-sm col-12">
          <label for="inputBirthday">Birthday:</label>
          <input type="date" class="form-control" name="birthday" id="inputBirthday"
          aria-describedby="helpBirthday" value="{{$contact->birthday }}">
          <small id="helpBirthday" class="form-text text-muted">Contact's birthday</small>
        </div>

        <div class="d-grid gap-2 col-12 mt-3">
          <button type="submit" class="btn btn-primary" type="button">Save</button>
        </div>

      </form>


    </div>

  </div>
  <script>
    $(document).ready(function() {
      $('#inputPhone').inputmask('(99) 99999-9999');
    });
    $('#inputNickname').keyup(function() {
      this.value = this.value.replace(/\s/g, '');
    });

  </script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>