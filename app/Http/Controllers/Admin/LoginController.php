<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use Hash;
use Gregwar\Captcha\CaptchaBuilder;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //X显示登录页面
    public function login()
    {
        return view('Admin.login.login');
    }


    //处理登录
    public function dologin(Request $request)
    {
        // dd($request->all());
        //验证码检测
        if($request->input('vcode') != session('Vcode')){
            return back()->with('error','验证码错误');
        }
        //查询用户
        $users = DB::table('user')->where('username',$request->input('username'))->first();
        if(!$users){
            return back()->with('error','用户名或密码错误');
        }

        //验证密码
        if(Hash::check($request->input('password'),$users->password)){
            //将id存入session
            session(['uid'=>$users->id]);
            return redirect('/admin/index')->with('success','欢迎'.$users->username.'登录');
        }else{
            return back()->with('error','用户名或密码错误');
        }
        
    }


    //验证码
    public function createyzm()
    {
         ob_clean();//清除输出缓存区的内容
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        session(['Vcode'=>$phrase]);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }
}
