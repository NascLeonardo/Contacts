<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

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
  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  * @return \Illuminate\Http\Response
  */
  public function create() {
    return view('contacts.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
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



  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Contact  $contact
  * @return \Illuminate\Http\Response
  */
  public function favorite(int $id) {
    $contact = Contact::findOr($id, fn() => redirect ('/'));
    if (Auth::id() != $contact->user_id) {
      return redirect('/');
    }
    $contact->update([
      'isFavorite' => !$contact->isFavorite,
    ]);

    return redirect()->action([ContactController::class, 'index']);
  }

  public function edit(int $id) {
    $contact = Contact::findOr($id, fn () => redirect()->action([ContactController::class, 'index']));

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

    $contact = Contact::findOr($request->id, fn() => redirect ('/'));
    if (Auth::id() != $contact->user_id) {
      return redirect('/');
    }
    if ($validator->fails()) {
      return redirect("/Contacts/Edit/".$request->id)
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
    $contact = Contact::findOr($id, fn() => redirect ('/'));
    if (Auth::id() != $contact->user_id) {
      return redirect('/');
    }
    $contact->delete();
    return redirect()->action([ContactController::class, 'index']);
  }
}