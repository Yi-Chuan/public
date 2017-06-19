@extends('Admin.layout.layout')
@section('title')
<title>LAMP178官网 - 后台分类添加</title>
@endsection
@section('con')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">分类添加</h1>
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
                    <div class="col-lg-6 col-lg-offset-3">
                        <form role="form" action="{{url('/admin/cate/insert')}}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>所属分类</label>
                                <select name="pid" class="form-control">
                                    <option value="0">顶级分类</option>
                                @foreach($cates as $k=>$v)
                                    <option value="{{$v->id}}">{{$v->title}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>分类名</label>
                                <input class="form-control" name="title">
                            </div>
                            {{csrf_field()}}
                            <button class="btn btn-primary" type="submit">添加</button>
                            <button class="btn btn-danger" type="reset">重置</button>
                        </form>
                    </div>
                  
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