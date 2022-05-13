<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function changeStatus() {

        $stat = request()->get('stat');
        $id = Auth::user()->id;
        $changeStatus = User::find($id);
        switch($stat) {
            case 1:
                $changeStatus->status = 0;
                $changeStatus->save();
                break;
            case 0:
                $changeStatus->status = 1;
                $changeStatus->save();
        }
        return response()->json([
            'status' => 200,
            'message' => !$stat ? 'Activated Status' : 'Deactivated Status',
        ]);
    }
}
