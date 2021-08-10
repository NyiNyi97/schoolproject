@extends('backend')

@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
        <p>Start a beautiful journey here</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
       <a href="{{route('item.index')}}"class="btn btn-outline-info"><i class="fas fa-angle-double-left fa-2x"></i></a>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h2>Item Create Form</h2>
          <form method="post" action="{{route('item.store')}}" enctype="multipart/form-data" class="my-3">
            @csrf
            <div class="form-group row">
            <label for="categoryName" class="col-sm-2 col-form-label"> Name </label>
              
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="categoryName" placeholder="Enter Item Name" name="name" value="{{old('name')}}" @error('name') is-invalid @enderror>
                   @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
          </div>

          <div class="form-group row">
            <label for="categoryName" class="col-sm-2 col-form-label"> Photo: (<small class="text-danger">* jpeg|jpg|png</small>)  </label>
              <div class="col-sm-10">
              <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror">
              @error('photo')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
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
                    <input type="number" class="form-control" id="categoryName" placeholder="Enter Unit Price" name="unitprice"  value="0">
                  </div>
                  
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <input type="text" class="form-control" id="categoryName" placeholder="Enter Discount Price" name="discount" value="0">
                  </div>
              </div>
              </div>
          </div>
          <div class="form-group row">
            <label for="categoryName" class="col-sm-2 col-form-label"> Description </label>
              
              <div class="col-sm-10">
                  <textarea  class="form-control summernote @error('description') is-invalid @enderror" name="description">{{old('description')}}</textarea>
                   @error('description')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
          </div>

          <div class="form-group row">
            <label for="categoryName" class="col-sm-2 col-form-label"> Brand </label>
            <div class="col-sm-10">
                  <select class="form-control select2 form-control-lg" name="brand">
                     <optgroup label="Choose Brand">
                       @foreach($brands  as $br)
                  <option value="{{$br->id}}">
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
              <select name="category"  class="form-control select2 form-control-lg category">
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
                  <select class="form-control select2 form-control-lg subcategory" name="subcategory" disabled="true">
                      <optgroup label="Choose Subcategory" class="subcategory_option">
                       @foreach($subcategory as $sc)
                  <option value="{{$sc->id}}">
                    {{$sc->name}}
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
  <script type="text/javascript">
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
  </script>
@endsection