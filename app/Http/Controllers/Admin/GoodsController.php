<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $goods = DB::table('goods')->get();

        dd($goods);
    }

    public function show($id)
    {
    	
    	//查询商品信息
    	$goods = DB::table('goods')->where('id',$id)->first();
    	$goods->spec =unserialize($goods->spec);

    	// $goods_sku = DB::table('goods_sku')->where('goods_id',$id)->get();
    	// var_dump($goods);
    	// dd($goods_sku);

    	return view('home.goods.show',['goods'=>$goods]);
    }

    public function getAdd()
    {
    	$cates = self::getCates();
        return view('Admin.goods.add',['cates'=>$cates]);
    }


    public function postInsert(Request $request)
    {
        $data = $request->except('_token');

        //处理属性数据
		
		
		// foreach ($data['value'] as $k => $v) {
		// 	// foreach ($v as $key => $value) {
		// 		$spdata['spec_name'] = $data['name'][$k];
		// 		$spdata['spec_value'] = $v;
		// 		dd($spdata);
		// 		# code...
		// 	// }
		//   // $spid = DB::table('spec')->insertGetId($v);
		// }        


        dd($data);
        
       //处理商品数据
        $arr = [];
        foreach ($data['name'] as $k => $v) {
        	foreach ($data['value'][$k] as $key => $value) {
        		$arr[$v][] = $value;
        	}
        }
       
        $goods_data['title'] = $data['title'];
        $goods_data['cid'] = $data['cid'];
        $goods_data['content'] = $data['content'];
        $goods_data['price'] = $data['price'];
        $goods_data['spec'] = serialize($arr);
        $goods_data['pic'] = self::upload($request,'pic');
        //商品数据入库
        $goods_id = DB::table('goods')->insertGetId($goods_data);

        //处理商品sku
        $arr = [];
        foreach ($data['item'] as $key => $value) {
        	$arr[$value]['goods_id'] = $goods_id;
        	$arr[$value]['sku_name'] = $goods_data['title'].','.$data['item'][$key];
        	$arr[$value]['price'] = $data['Txt_PriceSon'][$key];
        	$arr[$value]['num'] = $data['Txt_CountSon'][$key];
        }

        dd($arr);
        //商品sku入库
        $res = DB::table('goods_sku')->insert($arr);

        if($res){
            //重定向到 user/index
            return redirect('admin/goods/index')->with('success','商品添加成功');
        }else{
            //回到上个页面
            return back()->with('error','商品添加失败啦');
        }

    }


    //文件上传操作
    static public function upload($request,$pic)
    {
           //检测是否有文件上传
        if ($request->hasFile($pic)) {
            //随机文件名
            $name = md5(time()+rand(1,99999));
            //后缀名
            $su = $request->file($pic)->getClientOriginalExtension();
            $request->file($pic)->move('./public/uploads', $name.'.'.$su);
            return '/public/uploads/'.$name.'.'.$su;
        }

    }

    public static function getCates()
	{
		$cates = DB::select('
			select *,concat(path,",",id) as paths from cate order by paths
			');
		//遍历
		foreach ($cates as $k => $v) {
			//获取长度
			$arr = explode(',',$v->path); 
			$len = count($arr)-1;
			$cates[$k]->title = 
			str_repeat('|----',$len).$v->title;
		}
		//返回结果
		return $cates;
	}
}
