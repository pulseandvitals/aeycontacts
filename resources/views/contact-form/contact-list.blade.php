@extends('layouts.admin')
@include('modals.contact-list-modal')
@section('page', 'Users')
@section('content')
<header>
  <title>Contacts</title>
</header>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Contacts</h1>

        <div class="d-none d-sm-inline-block">
            <button class="btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#addcontact"><i
            class="fas fa-plus fa-sm text-white-50"></i>Add</button>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-dark text-white-50">
                    <h4></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">City Address</th>
                                    <th scope="col">Dial Number</th>
                                    <th scope="col">Websites</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                              <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--delete modal-->
<div class="modal" id="del_modal"tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Danger</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="del_id">
        <p>Are you sure you want to delete this contact?</p>
      </div>
      <div class="modal-footer">
        <button type="button" id="submit_delete" class="btn btn-danger">Yes, Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--Add Modal -->
<div class="modal fade" id="addcontact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Name</label>
            <input type="text" class="form-control" id="name">
            </div>
            <div class="col-md-12">
            <label for="inputEmail4" class="form-label">City Address</label>
            <input type="text" class="form-control" id="cityaddress">
            </div>
            <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Dial Number</label>
            <input type="number" class="form-control" id="dialnumber">
            </div>
            <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Websites</label>
            <input type="text" class="form-control" id="website">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="add_contact"class="btn btn-primary">Save Contact</button>
      </div>
    </div>
  </div>
</div>
<!-- edit modal --->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <input type="hidden" id="edit_id">
            <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Name</label>
            <input type="text" class="form-control" id="edit_name">
            </div>
            <div class="col-md-12">
            <label for="inputEmail4" class="form-label">City Address</label>
            <input type="text" class="form-control" id="city_address">
            </div>
            <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Dial Number</label>
            <input type="number" class="form-control" id="dial_number">
            </div>
            <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Websites</label>
            <input type="text" class="form-control" id="edit_websites">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="submit_edit" class="btn btn-success">Update Changes</button>
      </div>
    </div>
  </div>
</div>
<!---toaster notification--->
<div class="toast bg-success text-white toastdelete" style="position: fixed; bottom: 30px; right: 10px;">

</div>
<div class="toast bg-success text-white toastadded" style="position: fixed; bottom: 30px; right: 10px;">

</div>
<div class="toast bg-danger text-white toasterror" style="position: fixed; bottom: 30px; right: 10px;">

</div>
<div class="toast bg-success text-white toastupdate" style="position: fixed; bottom: 30px; right: 10px;">

</div>
@endsection
