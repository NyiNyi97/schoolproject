@extends('Learningschool')
@section('content')

	
	<div class="jumbotron text-center" style=" background-image:url('asset/image/sign in1.jpg');
        background-size: cover;
        height:400px;
        background-position: center;">
        <h1 class="display-4 text-light H1">Sign up </h1>
  	</div>

  	<div class="container my-5">
		  <div class="row justify-content-center">
			<div class="col-5">
				<form action="{{route('user.store')}}" method="POST">
          @csrf
                        <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">{{ __('Name') }}</label>
                         <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('email') }}" required autocomplete="name" placeholder="Enter name">

                         @error('name')
                             <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                    </div>
                        
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
                        <label class="small mb-1" for="inputEmailAddress">{{ __('Phone number') }}</label>
                         <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Enter phone number">

                         @error('phone')
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
                        <label   for="password-confirm" class="small mb-1">{{ __('Confirm Password') }}</label>

                         <input id="password-confirm" type="password" class="form-control @error('confirm_password') is-invalid @enderror"  name="password_confirmation" required autocomplete="new-password" placeholder="Enter confirm password">

                                @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                   
                       <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                        
                        <button type="submit" class="btn btn-outline-primary bTn btn-block">   {{ __('Register') }}</button>
                    </div>
		  		</form>

		  		{{-- <div class="col-12 mt-3 text-center ">
		  			<a href="{{route('signinpage')}}" class=" text-decoration-none">Have an account? Go to login</a>
		  		</div> --}}
			 </div>
		  </div>
  </div>



@endsection