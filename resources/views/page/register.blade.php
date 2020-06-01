
@extends('master')
@section('content')
<div class="container">
		<div id="content">
			
			<form action="{{ route('dangki')}}"" method="post" class="beta-form-checkout">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row">
                    <div class="col-sm-3"></div>
                    @if(count($errors) > 0) 
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}
                            @endforeach
                        </div>
                    @endif
                    @if(Session::has('register-success'))
                        <div class="alert alert-success">
                            {{Session::get('register-success')}}
                        </div>
                    @endif
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" name="email" required>
						</div>

						<div class="form-block">
							<label for="fullname">Fullname*</label>
							<input type="text" name="fullname" required>
						</div>

						<div class="form-block">
							<label for="address">Address*</label>
							<input type="text" name="address" value="Street Address" required>
						</div>


						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" name="phone" required>
						</div>
						<div class="form-block">
							<label for="password">Password*</label>
							<input type="password" name="password" required>
						</div>
						<div class="form-block">
							<label for="re_password">Re password*</label>
							<input type="password" name="re_password" required>
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
@endsection('content');