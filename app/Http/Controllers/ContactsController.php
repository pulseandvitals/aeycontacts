<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;


class ContactsController extends Controller
{
    public function index(){

       return view('contact-form.contact-list');

    }
    public function fetchcontacts(){
        $id = Auth::user()->id;
        $contacts = Contact::where('user_id','=',$id)
        ->orderBy('id','DESC')->get();
        return response()->json([
         'contacts' => $contacts
        ]);
     }
     public function deletecontact($id){
        $del = Contact::findorfail($id);
        $del->delete();
        return response()->json([
            'status'=>200,
            'success'=>'Contact Successfully deleted!',

        ]);
     }
     public function editcontact($id){
        $contact = Contact::find($id);
        if($contact) {
        return response()->json([
            'status'=>200,
            'contact'=>$contact,
            ]);

        }
        else {
        return response()->json([
            'status'=>400,
            'error' => 'Something went wrong.',
        ]);
        }

     }

    public function storecontact(Request $request){
        $id = Auth::user()->id;
        $validator = Validator::make($request->all(),[
            'name'=>'required|max:30',
            'cityaddress'=>'required|max:40',
            'dialnumber'=>'required|max:40',
        ]);

        if($validator->fails()){
        return response()->json([
            'status'=>400,
            'error' => $validator->errors()->all(),
        ]);


        }
        else{
        $add = new Contact;
        $add->name = $request->input('name');
        $add->city_address = $request->input('cityaddress');
        $add->dial_address = $request->input('dialnumber');
        $add->website = $request->input('website');
        $add->user_id = $id;
        $add->save();
        return response()->json([
          'status'=>200,
          'success'=>'Contact Added Successfully!'
        ]);
        }
     }
     public function updatecontact(Request $request, $id){
        $validator = Validator::make($request->all(),[
        'name' => 'required|max:30',
        'city_address'=>'required|max:40',
        'dial_address'=>'required|max:40',
        'websites'=>'required|max:150',
        ]);
        if($validator->fails()){
         return response()->json([
         'status' => 400,
         'error' => $validator->errors()->all(),
         ]);
        }
        else {
        $upd = Contact::find($id);
        $upd->name = $request->input('name');
        $upd->city_address = $request->input('city_address');
        $upd->dial_address = $request->input('dial_address');
        $upd->website = $request->input('websites');
        $upd->update();
        return response()->json([
         'status' => 200,
         'success' => 'Successfully updated the data!',
        ]);
        }
     }
}
