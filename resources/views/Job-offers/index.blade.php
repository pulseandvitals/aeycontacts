@extends('layouts.admin')
@section('title','Job Offers')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Job Offers</h1>
        @if(Auth::user()->role == 'employer')
        <div class="d-none d-sm-inline-block">
            <a href="{{ route('job.offer.create') }}"
                class="btn btn-sm btn-dark shadow-sm">
                <i class="fas fa-plus text-white-50"></i> Create
            </a>
        </div>
        @endif
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-dark text-white-50">
                </div>
                <div class="card-body">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <form action="{{ route('users.active-list') }}" method="post">
                    <input type="search" class="form-control" placeholder="Search" name="searchUser">
                </form>
                    <div class="table-responsive">
                        <table class="table table-hover" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">Company</th>
                                    <th scope="col">Info</th>
                                    <th scope="col">Job description</th>
                                    <th>Applicants</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            @foreach($job_offers as $job_offer)
                            <tbody>
                                <td>
                                    <div>
                                        <div>
                                            <img src="{{ $job_offer->getCompanyUser->current_avatar
                                                ? asset('/images/'.$job_offer->getCompanyUser->current_avatar)
                                                : asset('/images/default.jpg') }}"
                                                class="img-thumbnail rounded-0 border border-dark"
                                                alt="{{ $job_offer->getCompanyUser->name }}"
                                                style="float: left; width: 80px; height: 80px; margin-right: 5px; object-fit: cover;">
                                            </div>
                                                <a href="" class="font-weight-bold
                                                    {{ Auth::user()->id == $job_offer->user_id ? 'text-primary'
                                                    : 'text-gray-800' }}">
                                                    {{ Auth::user()->id == $job_offer->user_id ? 'You'
                                                    : $job_offer->company_name }}
                                                </a>
                                        </div>
                                    <div class="text-xs text-nowrap text-muted">
                                        posted by: {{ $job_offer->getCompanyUser->name}}
                                    </div>
                                    <div class="text-xs text-nowrap text-muted">
                                        {{ $job_offer->getCompanyUser->profile->profession
                                        ? $job_offer->getCompanyUser->profile->profession
                                        : '' }}
                                    </div>
                                </td>
                                <td class="font-weight-bold">
                                    <div class="text-nowrap text-muted">
                                        {{ $job_offer->work_base == 'home_based' ? 'Home Based' : 'Office Based' }}
                                    </div>
                                    <div class="text-nowrap text-muted">
                                        {{ $job_offer->field_work }}
                                    </div>
                                </td>
                                <td>
                                    <div class="text-nowrap">
                                        <p>
                                            @if(strlen($job_offer->job_description) <= 20)
                                            {{ $job_offer->job_description }}
                                            @else
                                            <a href="{{ route('job.offer.show',$job_offer->id) }}" class="text-gray-500">Read More..</a>
                                            @endif
                                        </p>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-nowrap">
                                        {{ $job_offer->applicants_limit }} / {{ $job_offer->applicants_count }}
                                    </div>
                                </td>
                                <td class="text-right">
                                    @if(Auth::user()->id != $job_offer->user_id)
                                    <a href="{{ route('job.offer.show',$job_offer->id) }}" type="button"
                                        class="btn btn-info btn-sm rounded-0"
                                    >
                                        <i class="fas fa-eye text-gray-300"></i> view
                                    </a>
                                    @endif
                                </td>
                            </tbody>
                            @endforeach
                        </table>
                        @if($job_offers->count() == 0)
                            <div class="text-center">
                                <span class="font-weight-bold"> No Job offers Found </span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            {{ $job_offers->render("pagination::bootstrap-4") }}
        </div>
    </div>
</div>
@endsection

