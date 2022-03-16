<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postcard;
use Illuminate\Support\Facades\Validator;

class PostcardController extends Controller
{
    public function index(){

    return view('cards-feed.post-cards');

    }
    public function fetchpostcard(){

      $fetch = Postcard::orderBy('id','DESC')->get();
      return response()->json([
        'data' => $fetch,
      ]);

    }
    public function addpostcard(){
        $validator = Validator::make(request()->all(), [

            'postcard_title' => 'required|min:20',
            'postcard_caption'=>'required|min:10',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

          ]);
          if($validator->fails()){
            return response()->json([
                'status' => 400,
                'error'=> $validator->errors()->all(),
            ]);


          }
          else {
            $image = request()->image;
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'),$new_name);

            $add = new Postcard;
            $add->postcard_title = request()->input('postcard_title');
            $add->image = $new_name;
            $add->postcard_caption = request()->input('postcard_caption');
            $add->save();
            return response()->json([
                'status'=> 200,
                'success'=> 'Successfully added postcard',
            ]);

          }

    }
 
}
