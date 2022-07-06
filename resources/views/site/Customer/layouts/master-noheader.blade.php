@include('sweetalert::alert')

<!DOCTYPE html>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="_token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        @section('header-scripts')

        @show
        <title>  @yield('title')</title>
        @livewireStyles

   </head>


        <body class="main font-iranyekan bg-[#f3f4f6] flex flex-col h-screen justify-between" >

          @livewireScripts
          <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>




              <main class="my-auto">

                    @section('content')

                    @show

              </main>






              

          <script>
            feather.replace()
          </script>
         


            @section('footer-scripts')

            @show




            <x-livewire-alert::scripts />

        </body>


</html>
