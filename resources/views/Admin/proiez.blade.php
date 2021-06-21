<x-admin-layout>
    <table class="border-collapse w-full">
        <thead class="bg-gray-800 text-white gradient">
            <tr>
                <th class="p-3 font-bold uppercase hidden lg:table-cell">Id</th>
                <th class="p-3 font-bold uppercase hidden lg:table-cell">Sala</th>
                <th class="p-3 font-bold uppercase hidden lg:table-cell">Film</th>
                <th class="p-3 font-bold uppercase hidden lg:table-cell">Data</th>
                <th class="p-3 font-bold uppercase hidden lg:table-cell">Orario</th>
                <th class="p-3 font-bold uppercase hidden lg:table-cell">Biglietti Venduti</th>
                <th class="p-3 font-bold uppercase hidden lg:table-cell">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="text-black lg:hidden absolute top-0 left-0  px-2 py-1 text-xs font-bold uppercase">Id</span>
                        {{ $item->idProiez }}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="text-black lg:hidden absolute top-0 left-0  px-2 py-1 text-xs font-bold uppercase">Sala</span>
                        {{ $item->sala }}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="text-black lg:hidden absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase">Film</span>
                        {{ $item->titolo }}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="text-black lg:hidden absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase">Data</span>
                        {{ $item->data }}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="text-black lg:hidden absolute top-0 left-0  px-2 py-1 text-xs font-bold uppercase">Orario</span>
                        {{ $item->orario }}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="text-black lg:hidden absolute top-0 left-0  px-2 py-1 text-xs font-bold uppercase">Biglietti Venduti</span>
                        {{ $item->bigVend }}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="text-black lg:hidden absolute top-0 left-0  px-2 py-1 text-xs font-bold uppercase">Azioni</span>
                        <form action="{{ route('removeProiezione') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $item->idProiez }}" name="id">
                            <button type="submit" class="mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Insert -->
        <div
            class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
            x-show="showModal2"
            x-transition:enter="transition duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        >
            <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
                <div
                    class="relative bg-white shadow-lg rounded-lg text-gray-900 z-20"
                    @click.away="showModal2 = false"
                    x-show="showModal2"
                    x-transition:enter="transition transform duration-300"
                    x-transition:enter-start="scale-0"
                    x-transition:enter-end="scale-100"
                    x-transition:leave="transition transform duration-300"
                    x-transition:leave-start="scale-100"
                    x-transition:leave-end="scale-0"
                >
                    <header class="flex flex-col justify-center items-center p-3 text-gray-800">
                        <h2 class="font-semibold text-2xl">Inserisci</h2>
                    </header>
                    <main class="p-3 text-center">
                        <form action="{{ route('addProiezione') }}" method="POST">
                            @csrf
                            <select name="sala" class="mb-2" style="width: 200px" required>
                                @foreach ($sala as $item)
                                    <option value="{{ $item->idSala }}">Id Sala: {{ $item->idSala }}</option>
                                @endforeach
                            </select> <br>
                            <select name="film" class="mb-2" style="width: 200px" required>
                                @foreach ($film as $item)
                                    <option value="{{ $item->idFilm }}">{{ $item->titolo }}</option>
                                @endforeach
                            </select> <br>
                            <input type="date" name="data" class="mb-2" style="width: 200px" id="datefield1" required> <br>
                            <input type="time" name="orario" min="08:30" max="22:30" class="mb-2" style="width: 200px" required> <br>
                            <input type="hidden" name="bigVend" value="0"> <br>
                            <button type="submit" class="text-gray-800 font-semibold text-white p-2 w-32 rounded-full hover:bg-gray-800 hover:text-white focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2">Aggiungi</button>
                        </form>
                    </main>
                </div>
            </div>
        </div>
        <!-- Update -->
        <div
            class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
            x-show="showModal3"
            x-transition:enter="transition duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        >
            <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto mt-10 mb-24 opacity-100">
                <div
                    class="relative bg-white shadow-lg rounded-lg text-gray-900 z-20"
                    @click.away="showModal3 = false"
                    x-show="showModal3"
                    x-transition:enter="transition transform duration-300"
                    x-transition:enter-start="scale-0"
                    x-transition:enter-end="scale-100"
                    x-transition:leave="transition transform duration-300"
                    x-transition:leave-start="scale-100"
                    x-transition:leave-end="scale-0"
                >
                    <header class="flex flex-col justify-center items-center p-3 text-gray-800">
                        <h2 class="font-semibold text-2xl">Modifica</h2>
                    </header>
                    <main class="p-3 text-center">
                        <form action="{{ route('updateProiezione') }}" method="POST">
                            @csrf
                            <select name="id" class="mb-2" style="width: 200px">
                                @foreach ($data as $item)
                                    <option value="{{ $item->idProiez }}">Id: {{ $item->idProiez }}</option>
                                @endforeach
                            </select><br>
                            <input type="date" name="data" placeholder="Data" style="width: 200px" id="datefield" class="mb-2"> <br>
                            <input type="time" name="orario" placeholder="Orario" style="width: 200px" class="mb-2"> <br>
                            <input type="number" name="bigVend" placeholder="Biglietti Venduti" class="mb-2"> <br>
                            <button type="submit" class="text-gray-800 font-semibold text-white p-2 w-32 rounded-full hover:bg-gray-800 hover:text-white focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2">Modifica</button>
                        </form>
                    </main>
                </div>
            </div>
        </div>
</x-admin-layout>