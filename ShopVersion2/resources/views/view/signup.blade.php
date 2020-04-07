@extends('index')

@section('content')
    <div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng ký</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('index')}}">Home</a> / <span>Đăng ký</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('pdangky')}}" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng ký</h4>
						<div class="space20">&nbsp;</div>

						@if(session('success'))
						<p>{{session('success')}}</p>
						@endif

						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email"  name="email">
							
						</div>
						{{$errors->first('email')}}

						<div class="form-block">
							<label for="your_last_name">Fullname*</label>
							<input type="text" id="your_last_name"  name="ten">
							
						</div>
						{{$errors->first('ten')}}

						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text" id="adress"  name="diachi">
							
						</div>
						{{$errors->first('diachi')}}

						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" id="phone"  name="phone">
							
						</div>
						{{$errors->first('phone')}}

						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" id="phone"  name="password">
							
						</div>
						{{$errors->first('password')}}

						<div class="form-block">
							<label for="phone">Re password*</label>
							<input type="password" id="phone"  name="repassword">
							
						</div>
						{{$errors->first('repassword')}}

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