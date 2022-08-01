@extends('layouts.admin')
@section('title','Create')
@section('content')

    <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="h1 mb-0 text-gray-800">Message User - {{$receiver->name}}</div>
        <div class="d-none d-sm-inline-block">
            <a href="{{ route('user.show',$receiver->id) }}"
                class="btn btn-sm btn-dark shadow-sm rounded-0">
                <i class="fas fa-angle-left text-white-50"></i> Back
            </a>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header bg-dark text-white-50">
                </div>
                    <div class="card-body">

                        @include('Component.status_success')
                        @include('Component.status_error')

                        <form method="post" action="{{ route('message.sent.store',$receiver->id) }}">
                            @csrf
                            <div class="col-md-6">
                                <label for="receiver" class="form-label">Send to</label>
                                <input class="form-control font-weight-bold rounded-0"
                                    type="text"
                                    value="{{$receiver->name}}"
                                    name="receiver"
                                    readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control rounded-0"
                                    name="message_subject"
                                    placeholder="Ex: Subject"
                                >
                            </div>
                            <div class="col-md-12">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control rounded-0"
                                    rows="4"
                                    name="message"
                                >
                                </textarea>
                            </div>
                            <div class="col-md-12 mt-2 text-right">
                                <button type="submit" class="btn btn-dark rounded-0">
                                    <i class="far fa-paper-plane"></i> Submit Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
