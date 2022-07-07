@extends('layouts.frontend')
@section('title')
Home
@endsection
@section('content')
<section style="padding: 84px;">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  Dashboard
                  <b class="red-text float-right">Role : {{Auth::user()->role_as}}</b>
              </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <a href="{{url('changePassword')}}" class="btn btn-warning float-right">change password</a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
