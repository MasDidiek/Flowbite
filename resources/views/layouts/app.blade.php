<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Flowbite and Laravel Starter') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>
        /* Border untuk table DataTables */
        table.dataTable,
        table.dataTable th,
        table.dataTable td {
            border-bottom: 1px solid #EEE !important;
            padding:15px !important;

        }

        table.dataTable {
            border-collapse: collapse !important;
        }

        /* --- Search input --- */
        .dataTables_filter input {
            border:1px solid #DDD !important;
            width: 200px !important;
            border-radius:10px !important;
        }

        .dataTables_length, .dataTables_filter{
            margin:15px
        }
        /* --- Show entries dropdown --- */
        .dataTables_length select {
            @apply border border-gray-300 rounded px-2 py-1 text-sm focus:ring-amber-400 focus:border-amber-400;
            width: 70px !important;

        }

        /* --- Pagination --- */
        .dataTables_paginate .paginate_button {
            font-size:13px;
            color:#8B8983;
            border:1px solid #EEE !important;
        }

        /* Hover */
        .dataTables_paginate .paginate_button:hover {
            background:#227BC9 !important;
            color : #2476BD !important;
            border:1px solid #227BC9 !important;
        }

        /* Active page */
        .dataTables_paginate .paginate_button.current {
            background:#E7F2FD !important;
            color : #FFF !important;
            border:1px solid #BDDAF3  !important;
        }

        .dataTables_paginate .paginate_button.current:hover {
            color:#333 !important;
        }

        /* Remove the blue focus shadow */
        .dataTables_paginate .paginate_button:focus {
            outline: none !important;
            box-shadow: none !important;
        }


        /* Perbesar dropdown "Show entries" */
        .dataTables_length label select {
            background-color: #fff;
            color: #374151;
            padding: 8px 12px;
            border-radius: 0.5rem;
            border: 1px solid #d1d5db;
            height: 30px;
            width:60px;
            margin-bottom:10px;
        }

        .dataTables_length label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.875rem;
            color: #374151; /* text-gray-700 */
        }

        .dataTables_info{
            font-size:13px;
            margin:15px;
        }
    </style>

</head>
<body>

<div
    x-data="{ show: false, message: '' }"
    x-show="show"
    x-transition
    x-init="
        window.addEventListener('toast', event => {
            message = event.detail.message;
            show = true;
            setTimeout(() => show = false, event.detail.duration || 3000);
        })
    "
    class="fixed top-5 right-5 z-[100000]"
>
    <div class="bg-green-600 text-white px-4 py-3 rounded-lg shadow-lg flex items-center space-x-3">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="white" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M5 13l4 4L19 7" />
        </svg>
        <span x-text="message"></span>
    </div>
</div>


@include("layouts.sidebar")



<nav class="bg-white  w-full z-20 top-0 start-0 border-b border-default">
    <div class="flex flex-wrap items-right justify-between mx-auto p-4">
        <a href="https://flowbite.com/" class="flex items-right space-x-3 rtl:space-x-reverse">

        </a>
        <div class="flex items-right md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button type="button" class="flex text-sm bg-neutral-primary rounded-full md:me-0 focus:ring-4 focus:ring-neutral-tertiary" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="{{ asset('images/avatar1.png') }}" alt="user photo">
                <span class="ml-2 p-2">Mas Didiek</span>
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-44" id="user-dropdown">
                <div class="px-4 py-3 text-sm border-b border-default">
                    <span class="block text-heading font-medium">Joseph McFall</span>
                    <span class="block text-body truncate">name@flowbite.com</span>
                </div>
                <ul class="p-2 text-sm text-body font-medium" aria-labelledby="user-menu-button">
                    <li>
                        <a href="#" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Dashboard</a>
                    </li>
                    <li>
                        <a href="#" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Settings</a>
                    </li>
                    <li>
                        <a href="#" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Earnings</a>
                    </li>
                    <li>
                        <a href="#" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Sign out</a>
                    </li>
                </ul>
            </div>
            <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-body rounded-base md:hidden hover:bg-neutral-secondary-soft hover:text-heading focus:outline-none focus:ring-2 focus:ring-neutral-tertiary" aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/></svg>
            </button>
        </div>

    </div>
</nav>


@yield('content')


<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

@stack('scripts')
</body>
</html>
