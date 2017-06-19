<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /*
        网站首页
    */
    public function index()
    {
        //解析模板
        return view('Home.index');
    }


    public static function head()
    {
           //查询数据
        $cates = self::getAllCatesByPid(self::getAllCates(),0);
          //解析模板
        return view('Home.layout.head',['cates'=>$cates]);
     
    }

    public static function getAllCates()
    {
        return DB::table('cate')->get();
    }

    public static function getAllCatesByPid($cates,$pid)
    {
        $data = [];
        foreach ($cates as $k => $v) {
            if($v->pid == $pid){
                $v->sub = self::getAllCatesByPid($cates,$v->id);
                $data[] = $v;
            }
        }
        return $data;
    }

}
