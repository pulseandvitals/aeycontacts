<?php

namespace App\Http\Controllers;
use App\Models\StickyNote;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StickyNoteController extends Controller
{
    public function index(){

    //   StickyNote::all();
      return view('contact-form.sticky-notes');
    }
    public function fetchnote(){
      $id = Auth::user()->id;
      $fetchnote = StickyNote::where('user_id','=',$id)
      ->orderBy('id','DESC')->get();
      return response()->json([
        'data'=>$fetchnote,
      ]);
    }

    public function deletenote($id){

      $del = StickyNote::find($id);
      $del->delete();
      return response()->json([
        'status'=> 200,
        'success'=> 'Deleted Successfully!',
      ]);


    }
    public function storenote(){

      $validator = Validator::make(request()->all(),[
        'card_title' => 'required|max:30',
        'card_body' => 'required|max:400',
      ]);
      if($validator->fails()){
        return response()->json([
          'status'=>400,
          'error'=> $validator->errors()->all(),
        ]);
      }
      else{
        $id = Auth::user()->id;
        $store = new StickyNote;
        $store->card_title = request()->input('card_title');
        $store->card_subtitle = request()->input('card_subtitle');
        $store->card_body = request()->input('card_body');
        $store->card_link = request()->input('card_link');
        $store->card_another_link = request()->input('card_another_link');
        $store->user_id = $id;
        $store->save();
        return response()->json([
          'status' => 200,
          'success' => 'Successfully added the data!'
        ]);
      }


    }
}
