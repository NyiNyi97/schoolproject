@extends('Backendtemplate')

@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
        <p>Start a beautiful journey here</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
       <a href="{{route('course.index')}}"class="btn btn-outline-info"><i class="fas fa-angle-double-left fa-2x"></i></a>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h2>Item Detail</h2>
            <div class="card my-3">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="{{($course->photo)}}" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h3 class="card-title">{{$course->name}}</h3>
                  <p class="card-text">{{number_format($course->price)}} MMK</p>
                  <p class="card-text">{{$course->description}}</p>
                   <p class="card-text">{{$course->startdate}}</p>
                   <p class="card-text">{{$course->status}}</p>
                 
                  <p class="card-text">{{$course->category->name}}</p>

                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection