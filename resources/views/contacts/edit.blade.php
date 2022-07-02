@extends('layouts.app')
@section('content')
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
<script>
$(document).ready(function() {
$('#inputPhone').inputmask('(99) 99999-9999');
});


</script>

</div>



@endsection