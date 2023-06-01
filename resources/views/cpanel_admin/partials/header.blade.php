<header class="navbar pcoded-header navbar-expand-lg navbar-light">
    <div class="m-header">
      <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
      <a href="{{route("cpanel_admin.dashboard")}}" class="b-brand">
        <div class="">
          <img src="{{env('APP_URL')}}/assets/images/logo.png" width="30" height="30" alt="">
        </div>
        <span class="b-title" style="color: white;">{{env("APP_NAME")}}</span>
      </a>
    </div>
    <a class="mobile-menu" id="mobile-header" href="javascript:">
      <i class="feather icon-more-horizontal"></i>
    </a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav mr-auto">
        <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i
              class="feather icon-maximize"></i></a></li>
        <li><a href="javascript:" onclick="location.reload(true)"><i
              class="feather icon-refresh-ccw text-danger"></i></a></li>
        <li class="nav-item">
          <span style="color: #888888 !important;">Welcome,</span> <b style="color: #21C6FD;">{{session("username")}}</b>
          <!-- <div class="main-search" style="padding-top: 25px;">
            <div class="input-group" style="">
              <input type="text" id="m-search" class="form-control" placeholder="Search . . .">
              <a href="javascript:" class="input-group-append search-close">
                <i class="feather icon-x input-group-text"></i>
              </a>
              <span class="input-group-append search-btn btn btn-primary">
                <i class="feather icon-search input-group-text"></i>
              </span>
            </div>
          </div> -->
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li>
          <a href="{{route("cpanel_admin.logout")}}"><i class="feather icon-lock text-danger"></i>
            <span class="text-danger">Log Out</span></a>
        </li>
      </ul>
    </div>
  </header>