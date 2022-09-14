@extends('layouts.master')
@section('title', 'Make Quatation')
@section('content')

<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><a href="#">Make Quatation</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
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
        <!-- Column selectors table -->
        <section id="column-selectors">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-card-center">Make Quatation Form</h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form" action="#" method="post" enctype="multipart/form-data">@csrf
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="fa-solid fa-user-tie text-dark"></i> Customer Personal Information</h4>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="customer_name">Full Name<span class="text-danger">*</span></label>
                                                <input type="text" id="customer_name" class="form-control" placeholder="Customer Full Name" 
                                                value="{{old('customer_name')}}" name="customer_name" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="customer_mobile">Mobile Number<span class="text-danger">*</span></label>
                                                <input type="number" id="customer_mobile" class="form-control phone" placeholder="Customer Mobile" 
                                                value="{{old('customer_mobile')}}" name="customer_mobile" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="customer_id_card_no">ID Card No.<span class="text-danger">*</span></label>
                                                <input type="text" id="customer_id_card_no" class="form-control" placeholder="Customer ID No." 
                                                value="{{old('customer_id_card_no')}}" name="customer_id_card_no" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="customer_email">Email</label>
                                                <input type="email" id="customer_email" class="form-control" placeholder="Customer Email" 
                                                value="{{old('customer_email')}}" name="customer_email">
                                            </div>
                                        </div>
                                        <h4 class="form-section"><i class="fa-solid fa-magnifying-glass-plus text-dark"></i> Customer Requirements</h4>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="item">Select Item</label>
                                                <select name="item" id="item" class="select2 form-control">
                                                    <option value="Kitchen">Kitchen</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="carcass">Carcass Made of</label>
                                                <select name="carcass" id="carcass" class="select2 form-control">
                                                    <option value="MDF">MDF</option>
                                                    <option value="WOOD">WOOD</option>
                                                    <option value="Aluminium">Aluminium</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="door_shutter">Door Shutter Made of</label>
                                                <select name="door_shutter" id="door_shutter" class="select2 form-control">
                                                    <option value="HPL">HPL</option>
                                                    <option value="AGT">AGT</option>
                                                    <option value="Egger">Egger</option>
                                                    <option value="PVC">PVC</option>
                                                    <option value="Aluminium">Aluminium</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="lipping_with">Lipping With</label>
                                                <select name="lipping_with" id="lipping_with" class="select2 form-control">
                                                    <option value="Normal">Normal</option>
                                                    <option value="Aluminium">Aluminium</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="handle_type">Handle Type</label>
                                                <select name="handle_type" id="handle_type" class="select2 form-control">
                                                    <option value="Type 1">Type 1</option>
                                                    <option value="Type 2">Type 2</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="marbile_type">Marbile Type</label>
                                                <select name="marbile_type" id="marbile_type" class="select2 form-control">
                                                    <option value="Type 1">Type 1</option>
                                                    <option value="Type 2">Type 2</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="led_lighting">LED Lighting</label>
                                                <select name="led_lighting" id="led_lighting" class="select2 form-control">
                                                    <option value="">Select</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="appliances">Appliances</label>
                                                <select name="appliances" id="appliances" class="select2 form-control">
                                                    <option value="">Select</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="sink">Sink</label>
                                                <select name="sink" id="sink" class="select2 form-control">
                                                    <option value="">Select</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="glass">Glass</label>
                                                <select name="glass" id="glass" class="select2 form-control">
                                                    <option value="">Select</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions right">
                                        <button type="submit" id="submitBtn" class="btn btn-primary">
                                            <i class="fa fa-check-square-o"></i> Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Column selectors table -->
    </div>
</div>
@endsection
@section('script')
@endsection