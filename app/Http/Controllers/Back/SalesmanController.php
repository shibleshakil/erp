<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Auth;
use DB;
use App\Models\User;
use App\Models\Salesman;

class SalesmanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::where('role_id', 3)->get()->reverse();
        $sl = 0;
        return view('salesman.index', compact('datas', 'sl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salesman.create');
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
            'name' => ['required', 'string'],
            'username' => ['required', 'string', 'unique:users', 'regex:/^[a-zA-Z0-9]+$/u'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
        [
            'username.regex' => 'Spaces and special characters are not allowed in the username field',
        ]);
        // dd($request->all());
        DB::beginTransaction();
        try {
            $data = new User;
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->email = $request->email;
            $data->username = $request->username;
            $data->password = Hash::make($request->password);
            $data->is_active = 1;
            $data->role_id = 3;
            $data->save();

            $salesman = new Salesman;
            $salesman->user_id = $data->id;
            $salesman->created_by = Auth()->user()->id;
            $salesman->save();

            DB::commit();
            return redirect()->route('salesman.index')->with('success', 'New Salesman Added Successfully!');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', 'Somethings went wrong!');

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
        $data = User::find($id);
        if (!$data) {
            abort(404);
        }

        return view('salesman.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users,email,' . $id],
            'phone' => ['required', 'string', 'unique:users,phone,' . $id],
            'password' => ['nullable', 'string', 'min:8'],
        ]);
        // dd($request->all());
        DB::beginTransaction();
        try {
            $data = User::find($id);
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->email = $request->email;
            if ($request->password != '') {
                $data->password = Hash::make($request->password);
            }

            $data->save();

            // $salesman = new Salesman;
            // $salesman->user_id = $data->id;
            // $salesman->created_by = Auth()->user()->id;
            // $salesman->save();

            DB::commit();
            return redirect()->route('salesman.index')->with('success', 'Salesman Info updated Successfully!');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', 'Somethings went wrong!');

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
            $data = User::findorFail($id);
            $data->is_active = 0;
            $data->save();
            DB::commit();
            return 'Salesman Inactive Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somrthings Went Wrong!';
        }
    }

    public function restore($id)
    {
        DB::beginTransaction();
        try {
            $data = User::find($id);
            $data->is_active = 1;
            $data->save();
            DB::commit();
            return 'Salesman Activated Successfully!';
        } catch (\Throwable $th) {
            DB::rollback();
            return 'Somrthings Went Wrong!';
        }
    }
}
