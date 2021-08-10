@extends('Learningschool')
@section('content')

	
	<div class="jumbotron text-center" style=" background-image:url('asset/image/sign in1.jpg');
        background-size: cover;
        height:400px;
        background-position: center;">
        <h1 class="display-4 text-light H1">Sign in </h1>
  	</div>
	<div class="container my-5">

		<div class="row justify-content-center">
			<div class="col-5">
					 <form method="POST" action="{{ route('login') }}">
					@csrf
		      		<div class="form-group">
		      			<label class="small mb-1" for="inputEmailAddress">{{ __('E-Mail Address') }}</label>
		      			 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter email">

                         @error('email')
                             <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                         @enderror
		      		</div>
		      		
		      		<div class="form-group">
		      			<label class="small mb-1" for="inputPassword">{{ __('Password') }}</label>
		      			 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
		      		</div>
		      
		      		<div class="form-group">
		          		<div class="custom-control custom-checkbox">
		          			<input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
		          			<label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
		          		</div>

		          	<a class="small" href="#">Forgot Password?</a>

		      		</div>
		      		
		      		<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
		        		
		        		<button type="submit" class="btn btn-outline-primary bTn btn-block">Login</button>
		      		</div>


		  		</form>

		  		<div class=" mt-3 text-center ">
		  			<a href="{{route('signuppage')}}" class=" text-decoration-none">Need an account? Sign Up!</a>
		  		</div>
			</div>
		</div>
		
		
		

	</div

@endsection