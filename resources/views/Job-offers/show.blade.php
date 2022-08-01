@extends('layouts.admin')
@section('title','Company Details')
@section('content')

    <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="h1 mb-0 text-gray-800">Company Details - {{ $company_profile->company_name }}</div>
        <div class="d-none d-sm-inline-block">
            <a href="{{ route('job.offers.list') }}"
                class="btn btn-sm btn-dark shadow-sm rounded-0">
                <i class="fas fa-angle-left text-white-50"></i> Back
            </a>
            <a href="{{ route('profile.message.view',$company_profile->getCompanyUser->id) }}"
                class="btn btn-sm btn-dark shadow-sm rounded-0">
                <i class="fas fa-envelope text-white-50"></i> Message
            </a>
            <button class="btn btn-sm shadow-sm btn btn-success rounded-0"
            >
                <i class="far fa-paper-plane text-white-50"></i> Send my Profile
            </button>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-dark text-white-50">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td>
                                        <div>
                                            <img src="{{ $company_profile->getCompanyUser->current_avatar
                                                ? asset('/images/'.$company_profile->getCompanyUser->current_avatar)
                                                : asset('/images/default.jpg') }}"
                                                class="img-thumbnail rounded-0 border border-dark"
                                                alt="{{ $company_profile->getCompanyUser->name }}"
                                                style="float: left; width: 80px; height: 80px; margin-right: 5px; object-fit: cover;">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold">
                                            Company Name
                                        </div>
                                        <div class="font-weight-bold text-dark">
                                            {{ $company_profile->company_name }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold">
                                            Posted by
                                        </div>
                                        <div>
                                            <div class="font-weight-bold text-muted">
                                                {{ $company_profile->getCompanyUser->name }}
                                            </div>
                                            <div class="text-nowrap text-muted text-xs">
                                                {{ $company_profile->getCompanyUser->email }}
                                            </div>
                                            <div class="text-xs font-weight-bold rounded-0
                                                {{ $company_profile->getCompanyUser->role == 'jobseeker' ? 'badge badge-success' :
                                                ( $company_profile->getCompanyUser->role == 'employer' ? 'badge badge-primary'  :  'text-secondary' )}}">

                                                {{ $company_profile->getCompanyUser->role == 'jobseeker' ? 'Job Seeker' :
                                                ( $company_profile->getCompanyUser->role == 'employer' ? 'Employer'  :  'Guest' )}}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold border-0">
                                            Status
                                        </div>
                                        <div class="font-weight-bold text-white rounded-0
                                            {{$company_profile->isOpen ? 'badge badge-success' : 'badge badge-secondary'}}">
                                            {{$company_profile->isOpen ? 'Open for Application' : 'Closed' }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold  text-muted">
                                            Work Field / Work Based
                                        </div>
                                        <div class="font-weight-bold">
                                            {{ $company_profile->field_work }}
                                        </div>
                                        <div class="font-weight-bold">
                                            {{ $company_profile->work_base == 'home_based' ? 'Home Based'
                                                : 'Office Based' }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold  text-muted">
                                            Job Description
                                        </div>
                                        <div class="font-weight-bold">
                                            <p> {{ $company_profile->job_description }} </p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold  text-muted">
                                            Qualifications
                                        </div>
                                        <div class="font-weight-bold">
                                            <p> {{ $company_profile->qualification }} </p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold  text-muted">
                                            Applicants
                                        </div>
                                        <div class="font-weight-bold
                                            {{ strlen($company_profile->applicants_count) <=
                                            strlen($company_profile->applicants_limit)
                                            ? 'text text-success' : 'text text-danger' }}">
                                            {{ $company_profile->applicants_limit }}
                                            /
                                            {{ $company_profile->applicants_count }}
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
