<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use DB;
use App\Models\Appliance;
use App\Models\Category;

class ApplianceController extends Controller
{
    private $appliances;

    public function __construct(){
        $this->appliances = Appliance::get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = $this->appliances->reverse();
        $categories = Category::where('is_active', 1)->orderBy('name')->get();
        $sl = 0;
         return view('appliance.index', compact('datas', 'categories', 'sl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => ['required'],
            'name' => ['required', 'unique:appliances,name,'.$request->id.',id,category_id,'.$request->category_id],
        ]);

        DB::beginTransaction();

        try {
            $data = new Appliance;
            $data->category_id = $request->category_id;
            $data->name = $request->name;
            $data->is_active = 1;
            $data->created_by = Auth()->user()->id;
            $data->save();
            DB::commit();

            return back()->with('success', 'New Appliance Created Successfully');
            
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', $th->getMessage());
            return back()->with('error', 'Somethings went wrong. Try Again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => ['required'],
            'name' => ['required', 'unique:appliances,name,'.$request->id.',id,category_id,'.$request->category_id],
        ]);

        DB::beginTransaction();

        try {
            $data = Appliance::find($request->id);
            $data->category_id = $request->category_id;
            $data->name = $request->name;
            $data->is_active = 1;
            $data->updated_by = Auth()->user()->id;
            $data->save();
            DB::commit();

            return back()->with('success', 'Appliance Updated Successfully');
            
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', 'Somethings went wrong. Try Again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $data = Appliance::findorFail($id);
            $data->is_active = 0;
            $data->deleted_by = Auth()->user()->id;
            $data->deleted_at = date('Y-m-d H:i:s');
            $data->save();
            DB::commit();
            return 'Appliance Inactive Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somrthings Went Wrong!';
        }
    }

    public function restore($id)
    {
        DB::beginTransaction();
        try {
            $data = Appliance::find($id);
            $data->is_active = 1;
            $data->updated_by = Auth()->user()->id;
            $data->save();
            DB::commit();
            return 'Appliance Activated Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somrthings Went Wrong!';
        }
    }

}
