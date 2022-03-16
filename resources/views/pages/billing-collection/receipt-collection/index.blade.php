@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">CASH/CHECK RECEIPTS RECORD</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate PDF</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">Fund Cluster: 3452</h6>
                            <h6 class="m-0 font-weight-bold text-primary">CRDR Number: 234</h6>
                        </div>
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">Sheet Number: 34</h6>
                            <h6 class="m-0 font-weight-bold text-primary">Year: 2021</h6>
                        </div>  
                    </div>     
                </div>
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Date</label>
                            <p><strong>{{ now() }}</strong></p>
                        </div>
                        <div class="col-md-6">
                            <label for="inputReference" class="form-label">Reference/OR/DS #</label>
                            <input type="email" class="form-control" id="inputReference">
                        </div>
                        <div class="col-12 mt-3">
                            <label for="inputName" class="form-label">Payor Name</label>
                            <input type="text" class="form-control" id="inputName" placeholder="Enter payor name">
                        </div>
                        <div class="col-12 mt-3">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                UACS Code - MFO/PAP
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">12345</a>
                                    <a class="dropdown-item" href="#">sample</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="inputCity" class="form-label">Nature of Collection</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="inputCollection" class="form-label">Collection</label>
                            <p>USD</p><input type="text" class="form-control" id="inputCollection">
                            <p>PESO</p><input type="text" class="form-control" id="inputCollection">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="inputDeposit" class="form-label">Deposit</label>
                            <p>USD</p><input type="text" class="form-control" id="inputDeposit">
                            <p>PESO</p><input type="text" class="form-control" id="inputDeposit">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="inputDeposit" class="form-label">Undeposit Collection</label>
                            <p>USD: computation result here</p>
                            <p>PESO: computation result here</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection