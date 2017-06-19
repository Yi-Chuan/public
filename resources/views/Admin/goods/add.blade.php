@extends('Admin.layout.layout')
@section('title')
<title>LAMP178官网 - 后台商品添加</title>
<script type="text/javascript" charset="utf-8" src="{{asset('/public/ueditor/ueditor.config.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('/public/ueditor/ueditor.all.min.js')}}"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="{{asset('/public/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('/public/ueditor/ueditor.parse.js')}}"></script>
@endsection
@section('con')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">商品添加</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Basic Form Elements
            </div>
            <div class="panel-body">
                <div class="row">
                        
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <form role="form" class="div_contentlist" action="{{url('/admin/goods/insert')}}" method="post" enctype="multipart/form-data">
                    <div class="col-lg-12">
                            <div class="row attr_model Father_Title" style="display:none">
                              <div class="col-xs-2 attr_name">
                                <label>属性名</label>
                                <input type="text" Tname="name" class="form-control" placeholder="颜色">
                              </div>
                              <div class="col-xs-2 attr_value">
                                <label>属性值</label>
                                <input type="text" Tname="value" class="form-control" placeholder="红色">
                              </div>
                              <div class="col-xs-2">
                                <label>&nbsp;&nbsp;</label>
                                <input type="button" class=" form-control btn btn-primary add_attr_value" value="添加属性值">
                              </div>
                            </div>
                            
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label>选择分类</label>
                                    <select class="form-control" name="cid">
                                    @foreach($cates as $k=>$v)
                                        <option value="{{$v->id}}">{{$v->title}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label>商品名</label>
                                    <input class="form-control" name="title" value="{{old('username')}}">
                                </div>
                                <div class="form-group ">
                                    <label>价格</label>
                                    <input class="form-control" type="text" name="price" value="{{old('password')}}">
                                </div>
                                <div class="form-group">
                                    <label>数量</label>
                                    <input class="form-control" type="text" name="num" value="{{old('phone')}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-danger add_attr" type="button">添加属性类</button>
                                   
                                </div>
                                 <div class="form-group">
                                    <button class="btn btn-danger add_ok" type="button">确认</button>
                                </div>

                                <div class="div_contentlist2">
                                    <div id="createTable"></div>
                                </div>
                               
                                <div class="form-group">
                                    <label>商品主图</label>
                                    <input type="file" name="pic">
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-10">
                        <script id="editor" name="content" type="text/plain" style="height:500px;">
                           这里可以放初始化的内容
                        </script>
                        
                          {{csrf_field()}}
                            <button class="btn btn-primary" type="submit">添加</button>
                            <button class="btn btn-danger" type="reset">重置</button>
                            <button class="btn btn-primary" id="yulan" type="reset">预览</button>
                    </div>
                </form>

                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

@endsection
@section('js')
<script type="text/javascript" src="{{asset('/public/admin/js/liandong.js')}}"></script>
<script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');

    var i = 0;

    $('.add_attr').click(function(){
        var att = $('.attr_model').eq(0).clone(true);
        att.show();
        att.find('input[Tname=name]').attr('name','name[]');
        att.find('input[Tname=value]').attr('name','value['+i+'][]');
        // att.attr('class',"Father_Title"+i);
        att.addClass("Father_Item"+i);
        i++;
        $(this).parent().append(att);
    })

    $('.add_attr_value').click(function(){
        var v = $(this).parents('.attr_model').find('.attr_value').eq(0).clone();
        $(this).parent().before(v);
    })
</script>

@endsection