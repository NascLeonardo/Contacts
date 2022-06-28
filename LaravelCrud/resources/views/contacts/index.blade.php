@extends('layouts.app')
@section('content')
    <p>
        List of contact
    </p>
    <div class="row">
        <main class="row g-1 mx-auto col-12 ">
            @isset($contacts)
                @foreach ($contacts as $contact)

                    <div class="card border-0 col-12 col-md-4 mb-3 ">
                        <div class="card-body border-dark ">
                            <div class="row">
                                <h4 class="col-6 card-title">{{ $contact->firstname }} {{ $contact->surname }}</h4>
                                <h4 class="col-6 text-success text-end">
                                    {{ $contact->isFavorite ? 'Favorite ' : null }}</h4>
                            </div>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $contact->nickname . ' |' . $contact->type }}
                            </h6>
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
                            <a href="/Contacts/Delete/{{ $contact->id }}" class="card-link text-danger"><i
                                    class="fas fa-trash"></i></a>
                            <a href="/Contacts/Favorite/{{ $contact->id }}" class="card-link text-warning">
                                @if ($contact->isFavorite)
                                <i class="fa-solid fa-circle-xmark"></i>
                                @else
                                <i class="fa-solid fa-star"></i>
                                @endif
                            </a>
                             <a href="/Contacts/Edit/{{ $contact->id }}" class="card-link text-warning"> <i class="fas fa-pen"></i></a>
                        </div>
                    </div>
                @endforeach
            @endisset

        </main>
    </div>
@endsection
