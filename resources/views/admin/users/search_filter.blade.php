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
            <span>Search Filter</span>
          </h4>          
         
        </div>

      </div>
      <!-- Heading -->

        <div class="row">
          <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <form id="user_search_form" action="/" autocomplete="off">
               {{ csrf_field() }}
               {{ method_field('GET') }}

               <label >SEARCH</label>
               <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<div class="col-md-4">
               <select class="form-control" name="search_dropdown" id="search_dropdown">
                          <option value="">Select Search</option>
                          <option value="name">Name</option>
                          <option value="email">Email</option>
                          <option value="skills">Skills</option>
                          <option value="job_location_id">Job Location</option>
                        </select>
                        </div>
  <div class="col-md-4">                      
               <input type="text" class="form-control" name="search" id="search">
                </div>
<div class="col-md-4"> 
               <button type="submit" class="btn btn-warning" id="user_search_submit" name="user_search_submit">
               search</button> 
               <a href="" class="btn btn-primary"><span class="reloadbtn glyphicon glyphicon-refresh">refresh</span></a>
            </form>
          </div>
                   @if (session('status'))
                  <div class="alert alert-success" role="alert">
                     {{ session('status') }}
                  </div>
                  @endif
                      <table class="table table-bordered table-striped table-hover">
                         <thead>
                         <tr>
                           <th>NAME</th>
                           <th>EMAIL</th>
                           <th>PHONE</th>
                           <th>PHOTO</th>
                           <th>RESUME</th>
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
                           <!--   {{ $item->job_location->job_location_name }} --> 
                          @endforeach
                         </tbody>
                      </table>
                      <div class="float-right">{{$users->links()}}</div> 
                </div>                
              </div>
          </div>                  
      </div>      

    </div>
@endsection

