@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">ADA</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate PDF</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form</h6>
                </div>
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">ADA No.</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Date</label>
                            <input type="date" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col-12 mt-3">
                            <label for="inputAddress" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Your subject here">
                        </div>
                        <div class="col-12 mt-3">
                            <label for="inputAddress2" class="form-label">Message</label>
                            <textarea class="form-control"></textarea>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="inputCity" class="form-label">Name of Receiver</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="inputState" class="form-label">Position</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="inputZip" class="form-label">Comapny</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                        <div class="col-12 mt-3">
                            <label for="inputAddress2" class="form-label">Address of Receiver</label>
                            <textarea class="form-control"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Assignatories</h6>
                </div>
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Name</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-4">
                            <label for="inputPassword4" class="form-label">Position</label>
                            <input type="date" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col-md-4">
                            <label for="inputAddress" class="form-label">Signature</label>
                            <input type="file" class="form-control" id="inputAddress">
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection