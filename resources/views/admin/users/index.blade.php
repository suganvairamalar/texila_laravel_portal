@extends('layouts.admin')
@section('title')
Dashboard
@endsection
@section('content')
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="">Home Page</a>
            <span>/</span>
            <span>Registered User</span>
          </h4>          
          <a href="{{url('user-restore-all')}}" class="btn btn-info float-right mt-10">Restore</a>
        </div>

      </div>
      <!-- Heading -->

        <div class="row">
          <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                   @if (session('status'))
                  <div class="alert alert-success" role="alert">
                     {{ session('status') }}
                  </div>
                  @endif
                      <table id="datatable1" class="table table-bordered table-striped table-hover">
                         <thead>
                         <tr>
                           <th>NAME</th>
                           <th>EMAIL</th>
                           <th>PHONE</th>
                           <th>PHOTO</th>
                           <th>RESUME</th>
                           <th>ACTION</th>
                         </tr>
                         </thead>
                         <tbody>
                          @foreach ($users as $item)
                           <tr>

                             <td>{{ $item->name }}</td>
                             <td>{{ $item->email }}</td>
                             <td>{{ $item->phone }}</td>
                             <td><img src="{{ asset('uploads/profile_image/'.$item->photo)}}" width="50px"></td>
                             <td><a class="btn btn-danger" role="button" href="{{ asset('uploads/resume/'. $item->resume)}}"  style="text-decoration: underline;font-color:blue;font-weight: bold;" download="{{$item->resume}}">{{$item->resume}}</a></td>
                             <td>
                 

                <a href="{{url('role-edit/'.$item->id)}}" class="badge badge-pill btn-warning px-3 py-2">EDIT ROLE</a>
                <a href="{{url('user-delete/'.$item->id)}}" class="badge badge-pill btn-danger px-3 py-2" onclick="return confirm('sure want to delete?')">DELETE</a>
               
                          @endforeach
                         </tbody>
                      </table>
                    
                </div>                
              </div>
          </div>                  
      </div>
        
      

    </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    $(document).ready(function(){

      $('#datatable1').DataTable();

    });
  </script>
@endsection
