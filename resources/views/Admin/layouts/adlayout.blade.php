<html>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="icon" href="{{ asset('Foto/loghi/logo_small_icon_whiteandyellow.png') }}">
        <title>SpaceMovie</title>

        <style>
            .gradient{
                background: rgb(108,183,247);
                background: linear-gradient(90deg, rgba(108,183,247,1) 41%, rgba(95,235,255,1) 97%);
            }
        </style>
    </head>
    <body x-data="{ showModal2: false, showModal3: false }" :class="{'overflow-y-hidden': showModal2 || showModal3}">
        @include('Admin.layouts.adnavbar')

        <main>
            {{ $slot }}
        </main>

        @include('Admin.layouts.adfooter')

        <script>
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1;
            var yyyy = today.getFullYear();
            if(dd<10){
                    dd='0'+dd
                } 
                if(mm<10){
                    mm='0'+mm
                } 

            today = yyyy+'-'+mm+'-'+dd;
            document.getElementById("datefield").setAttribute("min", today);
            document.getElementById("datefield1").setAttribute("min", today);
        </script>
        <script src="{{ asset('js/app.js') }}" defer></script> 
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    </body>
</html>