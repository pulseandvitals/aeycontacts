@extends('layouts.admin')
@section('title','My Profile')
@section('content')
    <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="h1 mb-0 text-gray-800"> My profile </div>
        <div class="d-none d-sm-inline-block">
            <a href="{{ route('users.active-list') }}"
                class="btn btn-sm btn-dark shadow-sm">
                <i class="fas fa-angle-left text-white-50"></i> Back
            </a>
            <a href="{{ route('profile.edit',$profile->user->id) }}"
                class="btn btn-sm btn-success shadow-sm">
                <i class="fas fa-edit text-white-50"></i> Edit
            </a>
        </div>
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
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif

                    <div class="table-responsive">
                        <table class="table table-hover" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td>
                                        <div>
                                            <img src="{{ $profile->user->current_avatar
                                                ? asset('/images/'.$profile->user->current_avatar)
                                                : asset('/images/default.jpg') }}"
                                                class="img-thumbnail rounded-0 border border-primary"
                                                alt="{{ $profile->user->name }}"
                                                style="float: left; width: 80px; height: 80px; margin-right: 5px; object-fit: cover;">
                                        </div>
                                        <div class="text-right">
                                            <button type="button" class="btn-sm btn btn-outline-primary"
                                                id="changePhoto">
                                                Upload profile
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold">
                                            Name
                                        </div>
                                        <div class="font-weight-bold text-dark">
                                            {{$profile->user->name}}
                                            <div class="text-xs font-weight-bold
                                                {{ $profile->user->role == 'jobseeker' ? 'text-success' :
                                                ( $profile->user->role == 'employer' ? 'text-info'  :  'text-secondary' )}}">

                                                {{ $profile->user->role == 'jobseeker' ? 'Job Seeker' :
                                                ( $profile->user->role == 'employer' ? 'Employer'  :  'Guest' )}}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold">
                                            Profession
                                        </div>
                                        <div class="font-weight-bold text-dark">
                                            {{ $profile->profession }}
                                            <div class="text-muted text-xs">
                                                {{ $profile->years_of_exp
                                                ? $profile->years_of_exp
                                                : 'No info' }}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold">
                                            City/Country
                                        </div>
                                        <div class="font-weight-bold text-dark">
                                            {{$profile->city_address ?
                                            $profile->city_address :
                                            'No info'}}
                                        </div>
                                        <div class="text-muted text-xs">
                                            {{$profile->contact_no ?
                                            $profile->contact_no :
                                            'No info'}}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold">
                                            Status
                                        </div>
                                        <div class="font-weight-bold text-white
                                            {{$profile->user->status ? 'badge badge-success' : 'badge badge-secondary'}}">
                                            {{ $profile->user->status ? 'Active' : 'Inactive' }}
                                        </div>
                                        <div class="float-right">
                                            <button type="button" class="btn-sm btn btn-outline-primary"
                                                onclick="changeStatus()"
                                                id="stat"
                                                value="{{ $profile->user->status }}"
                                            >
                                                Change status
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold">
                                            Active since
                                        </div>
                                        <div class="font-weight-bold text-dark">
                                            {{  date('F j, Y, g:i a', strtotime($profile->user->last_login)) }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold">
                                            Previous Company/Work
                                        </div>
                                        <div class="font-weight-bold text-dark">
                                            {{ $profile->previous_work
                                            ? $profile->previous_work : 'No info'  }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold">
                                            Objective
                                        </div>
                                        <div class="font-weight-bold text-dark">
                                            {{ $profile->work_objective
                                            ? $profile->work_objective : 'No Info'}}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold">
                                            Preferred Work Base
                                        </div>
                                        <div class="font-weight-bold text-dark">
                                            {{ $profile->work_base }}
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
    <div class="modal" id="photoModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="post" action="{{ route('upload.profile') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                        <input type="file" class="form-control" accept="image/*" name="upload_photo">
                </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Change</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    function changeStatus(){
        $.ajaxSetup({
           headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
        var data = {
            'stat': $('#stat').val()
        }

        $.ajax({
            type: 'post',
            url: '/status',
            data: data,
            dataType: 'json',
            success: function(e) {
            if(e.status == 200){
                alert(e.message)
                window.location.href = e.routes.back;
            }
            else {
                alert(e.message)
            }
            }
        })
    }

    $(document).on('click','#changePhoto', function(e) {
        e.preventDefault()
        $('#photoModal').modal('show')
    })
</script>
@endsection
