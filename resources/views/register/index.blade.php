@extends('Backendtemplate')

@section('content')
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
        <p>Start a beautiful journey here</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h2 class="d-inline-block">Register List</h2>

    
             <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pending</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Confirm</a>
            </li>
          </ul>
          <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <table class="table mt-3 table-bordered dataTable">
                      <thead>
                        <tr>
                              <th> No </th>
                              <th>Registerdate</th>
                              <th>Customer Name</th>
                              <th>Phone</th>
                           {{--    <th>Course name</th> --}}
                              <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        @php 
                        $i=1;
                        @endphp
                          @foreach($pending_register as $row)
                          <tr>
                          <td>{{$i++}}</td>
                          <td>{{$row->registerdate}}</td>
                          <td>{{$row->user->name}}</td>
                         {{--  <td></td> --}}
                           <td>{{$row->phone}}</td>
                           
                          <td>
                        <a href="{{route('register.show', $row->id )}}" class="btn btn-primary">Detail</a>
                       <form action="{{route('register.destroy', $row->id)}}" method="post" class="d-inline-block" onsubmit="return confirm('Are you sure to delete')">
                  @csrf
                  @method('DELETE')
                  <input type="submit" name="btnsubmit" value="Cancel" class="btn btn-danger">
                </form>                      
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <table class="table mt-3 table-bordered dataTable">
            <thead>
              <tr>
                     <th> No </th>
                     <th>Register date</th>
                     <th>Customer Name</th>
                     <th>Phone number</th>
                     <th> Action </th>
                   
              </tr>
            </thead>
            <tbody>
              @php 
              $i=1;
              @endphp
                @foreach($confirm_register as $row)
                 <tr>
                          <td>{{$i++}}</td>
                          <td>{{$row->registerdate}}</td>
                          <td>{{$row->user->name}}</td>
                           <td>{{$row->phone}}</td>
                        
                          <td>
                              <a href="{{route('register.show', $row->id )}}" class="btn btn-primary">Detail</a>
              </tr>
              @endforeach
            </tbody>
          </table>
            </div>
            
          </div>

        </div>
      </div>
    </div>
  </main>
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('backend_asset/js/plugins/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend_asset/js/plugins/dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript">
    $('.dataTable').DataTable();
  </script>
@endsection