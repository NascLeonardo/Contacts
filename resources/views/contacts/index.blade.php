@extends('layouts.app')
@section('content')
<p>
  List of contacts
</p>

<div class="form-group">
  <label class="form-label">Search</label>
  <div class="form-group">
    <form action="/Contacts/Search/" method="get">
      @csrf
      <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Name, Lastname, Email, Nickname, Number" aria-label="Search" aria-describedby="button-addon2">
        <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
      </div>
    </form>
  </div>
</div>


<ul class="nav nav-tabs ">
  <li class="nav-item mx-auto">
    <a class="nav-link" data-bs-toggle="tab" href="#all">All</a>
  </li>
  <li class="nav-item mx-auto">
    <a class="nav-link" data-bs-toggle="tab" href="#favorite">Favorites</a>
  </li>
  <li class="nav-item mx-auto">
    <a class="nav-link" data-bs-toggle="tab" href="#personal">Personal</a>
  </li>
  <li class="nav-item mx-auto">
    <a class="nav-link" data-bs-toggle="tab" href="#professional">Professional</a>
  </li>

</ul>
<div id="myTabContent" class="tab-content ">
  <div class="tab-pane fade active show " id="all">
    <div class="row">
      <main class="row mx-auto col-12 ">
        @isset($contacts)
        @foreach ($contacts as $contact)
        <div class="accordion" id="accordionContato">
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $contact->id }}">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapse{{ $contact->id }}" aria-expanded="false"
                aria-controls="collapse{{ $contact->id }}">
                {{ $contact->firstname . " ". $contact->surname . "  "}}  <span>
                  @if ($contact->isFavorite)
                  <i class="fa-solid fa-star text-success"></i>
                  @endif
                </span>
              </button>
            </h2>
            <div id="collapse{{ $contact->id }}" class="accordion-collapse collapse"
              aria-labelledby="heading{{ $contact->id }}" data-bs-parent="#accordionContato"
              style="">
              <div class="accordion-body">
                <div class="card-body m-0 p-0 border-dark ">

                  <p class="card-subtitle text-muted">
                    {{ $contact->nickname . ' | ' . $contact->type }}
                  </p>
                  @isset($contact->phone)
                  <p class="card-text my-0">
                    <i class="fas fa-phone"></i>: {{ $contact->phone }}
                  </p>
                  @endisset
                  @isset($contact->email)
                  <p class="card-text my-0">
                    <i class="fas fa-mail-bulk"></i>: {{ $contact->email }}
                  </p>
                  @endisset
                  @isset($contact->birthday)
                  <p class="card-text my-0">
                    <i class="fas fa-calendar"></i>: {{ $contact->birthday }}
                  </p>
                  @endisset
                  <a href="/Contacts/Delete/{{ $contact->id }}"
                    class="card-link text-danger"><i class="fas fa-trash"></i></a>
                  <a href="/Contacts/Favorite/{{ $contact->id }}"
                    class="card-link text-warning text-decoration-none">
                    @if ($contact->isFavorite)
                    <i class="fa fa-circle-xmark"></i>@else<i class="fa fa-star"></i>
                    @endif
                  </a>
                  <a href="/Contacts/Edit/{{ $contact->id }}" class="card-link text-warning">
                    <i class="fas fa-pen"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>
        @endforeach
        @endisset
      </main>
    </div>
  </div>
  <div class="tab-pane fade" id="favorite">
    <div class="row">
      <main class="row mx-auto col-12 ">
        @isset($contacts)
        @foreach ($contacts->where('isFavorite') as $contact)
        <div class="accordion" id="accordionContato">
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $contact->id }}">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapse{{ $contact->id }}" aria-expanded="false"
                aria-controls="collapse{{ $contact->id }}">
                {{ $contact->firstname . " ". $contact->surname . "  "}}  <span>
                  @if ($contact->isFavorite)
                  <i class="fa-solid fa-star text-success"></i>
                  @endif
                </span>
              </button>
            </h2>
            <div id="collapse{{ $contact->id }}" class="accordion-collapse collapse"
              aria-labelledby="heading{{ $contact->id }}" data-bs-parent="#accordionContato"
              style="">
              <div class="accordion-body">
                <div class="card-body m-0 p-0 border-dark ">

                  <p class="card-subtitle text-muted">
                    {{ $contact->nickname . ' | ' . $contact->type }}
                  </p>
                  @isset($contact->phone)
                  <p class="card-text my-0">
                    <i class="fas fa-phone"></i>: {{ $contact->phone }}
                  </p>
                  @endisset
                  @isset($contact->email)
                  <p class="card-text my-0">
                    <i class="fas fa-mail-bulk"></i>: {{ $contact->email }}
                  </p>
                  @endisset
                  @isset($contact->birthday)
                  <p class="card-text my-0">
                    <i class="fas fa-calendar"></i>: {{ $contact->birthday }}
                  </p>
                  @endisset
                  <a href="/Contacts/Delete/{{ $contact->id }}"
                    class="card-link text-danger"><i class="fas fa-trash"></i></a>
                  <a href="/Contacts/Favorite/{{ $contact->id }}"
                    class="card-link text-warning text-decoration-none">
                    @if ($contact->isFavorite)
                    <i class="fa fa-circle-xmark"></i>@else<i class="fa fa-star"></i>
                    @endif
                  </a>
                  <a href="/Contacts/Edit/{{ $contact->id }}" class="card-link text-warning">
                    <i class="fas fa-pen"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>
        @endforeach
        @endisset
      </main>
    </div>
  </div>
  <div class="tab-pane fade" id="professional">
    <div class="row">
      <main class="row mx-auto col-12 ">
        @isset($contacts)
        @foreach ($contacts->where('type', 'Professional') as $contact)
        <div class="accordion" id="accordionContato">
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $contact->id }}">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapse{{ $contact->id }}" aria-expanded="false"
                aria-controls="collapse{{ $contact->id }}">
                {{ $contact->firstname . " ". $contact->surname . "  "}}  <span>
                  @if ($contact->isFavorite)
                  <i class="fa-solid fa-star text-success"></i>
                  @endif
                </span>
              </button>
            </h2>
            <div id="collapse{{ $contact->id }}" class="accordion-collapse collapse"
              aria-labelledby="heading{{ $contact->id }}" data-bs-parent="#accordionContato"
              style="">
              <div class="accordion-body">
                <div class="card-body m-0 p-0 border-dark ">

                  <p class="card-subtitle text-muted">
                    {{ $contact->nickname . ' | ' . $contact->type }}
                  </p>
                  @isset($contact->phone)
                  <p class="card-text my-0">
                    <i class="fas fa-phone"></i>: {{ $contact->phone }}
                  </p>
                  @endisset
                  @isset($contact->email)
                  <p class="card-text my-0">
                    <i class="fas fa-mail-bulk"></i>: {{ $contact->email }}
                  </p>
                  @endisset
                  @isset($contact->birthday)
                  <p class="card-text my-0">
                    <i class="fas fa-calendar"></i>: {{ $contact->birthday }}
                  </p>
                  @endisset
                  <a href="/Contacts/Delete/{{ $contact->id }}"
                    class="card-link text-danger"><i class="fas fa-trash"></i></a>
                  <a href="/Contacts/Favorite/{{ $contact->id }}"
                    class="card-link text-warning text-decoration-none">
                    @if ($contact->isFavorite)
                    <i class="fa fa-circle-xmark"></i>@else<i class="fa fa-star"></i>
                    @endif
                  </a>
                  <a href="/Contacts/Edit/{{ $contact->id }}" class="card-link text-warning">
                    <i class="fas fa-pen"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>
        @endforeach
        @endisset
      </main>
    </div>
  </div>
  <div class="tab-pane fade" id="personal">
    <div class="row">
      <main class="row mx-auto col-12 ">
        @isset($contacts)
        @foreach ($contacts->where('type', 'Personal') as $contact)
        <div class="accordion" id="accordionContato">
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $contact->id }}">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapse{{ $contact->id }}" aria-expanded="false"
                aria-controls="collapse{{ $contact->id }}">
                {{ $contact->firstname . " ". $contact->surname . "  "}}  <span>
                  @if ($contact->isFavorite)
                  <i class="fa-solid fa-star text-success"></i>
                  @endif
                </span>
              </button>
            </h2>
            <div id="collapse{{ $contact->id }}" class="accordion-collapse collapse"
              aria-labelledby="heading{{ $contact->id }}" data-bs-parent="#accordionContato"
              style="">
              <div class="accordion-body">
                <div class="card-body m-0 p-0 border-dark ">

                  <p class="card-subtitle text-muted">
                    {{ $contact->nickname . ' | ' . $contact->type }}
                  </p>
                  @isset($contact->phone)
                  <p class="card-text my-0">
                    <i class="fas fa-phone"></i>: {{ $contact->phone }}
                  </p>
                  @endisset
                  @isset($contact->email)
                  <p class="card-text my-0">
                    <i class="fas fa-mail-bulk"></i>: {{ $contact->email }}
                  </p>
                  @endisset
                  @isset($contact->birthday)
                  <p class="card-text my-0">
                    <i class="fas fa-calendar"></i>: {{ $contact->birthday }}
                  </p>
                  @endisset
                  <a href="/Contacts/Delete/{{ $contact->id }}"
                    class="card-link text-danger"><i class="fas fa-trash"></i></a>
                  <a href="/Contacts/Favorite/{{ $contact->id }}"
                    class="card-link text-warning text-decoration-none">
                    @if ($contact->isFavorite)
                    <i class="fa fa-circle-xmark"></i>@else<i class="fa fa-star"></i>
                    @endif
                  </a>
                  <a href="/Contacts/Edit/{{ $contact->id }}" class="card-link text-warning">
                    <i class="fas fa-pen"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>
        @endforeach
        @endisset
      </main>
    </div>
  </div>

</div>










@endsection