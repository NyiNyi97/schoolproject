@extends('Backendtemplate')

@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
        <p>Start a beautiful journey here</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
       <a href="{{route('photo.index')}}"class="btn btn-outline-info"><i class="fas fa-angle-double-left fa-2x"></i></a>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h2>Photo Create Form</h2>
          <form method="post" action="{{route('photo.store')}}" enctype="multipart/form-data" class="my-3">
            @csrf
            <div class="form-group row">
            <label for="categoryName" class="col-sm-2 col-form-label"> Name </label>
              
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="categoryName" placeholder="Enter Course Name" name="name" value="{{old('name')}}" @error('name') is-invalid @enderror>
                   @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
          </div>

          <div class="form-group row">
            <label for="categoryName" class="col-sm-2 col-form-label"> Photo: <small class="text-danger">* jpeg|jpg|png</small>  </label>
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
            <label for="categoryName" class="col-sm-2 col-form-label"> Description </label>
              
              <div class="col-sm-10">
                  <textarea  class="form-control summernote @error('description') is-invalid @enderror" name="description" placeholder="Enter Course description">{{old('description')}}</textarea>
                   @error('description')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
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