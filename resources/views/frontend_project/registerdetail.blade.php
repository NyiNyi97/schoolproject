@extends('Learningschool')
@section('content')
	
 <div class="jumbotron text-center" style=" background-image:url('asset/image/s11.jpg');
        background-size: cover;
        height:400px;
        background-position: center;">
        <h1 class="display-4 text-dark H1">About Us</h1>
 
  </div>
  
 {{--  <div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-4 col-lg-4 offset-md-4 offset-lg-4">
					
				<form class="register_detail p-4 shadow rounded mt-5 bg-warning">
				
					<div class="form-group">
						<label> Name : -----</label>
					</div>
					<div class="form-group">
						<label> Course : -----</label>
					</div>
					<div class="form-group">
						<label> Register Date : -----</label>
					</div>
					<div class="form-group">
						<label> Phone Number : -----</label>
					</div>
					<button type="submit" class="btn btn-outline-dark btn-block"> Return to Home Page </button>
				</form>
			</div>
		</div>
	</div> --}}

	<div class="container mt-5">
		<h1 class="text-center"> Register Detail </h1><br>
		<!-- Shopping Cart Div -->
		<div class="row mt-5 ">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th> Customer Name</th>
							<th > Registerdate </th>
							<th> Price </th>
							<th> Total </th>
						</tr>
					</thead>
					<tbody >
						<td>1</td>	
						<td>2</td>
					</tbody>

				</table>
			</div>
		</div>

		<!-- No Shopping Cart Div -->
		{{-- <div class="row my-5 noneshoppingcart_div text-center">
			<div class="col-12">
				<h5 class="text-center"> There are no items in this cart </h5>
			</div>
		</div> --}}
	</div>

@endsection