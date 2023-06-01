<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
      <div class="navbar-brand header-logo">
        <a href="#" class="b-brand">
          <div class="">
            <img src="{{env('APP_URL')}}/assets/images/logo.png" width="30" height="30" alt="">
          </div>
          <span class="b-title">{{env("APP_NAME")}}</span>
        </a>
        <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
      </div>
      <div class="navbar-content scroll-div">
        <ul class="nav pcoded-inner-navbar">
          <li class="nav-item pcoded-menu-caption">
            <label>Navigation Menu</label>
          </li>
          <li data-username="" class="nav-item">
            <a href="{{route('cpanel_admin.dashboard')}}" class="nav-link "><span class="pcoded-micon"><i
                  class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
          </li>
          <li
            data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
            class="nav-item pcoded-hasmenu {{ Request::segment(1)=="sppd"?"active":"" }}">
            <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i
                  class="feather icon-calendar"></i></span><span class="pcoded-mtext"> Master</span></a>
            <ul class="pcoded-submenu">
              <li class=""><a href="{{route('cpanel_admin.master.company.list')}}" class="">Company</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>