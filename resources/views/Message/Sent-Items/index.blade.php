@extends('layouts.admin')
@section('title','Sent Items')
@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sent Items</h1>

        <div class="d-none d-sm-inline-block">
            <button class="btn btn-sm btn-dark shadow-sm rounded-0">
                <i class="fas fa-angle-left fa-sm text-white-50"></i> back
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
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">Sent to</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">&nbsp;</th>
                                </tr>
                            </thead>
                            @foreach($sent_items as $item)
                            <tbody class="text-gray-500 user-select-none">
                                <td>
                                    <a href="{{ route('user.show',$item->receiver_id) }}" class="text-nowrap text-dark">
                                        <div class="text-nowrap">
                                            {{ $item->getReceiver->name }}
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <div class="text-nowrap">
                                        {{ $item->message_subject ? $item->message_subject : 'No Subject' }}
                                    </div>
                                </td>
                                <td>
                                    <div class="text-nowrap">
                                        {{ $item->message }}
                                    </div>
                                </td>
                                <td>
                                    <div class="text-nowrap">
                                        {{ date('F j, Y, g:i a', strtotime($item->created_at)) }}
                                    </div>
                                </td>
                                <td class="text-right">
                                    <a href="" type="button"
                                        class="btn btn-info btn btn-sm rounded-0"
                                    >
                                        <i class="fas fa-eye"></i> Read
                                    </a>
                                    <a href="" type="button"
                                        class="btn btn-danger btn btn-sm rounded-0"
                                    >
                                        <i class="fas fa-trash fa-sm"></i> Delete
                                    </a>
                                </td>
                            @endforeach
                        </table>
                        @if($sent_items->count() == 0)
                        <div class="text-center">
                            <span class="font-weight-bold"> No Sent Message Found </span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
