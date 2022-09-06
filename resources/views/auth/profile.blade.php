@extends('layouts.master')
@section('title', 'Profile')
@section('content')
    
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Profile</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">Edit Profile</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section>
                <div class="row">
                    <div class="col-md-3 user-info">
                        <div class="user-img-div">
                            <img src="{{$data->image ? asset ('public/assets/images/uploads/user/'.$data->image) : asset ('public/app-assets/images/portrait/small/avatar-s-1.png')}}" 
                            class="user-profile-img" alt="{{$data->name}}">
                            <br>
                            <p>
                                <span class="user-profile-name">{{$data->name}}</span> <br>
                                @if ($data->address)
                                    <span><i class="feather icon-map-pin mr-10"></i>{{$data->address}} </span> <br>
                                @endif
                                @if ($data->email)
                                    <span><i class="feather icon-mail mr-10"></i> {{$data->email}}</span> <br>
                                @endif
                                @if ($data->phone)
                                    <span><i class="feather icon-phone mr-10"></i> {{$data->phone}}</span> <br>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <ul class="nav nav-tabs mb-2" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center active" id="personal-info-tab" data-toggle="tab"
                                                href="#personalinfo" aria-controls="personalinfo" role="tab" aria-selected="true">
                                                <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Personal Information</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="personalinfo" aria-labelledby="personal-info-tab" role="tabpanel">
                                            <form action="{{ route ('updateProfile', ['id'=> $data->id]) }}" method="post" 
                                            class="form" enctype="multipart/form-data">@csrf
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="name">Name<span class="text-danger">*</span></label>
                                                        <input type="text" id="name" name="name" class="form-control" value="{{$data->name}}"
                                                            placeholder="Enter Name" required >
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="email">Email<span class="text-danger">*</span></label>
                                                        <input type="text" id="email" name="email" class="form-control" value="{{$data->email}}"
                                                            placeholder="Enter Email" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="phone">Phone<span class="text-danger">*</span></label>
                                                        <input type="text" id="phone" name="phone" class="form-control" value="{{$data->phone}}"
                                                            placeholder="Enter phone" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="image">Change Image</label>
                                                        <input type="file" id="image" name="image" multiple="true" class="form-control" >
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                        <button type="submit" id="submitBtn" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- users edit account form ends -->
                                        </div>
                                    </div>
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