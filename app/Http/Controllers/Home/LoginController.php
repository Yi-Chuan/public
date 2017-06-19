<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Ucpaas;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    
    public function register()
    {
       return view('Home.Login.register');
    }


    //发送短信验证码
    public function sendVcode(Request $request)
    {
        $phone = $request->input('phone');
        // dd($phone);
        //初始化必填
        $options['accountsid']='14ddbec2b1213d5a5c5fa47a3311b624';
        $options['token']='0991747e81c611a0daaa69445abc95ef';

        //初始化 $options必填
        $ucpass = new Ucpaas($options);

        // dd($ucpass);
        //短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
        $appId = "27cd5cb248474da5a8dce0400fb27d92";//应用id
        $to = $phone;//接收方手机号
        $templateId = "42384";//模板id
        $code = rand(1000,9999);
        //将验证码存到session
        session(['Pcode'=>$code]);
        $param=$code;//变量内容

        $str =  $ucpass->templateSMS($appId,$to,$templateId,$param);

        $res = json_decode($str,true);
        if($res['resp']['respCode'] == '000000'){
            echo 1;
        }
    }
}
