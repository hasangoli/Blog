<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>{{ __('Login') }}</title>
    <!-- plugins:css -->
    <link href="{{ asset('backend/assets/css/bootstrap/bootstrap-min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/css/fontawesome/font-face.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/vendors/css/vendor.bundle.base.css') }}" rel="stylesheet" />
    {{--  font awsome  --}}
    <link href="{{ asset('backend/assets/css/fontawesome/all.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/css/fontawesome/googleapis.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/css/fontawesome/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link href="{{ asset('backend/assets/vendors/jvectormap/jquery-jvectormap.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" />
   
    <!-- Layout styles -->
    <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet" />
    <!-- End layout styles -->
    <link href="{{ asset('backend/assets/images/favicon.png') }}" rel="shortcut icon" />
    {{--  toastr style  --}}
    <link rel="stylesheet" href="{{ asset('backend/css/toastr.min.css') }}" />

    {{--  custome style  --}}
    <link href="{{ asset('backend/assets/css/custome.css') }}" rel="stylesheet" />
    

  {{-- recaptcha --}}
    <script type="text/javascript">
        function callbackThen(response){
            // read HTTP status
            console.log(response.status);
            
            // read Promise object
            response.json().then(function(data){
                console.log(data);
            });
        }
        function callbackCatch(error){
            console.error('Error:', error)
        }   
    </script>


        {!! htmlScriptTagJsApi([
            'action' => 'homepage',
            'callback_then' => 'callbackThen',
            'callback_catch' => 'callbackCatch'
        ]) !!}

  </head>
  <body >
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="row w-100 m-0">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
              <div class="card col-lg-4 mx-auto">
                <div class="card-body px-5 py-5">
                    <div class="mx-auto d-flex justify-center"> <img src="{{asset("/logo.png")}}" width="150" height="150" class="mb-3" alt="Logo"> </div><br />

                  <form action="{{ route('login') }}" accept-charset="UTF-8" method="POST">
                    @csrf
                    <div class="form-group">
                      <label>ایمیل</label>
                      <input type="text" name="email" value="" class="form-control p_input">
                    </div>
                    <div class="form-group">
                      <label>پسورد</label>
                      <input type="password" name="password" class="form-control p_input" autocomplete="off" placeholder="رمز عبور">
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between">
                        
                      <a href="#" class="forgot-pass">رمز خود را فراموش کرده اید؟</a>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-outline-primary btn-block enter-btn">ورود</button>
                    </div>
                   
                  
                  </form>
                </div>
              </div>
            </div>
            <!-- content-wrapper ends -->
          </div>
          <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
    
    <!-- container-scroller -->
    {{--  core  --}}
    <script src="{{ asset('backend/js/jquery-3.6.0.js') }}"></script>
    <!-- plugins:js -->
    <script src="{{ asset('backend/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('backend/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>
   
    {{--  other js  --}}
    <script src="{{ asset('backend/assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/all.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('backend/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('backend/assets/js/misc.js') }}"></script>
    <script src="{{ asset('backend/assets/js/settings.js') }}"></script>
    <script src="{{ asset('backend/assets/js/todolist.js') }}"></script>
    <script src="{{ asset('backend/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('backend/js/toastr.min.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('backend/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('backend/assets/js/all-scripts.js') }}"></script>
    <script src="{{ asset('backend/assets/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('backend/assets/js/toastr.min.js') }}"></script>
    {{-- fullscreen   --}}
    <script>
    function toggleFullscreen(elem) {
      elem = elem || document.documentElement;
      if (!document.fullscreenElement && !document.mozFullScreenElement &&
        !document.webkitFullscreenElement && !document.msFullscreenElement) {
        if (elem.requestFullscreen) {
          elem.requestFullscreen();
        } else if (elem.msRequestFullscreen) {
          elem.msRequestFullscreen();
        } else if (elem.mozRequestFullScreen) {
          elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) {
          elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        }
      } else {
        if (document.exitFullscreen) {
          document.exitFullscreen();
        } else if (document.msExitFullscreen) {
          document.msExitFullscreen();
        } else if (document.mozCancelFullScreen) {
          document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
          document.webkitExitFullscreen();
        }
      }
    }
    
    document.getElementById('btnFullscreen').addEventListener('click', function() {
      toggleFullscreen();
    });
    
    document.getElementById('exampleImage').addEventListener('click', function() {
      toggleFullscreen(this);
    });</script>
    
    {{--  fullscreen end  --}}
    
    {{--  clock  --}}
    <script>var sundte = new Date();
      var yeardte = sundte.getFullYear();
      var monthdte = sundte.getMonth();
      var dtedte = sundte.getDate();
      var daydte = sundte.getDay();
      var sunyear;
      switch (daydte) {
        case 0:
          var today = "يکشنبه";
          break;
        case 1:
          var today = "دوشنبه";
          break;
        case 2:
          var today = "سه شنبه";
          break;
        case 3:
          var today = "چهارشنبه";
          break;
        case 4:
          var today = "پنجشنبه";
          break;
        case 5:
          var today = "جمعه";
          break;
        case 6:
          var today = "شنبه";
          break;
      }
      switch (monthdte) {
        case 0:
          sunyear = yeardte - 622;
          if (dtedte <= 20) {
            var sunmonth = "دي";
            var daysun = dtedte + 10;
          } else {
            var sunmonth = "بهمن";
            var daysun = dtedte - 20;
          }
          break;
        case 1:
          sunyear = yeardte - 622;
          if (dtedte <= 19) {
            var sunmonth = "بهمن";
            var daysun = dtedte + 11;
          } else {
            var sunmonth = "اسفند";
            var daysun = dtedte - 19;
          }
          break;
        case 2:
          {
            if ((yeardte - 621) % 4 == 0) var i = 10;
            else var i = 9;
            if (dtedte <= 20) {
              sunyear = yeardte - 622;
              var sunmonth = "اسفند";
              var daysun = dtedte + i;
            } else {
              sunyear = yeardte - 621;
              var sunmonth = "فروردين";
              var daysun = dtedte - 20;
            }
          }
          break;
        case 3:
          sunyear = yeardte - 621;
          if (dtedte <= 20) {
            var sunmonth = "فروردين";
            var daysun = dtedte + 11;
          } else {
            var sunmonth = "ارديبهشت";
            var daysun = dtedte - 20;
          }
          break;
        case 4:
          sunyear = yeardte - 621;
          if (dtedte <= 21) {
            var sunmonth = "ارديبهشت";
            var daysun = dtedte + 10;
          } else {
            var sunmonth = "خرداد";
            var daysun = dtedte - 21;
          }
      
          break;
        case 5:
          sunyear = yeardte - 621;
          if (dtedte <= 21) {
            var sunmonth = "خرداد";
            var daysun = dtedte + 10;
          } else {
            var sunmonth = "تير";
            var daysun = dtedte - 21;
          }
          break;
        case 6:
          sunyear = yeardte - 621;
          if (dtedte <= 22) {
            var sunmonth = "تير";
            var daysun = dtedte + 9;
          } else {
            var sunmonth = "مرداد";
            var daysun = dtedte - 22;
          }
          break;
        case 7:
          sunyear = yeardte - 621;
          if (dtedte <= 22) {
            var sunmonth = "مرداد";
            var daysun = dtedte + 9;
          } else {
            var sunmonth = "شهريور";
            var daysun = dtedte - 22;
          }
          break;
        case 8:
          sunyear = yeardte - 621;
          if (dtedte <= 22) {
            var sunmonth = "شهريور";
            var daysun = dtedte + 9;
          } else {
            var sunmonth = "مهر";
            var daysun = dtedte + 22;
          }
          break;
        case 9:
          sunyear = yeardte - 621;
          if (dtedte <= 22) {
            var sunmonth = "مهر";
            var daysun = dtedte + 8;
          } else {
            var sunmonth = "آبان";
            var daysun = dtedte - 22;
          }
          break;
        case 10:
          sunyear = yeardte - 621;
          if (dtedte <= 21) {
            var sunmonth = "آبان";
            var daysun = dtedte + 9;
          } else {
            var sunmonth = "آذر";
            var daysun = dtedte - 21;
          }
      
          break;
        case 11:
          sunyear = yeardte - 621;
          if (dtedte <= 19) {
            var sunmonth = "آذر";
            var daysun = dtedte + 9;
          } else {
            var sunmonth = "دي";
            var daysun = dtedte + 21;
          }
          break;
      }
      document.getElementById("demo").innerHTML =
        " " +
        today +
        "&nbsp;" +
        [daysun + 1] +
        "&nbsp;" +
        sunmonth +
        "&nbsp;" +
        sunyear +
        " ";
      </script>
   
    {{--  clock  --}}
    {{--  canvas  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.2/particles.min.js"></script>
    
<script>var particles = Particles.init({
	selector: '.background',
  sizeVariations: 10,
  color: ['#00bbdd', '#404B69', '#DBEDF3'],
  connectParticles: true
});
</script>
    {{--  canvas end  --}}

    
 <!-- End custom js for this page -->
    @!section('scripts')
  </body>
</html>
