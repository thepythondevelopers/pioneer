<header class="main-header bg-dark">
      <div class="container container-1440">
          <div class="header-inner">
              <nav class="navbar navbar-expand-xl">
                  <a href="{{route('pioneer.home')}}" class="logo">
                      <img src="{{asset('pioneer/images/logo-white.png')}}" alt="img">
                  </a>
                  <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    @php
                    $count =   \App\Models\Chat::where('send_to',Auth::user()->_id)->where('read_status',0)->count();
      $count = $count==0 ? '' : $count;
                    @endphp
                      <ul class="navbar-nav">
                          <li class="nav-item">
                              <a class="nav-link <?= ActiveMenu(['pioneer.home'],'active') ?>" href="{{route('pioneer.home')}}">Home</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link <?= ActiveMenu(['pioneer.jobs'],'active') ?>" href="{{route('pioneer.jobs')}}">Proposals</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link <?= ActiveMenu(['pioneer.invoices'],'active') ?>" href="{{route('pioneer.invoices')}}">Invoices</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link <?= ActiveMenu(['pioneer.chat'],'active') ?>" href="{{route('pioneer.chat')}}">Messages <span class="message_total">{{$count}}</span></a>
                          </li>
                      </ul>
                  </div>
                  <div class="search-wrapper icon-form">
                      <div class="input-icon-wrpper d-lg-block d-none">
                          <input type="search" class="form-control main-search"  placeholder="Search Jobs" autocomplete="off">
                          <span class="input-icon">
                              <img src="{{asset('pioneer/images/icons/search-icon.png')}}" alt="icon">
                          </span>
                      </div>
                      <div class="search-section d-lg-none">
                          <div class="search-box">
                              <div class="search-input">
                                  <input type="search" class="form-control input-textarea main-search" 
                                      placeholder="Search" autocomplete="off">
                                  <span class="input-icon">
                                      <img src="{{asset('pioneer/images/icons/search-icon.png')}}" alt="icon">
                                      <img src="{{asset('pioneer/images/icons/cross.png')}}" alt="icon">
                                  </span>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="profile-logo-part">
                      <ul>
                          <li>
                              <a class="counts-outer" href="{{route('pioneer.notification')}}">
                                  <img src="{{asset('pioneer/images/icons/bell.png')}}" alt="img">

                                  <span class="counts"></span>
                              </a>
                          </li>
                          <li class="dropdown">
                              <a class="btn btn-secondary profile-icon dropdown-toggle" href="#" role="button"
                                  id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                  <img src="{{(isset(Auth::user()->logo) && Auth::user()->logo!='null') ? asset(Auth::user()->logo) : asset('pioneer/images/aplicant.png')}}" alt="img">
                              </a>
                              <ul class="dropdown-menu p-3" aria-labelledby="dropdownMenuLink">
                                 
                                  <li class="mb-2">
                                    <a class="dropdown-item" href="{{route('pioneer.setting').'#account'}}">
                                        <!-- <span><img src="images/icons/setting-user.png" alt="text"></span> -->
                                        Account
                                    </a>
                                </li>
                                  <li class="mb-2">
                                    <a class="dropdown-item" href="{{route('pioneer.about')}}">
                                    <!-- <span><img src="images/icons/setting-about.png" alt="text"></span> -->
                                    About Us
                                    </a>
                                  </li>
                                  <li class="mb-2">
                                    <a class="dropdown-item" href="{{route('pioneer.setting').'#change-password'}}">
                                    <!-- <span><img src="images/icons/setting-pwd.png" alt="text"></span>  -->
                                    Change Password
                                    </a>
                                </li>
                                  <li>
                                    <a class="dropdown-item" href="{{route('pioneer.terms')}}">
                                    <!-- <span><img src="images/icons/setting-term.png" alt="text"></span>  -->
                                    Terms & Conditions
                                    </a>
                                </li>
                              </ul>
                          </li>
                          <li>
                              <a href="#" id="v-pills-settings-tab" data-bs-toggle="modal" data-bs-target="#logout">
                                  <img src="{{asset('pioneer/images/icons/exit.png')}}" alt="img">
                              </a>
                          </li>
                      </ul>
                  </div>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapsibleNavbar">
                      <span class="navbar-toggler-icon">
                          <img src="{{asset('pioneer/images/icons/menu-bar.png')}}" alt="menu">
                          <img src="{{asset('pioneer/images/icons/close.png')}}" alt="menu">
                      </span>
                  </button>
              </nav>
          </div>
      </div>
  </header>