@extends('layouts.admin')
@section('title','User Details')
@section('content')


    <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="h1 mb-0 text-gray-800">User Details - {{ $user->name }}</div>
        <div class="d-none d-sm-inline-block">
            <a href="{{ route('users.active-list') }}"
                class="btn btn-sm btn-dark shadow-sm">
                <i class="fas fa-angle-left text-white-50"></i> Back
            </a>
            <a href="{{ route('profile.message.view',$user->id) }}"
                class="btn btn-sm btn-dark shadow-sm">
                <i class="fas fa-envelope text-white-50"></i> Message
            </a>
            <button class="btn btn-sm shadow-sm
            {{ $isReport != 0 ? 'btn btn-warning' : 'btn btn-secondary' }}"
                id="userReport"
                value= "{{ $user->id }}"
            >
                <i class="fas fa-fas fa-ban text-white-50"></i>
                {{ $isReport != 0 ? 'Reported' : 'Report' }}
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
                                            <img src="{{ $user->current_avatar
                                                ? asset('/images/'.$user->current_avatar)
                                                : asset('/images/default.jpg') }}"
                                                class="img-thumbnail rounded-0 border border-dark"
                                                alt="{{ $user->name }}"
                                                style="float: left; width: 80px; height: 80px; margin-right: 5px; object-fit: cover;">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold">
                                            Name
                                        </div>
                                        <div class="font-weight-bold text-dark">
                                            {{$user->name}}
                                            <div class="text-xs font-weight-bold
                                                {{ $user->role == 'jobseeker' ? 'text-success' :
                                                ( $user->role == 'employer' ? 'text-info'  :  'text-secondary' )}}">

                                                {{ $user->role == 'jobseeker' ? 'Job Seeker' :
                                                ( $user->role == 'employer' ? 'Employer'  :  'Guest' )}}
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
                                            {{ $user->profile->profession }}
                                            <div class="text-xs font-weight-bold text-muted">
                                            {{ $user->profile->years_of_exp
                                            ? $user->profile->years_of_exp
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
                                            {{ $user->profile->city_address ?
                                            $user->profile->city_address :
                                            'No info'}}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold">
                                            Status
                                        </div>
                                        <div class="font-weight-bold text-white rounded-0
                                            {{$user->status ? 'badge badge-success' : 'badge badge-secondary'}}">
                                            {{$user->status ? 'Active' : 'Inactive' }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold">
                                            Active since
                                        </div>
                                        <div class="font-weight-bold text-dark">
                                            {{  date('F j, Y, g:i a', strtotime($user->last_login)) }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold">
                                            Previous Company/Work
                                        </div>
                                        <div class="font-weight-bold text-dark">
                                            {{ $user->profile->previous_work
                                            ? $user->profile->previous_work : 'No info'  }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold">
                                            Objective
                                        </div>
                                        <div class="font-weight-bold text-dark">
                                            {{ $user->profile->work_objective
                                            ? $user->profile->work_objective : 'No Info'}}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-nowrap text-xs font-weight-bold">
                                            Preferred Work Base
                                        </div>
                                        <div class="font-weight-bold text-dark">
                                            {{$user->profile->work_base}}
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

<div class="modal" id="reportModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reason for reporting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="reportId">
                <select class="form-control" id="reason">
                    <option value="spam">Spam</option>
                    <option value="cyber_bullying">Cyber Bullying</option>
                    <option value="nudity">Nudity</option>
                    <option value="identity_theft">Identity Theft</option>
                </select>
            </div>
                <div class="modal-footer">
                    <button type="button" id="submitReport" class="btn btn-warning">Yes, Report</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
$(document).on('click','#userReport',function (e){
    e.preventDefault();
    var reportId = $(this).val();
    $('#reportId').val(reportId);
    $('#reportModal').modal('show');
}),
$(document).on('click','#submitReport', function(e){
    e.preventDefault()
    var reportId = $('#reportId').val()
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        url: '/user-report/'+reportId,
        method: 'post',
        dataType: 'json',
        success: function(e){
            window.location.href = e.routes.view;
            $('#reportModal').modal('hide');
            alert(e.message);
        }
    })
})

</script>
@endsection
