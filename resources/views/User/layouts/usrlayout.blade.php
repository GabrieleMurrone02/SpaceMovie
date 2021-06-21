<html>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="icon" href="{{ asset('Foto/loghi/logo_small_icon_whiteandyellow.png') }}">
        <title>SpaceMovie</title>

		<style>
      .gradient {
        background: rgb(108,183,247);
        background: linear-gradient(90deg, rgba(108,183,247,1) 41%, rgba(95,235,255,1) 97%);
      }
    </style>
    </head>
    <body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
        @include('User.layouts.usrnavbar')

        <main>
            {{ $slot }}
        </main>

        @include('User.layouts.usrfooter')

        <script src="{{ asset('js/app.js') }}" defer></script>

        <script>
        var scrollpos = window.scrollY;
        var header = document.getElementById("header");
        var navcontent = document.getElementById("nav-content");
        var navaction = document.getElementById("navAction");
        var brandname = document.getElementById("brandname");
        var toToggle = document.querySelectorAll(".toggleColour");

        document.addEventListener("scroll", function () {
          /*Apply classes for slide in bar*/
          scrollpos = window.scrollY;

          if (scrollpos > 10) {
            header.classList.add("bg-white");
            navaction.classList.remove("bg-white");
            navaction.classList.add("gradient");
            navaction.classList.remove("text-gray-800");
            navaction.classList.add("text-white");
            //Use to switch toggleColour colours
            for (var i = 0; i < toToggle.length; i++) {
              toToggle[i].classList.add("text-gray-800");
              toToggle[i].classList.remove("text-white");
            }
            header.classList.add("shadow");
            navcontent.classList.remove("bg-gray-100");
            navcontent.classList.add("bg-white");
          } else {
            header.classList.remove("bg-white");
            navaction.classList.remove("gradient");
            navaction.classList.add("bg-white");
            navaction.classList.remove("text-white");
            navaction.classList.add("text-gray-800");
            //Use to switch toggleColour colours
            for (var i = 0; i < toToggle.length; i++) {
              toToggle[i].classList.add("text-white");
              toToggle[i].classList.remove("text-gray-800");
            }

            header.classList.remove("shadow");
            navcontent.classList.remove("bg-white");
            navcontent.classList.add("bg-gray-100");
          }
        });
      </script>
      <script>
        var navMenuDiv = document.getElementById("nav-content");
        var navMenu = document.getElementById("nav-toggle");

        document.onclick = check;
        function check(e) {
          var target = (e && e.target) || (event && event.srcElement);

          if (!checkParent(target, navMenuDiv)) {
            if (checkParent(target, navMenu)) {
              if (navMenuDiv.classList.contains("hidden")) {
                navMenuDiv.classList.remove("hidden");
              } else {
                navMenuDiv.classList.add("hidden");
              }
            } else {
              navMenuDiv.classList.add("hidden");
            }
          }
        }
        function checkParent(t, elm) {
          while (t.parentNode) {
            if (t == elm) {
              return true;
            }
            t = t.parentNode;
          }
          return false;
        }
      </script>
    </body>
</html>