<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobOffers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JobOffersContoller extends Controller
{

    public function index()
    {
        $getAll = JobOffers::where('isOpen',true)
                    ->join('users as t','job_offers.user_id','t.id')
                    ->where('role','employer')
                    ->orderBy('t.id','DESC')
                    ->paginate(8);

        return view('Job-offers.index',[
            'job_offers' => $getAll,
        ]);
    }
    public function jobOfferIndex()
    {
        return view('Job-offers.create');
    }

    public function create(Request $request) {
    $validator = Validator::make($request->all(),
        [
            'company_name' => 'required|string|max:20',
            'job_description' => 'required|string',
            'qualifications' => 'required|string'
        ]
    );
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
    }

    $ins = new JobOffers;
    $ins->job_description = $request->job_description;
    $ins->field_work = $request->field_work;
    $ins->work_base = $request->work_base;
    $ins->company_name = $request->company_name;
    $ins->qualification = $request->qualifications;
    $ins->applicants_limit = $request->application_limit;
    $ins->applicants_count = 0;
    $ins->user_id = Auth::user()->id;
    $ins->isOpen = true;
    $ins->save();
    return redirect()
        ->to(route('job.offers.list'))
        ->with('message', 'Job offer has been added successfully!');
    }

    public function show($id) {

        $company_profile = JobOffers::where('user_id',$id)
                        ->orderBy('id','DESC')
                        ->first();
        return view('Job-offers.show',[
            'company_profile' => $company_profile,
        ]);
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
