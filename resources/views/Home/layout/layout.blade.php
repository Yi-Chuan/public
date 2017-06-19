
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
    <style type="text/css">  
            .dropdown-submenu {  
                position: relative;  
            }  
            .dropdown-submenu > .dropdown-menu {  
                top: 0;  
                left: 100%;  
                margin-top: -6px;  
                margin-left: -1px;  
                -webkit-border-radius: 0 6px 6px 6px;  
                -moz-border-radius: 0 6px 6px;  
                border-radius: 0 6px 6px 6px;  
            }  
            .dropdown-submenu:hover > .dropdown-menu {  
                display: block;  
            }  
            .dropdown-submenu > a:after {  
                display: block;  
                content: " ";  
                float: right;  
                width: 0;  
                height: 0;  
                border-color: transparent;  
                border-style: solid;  
                border-width: 5px 0 5px 5px;  
                border-left-color: #ccc;  
                margin-top: 5px;  
                margin-right: -10px;  
            }  
            .dropdown-submenu:hover > a:after {  
                border-left-color: #fff;  
            }  
            .dropdown-submenu.pull-left {  
                float: none;  
            }  
            .dropdown-submenu.pull-left > .dropdown-menu {  
                left: -100%;  
                margin-left: 10px;  
                -webkit-border-radius: 6px 0 6px 6px;  
                -moz-border-radius: 6px 0 6px 6px;  
                border-radius: 6px 0 6px 6px;  
            }  
        </style>  


  </head>
  <body style="padding-top: 70px;">
    <!-- 导航 -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Link</a></li>
            
            {!! App\Http\Controllers\Home\IndexController:: head() !!}


          </ul>

          <form class="navbar-form navbar-left">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                登录
              </button>
  
            </li>
            <li>
              <a href="{{url('/register')}}">注册</a>
              
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">登录</h4>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile">
                <p class="help-block">Example block-level help text here.</p>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Check me out
                </label>
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="button" class="btn btn-primary">登录</button>
          </div>
        </div>
      </div>
    </div>

  <div class="container">

    @section('con')
      
      <!-- 巨幕 -->
      <div class="jumbotron">
        <h1>Hello, world!</h1>
        <p>...</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
      </div>

      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="/public/Home/dist/img/001.jpg" alt="...">
            <div class="carousel-caption">
              ...
            </div>
          </div>
          <div class="item">
            <img src="/public/Home/dist/img/002.jpg" alt="...">
            <div class="carousel-caption">
              ...
            </div>
          </div>
           <div class="item">
            <img src="/public/Home/dist/img/003.jpg" alt="...">
            <div class="carousel-caption">
              ...
            </div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      
      <!-- 商品 -->
    
      <div class="row">
        <div class="col-sm-4 col-md-3">
          <div class="thumbnail">
            <img src="/public/Home/dist/img/1.jpg" alt="...">
            <div class="caption">
              <h3>商品标题1</h3>
              <p>99.00</p>
              <p><a href="#" class="btn btn-primary" role="button">加入购物车</a> <a href="#" class="btn btn-default" role="button">收藏</a></p>
            </div>
          </div>
        </div>
         <div class="col-sm-4 col-md-3">
          <div class="thumbnail">
            <img src="/public/Home/dist/img/1.jpg" alt="...">
            <div class="caption">
              <h3>商品标题1</h3>
              <p>99.00</p>
              <p><a href="#" class="btn btn-primary" role="button">加入购物车</a> <a href="#" class="btn btn-default" role="button">收藏</a></p>
            </div>
          </div>
        </div>
         <div class="col-sm-4 col-md-3">
          <div class="thumbnail">
            <img src="/public/Home/dist/img/1.jpg" alt="...">
            <div class="caption">
              <h3>商品标题1</h3>
              <p>99.00</p>
              <p><a href="#" class="btn btn-primary" role="button">加入购物车</a> <a href="#" class="btn btn-default" role="button">收藏</a></p>
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-md-3">
          <div class="thumbnail">
            <img src="/public/Home/dist/img/1.jpg" alt="...">
            <div class="caption">
              <h3>商品标题1</h3>
              <p>99.00</p>
              <p><a href="#" class="btn btn-primary" role="button">加入购物车</a> <a href="#" class="btn btn-default" role="button">收藏</a></p>
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-md-3">
          <div class="thumbnail">
            <img src="/public/Home/dist/img/1.jpg" alt="...">
            <div class="caption">
              <h3>商品标题1</h3>
              <p>99.00</p>
              <p><a href="#" class="btn btn-primary" role="button">加入购物车</a> <a href="#" class="btn btn-default" role="button">收藏</a></p>
            </div>
          </div>
        </div>
         <div class="col-sm-4 col-md-3">
          <div class="thumbnail">
            <img src="/public/Home/dist/img/1.jpg" alt="...">
            <div class="caption">
              <h3>商品标题1</h3>
              <p>99.00</p>
              <p><a href="#" class="btn btn-primary" role="button">加入购物车</a> <a href="#" class="btn btn-default" role="button">收藏</a></p>
            </div>
          </div>
        </div>
      </div>
        

    @show
    
  </div>

  <footer class="footer ">
  <hr>
        <div class="container">
          <div class="row footer-top">
            <div class="col-sm-6 col-lg-6">
              <h4>
                <img src="https://static.bootcss.com/www/assets/img/logo.png">
              </h4>
              <p>本网站所列开源项目的中文版文档全部由<a href="http://www.bootcss.com/">Bootstrap中文网</a>成员翻译整理，并全部遵循 <a target="_blank" href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>协议发布。</p>
            </div>
            <div class="col-sm-6  col-lg-5 col-lg-offset-1">
              <div class="row about">
                <div class="col-xs-3">
                  <h4>关于</h4>
                  <ul class="list-unstyled">
                    <li><a href="/about/">关于我们</a></li>
                    <li><a href="/ad/">广告合作</a></li>
                    <li><a href="/links/">友情链接</a></li>
                    <li><a href="/hr/">招聘</a></li>
                  </ul>
                </div>
                <div class="col-xs-3">
                  <h4>联系方式</h4>
                  <ul class="list-unstyled">
                    <li><a target="_blank" title="Bootstrap中文网官方微博" href="http://weibo.com/bootcss">新浪微博</a></li>
                    <li><a href="mailto:admin@bootcss.com">电子邮件</a></li>
                  </ul>
                </div>
                <div class="col-xs-3">
                  <h4>旗下网站</h4>
                  <ul class="list-unstyled">
                    <li><a target="_blank" href="http://www.golaravel.com/">Laravel中文网</a></li>
                    <li><a target="_blank" href="http://www.ghostchina.com/">Ghost中国</a></li>
                  </ul>
                </div>
                <div class="col-xs-3">
                  <h4>赞助商</h4>
                  <ul class="list-unstyled">
                    <li><a target="_blank" href="http://www.ucloud.cn/">UCloud</a></li>
                    <li><a target="_blank" href="https://www.upyun.com">又拍云</a></li>
                  </ul>
                </div>
              </div>
      
            </div>
          </div>
          <hr>
          <div class="row footer-bottom">
            <ul class="list-inline text-center">
              <li><a target="_blank" href="http://www.miibeian.gov.cn/">京ICP备11008151号</a></li><li>京公网安备11010802014853</li>
            </ul>
          </div>
        </div>
      </footer>

  </body>
</html>