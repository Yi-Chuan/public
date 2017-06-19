<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="oUnLHHs6RzuQNTZ0otsko7FTbJHDHQyhjRuanbCm">
	<title>Bootstrap</title>

	<!-- Bootstrap -->
	<link href="/public/home/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="/public/home/dist/js/jquery-1.12.4.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/public/home/dist/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="container">
				<div class="row clearfix">
	<div class="col-md-12 column">
		<nav class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">Brand</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
									<li class="dropdown mouseNav">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">男装<strong class="caret"></strong></a>
						<ul class="dropdown-menu">
													<li style="position: relative;" class="mouseNav">
								 <a href="#">上衣</a>
								 <ul class="dropdown-menu" style="position: absolute;top:-12px;left:155px">
								 								 	<li>
								 		 <a href="#">衬衣</a>
								 	</li>
								 								 </ul>
							</li>
													<li style="position: relative;" class="mouseNav">
								 <a href="#">裤子</a>
								 <ul class="dropdown-menu" style="position: absolute;top:-12px;left:155px">
								 								 	<li>
								 		 <a href="#">秋裤</a>
								 	</li>
								 								 </ul>
							</li>
												</ul>
					</li>
									<li class="dropdown mouseNav">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">女装<strong class="caret"></strong></a>
						<ul class="dropdown-menu">
													<li style="position: relative;" class="mouseNav">
								 <a href="#">裙子</a>
								 <ul class="dropdown-menu" style="position: absolute;top:-12px;left:155px">
								 								 	<li>
								 		 <a href="#">超短裙</a>
								 	</li>
								 								 </ul>
							</li>
												</ul>
					</li>
									<li class="dropdown mouseNav">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">童装<strong class="caret"></strong></a>
						<ul class="dropdown-menu">
													<li style="position: relative;" class="mouseNav">
								 <a href="#">男童装</a>
								 <ul class="dropdown-menu" style="position: absolute;top:-12px;left:155px">
								 								 	<li>
								 		 <a href="#">男童库</a>
								 	</li>
								 								 </ul>
							</li>
												</ul>
					</li>
								</ul>
				<form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input class="form-control" type="text" />
					</div> <button type="submit" class="btn btn-default">Submit</button>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li>
						 <a href="http://lamp168.cn/Home/login">登录</a>
					</li>
					<li>
						 <a href="http://lamp168.cn/Home/regist">注册</a>
					</li>
					
				</ul>
			</div>
		</nav>
	</div>
</div>
				<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
			    			    			</div>
		</div>
		<div class="row"> 
	<div class="col-md-6"> 
		<div class="thumbnail">
			<img width="300px" class="img-responsive img-rounded" src="{{$goods->pic}}">
		</div>
	</div> 
	<div class="col-md-6"> 
		<div id="addCart" class="summary entry-summary"> 
			<h2 class="shorter"><strong>{{$goods->title}}</strong></h2> 
			<h3><small>价&nbsp;&nbsp;格:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small>{{$goods->price}}</h3>
			@foreach($goods->spec as $k=>$v)
			<h3>
				<small>{{$k}}:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small>
				<span>
				@foreach($v as $kk=>$vv)
					
				<button type="button" class="btn btn-default select">{{$vv}}</button>
					
				@endforeach
				</span>
			</h3>
			@endforeach
			<br><br>
			<form action="http://lamp168.cn/cart/insert" method="post"> 
				<div class="btn-group">
				  <button type="button" class="btn btn-default minus">-</button>
				  <div class="col-xs-4"  style="padding: 0;">
				    <input type="text" style="text-align:center;" class="form-control" name="num" value="1">
				  	<input type="hidden" name="gid" value="8">
				  </div>
				  <button type="button" class="btn btn-default plus">+</button>
				</div>
				<br>
				<br>
				<input type="hidden" name="_token" value="oUnLHHs6RzuQNTZ0otsko7FTbJHDHQyhjRuanbCm">
				<button class="btn btn-danger btn-lg">立即购买</button>
			</form> 
		</div> 
	</div> 
</div>
<script type="text/javascript">
	
	$('.select').click(function(){
		$(this).attr('class','btn btn-danger select').siblings().attr('class','btn btn-default select');
	})
</script>
<div class="row" style="min-height:300px">
	<div class="col-lg-12">
		<div class="tabbable" id="tabs-628095"> 
			<ul class="nav nav-tabs"> 
				<li class="active"> 
					<a href="#panel-142040" data-toggle="tab" contenteditable="true">商品详情</a> 
				</li> 
				<li class=""> 
					<a href="#panel-757447" data-toggle="tab" contenteditable="true">商品评价</a> 
				</li> 
			</ul> 
			<div class="tab-content"> 
				<div class="tab-pane active" id="panel-142040"> 
					商品描述
					面料经过多次筛选，选择抗皱易打理的优质面料，美观大方得体，穿着效果佳。S25
					产品参数
					组合形式: 单件     尺码: S,L,M,XL     裙型: 包臀裙
					腰型: 高腰     风格: 轻熟     裙长: 中长裙（106-125cm）
					材质: 针织     颜色: 黑色(柔软亲肤）     领型: 圆领
					图案: 其他     季节: 秋冬     袖长: 长袖
					穿着效果
					细节做工
					尺码说明
					尺码     裙长     肩宽     腰围     胸围     袖长
					S     104     36     66     82     55
					M     106     37     70     84     56
					L     108     38     74     86     57
					XL     110     39     78     88     58
					※ 以上尺寸为实物人工测量，因测量当时不同会有1-2cm误差，相关数据仅作参考，以收到实物为准。
 
				</div> 
				<div class="tab-pane" id="panel-757447"> 
					<p contenteditable="true">Howdy, I'm in Section 2.</p> 
				</div> 
			</div> 
		</div> 
	</div>
</div>

	</div>
	<hr>
	<footer class="footer ">
      <div class="container">
        <div class="row footer-top">
          <div class="col-sm-6 col-lg-6">
            <h4>
              <img src="">
            </h4>
            <p>本网站所列开源项目的中文版文档全部由<a href="http://www.bootcss.com/">Bootstrap中文网</a>成员翻译整理，并全部遵循 <a href="http://creativecommons.org/licenses/by/3.0/" target="_blank">CC BY 3.0</a>协议发布。</p>
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
                  <li><a href="http://weibo.com/bootcss" title="Bootstrap中文网官方微博" target="_blank">新浪微博</a></li>
                  <li><a href="mailto:admin@bootcss.com">电子邮件</a></li>
                </ul>
              </div>
              <div class="col-xs-3">
                <h4>旗下网站</h4>
                <ul class="list-unstyled">
                  <li><a href="http://www.golaravel.com/" target="_blank">Laravel中文网</a></li>
                  <li><a href="http://www.ghostchina.com/" target="_blank">Ghost中国</a></li>
                </ul>
              </div>
              <div class="col-xs-3">
                <h4>赞助商</h4>
                <ul class="list-unstyled">
                  <li><a href="http://www.ucloud.cn/" target="_blank">UCloud</a></li>
                  <li><a href="https://www.upyun.com" target="_blank">又拍云</a></li>
                </ul>
              </div>
            </div>
    
          </div>
        </div>
        <hr>
        <div class="row footer-bottom">
          <ul class="list-inline text-center">
            <li><a href="http://www.miibeian.gov.cn/" target="_blank">京ICP备11008151号</a></li><li>京公网安备11010802014853</li>
          </ul>
        </div>
      </div>
    </footer>
	<script type="text/javascript">
	

	$('.mouseNav').hover(function(){
		$(this).addClass('open');
		// $(this).trigger('click');
	},function(){
		$(this).removeClass('open');

	})

	</script>

	<script type="text/javascript">
// minus plus
$('.plus').click(function(){
	//获取数量
	var num = parseInt($('input[name=num]').val());
	num = num+1;
	$('input[name=num]').val(num);
})
$('.minus').click(function(){
	//获取数量
	var num = parseInt($('input[name=num]').val());
	num = num-1;
	if(num == 0){return}
	$('input[name=num]').val(num);
})

</script>


</body>

</html>
