<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use App\Models\Subcategory;
use App\Models\ApplianceAttribute;

class CommonController extends Controller
{
    public function getSubCatAgainstCat(Request $request){
        $datas = SubCategory::where('category_id', $request->id)->get();

        return json_encode($datas);
    }
    
    public function getEachApplianceAttr(Request $request){
        $datas = ApplianceAttribute::where('appliance_id', $request->id)->get();

        return json_encode($datas);
    }
}
