@extends('welcome')
@section('content')

<section id="cart_items">
		<div class="container">
		<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div>

			
			

			<div class="register-req">
				<p>Hãy đăng kí hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử giao dịch</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Điền thông tin</p>
							<div class="form-one">
							<form action="{{ URL::to('/save-checkout-customer') }}" method="post">
    {{ csrf_field() }}
    <input type="text" name="shipping_email" placeholder="Email">
    <input type="text" name="shipping_name" placeholder="Họ và tên">
    <input type="text" name="shipping_address" placeholder="Địa chỉ">
    <input type="text" name="shipping_phone" placeholder="Số điện thoại">
    <textarea name="shipping_note" placeholder="Ghi chú đơn hàng của bạn" rows="16"></textarea>

    <input type="submit" value="Thanh toán" name="send_order" class="btn btn-primary btn-sm">
</form>

							</div>
							
						</div>
					</div>
									
				</div>
			</div>
			<div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
			</div>
			<div class="table-responsive cart_info">
			<?php
                $content = Cart::content();
                echo '<pre>';
                print_r($content);
                echo '</pre>';
                ?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Mô tả</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach ($content as $v_content )
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('public/front/images/uploads/product/'.$v_content->options->image)}}" width=' 50' alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_content->name}}</a></h4>
								<p> </p>
							</td>
							
							<td class="cart_price">
								<p>{{number_format($v_content->price) .' '.'VND'}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{URL ::to ('/update-cart-qty')}}" method="post">
										{{csrf_field()}}
									<!-- <a class="cart_quantity_down" href=""> - </a> -->
									<input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}" autocomplete="off" size="2">
									<!-- <a class="cart_quantity_up" href=""> + </a> -->
									<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
									 <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
									 </form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									<?php
									$subtotal = $v_content->price * $v_content->qty;
									echo number_format($subtotal). ' '. 'VND';
									?>
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL :: to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
						
					</tbody>
				</table>
			</div>

				
			<!-- <div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div> -->
		</div>
	</section> <!--/#cart_items-->
	
	
	

@endsection
