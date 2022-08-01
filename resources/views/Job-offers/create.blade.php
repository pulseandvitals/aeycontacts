@extends('layouts.admin')
@section('title','Create')
@section('content')
<header>
  <title>Add Job Offer</title>
</header>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Job Offer</h1>
        <div class="d-none d-sm-inline-block">
            <a href=""
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

                           @include('Component.status_error')

                            <form action="{{ route('job.offer.submit.create') }}" method="post">
                                @csrf
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Company Name</label>
                                    <input type="text" class="form-control" name="company_name">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Work Set-up</label>
                                    <select name="work_base" class="form-control">
                                        <option value="home_based">Home Based</option>
                                        <option value="office_based">Office Based</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Work field</label>
                                    <input type="text" class="form-control" name="field_work"
                                        placeholder="Example: web developer"
                                    >
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Job Description</label>
                                    <textarea type="text" class="form-control" name="job_description">
                                    </textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Qualifications</label>
                                    <input type="text" class="form-control" name="qualifications">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Application Limit</label>
                                    <input type="number" class="form-control" name="application_limit">
                                </div>
                                <div class="col-md-12 mt-2 text-right">
                                    <button type="submit" class="btn btn-dark rounded-0">
                                        <i class="fas fa-plus text-success"></i> Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
