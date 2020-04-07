@extends('master')

@section('title')
<title>Đặt hàng</title>
@endsection

@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trang-chu')}}" style="color: blue">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	@if(Session('thongbao'))
	<div class="alert alert-success" style="text-align: center;">
		<p>{{Session('thongbao')}}</p>
	</div>
	@endif
	<div class="container">
		<div id="content">
			
			<form action="{{route('dathang2')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-6">
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Họ tên*</label>
							<input type="text" id="name" name="name" placeholder="Họ tên" required>
						</div>
						<div class="form-block">
							<span>Giới tính </span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><label for="gender" style="margin-right: 10%">Nam</label>
							<input id="genderr" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><label for="genderr">Nữ</label>
										
						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email" name="email" required placeholder="example@gmail.com">
						</div>

						<div class="form-block">
							<label for="address">Địa chỉ*</label>
							<input type="text" id="address" name="address" placeholder="Street Address" required>
						</div>
						

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" id="phone" name="phone" required>
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea id="notes" name="notes"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							
							<div>
							@if(Session('cart'))								
								@foreach($product_cart as $product)<!-- $product tương đương $giohang trong Cart -->
								<div class="cart-item">
									<div class="media">
										<a class="pull-left" href="#"><img src="source/image/product/{{$product['item']['image']}}" height="50px" alt=""></a>

										<div class="media-body">
											<span class="cart-item-title">{{$product['item']['name']}}</span>
											<div>               											<span class="cart-item-price"> Đơn giá: @if($product['item']['promotion_price']==0){{$product['item']['unit_price']}}@else {{$product['item']['promotion_price']}}@endif đồng</span><br>
											<span>Số lượng: {{$product['qty']}}</span>
											</div>
										</div>
									</div>
								</div>
								@endforeach
							@endif
								
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">@if(Session('cart')){{number_format(Session('cart')->totalPrice)}} @endif đồng</span></div>
									<div class="clearfix"></div>
								</div>
							</div>
							
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" value="COD" checked="checked" data-order_button_text="" name="payment">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio"  value="ATM" data-order_button_text="" name="payment">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Nguyễn A
											<br>- Ngân hàng ACB, Chi nhánh TPHCM
										</div>						
									</li>
									
								</ul>
							</div>

							<div class="text-center"><button type="submit" class="beta-btn primary">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection