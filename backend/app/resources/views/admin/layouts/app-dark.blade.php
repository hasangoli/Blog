<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>پرشین تاناجرز</title>
    <!-- plugins:css -->
    <link href='https://cdn.fontcdn.ir/Font/Persian/Vazir/Vazir.css' rel='stylesheet' type='text/css'>


    <link href="{{ asset('backend/assets/css/bootstrap/bootstrap-min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/css/fontawesome/font-face.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/css/kamadatepicker.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('backend/assets/vendors/css/vendor.bundle.base.css') }}" rel="stylesheet" />
    {{--  font awsome  --}}
    <link href="{{ asset('backend/assets/css/fontawesome/all.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/css/fontawesome/googleapis.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/css/fontawesome/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link href="{{ asset('backend/assets/vendors/jvectormap/jquery-jvectormap.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}" rel="stylesheet" />
    <!-- End plugin css for this page -->
    <!-- Layout styles -->
    <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet" />
    <!-- End layout styles -->
    <link href="{{ asset('backend/assets/images/favicon.png') }}" rel="shortcut icon" />
    <link href="{{ asset('backend/assets/css/image-upload.css') }}" rel="stylesheet" />

    {{--  data table  --}}
    <link rel="stylesheet" href="{{ asset('backend/css/dataTable.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/dataTable1.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/dataTable2.css') }}" />
    {{--  toastr style  --}}
    <link rel="stylesheet" href="{{ asset('backend/css/toastr.min.css') }}" />

    {{--  custome style  --}}
    <link href="{{ asset('backend/assets/css/custome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @stack('styles')
  </head>
  <body >
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin/sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">

          <canvas class="background"></canvas>
          <button
              class="
                navbar-toggler navbar-toggler-right
                d-lg-none
                align-self-center text-white
              "
              type="button"
              data-toggle="offcanvas"
            >
              <span class="fa fa-bars"></span>
            </button>




            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
              <button
              class="navbar-toggler navbar-toggler align-self-center"
              type="button"
              data-toggle="minimize"
              >
              <span class="fa fa-bars"></span>
            </button>
            <div class=" header-item   clock-wapper">
              <h6 id="demo"></h6>
           </div>
            <div class="mx-auto align-self-center pr-61">
              <a class="navbar-brand brand-logo-mini" href="{{env("APP_URL", "/")}}"
              ><img class="brand-nav-logo" src="/logo.png" alt="logo"
              /></a>

            </div>


            <div class=" fullscreen m-auto-cus mx-4">
              <button class="btn btn-outline-info btn-icon " id="btnFullscreen" type="button"><span class="fa fa-expand  my-auto"></span></button>
            </div>


          </div>
          {{--  <div
            class="
              navbar-brand-wrapper
              d-flex d-lg-none
              align-items-center
              justify-content-center
            "
          >

            <a class="navbar-brand brand-logo-mini" href="{{route('admin.dashboard')}}"
              ><img src="{{ asset('backend/assets/images/logo.png') }}" alt="{{ env('APP_NAME', 'ونیز') }}"
            /></a>
          </div>  --}}
        </nav>
        <div class="main-panel">
            <div class="content-wrapper">
               {{--  main contents  --}}
                  @yield('contents')
            </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    {{--  core  --}}
    <script src="{{ asset('backend/js/jquery-3.6.0.js') }}"></script>
    {{--  jalali date picker  --}}
    <script src="{{ asset('backend/assets/js/kamadatepicker.holidays.js') }}"></script>
    <script src="{{ asset('backend/assets/js/kamadatepicker.min.js') }}"></script>


    <script src="{{ asset('backend/assets/js/persian-tools2.js') }}"></script>
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
    {{--  data table  --}}
    <script src="{{ asset('backend/assets/js/dataTable/dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/dataTable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/dataTable/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/dataTable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/dataTable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/assets/js/dataTable/buttons.html5.min.js') }}"></script>
    {{--  other js  --}}
    <script src="{{ asset('backend/assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/all.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/data-table.js') }}"></script>
    <script src="{{ asset('backend/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('backend/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('backend/assets/js/misc.js') }}"></script>
    <script src="{{ asset('backend/assets/js/settings.js') }}"></script>
    <script src="{{ asset('backend/assets/js/todolist.js') }}"></script>

    <script src="{{ asset('backend/js/toastr.min.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('backend/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('backend/assets/js/sweetalert2.js') }}"></script>

    <script src="{{ asset('backend/assets/js/all-scripts.js') }}"></script>

    <script>


      document.querySelectorAll('.numberToWords').forEach(item =>{
          item.addEventListener('input' , (e)=>{
              console.log(e.target.parentNode.nextElementSibling)
              console.log(PersianTools.NumberToWords.convert(PersianTools.digitsFaToEn(e.target.value)).toString() + " تومان ")
              e.target.parentNode.nextElementSibling.innerHTML = PersianTools.NumberToWords.convert(PersianTools.digitsFaToEn(e.target.value)).toString() + " تومان ";
              // console.log()
          })
      })

      document.querySelectorAll('.numberToWordsPreview').forEach(item => {
          const number = item.previousElementSibling.querySelector('.numberToWords').value;
          item.innerHTML = PersianTools.NumberToWords.convert(PersianTools.digitsFaToEn(number)).toString() + " تومان ";
      })

  </script>

{{--  jalali date picker ends  --}}


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


<script>
    document.querySelectorAll('.CkEditor').forEach((item, index) => {
        CKEDITOR.replace(item, {
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            extraPlugins: 'panelbutton,colorbutton,html5video,youtube,justify',
            language: 'fa',
            options: [ 'left', 'right' ],
            // youtube_width = '640',
            // youtube_height = '480',
            // youtube_responsive = true,
            // youtube_related = true,
            // youtube_older = false,
            // youtube_privacy = false,
            // youtube_autoplay = false,
            // youtube_controls = true
            },
        );
    });

</script>




@stack('script')


<script>


document.querySelectorAll(".drop-region").forEach((dropRegion, index) => {
  isTheFirstTime = true;
  console.log(dropRegion.querySelector("#files"));

  dropRegion.addEventListener("click", function (e) {
    const isClickedInnerBox = e.target.closest(".image-view");
    if (!isClickedInnerBox) dropRegion.querySelector("#files").click();
  });

  dropRegion.querySelector("#files").addEventListener("change", function () {
    handleFiles(this.files);
  });

  function preventDefault(e) {
    e.preventDefault();
    e.stopPropagation();
  }

  dropRegion.addEventListener("dragenter", preventDefault, false);
  dropRegion.addEventListener("dragleave", preventDefault, false);
  dropRegion.addEventListener("dragover", preventDefault, false);
  dropRegion.addEventListener("drop", preventDefault, false);

  function handleDrop(e) {
    var dt = e.dataTransfer,
      files = dt.files;

    if (files.length) {
      handleFiles(files);
    } else {
      // check for img
      var html = dt.getData("text/html"),
        match = html && /\bsrc="?([^"\s]+)"?\s*/.exec(html),
        url = match && match[1];

      if (url) {
        uploadImageFromURL(url);
        return;
      }
    }

    function uploadImageFromURL(url) {
      var img = new Image();
      var c = document.createElement("canvas");
      var ctx = c.getContext("2d");

      img.onload = function () {
        c.width = this.naturalWidth; // update canvas size to match image
        c.height = this.naturalHeight;
        ctx.drawImage(this, 0, 0); // draw in image
        c.toBlob(function (blob) {
          // get content as PNG blob

          // call our main function
          handleFiles([blob]);
        }, "image/png");
      };
      img.onerror = function () {
        alert("Error in uploading");
      };
      img.crossOrigin = ""; // if from different origin
      img.src = url;
    }
  }

  dropRegion.addEventListener("drop", handleDrop, false);
  function handleFiles(files) {
    for (var i = 0, len = files.length; i < len; i++) {
      if (validateImage(files[i])) previewAnduploadImage(files[i]);
    }
  }
  function validateImage(image) {
    // check the type
    var validTypes = ["image/jpeg", "image/png", "image/gif" , "video/mp4"];
    if (validTypes.indexOf(image.type) === -1) {
      alert("Invalid File Type");
      return false;
    }

    // check the size
    var maxSizeInBytes = 10e6; // 10MB
    if (image.size > maxSizeInBytes) {
      alert("File too large");
      return false;
    }

    return true;
  }

  function previewAnduploadImage(image) {
    // remove children if the first time of if its not multiple
    if (
      isTheFirstTime ||
      typeof dropRegion.querySelector("#files").getAttribute("multiple") !=
        "string"
    ) {
      $(dropRegion.querySelector(".image-preview")).children().remove();
      isTheFirstTime = false;
    }
    // container
    var imgView = document.createElement("div");
    imgView.className = "image-view " + image.size;
    dropRegion.querySelector(".image-preview").appendChild(imgView);

    // previewing image
    var img = document.createElement("img");
    img.className = "thumbnail";
    imgView.appendChild(img);

    // icon delete
    var i = document.createElement("i");
    i.className = "fa fa-trash cus-icon-trash mx-auto";
    imgView.appendChild(i);

    // // progress overlay
    // var overlay = document.createElement("div");
    // overlay.className = "overlay";
    // imgView.appendChild(overlay);

    imgView.addEventListener("click", function (e) {
      removeSingleImageFromPreview(image.size);
    });

    // read the image...
    var reader = new FileReader();
    reader.onload = function (e) {
      img.src = e.target.result;
    };

    reader.readAsDataURL(image);
  }

  function removeSingleImageFromPreview(payload) {
    // get all the image that are previewing
    console.log(payload);
    console.log(
      $(dropRegion.querySelector(".image-preview"))
        .children("." + payload)
        .remove()
    );

    var attachments = dropRegion.querySelector("#files").files; // <-- reference your file input here
    var fileBuffer = new DataTransfer();
    console.log(attachments);
    // append the file list to an array iteratively
    for (let i = 0; i < attachments.length; i++) {
      // Exclude file in specified index
      if (attachments[i].size !== payload) fileBuffer.items.add(attachments[i]);
    }

    console.log(fileBuffer);
    // Assign buffer to file input
    dropRegion.querySelector("#files").files = fileBuffer.files;
  }
});




</script>

    {{--  canvas end  --}}

    {{-- <script>
      @if (flashMessages.has('errors'))
         @each(error in flashMessages.get('errors'))
             toastr.error("{{ error }}", 'خطا', {
                 closeButtor: true,
                 progressBar: true
             });
         @end
     @endif


     @if (flashMessages.has('success'))
         @each(succes in flashMessages.get('success'))
             toastr.success("{{ succes }}", 'موفقیت', {
                 closeButtor: true,
                 progressBar: true
             });
         @end
     @endif
 </script> --}}
 <!-- End custom js for this page -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  {!! Toastr::message() !!}
  <script>
      @if ($errors->any())
      @foreach ($errors->all() as $error)
      toastr.error('{{ $error }}', 'Error', {
          closeButtor: true,
          progressBar: true
      });
      @endforeach
      @endif
  </script>
    {{-- <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script> --}}

  </body>
</html>
