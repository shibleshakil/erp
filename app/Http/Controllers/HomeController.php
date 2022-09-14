<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function changePassword(Request $request, $id){
        $data = User::find(Auth()->user()->id);
        if(!$data){
            abort(404);
        }
        
        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            DB::beginTransaction();
            try {
                $data = User::find(Auth()->user()->id);
                $data->password = Hash::make($request->password);
                $data->save();
                DB::commit();
                return back()->with('updated', 'Password Changed Successfully!');
            } catch (\Throwable $th) {
                DB::rollback();
                return back()->with('error', 'Somethings went wrong!');
            }
        }

        return view('auth.passwords.change' ,compact('data'));
    }
    
    public function updateProfile(Request $request, $id){
        $data = User::find(Auth()->user()->id);
        // dd($areas);
        if(!$data){
            abort(404);
        }
        
        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'name' => ['required', 'string'],
                'email' => ['required', 'string'],
                'phone' => ['required', 'string'],
            ]);
            // dd($request->all());
            $data = User::find(Auth()->user()->id);
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            if($request->image){
                if($request->file('image')){
                    $image = $request->file('image');
                    $input = $request->name . '_' . $request->phone . '.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('assets/images/uploads/user');
                    $image->move($destinationPath,$input);
                    $data->image = $input;
                }
            }

            if($request->coverage_area){
                $coverArea = implode(',', $request->coverage_area);
                $data->coverage_area = $coverArea;
            }

            $data->save();
            
            DB::commit();
            return back()->with('updated', 'Profile Updated Successfully!');
            
        }

        return view('auth.profile',compact('data'));
    }

    public function makeQuotation(){
        return view('makeQuotation');
    }
}
