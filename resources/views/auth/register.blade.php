@extends('layouts.frontend')
@section('title')
Register
@endsection

@section('content')


<section style="padding: 84px;">
     <div class="container">
        @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
          <div class="row">
                 <div class="col-md-12">
            <div class="card">
                 <div class="card-header"><b>{{ __('Registration Page') }}</b></div>
              <div class="card-body">
                
                
                 <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" autocomplete="off">
                  @csrf
                   <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Name</label>
                           <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                             <label for="">Phone</label>
                           <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Password</label>
                             <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="">
                        </div>
                    </div>
                         <div class="col-md-4">
                        <div class="form-group">
                             <label for="">Experience</label>
                             <input id="experience" type="text" class="form-control @error('experience') is-invalid @enderror" name="experience" required autocomplete="">

                                @error('experience')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                         <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Notice Period</label>
                             <input id="notice_period" type="text" class="form-control @error('notice_period') is-invalid @enderror" name="notice_period" required autocomplete="">

                                @error('notice_period')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Skills</label>
                             <textarea id="skills" class="form-control @error('skills') is-invalid @enderror" name="skills" required autocomplete=""placeholder="Skills"></textarea>

                                @error('skills')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                   
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Job Location</label>
                             <select class="form-control job_location_id" name="job_location_id">
                                        <option value="">Select City</option>
                                        @foreach ($job_locations as $job_location) 
                                        <option value="{{$job_location->id}}">
                                            {{$job_location->job_location_name}}
                                        </option>
                                        @endforeach
                                    </select>                               
                        </div>
                    </div>
                   
                    <div class="col-md-4">
                    <label for="">Photo</label>
                                 <input type="file" name="photo" class="form-control">
                                 @if ($errors->has('photo'))
            <span class="text-danger">{{ $errors->first('photo') }}</span>
        @endif
                        </div>

                        <div class="col-md-4">
                     <label for="">Resume</label>
                                 <input type="file" name="resume" class="form-control">
 @if ($errors->has('resume'))
            <span class="text-danger">{{ $errors->first('resume') }}</span>
        @endif
                    </div>
                     <div class="col-md-4">
                        <div class="form-group">
                         <button type="submit" class="mt-4 btn btn-primary">
                                    {{ __('Register') }}
                                </button>                            
                        </div>
                    </div>
                 </form>
                 </div>
              </div>
            </div>
             
           </div>
          </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
@endsection

 

