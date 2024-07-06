@extends('welcome')
@section('content')




@foreach ($product_details as $key => $value)


<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to('public/front/images/uploads/product/'.$value->product_image)}}" alt="" />
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <!-- <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="{{URL::to('public/front/images/uploads/product-details/similar1.jpg')}}" alt=""></a>
                                          <a href=""><img src="{{URL::to('public/front/images/uploads/product-details/similar2.jpg')}}" alt=""></a>
                                          <a href=""><img src="{{URL::to('public/front/images/uploads/product-details/similar3.jpg')}}" alt=""></a>
										</div>
									
										
									</div> -->

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$value->product_name}}</h2>
								<p>Mã ID {{$value->product_id}}</p>
								<img src="images/product-details/rating.png" alt="" />

                                <form action="{{URL::to('/save-cart')}}" method="post">
                                    {{csrf_field()}}
								<span>
									<span>{{($value->product_price).'VND'}}</span>
									<label>Số lượng:</label>
									<input type="number" name="qty" value="1">
                                    <input name='productid_hidden' type='hidden'value="{{$value->product_id}}" />
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Thêm giỏ hàng
									</button>
								</span>
                                </form>

								<p><b>Tình trạng:</b> Còn hàng</p>
								<p><b>Điều kiện:</b> Mới</p>
                                <p><b>Danh mục:</b> {{$value->cate_name}} </p>
								<p><b>Nhà hàng:</b> {{$value->brand_name}} </p>

								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->



                    <div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
							
								<li class="active"><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
							</ul>
						</div>
						
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									
									<p>{{$value->product_desc}}</p>
									<!-- <p><b>Viết cảm nhận của bạn</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form> -->
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->

@endforeach    
@endsection
					