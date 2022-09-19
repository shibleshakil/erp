<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use App\Models\Subcategory;

class CommonController extends Controller
{
    public function getSubCatAgainstCat(Request $request){
        $datas = SubCategory::where('category_id', $request->id)->get();

        return json_encode($datas);
    }
}
