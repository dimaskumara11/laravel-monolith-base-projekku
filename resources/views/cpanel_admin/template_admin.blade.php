<!DOCTYPE html>
<html lang="en">

<head>
  <title>{{$title??null}} - {{env("APP_NAME")}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv='cache-control' content='no-cache'>
  <meta http-equiv='expires' content='0'>
  <meta http-equiv='pragma' content='no-cache'>
  <link rel="icon" href="{{env('APP_URL')}}/assets/images/logo.png" type="image/x-icon">

  <!-- icons -->
  <link href="{{env('APP_URL')}}/assets/fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
  <link href="{{env('APP_URL')}}/assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

  <!-- fontawesome icon -->
  <link rel="stylesheet" href="{{env('APP_URL')}}/assets/fonts/fontawesome/css/fontawesome-all.min.css">

  <!-- animation css -->
  <link rel="stylesheet" href="{{env('APP_URL')}}/assets/plugins/animation/css/animate.min.css">

  <!-- vendor css -->
  <link rel="stylesheet" href="{{env('APP_URL')}}/assets/css/style.css">
  <link rel="stylesheet" href="{{env('APP_URL')}}/assets/css/hky_style.css">

  <!-- Theme Styles -->
  <link href="{{env('APP_URL')}}/assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
  <link href="{{env('APP_URL')}}/assets/css/responsive.css" rel="stylesheet" type="text/css" />
  <link href="{{env('APP_URL')}}/assets/css/theme-color.css" rel="stylesheet" type="text/css" />

  <!-- animation -->
  <link href="{{env('APP_URL')}}/assets/css/pages/animate_page.css" rel="stylesheet">

  <!-- owlcarousel -->
  <link rel="stylesheet" href="{{env('APP_URL')}}/assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="{{env('APP_URL')}}/assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  @if (($datatable??null))
    <link href="https://cdn.jsdelivr.net/npm/jquery-treegrid@0.3.0/css/jquery.treegrid.css" rel="stylesheet">
    <link href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css" rel="stylesheet">
    <link href="https://unpkg.com/jquery-resizable-columns@0.2.3/dist/jquery.resizableColumns.css" rel="stylesheet">
  @endif
  @if (($filepond??null))
        <!-- Filepond -->
  <link rel="stylesheet" href="{{env('APP_URL')}}/assets/plugins/filepond/css/normalize.min.css">
  <link rel='stylesheet' href='/assets/plugins/filepond/css/filepond-plugin-image-preview.min.css'>
  <link rel='stylesheet' href='/assets/plugins/filepond/css/filepond.min.css'>
  @endif

  @if (($select2??null))
    <!-- Select2 -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" /> -->
    <link rel="stylesheet" href="{{env('APP_URL')}}/assets/plugins/select2/css/select2.min.css" />
    <style>
      .select2-selection__rendered {
        line-height: 41px !important;
      }
      .select2-container .select2-selection--single {
          height: 45px !important;
      }
      .select2-selection__arrow {
          height: 44px !important;
      }
      .scrollme::-webkit-scrollbar
      {
        width: 12px;
        background-color: #F5F5F5;
      }

      .scrollme::-webkit-scrollbar-thumb
      {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
        background-color: #555;
      }
    </style>
  @endif
  @stack('addCss')
</head>

<body>
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  @include('cpanel_admin.partials.sidebar')
  
  @include('cpanel_admin.partials.header')
  
  <div class="pcoded-main-container">
    <div class="pcoded-wrapper">
      <div class="pcoded-content" style="margin-top: 0px !important; padding-top: 10px important;">
        <div class="pcoded-inner-content">
          <div class="page-header">
            <div class="page-block">
              <div class="row align-items-center">
                <div class="col-md-12 mt-2">
                  <ul class="breadcrumb hky-breadcrum">
                    <li class="breadcrumb-item"><a class="hky-color-text-black" href="{{route("cpanel_admin.dashboard")}}"><i
                          class="feather icon-home"></i> Dashboard</a></li>
                    @foreach ($breadcrumb??[] as $item => $val)
                    <li class="breadcrumb-item"><a class="hky-color-text-black" href="{{$val["url"]??"javascript:"}}">{{$val["val"]}}</a></li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- Start section 1  -->
          <div class="main-body">
            @if (session("error"))
            <div class="alert alert-danger">WARNING!!! <b>{{strtoupper(session("error"))}}</b></div>
            @endif
            @if (session("success"))
            <div class="alert alert-success">SUCCESS!!! <b>{{strtoupper(session("success"))}}</b></div>
            @endif
            @if ($modalMedia??false)
                @include("cpanel_admin.component.modal_media")
            @endif
              @yield('content')
            <!-- Start Card Favorite  -->
            <footer class="footer p-4 fixed-bottom d-none d-sm-block">
              <div class="row">
                <div class="col-md-6">
                  <div class="text-left" style="font-size: 12px;">
                    Copyright @2023 {{env("APP_COMPANY","D1M45")}} <br>
                    System Developed by 
                    <a href="#" style="color: #99173D;">{{env("APP_AUTHOR","D1M45")}}</a>
                  </div>
                </div>
              </div>
            </footer>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- Required Js -->
  <script src="{{env('APP_URL')}}/assets/js/vendor-all.min.js"></script>
  <script src="{{env('APP_URL')}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="{{env('APP_URL')}}/assets/js/pcoded.min.js"></script>
  <script src="{{env('APP_URL')}}/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="{{env('APP_URL')}}/assets/plugins/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
  <script src="{{env('APP_URL')}}/assets/js/medium-zoom.min.js"></script>
  <script src="{{env('APP_URL')}}/assets/js/hky.js"></script>
  <script src="{{env('APP_URL')}}/assets/validation/validation_form.js"></script>
  <script src="{{env('APP_URL')}}/assets/helpers/component.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  @if (($filepond??null))
    <!-- Filepond -->
    <script src='/assets/plugins/filepond/js/filepond-plugin-file-encode.min.js'></script>
    <script src='/assets/plugins/filepond/js/filepond-plugin-file-validate-size.min.js'></script>
    <script src='/assets/plugins/filepond/js/filepond-plugin-image-exif-orientation.min.js'></script>
    <script src='/assets/plugins/filepond/js/filepond-plugin-image-preview.min.js'></script>
    <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
    <script src='/assets/plugins/filepond/js/filepond.min.js'></script>
    <script src="{{env('APP_URL')}}/assets/plugins/filepond/script.js"></script>
    {{-- <script src="{{env('APP_URL')}}/assets/plugins/filepond/script 2.js"></script> --}}
    <!-- Filepond -->
  @endif

  @if (($datatable??null))
    <script src="{{env('APP_URL')}}/assets/DataTables/DataTables-1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="{{env('APP_URL')}}/assets/DataTables/DataTables-1.10.25/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-treegrid@0.3.0/js/jquery.treegrid.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/extensions/treegrid/bootstrap-table-treegrid.min.js">
    </script>
    <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/extensions/key-events/bootstrap-table-key-events.min.js">
    </script>
    <script src="https://unpkg.com/jquery-resizable-columns@0.2.3/dist/jquery.resizableColumns.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/extensions/resizable/bootstrap-table-resizable.min.js">
    </script>
    <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/extensions/print/bootstrap-table-print.min.js"></script>
  @endif

  @if (($select2??null))
    <!-- Select2 -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" /> -->
  <script src="{{env('APP_URL')}}/assets/plugins/select2/js/select2.full.min.js"></script>
  @endif

  {{-- <script>
    $(document).ready(function () {
      $(".owl-carousel").owlCarousel();
    });
  </script>
  <script>
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 15,
      responsiveClass: true,
      responsive: {
        0: {
          items: 1,
          nav: true
        },
        1500: {
          items: 3,
          nav: false
        },
        3000: {
          items: 5,
          nav: true,
          loop: false
        }
      }
    })
  </script> --}}
  <script>
    var loadFile = function(event) {
        var output = document.getElementById('preview-image-media');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
    $("#button-galery").click(function(e){
        e.preventDefault()
        $("#mediaModal").modal()
    })
    $("#button-upload-media").click(function(e){
        e.preventDefault()
        $("#file-upload-media").click()
    })
    $("#file-upload-media").change(function(e){
        var formData = new FormData();
        formData.append('file', $(`[name="file-upload-media"]`)[0].files[0]);
        formData.append('_token', $("#token-upload-media").val())
        formData.append('folder_name',$("#folder-upload-media").val())
        formData.append('type',$(`[name="file-upload-media"]`)[0].files[0].type)
        $.ajax({
            url : `{{route("cpanel_admin.media.add")}}`,
            method : 'post',
            processData: false,
            contentType: false,
            data : formData,
            dataType : 'json',
            success: function(res){
                const {token_csrf,path} = res.data
                $("#token-upload-media").val(token_csrf)
                $("#target-post-file-media").val(path)
            },error: function (err) {
                $("#token-upload-media").val(err.data.token_csrf)
            }
        })
        loadFile(e)
    })
  </script>
  
  @stack('addJs')
</body>
</html>