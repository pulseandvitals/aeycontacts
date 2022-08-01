@extends('layouts.admin')
@section('title','Create Profile')
@section('content')
<header>
  <title>Add Profile</title>
</header>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Setup your Profile first</h1>
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header bg-dark text-white-50">
                    </div>
                        <div class="card-body col-md-12">
                            <form id="submitProfile">
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Profession/Field</label>
                                    <input type="text" class="form-control" id="profession" placeholder="Ex: Programmer">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Years of Experience?</label>
                                    <input type="text" class="form-control" id="years_of_exp">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Contact #</label>
                                    <input type="tel" class="form-control" id="contact_no"
                                        placeholder="#">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">City Address</label>
                                    <input type="text" class="form-control" id="city_address"
                                        placeholder="Ex: New York, City"
                                    >
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Prefer work environment</label>
                                    <input type="text" class="form-control"
                                        placeholder="Ex: Work From Home"
                                        id="work_base"
                                    >
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Previous Company you work on</label>
                                    <input type="text" class="form-control"
                                        id="previous_work"
                                    >
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Work Objective</label>
                                    <input type="text" class="form-control"
                                        id="work_objective">
                                    </input>
                                </div>
                                <div class="col-md-12 mt-2 text-right">
                                    <button type="submit" class="btn btn-dark">
                                        <i class="fas fa-plus text-success"></i> Submit Info
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
$('form').on('submit', function(e) {
    e.preventDefault()
    var data = {
        profession:  $('#profession').val(),
        years_of_exp: $('#years_of_exp').val(),
        contact_no: $('#contact_no').val(),
        city_address: $('#city_address').val(),
        work_base: $('#work_base').val(),
        previous_work: $('#previous_work').val(),
        work_objective: $('#work_objective').val()
    }
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        method: 'post',
        url: '/profile-create',
        data: data,
        dataType: 'json',
        success: function(e){
            alert(e.message)
            window.location.href = e.routes.view;
        }
    })
})

</script>
@endsection
