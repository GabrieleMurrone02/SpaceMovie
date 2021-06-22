<x-user-layout>
    <div class="pt-24">
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
          <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
            <h1 class="my-4 text-5xl font-bold leading-tight">
                Proiezioni
            </h1>
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
        <div class="m-auto" style="text-align: center; width: 60%;">
            @if ($proiez != '[]')
                @foreach ($proiez as $item)
                    <div class="container mt-20 mx-auto p-4 md:p-0 mb-20">
                        <div class="shadow-lg flex flex-wrap w-full lg:w-4/5 mx-auto">
                            <div class="bg-cover bg-center w-full h-96 md:w-1/3 relative" style="background-image:url(../Foto/film/{{ $item->idFilm }}.jpeg)">
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
                                      <hr class="w-1/4 md:ml-0 mt-4  border lg:hidden">
                                  </div>
                                  <div class="w-full lg:w-3/5 lg:px-3">
                                      <p class="text-md text-black mt-4 lg:mt-0 text-justify md:text-left text-sm ml-5">
                                          Durata: {{ $item->durata }}<br>
                                          Cinema: {{ $item->nome }} <br>
                                          Genere: {{ $item->genere }} <br>
                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar mt-3" viewBox="0 0 16 16">
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                          </svg>{{ $item->data }}
                                          
                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock mt-3" viewBox="0 0 16 16">
                                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                                          </svg>{{ $item->orario }}
                                      </p>
                                  </div>
                                  <div class="w-full lg:w-1/5 mt-6 lg:mt-0 lg:px-4 text-center md:text-left">
                                      @if ($item->capienza - $item->bigVend > 0)
                                      <div class="flex justify-center">
                                        <form method="POST" action="{{ route('addCart') }}">
                                          @csrf
                                          <input type="hidden" value="{{ $item->idProiez }}" name="idProiez">
                                          <select name="tipologia" class="text-black w-28">
                                            <option value="13.99">Premium</option>
                                            <option value="9.99">Avanzato</option>
                                            <option value="7.99">Base</option>
                                          </select>
                                          <button type="submit" class="text-black mt-3 ml-5 text-green-500">
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="25" width="25"
                                              viewBox="0 0 243.5 243.5" style="enable-background:new 0 0 243.5 243.5;" xml:space="preserve">
                                              <g>
                                                <path d="M113.403,157.775c0.399,3.858,3.655,6.729,7.451,6.729c0.258,0,0.518-0.013,0.78-0.04c4.12-0.426,7.115-4.111,6.689-8.232
                                                  l-3.458-33.468c-0.426-4.121-4.11-7.112-8.231-6.689c-4.12,0.426-7.115,4.111-6.69,8.231L113.403,157.775z"/>
                                                <path d="M160.338,164.464c0.262,0.027,0.522,0.04,0.78,0.04c3.795,0,7.052-2.872,7.451-6.729l3.458-33.468
                                                  c0.426-4.121-2.569-7.806-6.689-8.231c-4.121-0.422-7.806,2.57-8.232,6.689l-3.458,33.468
                                                  C153.223,160.354,156.218,164.039,160.338,164.464z"/>
                                                <path d="M102.266,197.064c-12.801,0-23.215,10.414-23.215,23.215c0,12.804,10.414,23.221,23.215,23.221
                                                  c12.801,0,23.216-10.417,23.216-23.221C125.481,207.479,115.067,197.064,102.266,197.064z M102.266,228.5
                                                  c-4.53,0-8.215-3.688-8.215-8.221c0-4.53,3.685-8.215,8.215-8.215c4.53,0,8.216,3.685,8.216,8.215
                                                  C110.481,224.812,106.796,228.5,102.266,228.5z"/>
                                                <path d="M179.707,197.064c-12.801,0-23.216,10.414-23.216,23.215c0,12.804,10.415,23.221,23.216,23.221
                                                  c12.802,0,23.218-10.417,23.218-23.221C202.925,207.479,192.509,197.064,179.707,197.064z M179.707,228.5
                                                  c-4.53,0-8.216-3.688-8.216-8.221c0-4.53,3.686-8.215,8.216-8.215c4.531,0,8.218,3.685,8.218,8.215
                                                  C187.925,224.812,184.238,228.5,179.707,228.5z"/>
                                                <path d="M224.569,91.057c-1.42-1.837-3.611-2.913-5.933-2.913H69.141l-6.277-24.141c-0.86-3.305-3.844-5.612-7.259-5.612h-30.74
                                                  c-4.142,0-7.5,3.358-7.5,7.5s3.358,7.5,7.5,7.5h24.941l6.221,23.922c0.034,0.15,0.073,0.299,0.116,0.446l23.15,89.022
                                                  c0.86,3.305,3.844,5.612,7.259,5.612h108.874c3.415,0,6.399-2.307,7.259-5.612l23.211-89.25
                                                  C226.478,95.285,225.989,92.894,224.569,91.057z M189.626,177.395H92.35l-19.309-74.25h135.894L189.626,177.395z"/>
                                                <path d="M135.674,74.826c1.464,1.464,3.384,2.197,5.303,2.197c1.92,0,3.839-0.732,5.303-2.197l24.28-24.28
                                                  c2.929-2.929,2.929-7.678,0-10.606c-2.929-2.928-7.678-2.928-10.606,0l-11.468,11.468l0.002-43.907
                                                  c0-4.142-3.357-7.501-7.499-7.501h-0.001c-4.142,0-7.5,3.358-7.5,7.499l-0.002,43.925l-11.468-11.468
                                                  c-2.929-2.929-7.678-2.929-10.606,0c-2.929,2.929-2.929,7.678,0,10.606L135.674,74.826z"/>
                                              </g>
                                              <g>
                                              </g>
                                              <g>
                                              </g>
                                              <g>
                                              </g>
                                              <g>
                                              </g>
                                              <g>
                                              </g>
                                              <g>
                                              </g>
                                              <g>
                                              </g>
                                              <g>
                                              </g>
                                              <g>
                                              </g>
                                              <g>
                                              </g>
                                              <g>
                                              </g>
                                              <g>
                                              </g>
                                              <g>
                                              </g>
                                              <g>
                                              </g>
                                              <g>
                                              </g>
                                            </svg>
                                          </button>
                                        </form>
                                      </div>
                                      @else
                                        <p class="font-bold text-red-500">Posti Esauriti</p>
                                      @endif
                                  </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
              <section class="hero container max-w-screen-lg mx-auto pb-10">
                <img class="w-96 inline-block align-middle mx-auto" src="{{ asset('Foto/error.png') }}">
              </section>
            @endif
        </div>
    </section>
</x-user-layout>