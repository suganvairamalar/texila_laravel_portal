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
            <span>Registered User - Edit Role</span>
          </h4>          

        </div>

      </div>
      <!-- Heading -->

        <div class="row">
          <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4>Current Role : {{ $user_roles->role_as }}</h4>
                  <form action="{{url('role-update/'.$user_roles->id)}}" method="post">
                    {{csrf_field()}}
                    @method('PUT')
                     @if (session('status'))
                  <div class="alert alert-success" role="alert">
                     {{ session('status') }}
                  </div>
                  @endif
                      <div class="form-group">
                         <input type="text" name="name" class="form-control" value="{{$user_roles->name}}" readonly>
                      </div>
                      <div class="form-group">
                         <input type="text" name="email" class="form-control" value="{{$user_roles->email}}" readonly>
                      </div>
                      <div class="form-group">
                         <select name="roles_as" class="form-control">
                           <option value="">Select Role</option>
                           <option value="admin">Admin</option>
                           <option value="user" >User</option>

                          <!--  <option disabled="disabled">Select Role</option>
                           <option {{ ($user_roles->role_as) == 'admin' ? 'selected' : '' }} value="admin">Admin</option>
                           <option {{ ($user_roles->role_as) == 'user' ? 'selected' : '' }} value="user" >User</option> -->
                         </select>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-warning">Update</button>
                      </div>
                </form>
                </div>                
              </div>
          </div>                  
      </div>
        
      

    </div>
@endsection