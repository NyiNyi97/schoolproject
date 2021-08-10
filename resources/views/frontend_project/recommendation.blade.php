@extends('Learningschool')
@section('content')

  <div class="jumbotron text-center" style=" background-image:url('asset/image/re.jpg');
        background-size: cover;
        height:400px;
        background-position: center;">
        <h1 class="display-4 text-light H1">Recommend</h1>
    </div>
         <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="{{route('recommendation.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">{{ __('Name') }}</label>
                         <input id="email" type="text" class="form-control" required autocomplete="name" placeholder="Enter Name" name="name">

                    </div>

                         <div class="form-group row">
                            <label for="categoryName" class="col-sm-2 col-form-label my-4"> Photo:
                              <div class="col-sm-10 mt-3">
                              <input type="file" name="photo" class="form-control-file">
                              </div>
                          </div>

    
                             <div class="form-group row ">
                                 <label for="categoryName" class="col-sm-2 col-form-label my-4"> Rating :
                                <div class="center">
                                    <div class="rating"> 
                                        <input type="radio" id="star5" name="rating" value="5"><label for="star5" class="full"></label>
                                        <input type="radio" id="star4.5" name="rating" value="4.5"><label for="star4.5" class="half"></label>
                                        <input type="radio" id="star4" name="rating" value="4"><label for="star4" class="full"></label>
                                        <input type="radio" id="star3.5" name="rating" value="3.5"><label for="star3.5" class="half"></label>
                                        <input type="radio" id="star3" name="rating" value="3"><label for="star3" class="full"></label>
                                        <input type="radio" id="star2.5" name="rating" value="2.5"><label for="star2.5" class="half"></label>
                                        <input type="radio" id="star2" name="rating" value="2"><label for="star2" class="full"></label>
                                        <input type="radio" id="star1.5" name="rating" value="1.5"><label for="star1.5" class="half"></label>
                                        <input type="radio" id="star1" name="rating" value="1"><label for="star1" class="full"></label>
                                        <input type="radio" id="star0.5" name="rating" value="0.5"><label for="star0.5" class="half"></label>
                                    </div>
                                </div>
                <!-- <h4 id="rating-value"></h4> -->
                             </div>

                         <label class="small mt-4">{{ __('Description') }}</label>
                         <textarea  class="form-control" name="description" placeholder="Enter Description"></textarea>

                     
                   
                       <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                        
                        <button type="submit" class="btn btn-outline-primary bTn btn-block">   {{ __('Submit') }}</button>
                    </div>
                </form>
             </div>
             </div>
          </div>
  </div> 
@endsection

@section('script')
     <script src="{{ asset('asset/bootstrap/js/rating.js')}}"></script>
@endsection