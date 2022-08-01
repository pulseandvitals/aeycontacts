@extends('layouts.admin')
@section('title','Edit')
@section('content')
<header>
  <title>Edit Profile</title>
</header>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Profile {{ $profile->user->name }}</h1>
        <div class="d-none d-sm-inline-block">
            <a href="{{ route('profile.show',$profile->user->id) }}"
                class="btn btn-sm btn-dark shadow-sm">
                <i class="fas fa-angle-left text-white-50"></i> Back
            </a>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header bg-dark text-white-50">
                    </div>
                        <div class="card-body col-md-12">
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                            <form method="post" action="{{ route('profile.update', $profile) }}">
                                @csrf
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Profession/Field</label>
                                    <input type="text" class="form-control"
                                        value="{{ $profile->profession }}"
                                        name="profession"
                                    >
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Years of Experience?</label>
                                    <input type="text" class="form-control"
                                        name="years_of_exp"
                                        value="{{ $profile->years_of_exp }}"
                                    >
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Contact #</label>
                                    <input type="number" class="form-control"
                                        name="contact_no"
                                        value="{{ $profile->contact_no }}"
                                    >
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">City Address</label>
                                    <input type="text" class="form-control"
                                        name="city_address"
                                        value="{{ $profile->city_address }}"
                                    >
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Prefer work environment</label>
                                    <input type="text" class="form-control"
                                        name="work_base"
                                        value="{{ $profile->work_base }}"
                                    >
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Previous Company you work on</label>
                                    <input type="text" class="form-control"
                                        name="previous_work"
                                        value="{{ $profile->previous_work }}"
                                    >
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Work Objective</label>
                                    <input type="textarea" class="form-control"
                                        name="work_objective"
                                        value="{{ $profile->work_objective }}"
                                    >
                                    </input>
                                </div>
                                <div class="col-md-12 mt-2 text-right">
                                    <button type="submit" class="btn btn-dark">
                                        <i class="fas fa-edit"></i> Update Info
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
