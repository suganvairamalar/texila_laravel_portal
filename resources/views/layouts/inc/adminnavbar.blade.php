<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
   <div class="container-fluid">
      <!-- Brand -->
      <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
      <strong class="dark-text"><i class="fa fa-user text-warning"></i> {{Auth::user()->name}} </strong>
      </a>
      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <!-- Left -->
         <ul class="navbar-nav mr-auto">
            <!-- <li class="nav-item active">
               <a class="nav-link waves-effect" href="#">Home
               <span class="sr-only">(current)</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">About
               MDB</a>
            </li>
            <li class="nav-item">
               <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/getting-started/download/"
                  target="_blank">Free
               download</a>
            </li>
            <li class="nav-item">
               <a class="nav-link waves-effect" href="https://mdbootstrap.com/education/bootstrap/" target="_blank">Free
               tutorials</a>
            </li> -->
         </ul>
         <!-- Right -->
         <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
                <button class="nav-link border border-light rounded waves-effect btn-primary" type="button" id="dropdownMenuButton">
                  <b style="color: white;">Role : {{Auth::user()->role_as}}</b>
                  </button>
              
            </li>
            <li class="nav-item">
               &nbsp;
            </li>
            <li class="nav-item">
               <div class="dropdown">
                  <button class="nav-link border border-light rounded waves-effect dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{Auth::user()->email}}
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     <a class="dropdown-item" href="">My Profile</a>
                     <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                     </form>                    
                  </div>
               </div>
            </li>
         </ul>
      </div>
   </div>
</nav>