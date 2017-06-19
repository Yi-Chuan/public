@extends('Admin.layout.layout')
@section('title')
<title>LAMP178官网 - 后台用户列表</title>
@endsection
@section('con')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">用户列表</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row"> 
   <div class="col-lg-12"> 
    <div class="panel panel-default"> 
     <div class="panel-heading">
       DataTables Advanced Tables 
     </div> 
     <!-- /.panel-heading --> 
     <div class="panel-body"> 
      <div class="dataTable_wrapper"> 
       <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
      <form action="{{url('/admin/user/index')}}" method="get">
        <div class="row">
         <div class="col-sm-6">
          <div class="dataTables_length" id="dataTables-example_length">
           <label>显示 
            <select name="num" aria-controls="dataTables-example" class="form-control input-sm">
              <option value="10" @if(!empty($data['num']) && $data['num'] == 10) selected @endif>10</option>
              <option value="25" @if(!empty($data['num']) && $data['num'] == 25) selected @endif>25</option>
              <option value="50" @if(!empty($data['num']) && $data['num'] == 50) selected @endif>50</option>
              <option value="100" @if(!empty($data['num']) && $data['num'] == 100) selected @endif>100</option>
            </select> 条</label>
          </div>
         </div>
         <div class="col-sm-6">
          <div id="dataTables-example_filter" class="dataTables_filter">
           <label>查询:<input type="search" name="keywords" value="{{ $data['keywords'] or '' }}" class="form-control input-sm" placeholder="" aria-controls="dataTables-example" /></label>
            <button class="btn">搜索</button>
          </div>
         </div>
        </div>
      </form>
        <div class="row">
         <div class="col-sm-12">
          <table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dataTables-example_info"> 
           <thead> 
            <tr role="row">
             <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 47px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
             <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 200px;" aria-label="Browser: activate to sort column ascending">头像</th>
             <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 200px;" aria-label="Platform(s): activate to sort column ascending">用户名</th>
             <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 126px;" aria-label="Engine version: activate to sort column ascending">手机号</th>
             <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 89px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
            </tr> 
           </thead> 
           <tbody> 
              @foreach($users as $k=>$v)
                <tr class="gradeA odd" role="row"> 
                 <td class="sorting_1">{{$v->id}}</td> 
                 <td><img src="{{asset($v->pic)}}" width="50px"></td> 
                 <td>{{$v->username}}</td> 
                 <td class="center">{{$v->phone}}</td> 
                 <td class="center">
                    <button class="btn btn-danger btn-xs btn-delete" type="button">删除</button>
                    <a href="{{url('/admin/user/edit',['id'=>$v->id])}}" class="btn btn-warning btn-xs">修改</a></td> 
                </tr>
               @endforeach
           </tbody> 
          </table>
         </div>
        </div>
        <div class="row">
         <div class="col-sm-12">
          <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
            {!! $users->appends($data)->render() !!}
          </div>
         </div>
        </div>
       </div> 
      </div> 
      <!-- /.table-responsive --> 
      <div class="well"> 
       <h4>DataTables Usage Information</h4> 
       <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a href="https://datatables.net/" target="_blank">https://datatables.net/</a>.</p> 
       <a href="https://datatables.net/" target="_blank" class="btn btn-default btn-lg btn-block">View DataTables Documentation</a> 
      </div> 
     </div> 
     <!-- /.panel-body --> 
    </div> 
    <!-- /.panel --> 
   </div> 
   <!-- /.col-lg-12 --> 
  </div>

 
@endsection
@section('js')
<script type="text/javascript">
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

    $('.btn-delete').click(function(){
      var id = $(this).parents('tr').find('.sorting_1').text();
      var btn = $(this);

      $.post('/admin/user/del',{id:id},function(data){
            if(data == 1){
               btn.parents('tr').remove();
            }else{
                alert('删除失败');
            }
      });
    })
  
</script>
@endsection