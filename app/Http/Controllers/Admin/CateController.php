<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CateController extends Controller
{

    //分类列表
    public function getIndex(Request $request)
    {
        //每页显示条数
        $num = $request->input('num',15);

        //检测是否提交查询关键字
        if($request->has('keywords')){
             //分页查询 select * from user where username like '%admin%';
            $cates = DB::table('cate')->where('title','like','%'.$request->input('keywords').'%')->paginate($num);
        }else{
            $cates = DB::table('cate')->paginate($num);
        }

        //提取参数 分配到页面中
        $data = $request->except('page');


        //解析模板 分配数据
        return view('Admin.cate.index',['cates'=>$cates,'data'=>$data]);
    }

    //分类添加
    public function getAdd()
    {
        //查询已有的分类
        $cates = DB::table('cate')->get();

        //解析模板
        return view('Admin.cate.add',['cates'=>$cates]);
    }

    //分类添加处理
    public function postInsert(Request $request)
    {
        //提取数据
        $data = $request->except('_token');

        //判断是否为顶级分类
        if($data['pid'] == 0)
        {
            $data['path'] = '0';
            $data['status'] = '1';
        }else{
            //获取父级的path
            $res = DB::table('cate')->where('id',$data['pid'])->first();
            //封装子类的path
            $data['path'] = $res->path.','.$data['pid'];
            $data['status'] = '1';
        }

       //执行插入
        $res = DB::table('cate')->insert($data);
        if($res)
        {
            return redirect('/admin/cate/index')->with('success','分类添加成功');
        }else{
            return back()->with('error','分类添加失败');
        }
    }
}
