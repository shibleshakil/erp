<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Setting;
use App\Models\EmailSetup;

class AppController extends Controller
{
    public function appSetting(Request $request){
        $data = Setting::find(1);
        if($request->isMethod('post')){
            // dd($request->all());
            $data->app_name = $request->app_name;
            $data->email = $request->email;
            if($request->logo){
                if($request->file('logo')){
                    $image = $request->file('logo');
                    $input = $request->app_name.'_'.'logo' .'.'.$image->getClientOriginalExtension();
                    $destinationPath = 'public/assets/images/logo/'.$input;
                    $destinationPath2 = 'public/frontend/assets/img/logo/'.$input;
                    $resize = Image::make($image)->resize(130,48)->save($destinationPath);
                    $resize2 = Image::make($image)->resize(306,82)->save($destinationPath2);
                    $data->logo = $input;
                    $data->front_logo = $input;
                }
            }
            if($request->favicon){
                if($request->file('favicon')){
                    $image = $request->file('favicon');
                    $input = $request->app_name.'_'. 'ico' .'.'.$image->getClientOriginalExtension();
                    $destinationPath = 'public/assets/images/ico/'.$input;
                    $resize = Image::make($image)->resize(25,25)->save($destinationPath);
                    $data->favicon = $input;
                }
            }

            $data->save();
            return back()->with('updated', 'App Settings Updated Successfully!');
        }
        return view('setup.app_settings', compact('data'));
    }

    public function emailSetup(Request $request){
        $data = EmailSetup::find(1);
        if($request->isMethod('post')){
            if ($request->smtp_check) {
                $data->smtp_check = 1;
            }else{
                $data->smtp_check = 0;
            }
            $data->mail_transport = $request->mail_transport;
            $data->mail_host = $request->mail_host;
            $data->mail_port = $request->mail_port;
            $data->mail_encryption = $request->mail_encryption;
            $data->mail_username = $request->mail_username;
            $data->mail_password = $request->mail_password;
            $data->mail_from_name = $request->mail_from_name;
            $data->mail_from_address = $request->mail_from_address;

            $data->save();
            return back()->with('updated', 'Email Setup Updated Successfully!');
        }
        return view('setup.email_setup', compact('data'));
    }
}
