@extends('layouts.admin')
@section('title','Job Seekers')
@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Job Seekers</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-dark text-white-50">
                </div>
                <div class="card-body">
                <form action="{{ route('users.active-list') }}" method="post">
                    <input type="search" class="form-control" placeholder="Search" name="searchUser">
                </form>
                    <div class="table-responsive">
                        <table class="table table-hover" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Contact/Email</th>
                                    <th scope="col">City/Country</th>
                                    <th>Status</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            @foreach($users as $user)
                            <tbody>
                                <td>
                                    <div>
                                        <div>
                                            <img src="{{ $user->current_avatar
                                                ? asset('/images/'.$user->current_avatar)
                                                : asset('/images/default.jpg') }}"
                                                class="img-thumbnail rounded-0 border border-dark"
                                                alt="{{ $user->name }}"
                                                style="float: left; width: 80px; height: 80px; margin-right: 5px; object-fit: cover;">
                                        </div>
                                        <a href="{{ route('user.show',$user->id )}}" class="font-weight-bold
                                            {{Auth::user()->id == $user->id ? 'text-primary' : 'text-gray-800'}}">
                                            {{Auth::user()->id == $user->id ? 'You' : $user->name}}
                                        </a>
                                    </div>
                                    <div class="text-xs text-nowrap text-muted">
                                        {{$user->profile->profession}} -
                                    @if($user->profile->years_of_exp)
                                        {{$user->profile->years_of_exp}}
                                    @endif
                                    </div>
                                    <div class="text-xs text-nowrap text-muted">
                                        Active since:
                                        {{ date('F j, Y, g:i a', strtotime($user->last_login)) }}
                                    </div>
                                </td>
                                <td class="text-nowrap">
                                    <div class="text-secondary">
                                        {{$user->email}}
                                    </div>
                                    <div class="text-xs text-nowrap text-muted">
                                        {{$user->profile->contact_no}}
                                    </div>
                                </td>
                                <td class="font-weight-bold text-gray-800">
                                    {{$user->profile->city_address
                                    ? $user->profile->city_address
                                    : 'No info.'}}
                                </td>
                                <td class="fw-bold text-left">
                                    <label class="rounded-0 {{$user->status ? 'badge badge-success' : 'badge badge-danger'}}"
                                    >
                                    {{$user->status ? 'Active' : 'Inactive'}}
                                </td>
                                <td class="text-right">
                                    @if(Auth::user()->id != $user->id)
                                    <a href="{{ route('user.show',$user->id) }}" type="button"
                                        class="btn btn-info btn-sm rounded-0"
                                    >
                                        <i class="fas fa-eye text-gray-300"></i> view
                                    </a>
                                    @endif
                                </td>
                            </tbody>
                            @endforeach
                        </table>
                        @if($users->count() == 0)
                            <div class="text-center">
                                <span class="font-weight-bold"> No Job seekers Found </span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            {{ $users->render("pagination::bootstrap-4") }}
        </div>
    </div>
</div>
@endsection

