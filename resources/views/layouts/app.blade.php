<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
   
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
    
        <div class="flex">
            <div class="bg-gray-600 min-h-screen">
                <img class="w-60" src="/logo.png" alt="logo">
            </div>
            <div class="grow">
              <div class="h-20 flex justify-between items-center bg-white px-4">
                <div class="h-full flex items-center border-red-500 border-b-4 text-red-500">Products</div>
                <div class="flex space-x-4 text-gray-500">

                <div>Иван Иванов Иванович</div>
    
                              
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="route('logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                     <svg width="24" height="24"  fill-rule="evenodd" clip-rule="evenodd"><path d="M16 2v7h-2v-5h-12v16h12v-5h2v7h-16v-20h16zm2 9v-4l6 5-6 5v-4h-10v-2h10z"/></svg>
                                </a>
                            </form>
                </div>
                
             </div>
             <div class="my-4">
               @yield('content')
             </div>
             
            </div>
           
            
        </div>
        </div>
        @livewireScripts
        @livewire('wire-elements-modal')
    </body>
</html>
