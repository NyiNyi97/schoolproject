@extends('Learningschool')
@section('content')
	
	 <div class="jumbotron text-center" style=" background-image:url('asset/image/Contact Us.jpg');
        background-size: cover;
        background-position: center;
		background-repeat: no-repeat;
        height:400px;
       ">
        <h1 class="display-4 text-dark H1">Contact Us</h1>
  </div>

  	<h2 class="text-center my-4 TExt">Learning School</h2>
  	<div class="container">
  		<p class="Text">Hi! Welcome... If you are interest about our courses from our website for your children, you can make a call to our school and feel free to ask whatever you want to know. We also teach our children patiently and put some activites in our class not to get bored for the childen. If you want to see your children successful in the future, come join with us. Here below are the things that can contact us:</p>
  	</div>
	

	{{-- Contact --}}
	<div class="container my-5">
		<div class="row justify-content-between">
			<div class="col-lg-6 col-md-6 col-sm-6 my-5">
				<form action="{{route('contact.Submit')}}" method="POST">
		      		@csrf
                    <div class="form-group">
                      	<label class="small mb-1" for="name">Name</label>
                      	<input class="form-control py-4" id="name" type="text" aria-describedby="emailHelp" placeholder="Enter name" name="name" >
                    </div>
                  

                    <div class="form-group">
                      	<label class="small mb-1" for="inputEmailAddress">Email</label>
                      	<input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" name="email">
                    </div>
                  

                    <div class="form-group">
                      	<label class="small mb-1" for="address"> Message </label>
                      	<textarea class="form-control" name="address"></textarea>
                    </div>
		      		
		      		<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
		        		
		        		<button type="submit" class="btn btn-outline-primary bTn btn-block"> Submit <i class="far fa-paper-plane"></i></button>
		      		</div>
		  		</form>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 my-5">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d954.6256129680348!2d96.12905355922334!3d16.851021537063502!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c194ec9092403f%3A0xf07797a3526b1ed8!2sBuilding%2011%2C%20MICT%20Park!5e0!3m2!1sen!2smm!4v1605417340746!5m2!1sen!2smm" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
		</div>
	</div>
	{{-- Contact end--}}

	{{-- Icon --}}
	<div class="container my-5">
		<div class="contact-info my-5">
			<div class="Card">
		 	<i class="far fa-envelope card_icon"></i>
		 	<p>learningschool61@gmail.com</p>
		 </div> 

		 <div class="Card">
		 	<i class="fas fa-phone card_icon"></i>
		 	<p>095051302 <br>
		 	09455205805</p>
		 </div> 
		
		<div class="Card">
		 <i class="fas fa-map-marker-alt card_icon"></i>
		 	<p class="text-center">Block-11, MICT Park, Insein Road, Hlaing Townshop, Yangon.</p>
		 </div> 
		
		</div>
	</div>
	{{-- Icon end --}}
@endsection


@section('script')
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function($) {
			$('.bTn').click(function() {
				swal({
					  title: "You are Successfully!",
					  icon: "success",
					  button: "OK",
					});
			});
		});	
	</script>
@endsection