@extends('Learningschool')
@section('content')
	

	<div class="jumbotron text-center" style=" background-color:#DCE0E2; 
        background-size: cover;
        height:450px;
        background-position:center;">
        <h1 class="display-4 text-dark H3">Online Course </h1>
  	</div>


	<div class="container">
    <div class="row">
 
    <div class="col-lg-3 my-4">
		<div class="accordion mt-4 active">
		@foreach($categories as $Ca)
          <div class="card Effect mt-2">
            <div class="card-header" id="headingOne">
		      <h2 class="mb-0">
					       <a href="{{route('coursebycategory', $Ca->id)}}" class="btn btns text-left text-decoration-none text-left" type="button">
					         {{ $Ca->name}}
		       			   </a>
		     	</h2>
		   	 </div> 
			</div>
			 @endforeach
		 </div>
		
		</div>
		


		<div class="col-lg-9">
        <div class="row my-5">
         @foreach($category as $cou)          
            <div class="col-md-4 col-sm-6 mb-5">
            	<a href="{{route('coursedetail',$cou->id)}}">
            	<div class="single_content card-body border shadow" >
					 <img src="{{$cou->photo}}" class="img-fluid w-75">
					<div class="text_content">
						<h4>{{$cou->name}}</h4>
						{{-- <h4>{{$cou->id}}</h4> --}}
						
						{{-- <p> English </p> --}}
					</div><br><br>
					</a>
					<div class="">
	              <!-- Button trigger modal -->

	                @role('customer')
						<button type="button" class="btn btn-outline-primary bTn container-fluid BUtton" data-toggle="modal" data-target="#exampleModal"  data-id="{{$cou->id}}">
						  Register 
						</button>
					@else
					<a href="{{route('signinpage')}}" class="btn btn-outline-primary bTn container-fluid"> Register </a>
				  @endrole
						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Register Form</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						<form action="{{route('register.store')}}" method="POST" enctype="multipart/form-data">
          					@csrf
          					<input type="hidden" name="course" value="" class="Course1">
                        <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">{{ __('Student name') }}</label>
                         <input id="name" type="text" class="form-control" {{-- @error('name') is-invalid @enderror --}} name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Enter Student name">
{{-- 
                         @error('name')
                             <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                         @enderror --}}
                    </div>
                        
                       <div class="form-group">
                        <label class=" mb-1" for="photo">{{ __('Photo') }}</label>
                         <input id="photo" type="file" class="form-control-file{{--  @error('photo') is-invalid @enderror --}}" name="photo" value="{{ old('photo') }}" required >
{{-- 
                         @error('email')
                             <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                         @enderror --}}
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="register">{{ __('Register date') }}</label>
                         <input id="register" type="date" class="form-control" {{-- @error('register') is-invalid @enderror --}} name="registerdate" required  placeholder="Enter Register">

                               {{--  @error('register')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                    </div>

                    <div class="form-group">
                        <label   for="phone_number" class="small mb-1">{{ __('Phone number') }}</label>

                         <input id="phone_number" type="number" class="form-control"{{--  @error('phone_number') is-invalid @enderror --}}  name="phone" required placeholder="Enter phone number">
{{-- 
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                    </div>

                     <div class="form-group">
                        <label class="small mb-1" for="birthday">{{ __('Birthday') }}</label>
                         <input id="birthday" type="date" class="form-control"{{--  @error('birthday') is-invalid @enderror --}} name="birthday" required  placeholder="Enter birthday">
{{-- 
                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                    </div>

                        
                    <div class="form-group">
                        <label  for="address" class="small mb-1">{{ __('Address') }}</label>

                         <textarea id="address" type="text" class="form-control"{{--  @error('address') is-invalid @enderror --}}  name="address" required placeholder="Enter address"></textarea>

                                {{-- @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                    </div>
                     <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                        
                        <button type="submit" class="btn btn-outline-primary bTn reg btn-block" value="save" >   {{ __('Register') }}</button>

                    </div>
                    
		  		</form>
						   </div>
						    </div>
						  </div>
						</div>
	            </div>
				</div>
				</div>
				@endforeach
        {{-- @foreach($mysubcategory->items as $item) --}}
           {{--  <x-item-component :item='$item'></x-item-component> --}}
        {{--   @endforeach --}}
        </div>
      </div>
		</div>
		
		
	</div>
	</div>

	{{-- <div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="single-content">
					<a href="about.html"><img src="image/G1_English.png"></a>
					<div class="text-content">
						<h4> Grade 1 </h4>
						<p> English </p>
					</div><br><br>
					<button class="btn btn-outline-primary container-fluid"> Register </button>
				</div>
			</div>
		</div>
	</div> --}}
    
@endsection

@section('script')
	
	<script type="text/javascript">
		$(document).on('click', 'div', function(){
			$(this).addClass('active').siblings().removeClass('active')
		})
	</script>

	<script type="text/javascript">
		// * $.ajaxSetup({
  //    		headers: {
  //       		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //    				}
		// 		});
		$(document).ready(function() {
			$('.BUtton').click(function(){
				var Cid=$(this).data('id');
				 var cid=$('.Course1').val(Cid);
				// console.log(cid);
				// alert(Cid);
			// $.post(""), {id:cid}, function (response) {
			// 		console.log(response);

			// })
				})

			})

	</script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">
		// $.ajaxSetup({
  //   		headers: {
  //       		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //   				}
		// 		});
		$(document).ready(function() {
			
			$('.reg').click(function(){
				swal({
					  title: "Register Successfully!",
					  icon: "success",
					  button: "OK",
					});
			})
		});
	</script>
@endsection