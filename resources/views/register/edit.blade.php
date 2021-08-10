@extends('Backendtemplate')

@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
        <p>Start a beautiful journey here</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('item.index')}}"class="btn btn-outline-info"><i class="fas fa-angle-double-left fa-2x"></i></a>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h2>Item Edit Form</h2>
          <form method="post" action="{{route('item.update',$item->id)}}" enctype="multipart/form-data" class="my-3">
            @csrf
             @method('PUT')
            <div class="form-group row">
            <label for="categoryName" class="col-sm-2 col-form-label"> Name </label>
              
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="categoryName" placeholder="Enter Item Name" name="name"  value="{{$item->name}}" @error('name') is-invalid @enderror>
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
                  <img src="{{($item->photo)}}" class="img-fluid" alt="">
                  <input type="hidden" name="oldphoto" value="{{$item->photo}}">
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
                  <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-price-tab" data-toggle="tab" href="#nav-price" role="tab" aria-controls="nav-price" aria-selected="true"> Unit Price </a>
                    
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Discount </a>
                  </div>
              </nav>
              
              <div class="tab-content mt-3" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-price" role="tabpanel" aria-labelledby="nav-price-tab">
                    <input type="number" class="form-control" id="categoryName" placeholder="Enter Unit Price" name="unitprice" value="{{$item->price}}">
                  </div>
                  
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <input type="text" class="form-control" id="categoryName" placeholder="Enter Discount Price" name="discount"  value="{{$item->discount}}">
                  </div>
              </div>
              </div>
          </div>

          <div class="form-group row">
            <label for="categoryName" class="col-sm-2 col-form-label"> Description </label>
              <div class="col-sm-10">
                 <textarea class="form-control summernote" name="description" >{{$item->description}}</textarea>
              </div>
          </div>

          <div class="form-group row">
            <label for="categoryName" class="col-sm-2 col-form-label"> Brand </label>
            <div class="col-sm-10">
                 <select class="form-control select2 form-control-lg" name="brand">
                  <optgroup label="Choose Brand">
                    @foreach($brand1 as $br)
                  <option value="{{$br->id}}" 
                   @if($br->id==$item->brand_id) {{'selected'}} @endif > 
                   {{-- {{$br->id ==$item->id}} selected=""> --}}
                    {{$br->name}}
                  </option>
                </optgroup>
                    @endforeach
                </select>
                </div>
          </div>

           <div class="form-group row">
               <label for="categoryName" class="col-sm-2 col-form-label"> Category </label>
                 <div class="col-sm-10">
              <select name="category"  class="form-control select2 form-control-lg">
                <optgroup label="Choose Category">
                  @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
            </div>



            <div class="form-group row">
            <label for="categoryName" class="col-sm-2 col-form-label"> Subcategory </label>
            <div class="col-sm-10">
                  <select class="form-control select2 form-control-lg" name="subcategory">
                    <optgroup label="Choose Subcategory">
                       @foreach($sub_category as $sc)
                  <option value="{{$sc->id}}"
                     @if($sc->id==$item->subcategory_id) {{'selected'}} @endif > {{--  {{$sc->id ==$item->id}} selected="" --}}
                    {{$sc->name}}
                  </option>
                </optgroup>
                @endforeach
                  </select>
                </div>
          </div>


            <div class="form-group">
              <input type="submit" name="btnsubmit" value="Update" class="btn btn-info">
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection