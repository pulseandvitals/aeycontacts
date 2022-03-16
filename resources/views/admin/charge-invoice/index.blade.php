@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Charge Invoice</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate PDF</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Invoice # 101299</h6>
                </div>
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Customer ID</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Date</label>
                            <p><strong>{{ now() }}</strong></p>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="inputAddress" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Enter company name">
                        </div>
                        <div class="col-12 mt-3">
                            <label for="inputAddress2" class="form-label">Street Address</label>
                            <textarea class="form-control"></textarea>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="inputCity" class="form-label">City</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="inputState" class="form-label">State/Region</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="inputZip" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="inputCity" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="inputState" class="form-label">Fax</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="inputZip" class="form-label">Website</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="inputEmail4" class="form-label">Responsibility Center</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-6">
                            <div><label class="form-label mt-4">Type</label></div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Payment</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">SOA</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Fields</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                        <form class="row g-3">
                            <div class="col-md-10">
                                <label for="inputEmail4" class="form-label">Description</label>
                                <input type="email" class="form-control" id="inputEmail4">
                            </div>
                            <div class="col-md-2">
                                <label for="inputPassword4" class="form-label">Amount</label>
                                <input type="email" class="form-control" id="inputEmail4">
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Comments</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                        <form class="row g-3">
                            <div class="col-md-12">
                                <textarea class="form-control"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Bill To</h6>
                </div>
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Name</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-4">
                            <label for="inputPassword4" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col-md-4">
                            <label for="inputAddress" class="form-label">TIN</label>
                            <input type="text" class="form-control" id="inputAddress">
                        </div>
                        <div class="col-12 mt-3">
                            <label for="inputAddress2" class="form-label">Street Address</label>
                            <textarea class="form-control"></textarea>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="inputCity" class="form-label">City</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="inputState" class="form-label">State/Region</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="inputZip" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="inputCity" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="inputState" class="form-label"></label>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="inputZip" class="form-label"></label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection