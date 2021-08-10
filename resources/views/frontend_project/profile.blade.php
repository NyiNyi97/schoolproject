@extends('Learningschool')
@section('content')
    

    <div class="jumbotron text-center" style=" background-image:url('asset/image/s14.jpg');
        background-size: cover;
        height:400px;
        background-position: center;">
        <h1 class="display-4 text-light H1">My Profile</h1>
    </div>


    <div class="container mt-5">
		<!-- Profile -->
		<form action="{{route('user.update', $user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 order-1 align-items-center justify-content-between">
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="newphoto" disabled="" data-user_id = "" value="{{$user->photo}}" />
                           <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview" style="background-image: url('{{$user->photo}}');">
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-3 order-sm-3 order-3">
                       {{--   @foreach($user as $u) --}}
                        <fieldset disabled>
                            {{-- <?php if(isset($_SESSION['profile_msg'])) { ?>
                                <h6 class="text-success"> <?= $_SESSION['profile_msg'] ?> </h6>
                            <?php } ?> --}}
                            
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputName">Name</label>
                                        <input class="form-control py-4" id="inputName" type="text" placeholder="Enter Name" name="name" value="{{$user->name}}" > 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="phone">Phone Number</label>
                                        <input class="form-control py-4" id="phone" type="text" placeholder="Enter Phone Number" name="phone" value="{{$user->phone}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                                        <input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" name="email" value="{{$user->email}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group hideForm d-flex align-items-center justify-content-between my-5 mb-0">
                                <button type="submit" class="btn btn-outline-primary bTn BTn"> Save </button>
                            </div>
                        </fieldset>
                      {{--   @endforeach --}}
                </div>
                
                <div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 col-12 order-xl-3 order-lg-3 order-md-2 order-sm-2 order-2">
                    <button class="btn btn-warning float-right profile_editBtn" type="button"> 
                     <i class="fas fa-cog"></i>
                    </button>
                    <button class="btn btn-danger float-right profile_cancelBtn" type="button"> 
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </form>
		
	</div>

@endsection
@section('script')
<script type="text/javascript">
            $(document).ready(function() {
                        
            $('.profile_editBtn').show();
            $('.profile_cancelBtn').hide();

            $('.profile_editBtn').on('click', function(){
                $("fieldset").removeAttr("disabled");
                $("#imageUpload").removeAttr("disabled");

                $('.profile_editBtn').hide();
                $('.profile_cancelBtn').show();

            });

            $('.profile_cancelBtn').on('click', function(){
                $('#imageUpload').prop('disabled', true);
                $('fieldset').prop('disabled', true);


        $('.profile_editBtn').show();
        $('.profile_cancelBtn').hide();

    });
                function readURL(input){
                    if (input.files[0]){
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                            $('#imagePreview').hide();
                            $('#imagePreview').fadeIn(650);
                        }
                        reader.readAsDataURL(input.files[0]);
                        console.log('preivew');
                    }
                    // console.log(input.files);
                }
                $("#imageUpload").change(function() {
                    readURL(this);
                });
            });
</script>
@endsection