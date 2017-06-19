
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 使用</title>

    <!-- Bootstrap -->
    <link href="/public/Home/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/public/Home/dist/js/jquery-1.12.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/public/Home/dist/js/bootstrap.min.js"></script>

  </head>
  <body>
  <div class="container">
     
      <div class="row">
        <div class="col-md-12" style="height:40px"></div>
        <div class="col-md-4 col-md-offset-4">
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">用户名</label>
              <input type="text" class="form-control"  placeholder="用户名">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">密码</label>
              <input type="password" class="form-control"  placeholder="密码">
            </div>
             <div class="form-group">
              <label for="exampleInputPassword1">手机号</label>
              <input type="text" class="form-control" name="phone"  placeholder="手机号">
            </div>
            <div class="col-md-8">
              <label for="exampleInputEmail2">验证码</label>
              <input type="text" class="form-control">
            </div>
            <div class="col-md-4">
              <button type="button" class="btn btn-default btn-sendcode">发送短信验证</button>
            </div>
            <button class="btn btn-danger">注册</button>
          </form>
        </div>
      </div>
      <script type="text/javascript">
      $('.btn-sendcode').click(function(){
        //获取手机号
        var phone = $('input[name=phone]').val();
        //发送ajax
        $.get('/sendVcode',{phone:phone},function(data){
          if(data == 1){
            alert('短信发送成功');
          }
        })

      })

      </script>
      
  </div>

  </body>
</html>