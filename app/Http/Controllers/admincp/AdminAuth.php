<?php

namespace App\Http\Controllers\Admincp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Moderator;
use App\Mail\AdminResetPassword;
use DB;
use Carbon\Carbon;
use Mail;
// use Illuminate\Support\Facades\Request;
class AdminAuth extends Controller
{
  public function login(){
    return view('admincp.login');
  }
  public function dologin(){
    $rememberme = request('rememberme') == 1 ? true : false;
    if(moderatorAuth()->attempt(['user_name'=>request('user_name'),'password'=>request('password')],$rememberme)){
      return redirect(aurl());

    }else{
      session()->flash('error',trans('admincp.incorrect_login_information'));
      return redirect(aurl('login'));
    }
  }
  public function logout(){
    moderatorAuth()->logout();
    return redirect(aurl('login'));
  }
  public function forgot_password(){
    return view('admincp.forgot_password');
  }
  public function forgot_password_reset(){
    $moderator = Moderator::where('email',request('email'))->first();
    if(!empty($moderator)){
      $token = app('auth.password.broker')->createToken($moderator);
      $data = DB::table('password_resets')->insert([
        'email'=>$moderator->email,
        'token'=>$token,
        'created_at'=>Carbon::now(),
      ]);
      Mail::to($moderator->email)->send(new AdminResetPassword(['data'=>$moderator,'token'=>$token]));
      session()->flash('success',trans('admin.the_link_reser_sent'));
      return back();
    }
    return back();
  }
  public function reset_password($token){
    $check_token = DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
    if(!empty($check_token)){
      return view('admincp.reset_password',['data'=>$check_token]);
    }else{
      session()->flash('not_valid',trans('admin.token_not_valid'));
      return redirect(aurl('forgot/password'));
    }
  }
  public function reset_password_done($token){
    $this->validate(request(),[
      'password'=>'required|confirmed',
      'password_confirmation'=>'required',
    ],[],[
      'password'=>'password',
      'password_confirmation'=>'password confirmation',
    ]);
    $check_token = DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
    if(!empty($check_token)){
      $moderator = Moderator::where('email',$check_token->email)->update(['email'=>$check_token->email,
        'password'=>bcrypt(request('password'))]);
      DB::table('password_resets')->where('email',$check_token->email)->delete();
      $rememberme = request('rememberme') == 1 ? true : false;
      moderatorAuth()->attempt(['email'=>$check_token->email,'password'=>request('password')],$rememberme);
      return redirect(aurl());
    }else{
      return redirect(aurl('forgot/password'));      
    }
  }

}
