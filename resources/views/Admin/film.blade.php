<x-admin-layout>
    <table class="border-collapse w-full">
        <thead class="bg-gray-800 text-white gradient">
            <tr>
                <th class="p-3 font-bold uppercase hidden lg:table-cell">Titolo</th>
                <th class="p-3 font-bold uppercase hidden lg:table-cell">Genere</th>
                <th class="p-3 font-bold uppercase hidden lg:table-cell">Durata</th>
                <th class="p-3 font-bold uppercase hidden lg:table-cell">Uscita</th>
                <th class="p-3 font-bold uppercase hidden lg:table-cell">Regista/i</th>
                <th class="p-3 font-bold uppercase hidden lg:table-cell">Attore Principale</th>
                <th class="p-3 font-bold uppercase hidden lg:table-cell">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Titolo</span>
                        {{ $item->titolo }}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Genere</span>
                        {{ $item->genere }}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Durata</span>
                        {{ $item->durata }}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Uscita</span>
                        {{ $item->uscita }}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Regista/i</span>
                        {{ $item->regista }}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Attore Principale</span>
                        {{ $item->attori }}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Azioni</span>
                        <form action="{{ route('removeFilm') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $item->idFilm }}" name="id">
                            <button type="submit" class="mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3
                                    4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
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
                        <form action="{{ route('addFilm') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="titolo" class="mb-2" placeholder="Titolo" required> <br>
                            <textarea name="desc" rows="10" cols="23" class="mb-2"></textarea> <br>
                            <input type="text" name="genere" class="mb-2" placeholder="Genere" required> <br>
                            <input type="date" name="uscita" class="mb-2" min="1900-01-01" placeholder="Data" style="width: 200px" required> <br>
                            <input type="text" name="regista" class="mb-2" placeholder="Regista" required> <br>
                            <input type="number" name="vmd" class="mb-2" placeholder="Vietato Ai Minori Di:" required> <br>
                            <input type="time" name="durata" class="mb-2" placeholder="Durata" style="width: 200px" min="00:01" max="06:00" required> <br>
                            <input type="text" name="attori" class="mb-2" placeholder="Attori" required> <br>
                            <label for="foto">Foto: </label>
                            <input type="file" name="foto" id="foto" accept=".jpeg" class="mb-2" required> <br> 
                            <label for="copertina">Copertina: </label>
                            <input type="file" name="copertina" id="copertina" accept=".jpeg" class="mb-2" required> <br> 
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
                        <form action="{{ route('updateFilm') }}" method="POST">
                            @csrf
                            <select name="id" class="mb-2" style="width: 200px">
                                @foreach ($data as $item)
                                    <option value="{{ $item->idFilm }}">{{ $item->titolo }}</option>
                                @endforeach
                            </select><br>
                            <input type="text" placeholder="Titolo" name="titolo" class="mb-2"> <br>
                            <input type="text" placeholder="Genere" name="genere" class="mb-2"> <br>
                            <input type="time" name="durata" class="mb-2" placeholder="Durata" style="width: 200px" min="00:01" max="06:00" class="mb-2"> <br>
                            <input type="number" name="vmd" class="mb-2" placeholder="Vietato Ai Minori Di:"> <br>
                            <button type="submit" class="text-gray-800 font-semibold text-white p-2 w-32 rounded-full hover:bg-gray-800 hover:text-white focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2">Modifica</button>
                        </form>
                    </main>
                </div>
            </div>
        </div>
</x-admin-layout>