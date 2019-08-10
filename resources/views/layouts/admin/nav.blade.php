<div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row position-relative">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('admin.dashboard') }}"><img class="brand-logo" alt="modern admin logo" src="{{ asset('admin/app-assets/images/logo/logobw.svg') }}">
                </a></li>
            <li class="nav-item d-none d-md-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
             {{-- Fullscreen Icon          --}}
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
              
              {{-- Search? --}}
              <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                <div class="search-input">
                  <input class="input" type="text" placeholder="Explored Morade Admin...">
                </div>
              </li>
            </ul>
            <ul class="nav navbar-nav float-right">
            {{-- Admin avatar --}}
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="mr-1">Hello,<span class="user-name text-bold-700">{{ Auth::guard('admin')->user()->name }}</span></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  {{-- 
                  <a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a>
                  <a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a>
                  <a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a>
                  <div class="dropdown-divider"></div> --}}
                  <a class="dropdown-item" href="{{ route('profile') }}"><i class="ft-user"></i> Profile</a>
                  <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="ft-power"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>