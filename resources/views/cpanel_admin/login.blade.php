<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{env('APP_URL')}}/assets/images/apple-icon.png">
  <link rel="icon" type="image/png" href="{{env('APP_URL')}}/assets/images/logo.png">
  <title>
    {{env("APP_NAME")}}
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{env('APP_URL')}}/assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- <link href="{{env('APP_URL')}}/assets/css/nucleo-icons.css" rel="stylesheet" /> -->
  <link href="{{env('APP_URL')}}/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{env('APP_URL')}}/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{env('APP_URL')}}/assets/css/soft-ui-dashboard.css" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-white" style="background-size:cover; background-image: url('{{env('APP_URL')}}/assets/images/bg-login.jpg')">
  <section>
    <div class="page-header section-height-75">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
            <div class="card mt-8">
              @if (session("error"))
              <div class="alert alert-danger text-white">WARNING!!! <b>{{strtoupper(session("error"))}}</b></div>
              @endif
              <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient">{{env("APP_NAME")}}</h3>
                <p class="mb-0">Welcome To My Website</p>
              </div>
              <div class="card-body">
                <form action="{{route('cpanel_admin.login.post')}}" method="post" role="form text-left" id="myForm1">
                  @csrf
                  <input type="hidden" id="field_validation_1" value='["username","password"]'>
                  <label>Username</label>
                  <div class="mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Email"
                      aria-describedby="email-addon" required>
                  </div>
                  <label>Password</label>
                  <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password"
                      aria-describedby="password-addon" required>
                  </div>
                  <div class="text-center">
                      <button type="submit" id="button_validation_1" class="btn bg-gradient-info w-100 mt-4 mb-0">MASUK</button>
                  </div>
                </form>
              </div>
              <div class="row">
                <div class="mx-auto text-center mb-3" style="font-size: 12px;">
                  Copyright @2023 {{env("APP_COMPANY","D1M45")}}
                  <br>
                  System Developed by 
                  <a href="#" target="_blank" style="color: #99173D;">{{env("APP_AUTHOR","D1M45")}}</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  {{-- <footer class="footer py-4 fixed-bottom">
    <div class="container">
      <div class="row">
        <div class="mx-auto text-center" style="font-size: 12px;">
          Copyright @2023 {{env("APP_COMPANY","D1M45")}}
          <br>
          System Developed by 
          <a href="#" target="_blank" style="color: #99173D;">{{env("APP_AUTHOR","D1M45")}}</a>
        </div>
      </div>
    </div>
  </footer> --}}
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{env('APP_URL')}}/assets/js/soft-ui-dashboard.min.js?v=1.0.2"></script>
  <script src="{{env('APP_URL')}}/assets/plugins/jquery/jquery_main.js"></script>
  <script src="{{env('APP_URL')}}/assets/validation/validation_form.js"></script>
  <script src="{{env('APP_URL')}}/assets/helpers/component.js"></script>
</body>

</html>