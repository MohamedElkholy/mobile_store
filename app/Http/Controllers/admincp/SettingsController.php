<?php

namespace App\Http\Controllers\admincp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Settings;

class SettingsController extends Controller
{
    public function index(){
    	$title = trans('admincp.settings');
    	$settings = Settings::orderBy('id','desc')->first();
    	return view('admincp.settings',compact('settings','title'));
    }
    public function update(){
        $data = $this->validate(request(),[
            'store_name'=>'required|string|max:50',            
            'store_logo'=>'nullable|string|max:100',            
            'address'=>'required|string|max:150',            
            'phone_number'=>'regex:([0-9]+)|required|size:11|unique:moderators',
            'commercial_register'=>'nullable|string|max:100',            
            'status'=>'required|in:opened,closed',
            'close_message'=>'string|nullable|max:400',
            'invoice_message'=>'string|nullable|max:190',
            'logo'=>v_image(),
            'icon'=>v_image(),
        ],[],[
            'logo'=>trans('admin.logo'),
            'phone_number'=>trans('admincp.phone_number'),
            'commercial_register'=>trans('admincp.commercial_register'),
            'address'=>trans('admincp.address'),
            'icon'=>trans('admin.icon'),
            'status'=>trans('admincp.site_status'),
            'store_name'=>trans('admincp.store_name'),
            'store_logo'=>trans('admincp.store_logo'),
            'invoice_message'=>trans('admincp.invoice_message'),
            'close_message'=>trans('admincp.close_message'),
        ]);

        if(request()->hasFile('logo')){
            $data['logo'] = request()->file('logo')->store('settings');
        }

        if(request()->hasFile('icon')){
            $data['icon'] = request()->file('icon')->store('settings');
        }
        $settings = Settings::orderBy('id','desc')->first(); 
        $settings->update($data);
        session()->flash('settings_updated',trans('admincp.settings_updated'));
        return redirect(aurl('settings'));    
    }
}
