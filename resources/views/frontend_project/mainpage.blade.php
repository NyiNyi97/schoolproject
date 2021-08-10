@extends('Learningschool')
@section('content')
	
	 {{-- Slider  --}}
  <div class="jumbotron text-center" style=" background-image:url('asset/image/s9.jpg');
        background-size: cover;
        height:400px;
        background-position: center;">
        <h1 class="display-4 text-dark H1">Welcome Our Learning School</h1>
        <a class="btn btn-primary btn-lg my-4 BTN" href="{{route('recommend')}}" role="button">Recommendation <i class="fas fa-angle-right"></i><i class="fas fa-angle-right"></i></a>
  </div>
  {{-- Slider end --}}
		<div class="container my-5">
		<div class="row">
			<div class="col-md-4">
				<div>
					<div class="card-body text-center">	
						<a href="{{route('aboutuspage')}}" class="text-decoration-none text-dark">
						<div class="inner1">							
							<h2 class="card-text TExt"> About </h2>
							<p class="card-text Ptag"> Step foot inside our lively classroom from the comfort of your home. We will give you the brightest future. </p>
						</div>	
					</div>
					</a>
				</div>
			</div>
			<div class="col-md-4">
				<div>
					<div class="card-body text-center">
						<div class="inner1">
							<h2 class="card-text TExt"> Achievements </h2>
							<p class="card-text Ptag"> Started in 2012 and got different prizes every years. In 2019, 20 of our students got the prizes at English essay. </p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div>
					<div class="card-body text-center">
						<div class="inner1">
						<h2 class="card-text TExt"> Programs </h2>
						<p class="card-text Ptag"> As the seasons change, keep an eye on what's head at My Learning School. Come and join with us! </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><br><br><br>

	



	<div class="container">
		<h2 class="text-center font-weight-bold">Excellence Students</h2>
		<div class="row my-5">
		@foreach($photo as $p)
		 <div class="col-lg-4 col-md-6 "data-aos="fade-down">
		 	<div class="card shadow text-justify mt-4" {{-- style="width: 22rem;" --}}>
		  <img src="{{$p->photo}}" class="img-fluid" alt="...">
		  <div class="card-body">
		    <h5 class="card-title text-center font-italic font-weight-bold">{{$p->name}}</h5>
		    <p class="card-text">{{$p->description}}</p>
		  </div>
		</div>
		 </div>
		  @endforeach
		</div>
	</div>

	<h2 class="text-center TExt">Course</h2>
	<div class="container my-2">
		<div class="row">
			 @foreach($Courses as $course)
			<div class="col-md-4 mt-5">
				<div class="card shadow box my-4">
				<a href="{{route('coursedetail',$course->id)}}">	
					<img src="{{$course->photo}}" class="img-fluid w-75"></a>
						<div class=" text-center box-content">	
							<p class="card-text"> {{$course->name}} </p>
						</div>
						
				</div>
				<a href="{{route('coursedetail',$course->id)}}"><button class="btn btn-outline-primary bTn container-fluid" > Details </button></a>
			</div>
			@endforeach
		</div>
		</div>
	</div>

	<div class="my-5">
		{{-- <div class="parallax" data-parallax="scroll" data-z-index="1" 
		data-image-src="{{asset('asset/image/p5.jpg')}}"></div> --}}
		<div style="background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('asset/image/p5.jpg');
		    background-size: cover;
		    color: #fff;
		    text-align: center;
		    background-attachment: fixed;
		    padding: 35px;
		    height: 250px;">
			
		</div>
	</div>
	


	 <h2 class="text-center TExt">Recommendation</h2> 
	<div class="testimonials">
		<div class="inner">
			<div class="row1">
				@foreach($recommend as $re)
				<div class="col">
					<div class="testimonial">
						<img src="{{$re->photo}}">
						<div class="name"> {{$re->name}} </div>
						<div class="stars">
						@if($re->rating==1)
						<i class="fa fa-star"></i>
						@elseif($re->rating==2)
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						@elseif($re->rating==3)
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						@elseif($re->rating==4)
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						@else
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						@endif
						</div>
						
						<p>" {{$re->description}} "</p>
					</div>
				</div>
				@endforeach

			</div>
		</div>
	</div>

@endsection

@section('script')
 
@endsection