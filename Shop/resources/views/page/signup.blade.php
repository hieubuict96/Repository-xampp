@extends('master')

@section('title')
<title>Đăng ký</title>
@endsection
	
	@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng ký</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Đăng ký</span>
				</div>
			</div>
			<div class="clearfix"></div>
			
			@if(Session('thongbao'))
						<p>{{Session('thongbao')}}</p>
						@endif

		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('dangky1')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng ký</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email" required name="email">
						</div>

						<div class="form-block">
							<label for="your_last_name">Fullname*</label>
							<input type="text" id="your_last_name" required name="name">
						</div>
							
							@foreach($errors->all() as $error)
							<div>
							{{$error}}
							</div>
							@endforeach

						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text" id="adress" placeholder="Street Address" required name="address">
						</div>

						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" id="phone" required name="phone">
						</div>

						<div class="form-block">
							<label for="password">Password*</label>
							<input type="password" id="password" required name="password">
						</div>

						<div class="form-block">
							<label for="repassword">Re password*</label>
							<input type="password" id="repassword" required name="repassword">
						</div>

						<div class="form-block">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection