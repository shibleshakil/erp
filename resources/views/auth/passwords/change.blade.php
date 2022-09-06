@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active"><a href="#">Change Password</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
        </div>
    </div>
    <div class="content-body">
        <!-- Basic form layout section start -->
        <section id="basic-form-layouts">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-card-center">Change Password</h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger col-md-12">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="form" action="{{ route ('changePassword', ['id'=>$data->name])}}" method="post">@csrf
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="password">New Password <span class="text-danger">*</span> <small>(minimum 8 characters)</small></label>
                                            <input type="password" name="password" id="password" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Confirm Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password_confirmation" id="password-confirm" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" id="submitBtn" class="btn btn-primary btn-lg btn-block">
                                            <i class="feather icon-unlock"></i> Change Password
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic form layout section end -->
    </div>
</div>
@endsection
@section('script')
@endsection