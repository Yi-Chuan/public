@extends('Admin.layout.layout')
@section('title')
<title>LAMP178官网 - 后台用户添加</title>
@endsection
@section('con')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">用户添加</h1>
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
                        <form role="form" action="{{url('/admin/user/insert')}}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>用户名</label>
                                <input class="form-control" name="username" value="{{old('username')}}">
                            </div>
                            <div class="form-group">
                                <label>密码</label>
                                <input class="form-control" type="password" name="password" value="{{old('password')}}">
                            </div>
                            <div class="form-group">
                                <label>手机号</label>
                                <input class="form-control" type="text" name="phone" value="{{old('phone')}}">
                            </div>
                            <div class="form-group">
                                <label>用户头像</label>
                                <input type="file" name="pic">
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