<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    public function index()
    {


        //查询商品详细信息


        //解析页面
        return view('Home.goods.index');
    }
}
