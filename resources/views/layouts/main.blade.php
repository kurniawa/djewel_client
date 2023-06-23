<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="fonts/Nunito-Fontface/stylesheet.css"> --}}
    {{-- <link rel="stylesheet" href="fonts/Roboto-Fontface/stylesheet.css"> --}}
    {{-- <link rel="stylesheet" href="css/fonts.css"> --}}
    {{-- <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('js/jquery-ui-1.12.1/jquery-ui.css') }}">
    <script src="{{ asset('js/jquery-ui-1.12.1/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/jquery.table2excel.js') }}"></script>
    <script src="{{ asset('js/functions.js') }}"></script> --}}


    <title>@yield('title')</title>
</head>

<body class="relative">
    {{-- NAVBAR --}}
    <div id="nav_cart_close_layer" class="absolute top-0 bottom-0 left-0 right-0 hidden z-30" onclick="hideNavCart()"></div>
    <nav class="h-11 bg-violet-400 text-white flex justify-between items-center pl-3" x-data="{show_dd:false}">
        <div class="flex items-center">
            @if (isset($goback))
            @if ($goback!=='')
            @if (isset($previous_data))
            <a href="{{ route($goback, $previous_data) }}" class="text-white font-bold bg-orange-500 rounded p-1">
            @else
            <a href="{{ route($goback) }}" class="text-white font-bold bg-orange-500 rounded p-1">
            @endif
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="6" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </a>
            @endif
            @endif
            <a href="/" class="text-white h-11 flex items-center ml-3"
                ><span class="font-semibold text-xl">Djewel Client</span></a
            >
        </div>
        <div class="flex items-center">
            @auth
            <form action="{{ route('logout') }}" method="post" class="flex">
                @csrf
                <button class="py-1 px-2 rounded bg-pink-500 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>
                </button>
            </form>
            @endauth
        </div>
    </nav>
    {{-- END: NAVBAR --}}
    @yield('content')
    <div class="mx-8 rounded mt-5 text-center p-3 bg-indigo-900">
        @auth
        <span class="font-bold text-white">User logged in!</span><br>
        <span class="text-yellow-300">Username: </span><span class="text-sky-300 font-bold">{{ Auth::user()->username }}</span>
        @endauth
        @guest
        <span class="text-white">User is not logged in!</span>
        @endguest
    </div>

</body>

<script>
    function showDropdown(id) {
        $selectedDiv = $("#divDetailDropdown-" + id);
        $selectedDiv.toggle(400);

        if (show_console) {
            console.log(`run dropdown! ID=${id}`);
            console.log('#divDetailDropdown:');console.log($selectedDiv);
            console.log('#divDetailDropdown.css(display):');console.log($selectedDiv.css('display'));
        }

        setTimeout(() => {
            // console.log(`$selectedDiv.css("display") = ${$selectedDiv.css("display")}`);
            if ($selectedDiv.css("display") === "block" || $selectedDiv.css("display") === "table-row") {
                $("#divDropdownIcon-" + id + " img").attr("src", "/img/icons/dropup.svg");
            } else {
                $("#divDropdownIcon-" + id + " img").attr("src", "/img/icons/dropdown.svg");
            }
        }, 450);
    }

    function showDropdownMultiple(dd_btn_id, dd_content_id) {
        $selectedDiv = $(`#${dd_content_id}`);
        // console.log($selectedDiv.css("display"));
        let dd_content = document.getElementById(dd_content_id);
        let dd_btn = document.getElementById(dd_btn_id);
        if ($selectedDiv.css("display") === "block" || $selectedDiv.css("display") === "table-row") {
            dd_btn.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
            `;
        } else {
            dd_btn.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
            </svg>
            `;
        }
        $selectedDiv.toggle(400);
    }


    var number_to_format_k=document.querySelectorAll('.toFormatNumberK');
    number_to_format_k.forEach(element => {
        formatNumberK(parseInt(element.textContent), element);
    });

    var number_to_format=document.querySelectorAll('.toFormatNumber');
    number_to_format.forEach(element => {
        formatNumber(parseInt(element.textContent), element);
    });
    var number_to_format=document.querySelectorAll('.toFormatCurrencyRp');
    number_to_format.forEach(element => {
        formatCurrencyRp(parseInt(element.textContent), element);
    });
    // history.pushState(null, document.title, location.href);
    // window.addEventListener('popstate', function (event)
    // {
    // history.pushState(null, document.title, location.href);
    // });
</script>

</html>
