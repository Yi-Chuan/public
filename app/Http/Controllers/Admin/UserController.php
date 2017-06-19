<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserFromPostRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
      
        //查询所有的用户数据
        // $users = DB::table('user')->get();

        //每页显示条数
        $num = $request->input('num',15);

        //检测是否提交查询关键字
        if($request->has('keywords')){
             //分页查询 select * from user where username like '%admin%';
            $users = DB::table('user')->where('username','like','%'.$request->input('keywords').'%')->paginate($num);
        }else{
            $users = DB::table('user')->paginate($num);
        }

        //提取参数 分配到页面中
        $data = $request->except('page');


        //解析模板 分配数据
        return view('Admin.user.index',['users'=>$users,'data'=>$data]);
    }

    /**
     * 后台用户添加方法
     * 
     * @return view 用户添加表单
     */
    public function getAdd()
    {

        //解析模板
        return view('Admin.user.add');
    }

    /**
     * 后台用户添加处理
     * 
     * @return insert 用户添加数据
     */
    // public function postInsert(UserFromPostRequest $request)
    public function postInsert(Request $request)
    {

        //查看提交过来的数据
        dd($request->all());//获取所有的请求数据
        // dd($request->input('password'));//提取某一个字段数据
        // dd($request->input('password','a@qq.com'));//设置默认值

        //只提取部分数据
        // $data = $request->only(['username','password','phone']);
        //除了哪些不要之外
        // $data = $request->except(['username','password']);


        //数据验证  手动验证
            // if(){}
            // $request->flash();//闪存所有数据
            // return back()->withInput();//回到上一次请求的同时.闪存数据

        //laravel提供的数据验证

        // $this->validate($request, [
        //     'username' => 'required|max:255',
        //     'password' => 'required',
        //     'email' => 'required',
        // ],[
        //      'username.required' => '用户名不能为空',
        //      'username.max' => '用户名最大不能超过255个字符',
        //      'password.required' => '密码不能为空',
        //      'email.required' => '邮箱账号不能为空',

        // ]);


        //提取数据
        $data = $request->except('_token');
        //调用方法进行头像的上传操作
        $data['pic'] = $this->upload($request);
        //进行hash加密
        $data['password'] =  Hash::make($data['password']);
        //将数据进行入库操作
        $res = DB::table('user')->insertGetId($data);
        if($res){
            //重定向到 user/index
            return redirect('admin/user/index')->with('success','用户添加成功');
        }else{
            //回到上个页面
            return back()->with('error','用户添加失败啦');
        }

    }


    //文件上传操作
    public function upload($request)
    {
           //检测是否有文件上传
        if ($request->hasFile('pic')) {
            //随机文件名
            $name = md5(time()+rand(1,99999));
            //后缀名
            $su = $request->file('pic')->getClientOriginalExtension();
            $request->file('pic')->move('./public/uploads', $name.'.'.$su);
            return '/public/uploads/'.$name.'.'.$su;
        }

    }


    //用户删除
    public function postDel(Request $request)
    {
        //获取数据
        $id = $request->input('id');

        //执行删除
        $res = DB::table('user')->where('id',$id)->delete();

        echo $res;
    }


    //用户修改
    public function getEdit($id)
    {
        //根据id查询用户信息
        // $users = DB::table('user')->where('id',$id)->get();
        $users = DB::table('user')->where('id',$id)->first();


        //解析模板 分配数据
        return view('Admin.user.edit',['users'=>$users]);

    }


    //执行用户数据的修改
    public function postUpdate(Request $request)
    {
        $data = $request->except('_token');

         if ($request->hasFile('pic')) {
             //调用方法进行头像的上传操作
             $data['pic'] = $this->upload($request);
         }
        

        //执行数据修改
         $res = DB::table('user')->where('id',$data['id'])->update($data);
        if($res){
            //重定向到 user/index
            return redirect('admin/user/index')->with('success','用户修改成功');
        }else{
            //回到上个页面
            return back()->with('error','用户修改失败啦');
        }

    }
}
