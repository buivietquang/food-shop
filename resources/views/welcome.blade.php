<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop ban hang laravel</title>
	<link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('front/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('front/css/prettyPhoto.css') }}" rel="stylesheet">
<link href="{{ asset('front/css/price-range.css') }}" rel="stylesheet">
<link href="{{ asset('front/css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('front/css/main.css') }}" rel="stylesheet">
<link href="{{ asset('front/css/responsive.css') }}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="front/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="front/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="front/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="front/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="front/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="front/images/home/logo.pngg" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									VIETNAM
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">VIETNAM</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									VND
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">VND</a></li>
									<li><a href="#">DOLLAR</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
							<li><a href="{{URL::to ('/login-checkout')}}"><i class="fa fa-user"></i> Tài khoản</a></li>


							 <?php 
							 $customer_id = Session::get('customer_id');
							 $shipping_id = Session::get('shipping_id');
							 if($customer_id != NULL && $shipping_id == NULL){
							 ?>
							 <?PHP
							 }elseif($customer_id !=NULL && $shipping_id != NULL){
							 ?>
							 <li><a href="{{URL :: to('/payment')}}"><i class="fa fa-shopping-cart"></i> Phương thức thanh toán</a></li>
							 <?php
							 }else{
							 ?>
							 <li><a href="{{URL :: to('/login-checkout')}}"><i class="fa fa-shopping-cart"></i> Phương thức thanh toán</a></li>
							 <?php
							 }
							 ?>



							<?php 
								$customer_id = Session::get('customer_id');
								if ($customer_id != NULL){
								?>
								<li><a href="{{URL :: to('/checkout')}}"><i class="fa fa-shopping-cart"></i> Thanh toán</a></li>
								<?php 
								}else{
								?>
									<li><a href="{{URL :: to('/login-checkout')}}"><i class="fa fa-shopping-cart"></i> Thanh toán</a></li>
								<?php 
								}
								?>
								

								<li><a href="{{URL :: to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								


								<?php 
								$customer_id = Session::get('customer_id');
								if ($customer_id != NULL){
								?>
								<li><a href="{{url::to ('/logout-checkout')}}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
								<?php 
								}else{
								?>
									<li><a href="{{url::to ('/login-checkout')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
								<?php 
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL :: to('/trang-chu')}}" class="active">Trang chủ</a></li>
								<!-- <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Món ăn</a></li>
										<li><a href="product-details.html">Chi tiết món ăn</a></li> 
										<li><a href="checkout.html">Checkout</a></li> 
										<li><a href="cart.html">Giỏ hàng</a></li> 
										<li><a href="login.html">Đăng nhập</a></li> 
                                    </ul>
                                </li>  -->
								<!-- <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li>  -->
								<li><a href="">404</a></li>
								<li><a href="">Liên hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
						<form action="{{URL :: to('/tim-kiem')}}" method="post" >
							{{csrf_field()}}
						<div class="pull-right">
							<input type="text" name="keywords_submit" placeholder="Tìm kiếm sản phẩm"/>
							<input type="submit" class="btn btn-default btn-sm" value="Tìm kiếm">
						</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>HAVE A NICE MEAL</span></h1>
									<h2>WHERE SHOULD WE DELIVER YOUR FOOD TODAY?</h2>
									<p>Thưởng thức một bữa ăn đầy màu sắc và hương vị, với sự kết hợp tinh tế giữa các nguyên liệu tươi ngon và cách chế biến độc đáo. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="front/images/banner/banner1.jpg" class="girl img-responsive" alt="" />
								
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
								<h1><span>HAVE A NICE MEAL</span></h1>
								<h2>WHERE SHOULD WE DELIVER YOUR FOOD TODAY?</h2>
									<p>Một bữa tiệc ẩm thực đầy hấp dẫn với các món ăn được chế biến tỉ mỉ và trình bày đẹp mắt. Sự đa dạng của các nguyên liệu, từ những loại hải sản tươi sống, đến các loại thịt được tẩm ướp gia vị thơm ngon. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
								<img src="front/images/banner/banner2.png" class="girl img-responsive" alt="" />
								
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
								<h1><span>HAVE A NICE MEAL</span></h1>
								<h2>WHERE SHOULD WE DELIVER YOUR FOOD TODAY?</h2>
									<p>Những món ăn được chế biến công phu với sự kết hợp hài hòa giữa màu sắc và hương vị. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
								<img src="front/images/banner/banner3.jpg" class="girl img-responsive" alt="" />
									
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							@foreach ($category as $key => $cate )
				
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{URL::to('danh-muc-san-pham/'.$cate->cate_id)}}">{{$cate->cate_name}}</a></h4>
								</div>
							</div>
							@endforeach
							
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Cửa hàng</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									@foreach ( $brand as $key => $brand )
									
									
									<li><a href="{{URL::to('brand-san-pham/'.$brand->brand_id)}}"> <span class="pull-right"></span>{{$brand->brand_name}}</a></li>
									@endforeach
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<!-- <div class="price-range">
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div> -->
						
						<!-- <div class="shipping text-center">
							<img src="front/images/home/shipping.jpg" alt="" />
						</div> -->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					
					@yield('content')
					
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
									<img src="front/images/frame/frame1.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								
							
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="front/images/frame/frame2.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								
								
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
									<img src="front/images/frame/frame3.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								
							
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
									<img src="front/images/frame/frame4.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								
								
							</div>
						</div>
						
					</div>
					<div class="col-sm-3">
						<div class="address">
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="front/js/jquery.js"></script>
	<script src="front/js/bootstrap.min.js"></script>
	<script src="front/js/jquery.scrollUp.min.js"></script>
	<script src="front/js/price-range.js"></script>
    <script src="front/js/jquery.prettyPhoto.js"></script>
    <script src="front/js/main.js"></script>
</body>
</html>