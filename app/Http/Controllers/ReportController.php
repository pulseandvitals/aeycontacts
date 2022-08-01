<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $name = User::find($request->id);
        $rep = new Report;
        $rep->reason = $request->reason;
        $rep->user_account_id = Auth::user()->id;
        $rep->user_reported_id = $request->id;
        $rep->save();
        return response()->json([
            'message' => 'Successfully reported '. $name->name .' in the list',
            'routes' => [
                'view' => route('user.show',$request->id)
            ]
        ]);
    }

    public function show()
    {
        //
    }

    public function edit()
    {
        //
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy()
    {
        //
    }
}
