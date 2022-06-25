<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::all();
        foreach($contacts as $contact){
            if($contact->birthday != null){

                $contact->birthday = date('d/m/Y', strtotime($contact->birthday));
            }
        }
        return view('contacts.index',['contacts'=>$contacts]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo $request;
        $validator = Validator::make($request->all(),[
            'nickname' => 'required|unique:contacts',
            'firstname' => 'required',
            'surname' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'birthday' =>  'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->action([ContactController::class, 'create'])
                        ->withErrors($validator)
                        ->withInput();
        }else{
            Contact::create([
                'firstname' => $request->firstname,
                'surname' => $request->surname,
                'nickname' => $request->nickname,
                'email' => $request->email,
                'phone' => $request->phone,
                'birthday' =>  $request->birthday,
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
    public function favorite(Request $request, int $id)
    {
        $contact = Contact::findOrFail($id);

        $contact->update([
            'isFavorite' => !$contact->isFavorite,
        ]);

        return redirect()->action([ContactController::class, 'index']);
    }
    
    public function edit(Request $request, int $id)
    {
        $contact = Contact::findOrFail($id);

        
        if($contact->birthday != null){

                $contact->birthday = date('d/m/Y', strtotime($contact->birthday));
            }
        
        return view('contacts.edit',['contact'=>$contact]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->action([ContactController::class, 'index']);
    }
}
