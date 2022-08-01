<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use App\Models\Profile;
use App\Models\StickyNote;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {

        $users_count = User::all()->count();
        $contacts_count = Contact::where('user_id', Auth::user()->id)->count();
        $notes_count = StickyNote::where('user_id', Auth::user()->id)->count();
        $profile = Profile::where('profile_id',Auth::user()->id)->count();
        $status = Auth::user()->status;
        return view('partials.dashboard',compact(
            'users_count',
            'contacts_count',
            'notes_count',
            'status',
            'profile'
        ));
    }

    public function landpage() {

        return view('index');
    }

}
