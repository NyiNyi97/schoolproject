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
          <h2>Course Edit Form</h2>
          <form method="post" action="{{route('course.update', $course->id)}}" enctype="multipart/form-data" class="my-3">
            @csrf
             @method('PUT')
            <div class="form-group row">
            <label for="categoryName" class="col-sm-2 col-form-label"> Name </label>
              
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="categoryName" placeholder="Enter Course Name" name="name" value="{{$course->name}}" @error('name') is-invalid @enderror>
                   @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
          </div>
            <div class="form-group row">
              <label for="categoryName" class="col-sm-2 col-form-label">Photo: (<small class="text-danger">* jpeg|jpg|png</small>)</label>

              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Old</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">New</a>
                </li>
              </ul>
              <div class="tab-content mt-3" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <img src="{{($course->photo)}}" class="img-fluid" alt="">
                  <input type="hidden" name="oldphoto" value="{{$course->photo}}">
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"> 
                  <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror">
                  @error('photo')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
            </div>


            <div class="form-group row">
            <label for="categoryName" class="col-sm-2 col-form-label"> Price </label>
              
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="categoryName" placeholder="Enter Course price" name="price"  value="{{$course->price}}" @error('price') is-invalid @enderror>
                   @error('price')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
          </div>

          <div class="form-group row">
            <label for="categoryName" class="col-sm-2 col-form-label"> Description </label>
              
              <div class="col-sm-10">
                  <textarea  class="form-control summernote @error('description') is-invalid @enderror" name="description" placeholder="Enter Course description"> {{$course->description}}</textarea>
                   @error('description')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
          </div>

           <div class="form-group row">
            <label for="categoryName" class="col-sm-2 col-form-label"> Startdate </label>
              
              <div class="col-sm-10">
                  <input type="date" class="form-control" id="categoryName" placeholder="Enter Course price" name="startdate" value="{{$course->startdate}}" @error('Startdate') is-invalid @enderror>
                   @error('Startdate')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
          </div>

           <div class="form-group row">
            <label for="categoryName" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-10">
                  <select class="form-control select2 form-control-lg" name="status">    
                  <option value='0' >0</option>
                  <option value='1'>1</option>             
                  </select>
                </div>
          </div>

          <div class="form-group row">
            <label for="categoryName" class="col-sm-2 col-form-label"> Category </label>
            <div class="col-sm-10">
                  <select class="form-control select2 form-control-lg" name="category">
                    <optgroup label="Choose Category">
                   @foreach($category  as $ca)
                  <option value="{{$ca->id}}"
                      @if($ca->id==$course->category_id) {{'selected'}} @endif > 
                    {{$ca->name}} 
                  </option>
                </optgroup>
                @endforeach
                  </select>
                </div>
          </div>



            <div class="form-group">
              <input type="submit" name="btnsubmit" value="Save" class="btn btn-info">
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection

@section('script')
{{--   <script type="text/javascript">
    $(document).ready(function(){
         $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('.category').change(function() {
        let categoryid = $(this).val();
        // alert(categoryid);
        $.post("{{route('filterCategory')}}",{cid:categoryid}, function(response){
          // console.log(response);
          var html= "";
          for(let row of response){
            html+=`<option value="${row.id}">${row.name}</option>
           `
          }
          $('.subcategory').prop('disabled', false);
          $('.subcategory_option').html(html);
        });
      });
    });
  </script> --}}
@endsection