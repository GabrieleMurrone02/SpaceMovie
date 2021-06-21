<x-user-layout>
    <div class="pt-24">
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
          <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
            <h1 class="my-4 text-5xl font-bold leading-tight">
                Carrello
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
        <div class="m-auto" style="text-align: center; width: 50%;">
            <div >
                @if ($cart == '[]')
                <form action="{{ route('dashboard') }}" method="GET">
                  <button class="border-blue-600 text-blue-600 bg-transparent dark:text-gray-100 dark:bg-indigo-700 border px-4 py-2 text-lg mt-20 mb-20 font-medium leading-3 rounded focus:outline-none hover:opacity-50">Carrello Vuoto!</button>
                </form>
                @else
                    <p class="hidden">{{ $tot = 0 }}</p>
                    @foreach ($cart as $item)
                        <p class="hidden">{{ $tot = $tot + $item->tipologia * $item->quantita }}</p>
                    @endforeach
                    <p class="text-3xl text-bold mt-3 text-black">Totale: €{{ $tot }}</p>
                    <form action="{{ route('buy') }}" method="POST">
                        @csrf
                        <button type="submit"  class="border-blue-600 text-blue-600 bg-transparent dark:text-gray-100 dark:bg-indigo-700 border px-4 py-2 text-sm font-medium leading-3 rounded focus:outline-none mt-5 hover:opacity-50">Procedi con l'acquisto</button>
                    </form>
                @endif
            </div>
            @foreach ($cart as $item)
                <div class="container mt-20 mx-auto p-4 md:p-0 mb-20">
                <div class="shadow-lg flex flex-wrap w-full lg:w-4/5 mx-auto">
                    <div class="bg-cover bg-bottom border w-full md:w-1/3  h-80 relative" style="background-image:url(Foto/film/{{ $item->idFilm }}.jpg)">
                    <div class="absolute text-xl">
                        <i class="fa fa-heart text-white hover:text-red-light ml-4 mt-4 cursor-pointer"></i>
                    </div>
                    </div>
                    <div class="bg-white w-full md:w-2/3">
                    <div class="h-full mx-auto px-6 md:px-0 md:pt-6 md:-ml-6 relative">
                        <div class="bg-white lg:h-full p-6 -mt-6 md:mt-0 relative mb-4 md:mb-0 flex flex-wrap md:flex-wrap items-center">
                        <div class="w-full lg:w-1/5 lg:border-right lg:border-solid text-center md:text-left">
                            <h3 class="text-black">{{ $item->titolo }}</h3>
                            <p class="mb-0 mt-3 text-grey-dark text-sm italic"></p>
                            <hr class="w-1/4 md:ml-0 mt-4  border lg:hidden">
                        </div>
                        <div class="w-full lg:w-3/5 lg:px-3">
                            <p class="text-md mt-4 lg:mt-0 text-justify md:text-left text-sm ml-5 text-black">
                                Cinema: {{ $item->nome }}<br>
                                Sala: {{ $item->idSala }}<br>
                                Data: {{ $item->data }}<br>
                                Orario: {{ $item->orario }}<br>
                                Prezzo: €{{ $item->tipologia }}
                            </p>
                        </div>
                        <div class="w-full lg:w-1/5 mt-6 lg:mt-0 lg:px-4 text-center md:text-left">
                            <form action="{{ route('updateCart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->idCar }}">
                                <input type="number" name="quantita" value="{{ $item->quantita }}" class="text-black w-20 h-8 mb-3" min="0" max="{{ $item->capienza - $item->bigVend }}">
                                <button type="submit" class="border-blue-600 text-blue-600 bg-transparent dark:text-gray-100 dark:bg-indigo-700 border px-4 py-2 text-sm font-medium leading-3 rounded focus:outline-none hover:opacity-50">Aggiorna</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            @endforeach
        </div>
    </section>
</x-user-layout>