<header class="main-header bg-dark">
    <div class="container container-1440">
      <div class="header-inner">
        <nav class="navbar navbar-expand-lg">
          <a href="{{route('destination.home')}}" class="logo">
            <img src="{{asset('destination/images/logo-white.png')}}" alt="img">
          </a>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
                                @php
                    $count =   \App\Models\Chat::where('send_to',Auth::user()->_id)->where('read_status',0)->count();
      $count = $count==0 ? '' : $count;
                    @endphp
            <ul class="navbar-nav">       
              <li class="nav-item">
                  <a class="nav-link <?= ActiveMenu(['destination.create.job'],'active') ?>" href="{{route('destination.create.job')}}">Create Job </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link <?= ActiveMenu(['destination.home'],'active') ?> " href="{{route('destination.home')}}">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link <?= ActiveMenu(['destination.jobs'],'active') ?>" href="{{route('destination.jobs')}}">My Jobs</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link <?= ActiveMenu(['destination.invoices'],'active') ?>" href="{{route('destination.invoices')}}">My Spending</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link <?= ActiveMenu(['destination.chat'],'active') ?>" href="{{route('destination.chat')}}">Messages <span class="message_total">{{$count}}</span></a>
              </li>
          </ul>
          </div>
          <div class="profile-logo-part">
            <ul>
              <li>
                <a class="counts-outer" href="{{route('destination.notification')}}">
                  <img src="{{asset('destination/images/icons/bell.png')}}" alt="img">
				           
                                  <span class="counts"></span>
                </a>
              </li>
              <li class="dropdown">               
                <a class="btn btn-secondary profile-icon dropdown-toggle notif" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
				
                  <img src="{{(isset(Auth::user()->logo) && Auth::user()->logo!='null') ? asset(Auth::user()->logo) : asset('destination/images/profile-img-icon.png')}}" alt="img">
                </a>  
                <ul class="dropdown-menu p-3" aria-labelledby="dropdownMenuLink">
                  <li></li>
                  <li class="mb-2">
                    <a class="dropdown-item cstm-drp-down" href="{{route('destination.setting').'#account'}}">
                     Account</a></li>
                  <li class="mb-2"><a class="dropdown-item " href="{{route('destination.about')}}">
                 About Us</a></li>
                  <li class="mb-2"><a class="dropdown-item cstm-drp-down" href="{{route('destination.setting').'#change-password'}}">
                  Change Password</a></li>
                  <li><a class="dropdown-item" href="{{route('destination.terms')}}">
                 Terms & Conditions</a></li>
                </ul>             
              </li>
              <li>
                <a href="javascript:void(0)" id="v-pills-settings-tab" data-bs-toggle="modal" data-bs-target="#logout">
                  <img src="{{asset('destination/images/icons/exit.png')}}" alt="img">
                </a>
              </li>
            </ul>
          </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon">
              <img src="{{asset('destination/images/icons/menu-bar.png')}}" alt="menu">
              <img src="{{asset('destination/images/icons/close.png')}}" alt="menu">
            </span>
          </button>
        </nav>
      </div>
    </div>
  </header>
  