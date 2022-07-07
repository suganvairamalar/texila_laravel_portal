@extends('layouts.frontend')
@section('title')
My Profile
@endsection

@section('content')

<section style="padding: 84px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
                    <div class="card-body">
		                 @if (session('status'))
		                        <div class="alert alert-success" role="alert">
		                            {{ session('status') }}
		                        </div>
		                    @endif
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <h4>My Profile Page</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                           
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <a href="{{url('home')}}" class="btn btn-info float-right mt-10">back to home</a>
                        </div>
                    </div>
                </div>
				
                <hr>
				<form action="{{url('my_profile_update')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
				<div class="row">
					<div class="col-md-4">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Email</label>
                             <input type="text" readonly class="form-control" name="email" value="{{ Auth::user()->email }}">                            
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Phone</label>
                           	  <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Experience (in Year(s)</label>
                            <input type="text" class="form-control" name="experience" value="{{ Auth::user()->experience }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Notice Period (in Day(s)</label>
                             <input type="text" class="form-control" name="notice_period" value="{{ Auth::user()->notice_period }}">                            
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Skills</label>
                           	   <textarea name="skills" class="form-control" placeholder="Skills">{{Auth::user()->skills}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                             <label for="">Job Location</label>
                        <select class="form-control job_location_id" name="job_location_id">
                            <option value="">Select City</option>
                            @foreach ($job_locations as $job_location) 
                            <option value="{{$job_location->id}}"{{$job_location->id == Auth::user()->job_location_id ? 'selected' : ''}} >{{$job_location->job_location_name}}
                            </option>
                            @endforeach
                        </select> 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                         <label for="">Photo</label>
                      @if(Auth::user()->photo=='')
<img class="image rounded-circle w-45" src="{{asset('/storage/images/profile_image.png')}}" alt="photo" style="padding: 10px; margin: 0px; ">
@endif
                      <input type="file" name="photo" class="form_control"><br>
                        <img src="{{asset('uploads/profile_image/'. Auth::user()->photo)}}" class="image rounded-circle w-10" alt="">
                        </div>                    
				</div>	
                <div class="col-md-4">
                    <div class="form-group">
                    <label for="">Resume</label>
                     <input type="file" name="resume" class="form_control"><br>
                     <a href="{{ asset('uploads/resume/'. Auth::user()->resume)}}" target="_blank"> {{ (Auth::user()->resume)}} </a>
                      
                        </div>                    
                </div>  
                 <div class="col-md-4">
                        <div class="form-group">
                          <button type="submit" class="mt-4 btn btn-warning">Update Profile</button>                  
                        </div>
                    </div>		
                    
                    </div><!--end row-->
				</form>
			</div><!--end container-->
		</div><!--end card-->
	</div><!--end card body-->
</div><!--end row-->
</div><!--end container-->
</section>
@endsection

		


