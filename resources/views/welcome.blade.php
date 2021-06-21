<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>SpaceMovie</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="icon" href="{{ asset('Foto/loghi/logo_small_icon_whiteandyellow.png') }}">

        <style>
      .gradient {
        background: rgb(108,183,247);
        background: linear-gradient(90deg, rgba(108,183,247,1) 41%, rgba(95,235,255,1) 97%);
      }
    </style>
  </head>
  <body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
    @include('welcomenav')
    <div class="pt-24">
      <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
          <h1 class="my-4 text-3xl font-bold leading-tight block lg:hidden">
            Benvenuto Nel Sito Ufficiale Di SpaceMovie!
          </h1>
          <h1 class="my-4 text-5xl font-bold leading-tight hidden lg:block">
            Benvenuto Nel Sito Ufficiale Di SpaceMovie!
          </h1>
          <div class="block lg:hidden mb-8"></div>
          <div class="hidden lg:block">
            <p class="leading-normal text-2xl mb-8">
            Prenota Qui Il Tuo Biglietto!
          </p>
          </div>
        </div>
      </div>
    </div>
    <div class="relative -mt-12 lg:-mt-24">
      <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
            <path
              d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
              opacity="0.100000001"
            ></path>
            <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
          </g>
          <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <path
              d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"
            ></path>
          </g>
        </g>
      </svg>
    </div>
    <section class="bg-white border-b py-8">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800 hidden lg:block">
          In Primo Piano
        </h1>
        <h1 class="w-full my-2 text-3xl font-bold leading-tight text-center text-gray-800 block lg:hidden">
          In Primo Piano
        </h1>
        <div class="w-full mb-4 hidden lg:block">
          <div class="h-1 mx-auto gradient w-96 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="sliderAx h-auto">
          <div id="slider-1" class="container mx-auto">
            <div class="bg-cover bg-center  h-auto text-white py-24 px-10 object-fill" style="background-image: url(Foto/film/{{ $data[0]->idFilm }}-2.jpg)">
              <div class="md:w-1/2">
                <p class="font-bold text-sm uppercase">{{ $data[0]->genere }}</p>
                <p class="text-3xl font-bold">{{ $data[0]->titolo }}</p>
                <p class="text-xl mb-10 leading-none">{{ $data[0]->regista }}</p>
                <a href="film/{{ $data[0]->idFilm }}" class="bg-blue-600 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Vedi</a>
              </div>  
            </div>
            <br>
          </div>

          <div id="slider-2" class="container mx-auto">
            <div class="bg-cover bg-top  h-auto text-white py-24 px-10 object-fill" style="background-image: url(Foto/film/{{ $data[1]->idFilm }}-2.jpg)">
              <p class="font-bold text-sm uppercase">{{ $data[1]->genere }}</p>
              <p class="text-3xl font-bold">{{ $data[1]->titolo }}</p>
              <p class="text-xl mb-10 leading-none">{{ $data[1]->regista }}</p>
              <a href="film/{{ $data[1]->idFilm }}" class="bg-blue-600 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Vedi</a>
            </div>
            <br>
          </div>
        </div>
        <div  class="flex justify-between w-12 mx-auto pb-2">
          <button id="sButton1" onclick="sliderButton1()" class="gradient rounded-full w-4 pb-2 " ></button>
          <button id="sButton2" onclick="sliderButton2() " class="gradient rounded-full w-4 p-2"></button>
        </div>
      </div>
    </section>
    <section class="bg-white border-b py-8">
      <div class="container mx-auto flex flex-wrap pt-4 pb-12">
        <h1 class="w-full my-2 text-3xl font-bold leading-tight text-center text-gray-800 block lg:hidden">
          In Proiezione
        </h1>
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800 hidden lg:block">
          In Proiezione
        </h1>
        <div class="w-full mb-4 hidden lg:block">
          <div class="h-1 mx-auto gradient w-80 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="m-auto" style="text-align: center; width: 75%;">
          @foreach ($data as $item)
            <div class="container mt-20 mx-auto p-4 md:p-0 mb-20">
                <div class="shadow-lg flex flex-wrap w-full lg:w-4/5 mx-auto">
                    <div class="bg-cover bg-center w-full h-96 md:w-1/3 relative" style="background-image:url(Foto/film/{{ $item->idFilm }}.jpg)">
                    <div class="absolute text-xl">
                        <i class="fa fa-heart text-white hover:text-red-light ml-4 mt-4 cursor-pointer"></i>
                    </div>
                    </div>
                    <div class="bg-white w-full md:w-2/3">
                    <div class="h-full mx-auto px-6 md:px-0 md:pt-6 md:-ml-6 relative">
                        <div class="bg-white lg:h-full p-6 -mt-6 md:mt-0 relative mb-4 md:mb-0 flex flex-wrap md:flex-wrap items-center">
                        <div class="w-full lg:w-1/5 lg:border-right lg:border-solid text-center md:text-left">
                            <h3 class="text-black ">{{ $item->titolo }}</h3>
                            <p class="mb-0 mt-3 text-black text-sm italic">{{ $item->regista }}</p>
                        </div>
                        <div class="w-full lg:w-3/5 lg:px-3">
                            <p class="text-md text-black mt-4 lg:mt-0 text-justify md:text-left text-sm ml-5">
                                Durata: {{ $item->durata }}<br>
                                Uscita: {{ $item->uscita }} <br>
                                Genere: {{ $item->genere }}
                            </p>
                        </div>
                        <div class="w-full lg:w-1/5 mt-6 lg:mt-0 lg:px-4 text-center flex justify-center md:text-left">
                            <a class="no-underline text-black" href="film/{{ $item->idFilm }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
          @endforeach
        </div>
      </section>
      <section class="bg-gray-100 py-8">
        <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
          <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800 hidden lg:block">
            Prezzi
          </h1>
          <h1 class="w-full my-2 text-3xl font-bold leading-tight text-center text-gray-800 block lg:hidden">
            Prezzi
          </h1>
          <div class="w-full mb-4 hidden lg:block">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
          </div>
          <div class="flex flex-col sm:flex-row justify-center pt-12 my-12 sm:my-4">
            <div class="flex flex-col w-5/6 lg:w-1/4 mx-auto lg:mx-0 rounded-none lg:rounded-l-lg bg-white mt-4">
              <div class="flex-1 bg-white text-gray-600 rounded-t rounded-b-none overflow-hidden shadow">
                <div class="p-8 text-3xl font-bold text-center border-b-4">
                  Base
                </div>
                <ul class="w-full text-center text-sm">
                  <li class="border-b py-4">Prime File</li>
                  <li class="border-b py-4">Occhiali 3D</li>
                </ul>
              </div>
              <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                <div class="w-full pt-6 text-3xl text-gray-600 font-bold text-center mb-10">
                  €7.99
                  <span class="text-base">Cad.</span>
                </div>
              </div>
            </div>
            <div class="flex flex-col w-5/6 lg:w-1/3 mx-auto lg:mx-0 rounded-lg bg-white mt-4 sm:-mt-6 shadow-lg z-10">
              <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                <div class="w-full p-8 text-3xl font-bold text-center">Premium</div>
                <div class="h-1 w-full gradient my-0 py-0 rounded-t"></div>
                <ul class="w-full text-center text-base font-bold">
                  <li class="border-b py-4">File Posteriori</li>
                  <li class="border-b py-4">Occhiali 3D</li>
                  <li class="border-b py-4">Bibita</li>
                  <li class="border-b py-4">Pop-Corn</li>
                </ul>
              </div>
              <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                <div class="w-full pt-6 text-4xl font-bold text-center mb-10">
                  €13.99
                  <span class="text-base">Cad.</span>
                </div>
                <div class="flex items-center justify-center"></div>
              </div>
            </div>
            <div class="flex flex-col w-5/6 lg:w-1/4 mx-auto lg:mx-0 rounded-none lg:rounded-l-lg bg-white mt-4">
              <div class="flex-1 bg-white text-gray-600 rounded-t rounded-b-none overflow-hidden shadow">
                <div class="p-8 text-3xl font-bold text-center border-b-4">
                  Avanzato
                </div>
                <ul class="w-full text-center text-sm">
                  <li class="border-b py-4">File Centrali</li>
                  <li class="border-b py-4">Occhiali 3D</li>
                  <li class="border-b py-4">Bibita</li>
                </ul>
              </div>
              <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                <div class="w-full pt-6 text-3xl text-gray-600 font-bold text-center mb-10">
                  €9.99
                  <span class="text-base">Cad.</span>
                </div>
                <div class="flex items-center justify-center"></div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
            <g class="wave" fill="#F3F4F6">
              <path
                d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"
              ></path>
            </g>
            <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
              <g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
                <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
                <path
                  d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                  opacity="0.100000001"
                ></path>
                <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" opacity="0.200000003"></path>
              </g>
            </g>
          </g>
        </g>
      </svg>
      <section class="container mx-auto text-center py-6 mb-12">
        <section class="hero container max-w-screen-lg mx-auto pb-10">
          <img class="block lg:hidden w-10 inline-block align-middle mx-auto" src="{{ asset('Foto/loghi/logo_small_icon_whiteandyellow.png') }}">
          <img class="hidden lg:block w-auto inline-block align-middle mx-auto" src="{{ asset('Foto/loghi/logo_small.png') }}">
        </section>
        <div class="w-full mb-4">
          <div class="h-1 mx-auto bg-white opacity-25 my-0 py-0 rounded-t" style="width: 600px;"></div>
        </div>
        <h3 class="my-4 text-2xl leading-tight">
          Grazie Per Aver Visitato Il Nostro Sito!
        </h3>
        <p>
          © 2021 by Gabriele Murrone
        </p>
      </section>
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
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
      <script>
        var cont=0;
        function loopSlider(){
          var xx= setInterval(function(){
            switch(cont)
            {
              case 0:{
                $("#slider-1").fadeOut(400);
                $("#slider-2").delay(400).fadeIn(400);
                $("#sButton1").removeClass("bg-purple-800");
                $("#sButton2").addClass("bg-purple-800");
                cont=1;

                break;
              }
              case 1:{
                $("#slider-2").fadeOut(400);
                $("#slider-1").delay(400).fadeIn(400);
                $("#sButton2").removeClass("bg-purple-800");
                $("#sButton1").addClass("bg-purple-800");
                cont=0;
              
                break;
              }
            }},
          8000);
        }

        function reinitLoop(time){
          clearInterval(xx);
          setTimeout(loopSlider(),time);
        }

        function sliderButton1(){
          $("#slider-2").fadeOut(400);
          $("#slider-1").delay(400).fadeIn(400);
          $("#sButton2").removeClass("bg-purple-800");
          $("#sButton1").addClass("bg-purple-800");
          reinitLoop(4000);
          cont=0
        }
        
        function sliderButton2(){
          $("#slider-1").fadeOut(400);
          $("#slider-2").delay(400).fadeIn(400);
          $("#sButton1").removeClass("bg-purple-800");
          $("#sButton2").addClass("bg-purple-800");
          reinitLoop(4000);
          cont=1
        }

        $(window).ready(function(){
          $("#slider-2").hide();
          $("#sButton1").addClass("bg-purple-800");
          loopSlider();
        });
      </script>
    </body>
</html>
