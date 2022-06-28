<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="Contacts" content="Agenda of Contacts" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.0/lux/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Contacts</title>
</head>

<body class="container-fluid bg-secondary vh-100 clearfix p-0">

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

          <li class="nav-item">
            <a href="/Auth/Logout" class="nav-link text-danger">Logout</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>

  <div class="mx-3">

    <h1 class="mt-1">Contacts</h1>

    @yield('content')
  </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>
