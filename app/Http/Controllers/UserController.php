<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
use App\Models\Profile;
Use \Carbon\Carbon;

class UserController extends Controller
{
    public function index(Request $request) {

        $users = User::where('status','1')
            ->orderBy('id','desc')
            ->where('role', 'jobseeker')
            ->paginate(8);

        return view('Users.index',[
            'users' => $users,
        ]);
    }

    public function changeStatus() {

        $stat = request()->get('stat');
        $id = Auth::user()->id;

        if(Profile::where('profile_id',$id)->first()) {
        $changeStatus = User::find($id);
        $negateStatus = $stat =! $stat;
        $changeStatus->status = $negateStatus;
        $changeStatus->last_login = Carbon::now();
        $changeStatus->update();

        return response()->json([
            'status' => 200,
            'message' => $stat ? 'Successfully changed status to active.' : 'Successfully changed status to inactive.',
            'routes' => [
                'back' => route('profile.show',$id),
            ]
            ]);
        }
        else {
            return response()->json([
                'error' => 400,
                'message' => 'Required: Set up your profile first.',
                'routes' => [
                    'create' => route('profile.add'),
                ]
            ]);
        }
    }
    public function show($id)
    {
        $user = User::where('id',$id)
        ->first();
        $reportList = Report::where('user_reported_id',$id)
            ->orderBy('id', 'DESC')
            ->where('user_account_id',Auth::user()->id)
            ->count();

        return view('Users.show',[
            'user' => $user,
            'isReport' => $reportList,
        ]);
    }
}
