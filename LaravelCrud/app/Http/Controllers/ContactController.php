<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ContactController extends Controller
{

  public function index() {
    $contacts = Contact::where('user_id', Auth::id())->get();
    foreach ($contacts as $contact) {
      if ($contact->birthday != null) {

        $contact->birthday = date('d/m/Y', strtotime($contact->birthday));
      }
    }
    return view('contacts.index', ['contacts' => collect($contacts)->sortBy('firstname')->sortBy(([
      ['isFavorite', 'desc'],
      ['firstname', 'asc'],
    ]))]);
  }

  public function search(Request $request) {
    $contacts = Contact::where('user_id', Auth::id())->get();
    $searched = collect([]);

    foreach ($contacts as $contact) {
      if (Str::contains($contact->phone, $request->search) ||Str::contains($contact->firstname, $request->search) || Str::contains($contact->lastname, $request->search) || Str::contains($contact->email, $request->search) || Str::contains($contact->nickname, $request->search)) {

        if ($contact->birthday != null) {

          $contact->birthday = date('d/m/Y', strtotime($contact->birthday));
        }
        $searched->push($contact);
      }
    }
    return view('contacts.index', ['contacts' => $searched->sortBy('firstname')->sortBy(([
      ['isFavorite', 'desc'],
      ['firstname', 'asc'],
    ]))]);
  }

  public function create() {
    return view('contacts.create');
  }

  public function store(Request $request) {
    $validator = Validator::make($request->all(), [
      'nickname' => 'required|unique:contacts',
      'firstname' => 'required',
      'surname' => 'required',
      'email' => 'nullable|email',
      'phone' => 'nullable',
      'birthday' => 'nullable',
      'type' => 'required',
    ]);

    if ($validator->fails()) {
      return redirect()->action([ContactController::class, 'create'])
      ->withErrors($validator)
      ->withInput();
    } else {
      Contact::create([
        'firstname' => $request->firstname,
        'surname' => $request->surname,
        'nickname' => $request->nickname,
        'email' => $request->email,
        'phone' => $request->phone,
        'birthday' => $request->birthday,
        'type' => $request->type,
        'user_id' => Auth::id(),
      ]);
    }

    return redirect()->action([ContactController::class, 'create']);
  }

  public function favorite(int $id) {

    $contact = Contact::find($id);
    if ($contact == null) {
      return redirect('/');
    }

    if (Auth::id() != $contact->user_id) {
      return redirect('/');
    }
    $contact->update([
      'isFavorite' => !$contact->isFavorite,
    ]);

    return redirect()->action([ContactController::class, 'index']);
  }

  public function edit(int $id) {
    $contact = Contact::find($id);
    if ($contact == null) {
      return redirect('/');
    }
    if (Auth::id() != $contact->user_id) {
      return redirect('/');
    }
    if ($contact->birthday != null) {

      $contact->birthday = date('Y-m-d', strtotime($contact->birthday));
    }

    return view('contacts.edit', ['contact' => $contact]);
  }

  public function update(Request $request) {

    $validator = Validator::make($request->all(), [
      'firstname' => 'required',
      'surname' => 'required',
      'email' => 'nullable|email',
      'phone' => 'nullable',
      'birthday' => 'nullable',
    ]);

    $contact = Contact::find($request->id);
    if ($contact == null) {
      return redirect('/');
    }
    if (Auth::id() != $contact->user_id) {
      return redirect('/');
    }
    if ($validator->fails()) {
      return redirect("/Contacts/Edit/" . $request->id)
      ->withErrors($validator)
      ->withInput();
    } else {

      $contact->update([
        'firstname' => $request->firstname,
        'surname' => $request->surname,
        'email' => $request->email,
        'phone' => $request->phone,
        'birthday' => $request->birthday,
      ]);
    }
    return redirect()->action([ContactController::class, 'index']);
  }

  public function destroy(int $id) {
    $contact = Contact::find($id);
    if ($contact == null) {
      return redirect('/');
    }
    if (Auth::id() != $contact->user_id) {
      return redirect('/');
    }
    $contact->delete();
    return redirect()->action([ContactController::class, 'index']);
  }
}
