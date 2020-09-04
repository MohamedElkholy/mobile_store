<?php

namespace App\Http\Controllers\admincp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\ModeratorDatatable;
use App\Moderator;

class ModeratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admincp.moderators.index',['title'=>trans('admincp.moderators_accounts')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.moderators.create',['title'=>trans('admincp.add_new_moderator')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = $this->validate(request(),[
            'name'=>'required|string',
            'user_name'=>'required|string',
            'permissions'=>'required|in:admin,moderator',
            'email'=>'nullable|email|unique:moderators',
            'password'=>'required|min:8',
            'phone_number'=>'regex:([0-9]+)|required|size:11|unique:moderators',
        ],[],[
            'name'=>trans('admincp.name'),
            'user_name'=>trans('admincp.login_name'),
            'email'=>trans('admincp.email'),
            'phone_number'=>trans('admincp.phone_number'),
            'password'=>trans('admincp.password'),
            'permissions'=>trans('admincp.permissions'),
        ]);
        $data['password'] = bcrypt(request('password'));
        Moderator::create($data);
        session()->flash('added',trans('admincp.moderator_record_added'));
        return redirect(aurl('moderator'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(moderatorAuth()->user()->id != $id){
            return redirect()->back();
        }else{
        $title = trans('admincp.my_profile');
        $moderator = Moderator::findOrFail($id);
        return view('admincp.moderators.profile',compact('title','moderator'));
        }
    }
    public function update_profile($id){
        $moderator = Moderator::findOrFail($id);
            $data = $this->validate(request(),[
                'password' => 'required|confirmed|min:6',
            ],[],[
                'password'=> trans('admincp.password'),
            ]);
        if(request()->has('password')){
            $data['password'] = bcrypt(request('password'));
        }             
        $moderator->update($data);
            session()->flash('updated',trans('admincp.password_changed_successfully'));
            return redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $moderator = Moderator::findOrFail($id);
        $title = trans('admincp.edit_moderator');
        return view('admincp.moderators.edit',compact('moderator','title'));
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
         $data = $this->validate(request(),[
            'name'=>'required',
            'user_name'=>'required|string',            
            'permissions'=>'required|in:admin,moderator',
            'email'=>'nullable|email|unique:moderators,email,'.$id,
            'password'=>'sometimes|nullable|min:8',
            'phone_number'=>'regex:([0-9]+)|required|size:11|unique:moderators,phone_number,'.$id,
        ],[],[
            'name'=>trans('admincp.name'),
            'user_name'=>trans('admincp.login_name'),            
            'email'=>trans('admincp.email'),
            'phone_number'=>trans('admincp.phone_number'),
            'password'=>trans('admincp.password'),
            'permissions'=>trans('admincp.permissions'),
        ]);
        if(request()->has('password')){
            $data['password'] = bcrypt(request('password'));
        }        
        Moderator::where('id', $id)->update($data);
        session()->flash('updated',trans('admincp.moderator_record_updated'));
        return redirect(aurl('moderator'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Moderator::destroy($id);
        session()->flash('deleted',trans('admincp.deleted'));
        return redirect(aurl('moderator'));            
    }
}
