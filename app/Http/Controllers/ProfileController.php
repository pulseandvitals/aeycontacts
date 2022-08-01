<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function index()
    {
        $getUser = User::where('id', Auth::user()->id)->first();
        return view('Profile.create', [
            'user' => $getUser,
            ]);
    }


    public function create()
    {
        $validator = Validator::make(request()->all(),[
            'profession' => 'required|max:30',
            'contact_no' => 'required|max:20',
        ]);
        if($validator->fails()){
            return response()->json([
                'error' => 400,
                'message' => $validator->errors()->all(),
            ]);
        }
        $data = new Profile;
        $id = Auth::user()->id;
        $data->profession = request()->get('profession');
        $data->years_of_exp = request()->get('years_of_exp');
        $data->contact_no = request()->get('contact_no');
        $data->city_address = request()->get('city_address');
        $data->work_base = request()->get('work_base');
        $data->previous_work = request()->get('previous_work');
        $data->work_objective = request()->get('work_objective');
        $data->profile_id = $id;
        $data->save();
        return response()->json([
            'success' => 200,
            'message' => 'Successfully Added a profile',
            'routes' => [
                'view' => route('profile.show',Auth::user()->id)
            ],
        ]);
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id) {
        $profile = Profile::where('profile_id',$id)
            ->orderBy('id','DESC')
            ->first();

        return view('Profile.show',[
            'profile' => $profile,
        ]);
    }

    public function edit($id)
    {
        $getProfile = Profile::where('profile_id', $id)
            ->orderBy('id','DESC')
            ->first();

        return view('Profile.edit', [
            'profile' => $getProfile,
        ]);
    }

    public function uploadProfile() {
        $validator = Validator::make(request()->all(), [
            'upload_photo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
          ]);
        if($validator->fails()) {
            redirect()->back()->with('error',$validator);
        }
        else {
            $image = request()->upload_photo;
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'),$new_name);

            $ins = User::find(Auth::user()->id);
            $ins->current_avatar = $new_name;
            $ins->update();
            return redirect()->back()->with('message','Photo successfully uploaded!');
        }
    }

    public function update(Request $request,Profile $profile) {

        $upd = Profile::find($profile->id);
        $upd->profession = $request->profession;
        $upd->years_of_exp = $request->years_of_exp;
        $upd->contact_no = $request->contact_no;
        $upd->city_address = $request->city_address;
        $upd->work_base = $request->work_base;
        $upd->previous_work = $request->previous_work;
        $upd->work_objective = $request->work_objective;
        $upd->update();
        return redirect()->back()
            ->with('message','Profile successfully updated.');
    }

    public function destroy(Profile $profile)
    {
        //
    }
}
