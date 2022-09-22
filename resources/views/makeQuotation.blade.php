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
                                        <h4 class="form-section text-dark"><i class="fa-solid fa-user-tie text-dark"></i> Customer Personal Information</h4>
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
                                                <label for="customer_enirates_id_no">Emirates ID Number<span class="text-danger">*</span></label>
                                                <input type="text" id="customer_enirates_id_no" class="form-control" placeholder="Customer Emirates ID Number" 
                                                value="{{old('customer_enirates_id_no')}}" name="customer_enirates_id_no" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="customer_email">Email</label>
                                                <input type="email" id="customer_email" class="form-control" placeholder="Customer Email" 
                                                value="{{old('customer_email')}}" name="customer_email">
                                            </div>
                                        </div>
                                        <h4 class="form-section text-dark"><i class="fa-solid fa-file-pen"></i> Customer Requirements</h4>
                                        @if (sizeof($categories) > 0)
                                            @foreach ($categories as $cat)
                                            <!-- <div class="row">
                                                <div class="col-md-12 form-group mb-0">
                                                    <label for="iteam_{{$cat->id}}" class="item-check-label">
                                                        <input type="checkbox" name="" data-itemno="{{$cat->id}}" class="form-control item-check" value="{{$cat->id}}" id="iteam_{{$cat->id}}">
                                                        <span class="item-check-label-text">{{$cat->name}}</span>
                                                    </label>
                                                </div>
                                            </div> -->
                                            <fieldset class="checkboxsas">
                                                <label class="chkbox-label">
                                                    <input type="checkbox" data-itemno="{{$cat->id}}" value="{{$cat->id}}" id="iteam_{{$cat->id}}" class="custom-chkbox item-check">
                                                    {{$cat->name}}
                                                </label>
                                            </fieldset>
                                            <div class="row item-property d-none" id="property_{{$cat->id}}">
                                                @php
                                                    $carcases = [];
                                                    $sutters = [];
                                                    $lippings = [];
                                                    $handles = [];
                                                    $marbles = [];
                                                    $lights = [];
                                                    $sinks = [];
                                                    $counterTops = [];
                                                    $glasss = [];
                                                    $catappliances = [];
                                                    $cataccessory = [];

                                                    $carcasId = $subcategories->where('name', "Carcass")->where('category_id', $cat->id)->first();
                                                    $sutterId = $subcategories->where('name', "Shutter")->where('category_id', $cat->id)->first();
                                                    $lippingId = $subcategories->where('name', "Lipping")->where('category_id', $cat->id)->first();
                                                    $handleId = $subcategories->where('name', "Handle")->where('category_id', $cat->id)->first();
                                                    $marbleId = $subcategories->where('name', "Marble")->where('category_id', $cat->id)->first();
                                                    $lightId = $subcategories->where('name', "Light")->where('category_id', $cat->id)->first();
                                                    $sinkId = $subcategories->where('name', "Sink")->where('category_id', $cat->id)->first();
                                                    $counterTopId = $subcategories->where('name', "Counter Top")->where('category_id', $cat->id)->first();
                                                    $glassId = $subcategories->where('name', "Glass")->where('category_id', $cat->id)->first();
                                                    $catappliances = $appliances->where('category_id', $cat->id);
                                                    $cataccessory = $accessories->where('category_id', $cat->id);

                                                    if($carcasId){
                                                        $carcases = $childcategories->where('sub_category_id', $carcasId->id);
                                                    }
                                                    if($sutterId){
                                                        $sutters = $childcategories->where('sub_category_id', $sutterId->id);
                                                    }
                                                    if($lippingId){
                                                        $lippings = $childcategories->where('sub_category_id', $lippingId->id);
                                                    }
                                                    if($handleId){
                                                        $handles = $childcategories->where('sub_category_id', $handleId->id);
                                                    }
                                                    if($marbleId){
                                                        $marbles = $childcategories->where('sub_category_id', $marbleId->id);
                                                    }
                                                    if($lightId){
                                                        $lights = $childcategories->where('sub_category_id', $lightId->id);
                                                    }
                                                    if($sinkId){
                                                        $sinks = $childcategories->where('sub_category_id', $sinkId->id);
                                                    }
                                                    if($counterTopId){
                                                        $counterTops = $childcategories->where('sub_category_id', $counterTopId->id);
                                                    }
                                                    if($glassId){
                                                        $glasss = $childcategories->where('sub_category_id', $glassId->id);
                                                    }
                                                @endphp
                                                <div class="col-md-6 form-group">
                                                    <label for="quantity_{{$cat->id}}">{{$cat->name}} Quantity</label>
                                                    <input type="number" id="quantity_{{$cat->id}}" class="form-control" placeholder="{{$cat->name}} Quantity" 
                                                    value="{{old('quantity')}}" name="quantity[]">
                                                </div>
                                                @if(sizeof($carcases) > 0)
                                                <div class="col-md-6 form-group">
                                                    <label for="carcass_{{$cat->id}}">Carcass Made of</label>
                                                    <select name="carcass[]" id="carcass_{{$cat->id}}" class="select2 form-control">
                                                        @foreach ($carcases as $type)
                                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label for="measurement_{{$cat->id}}">Carcass Measurement <small>(in inches)</small> </label>
                                                    <div class="input-group ">
                                                        <input type="text" id="length_{{$cat->id}}" name="length[]" class="form-control custom-input-group mr-10" placeholder="total length (in feet)">
                                                        <!-- <input type="text" id="width_{{$cat->id}}" name="width[]" class="form-control custom-input-group" placeholder="width (in feet)"> -->
                                                        <input type="text" id="height_{{$cat->id}}" name="height[]" class="form-control custom-input-group" placeholder="height (in inches)">
                                                    </div>
                                                </div>
                                                @endif
                                                @if(sizeof($sutters) > 0)
                                                <div class="col-md-6 form-group">
                                                    <label for="door_shutter_{{$cat->id}}">Shutter Made of</label>
                                                    <select name="door_shutter[]" id="door_shutter_{{$cat->id}}" class="select2 form-control">
                                                        @foreach ($sutters as $type)
                                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label for="door_measurement_{{$cat->id}}">Shutter Measurement</label>
                                                    <div class="input-group ">
                                                        <input type="text" id="length_{{$cat->id}}" name="length[]" class="form-control custom-input-group mr-10" placeholder="total length (in feet)">
                                                        <!-- <input type="text" id="width_{{$cat->id}}" name="width[]" class="form-control custom-input-group" placeholder="width (in feet)"> -->
                                                        <input type="text" id="height_{{$cat->id}}" name="height[]" class="form-control custom-input-group" placeholder="height (in inches)">
                                                    </div>
                                                </div>
                                                @endif
                                                @if(sizeof($lippings) > 0)
                                                <div class="col-md-6 form-group">
                                                    <label for="lipping_with_{{$cat->id}}">Lipping With</label>
                                                    <select name="lipping_with[]" id="lipping_with_{{$cat->id}}" class="select2 form-control">
                                                        @foreach ($lippings as $type)
                                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @endif
                                                @if(sizeof($handles) > 0)
                                                <div class="col-md-6 form-group">
                                                    <label for="handle_type_{{$cat->id}}">Handle Type</label>
                                                    <select name="handle_type[]" id="handle_type_{{$cat->id}}" class="select2 form-control">
                                                        @foreach ($handles as $type)
                                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @endif
                                                @if(sizeof($marbles) > 0)
                                                <div class="col-md-6 form-group">
                                                    <label for="marbile_type_{{$cat->id}}">Marbile Type</label>
                                                    <select name="marbile_type" id="marbile_type_{{$cat->id}}" class="select2 form-control">
                                                        @foreach ($marbles as $type)
                                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @endif
                                                @if(sizeof($lights) > 0)
                                                <div class="col-md-6 form-group">
                                                    <label for="lighting_{{$cat->id}}">Lighting</label>
                                                    <select name="lighting[]" id="lighting_{{$cat->id}}" class="select2 form-control">
                                                        @foreach ($lights as $type)
                                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @endif
                                                @if(sizeof($sinks) > 0)
                                                <div class="col-md-6 form-group">
                                                    <label for="sink_{{$cat->id}}">Sink</label>
                                                    <select name="sink[]" id="sink_{{$cat->id}}" class="select2 form-control">
                                                        @foreach ($sinks as $type)
                                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @endif
                                                @if(sizeof($counterTops) > 0)
                                                <div class="col-md-6 form-group">
                                                    <label for="counter_top_{{$cat->id}}">Counter Tops</label>
                                                    <select name="counter_top[]" id="counter_top_{{$cat->id}}" class="select2 form-control">
                                                        @foreach ($counterTops as $type)
                                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @endif
                                                @if(sizeof($glasss) > 0)
                                                <div class="col-md-6 form-group">
                                                    <label for="glass_{{$cat->id}}">Glass</label>
                                                    <select name="glass[]" id="glass_{{$cat->id}}" class="select2 form-control">
                                                        @foreach ($glasss as $type)
                                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @endif
                                                @if(sizeof($catappliances) > 0)
                                                <div class="col-md-6 form-group">
                                                    <label for="appliances_{{$cat->id}}">Appliances</label>
                                                    <select name="appliances[]" id="appliances_{{$cat->id}}" onchange="getEachAppliance(this)" 
                                                    data-count="{{$cat->id}}" class="select2 form-control">
                                                        <option value="">Select</option>
                                                        @foreach ($catappliances as $type)
                                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label for="appliances_pro_{{$cat->id}}">Appliances Property</label>
                                                    <select name="appliances_pro[]" id="appliances_pro_{{$cat->id}}" data-count="{{$cat->id}}" class="select2 form-control">
                                                    </select>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label for="appliance_size_{{$cat->id}}">Appliances size</label>
                                                    <input type="text" name="appliance_size[]" id="appliance_size_{{$cat->id}}" class="form-control" placeholder="Appliance size">
                                                </div>
                                                @endif
                                                @if(sizeof($cataccessory) > 0)
                                                <div class="col-md-6 form-group">
                                                    <label for="accessory_{{$cat->id}}">Accessories</label>
                                                    <select name="accessory[]" id="accessory_{{$cat->id}}" onchange="getEachAppliance(this)" 
                                                    data-count="{{$cat->id}}" class="select2 form-control">
                                                        <option value="">Select</option>
                                                        @foreach ($cataccessory as $type)
                                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label for="appliance_size_{{$cat->id}}">Accessories Quantity</label>
                                                    <input type="text" name="appliance_size[]" id="appliance_size_{{$cat->id}}" class="form-control" placeholder="Accessories Quantity">
                                                </div>
                                                @endif
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>

                                    <div class="form-actions right border-0">
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
    <script type="text/javascript">
        $(".item-check").change(function() {
            var itemNo = $(this).attr('data-itemno');
            if(this.checked) {
                $("#property_" + itemNo).removeClass('d-none');
            }else{
                $("#property_" + itemNo).addClass('d-none');
            }
        });

        function getEachAppliance(attrAgApp) {
            // stopPropagation();
            var target = $(attrAgApp).attr('data-count');
            var appId = $(attrAgApp).val();
            var url = "{{  route ('getEachApplianceAttr') }}";
            var toview = "#appliances_pro_"+target;
            if (appId != '') {
                getEachApplianceAttr(appId, url, toview);
            }
        }

    </script>
@endsection