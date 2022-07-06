@include('sweetalert::alert')

<!DOCTYPE html>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="_token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        @section('header-scripts')

        @show
        <title>  @yield('title')</title>
        @livewireStyles

   </head>


        <body class="main font-iranyekan flex flex-col h-screen justify-between" >

            <nav id="introduce" x-data="{ open: false }" class="bg-white fixed w-full z-10 top-0 shadow-md">
                <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                  <div class="relative flex items-center justify-between h-16">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                      <!-- Mobile menu button-->
                      <button type="button" class="inline-flex items-center justify-center bg-gradient-to-tr from-[#00c7ba] to-[#00abc7] shadow-lg rounded-md text-white hover:text-white hover:bg-gradient-to-tr from-[#00c7ba] to-[#00abc7] p-[7px]" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!--
                          Icon when menu is closed.
            
                          Heroicon name: outline/menu
            
                          Menu open: "hidden", Menu closed: "block"
                        -->
                        <svg @click="open = ! open" :class="[open ? 'hidden' : 'block']"
                        class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!--
                          Icon when menu is open.
            
                          Heroicon name: outline/x
            
                          Menu open: "block", Menu closed: "hidden"
                        -->
                        <svg @click="open = ! open" x-cloak class=" h-6 w-6" :class="[open ? 'block' : 'hidden']" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                      </button>
                    </div>
                    <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                      <div class="flex-shrink-0 flex items-center mylogo">
                          <a href="#">
                            <img class="block lg:hidden h-[1.5rem] w-auto pr-[30px]" src="{{'/storage/admin-image/logo.png'}}" alt="Workflow">
                            <img class="hidden lg:block h-[3.5rem] w-auto" src="{{'/storage/admin-image/logo.png'}}" alt="Workflow">
                          </a>
                      </div>
                      <div class="hidden sm:block m-auto">
                        <div x-data="{ listmenu2: $persist(false).using(sessionStorage) , listmenu3: $persist(false).using(sessionStorage) , listmenu4: $persist(false).using(sessionStorage) , listmenu5: $persist(false).using(sessionStorage) , listmenu6: $persist(false).using(sessionStorage) , listmenu: $persist(true).using(sessionStorage)}" class="flex space-x-4">
                          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                          <a @click="listmenu = true ; listmenu2 = false ; listmenu3 = false ; listmenu4 = false ; listmenu5 = false ; listmenu6 = false" :class="listmenu ? 'text-[#25bdb4]' : 'text-[#7e7e7e]' " href="/" class=" border-nav px-3 py-2 text-md font-medium" aria-current="page">صفحه اصلی</a>
            
            
            
                          <a @click="listmenu = false ; listmenu2 = true ; listmenu3 = false ; listmenu4 = false ; listmenu5 = false ; listmenu6 = false" :class="listmenu2 ? 'text-[#25bdb4]' : 'text-[#7e7e7e]' " href="/category/traders" class=" border-nav px-3 py-2 text-md font-medium">مقالات</a>
            
                          <div class="relative" x-data="{ pc: false }"  @mouseover="pc = true"  @mouseleave="pc = false">
                            <button :class="listmenu3 ? 'text-[#25bdb4]' : 'text-[#7e7e7e]' " class="border-nav px-3 py-2 text-md font-medium">
                              <span>خدمات</span>
                              <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': pc, 'rotate-0': !pc}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1 rotate-0"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                            <div x-show="pc" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48" style="display: none;">
                              <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                                <a @click="listmenu = false ; listmenu2 = false ; listmenu3 = true ; listmenu4 = true ; listmenu5 = false ; listmenu6 = false" :class="listmenu4 ? 'text-[#25bdb4]' : 'text-[#7e7e7e]' " class="block px-4 py-2 mt-2 text-md font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="">خدمات 1</a>
                                <a @click="listmenu = false ; listmenu2 = false ; listmenu3 = true ; listmenu4 = false ; listmenu5 = true ; listmenu6 = false" :class="listmenu5 ? 'text-[#25bdb4]' : 'text-[#7e7e7e]' " class="block px-4 py-2 mt-2 text-md font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="">خدمات 2</a>
                                <a @click="listmenu = false ; listmenu2 = false ; listmenu3 = true ; listmenu4 = false ; listmenu5 = false ; listmenu6 = true" :class="listmenu6 ? 'text-[#25bdb4]' : 'text-[#7e7e7e]' " class="block px-4 py-2 mt-2 text-md font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="">خدمات 3</a>
                              </div>
                            </div>
                          </div>
            
                          <a  href="#contact" class="!text-[#4b4b4b] border-nav px-3 py-2 text-md">ارتباط با ما</a>
                        </div>
                      </div>
                    </div>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
            
                      <!-- Profile dropdown -->
                      <div x-data="{ search: false }" class="ml-3 relative">
                        <button @click="search = !search" class="bg-gradient-to-tr from-primary-600 to-primary-900 p-[7px] rounded-full text-white">
                            <span><i class="w-5 h-5 text-white" data-feather="search"></i></span>
                        </button>
                        <div @click.away="search = false" x-show="search" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="fixed sm:absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-80" style="display: none;">
                            <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                                <div class="form-group">
                                    <input type="text" class="w-full text-black rounded-md" id="search" placeholder="جستجو ...." name="search"/>
                                    <div class="text-black search-bar max-h-[130px] overflow-y-scroll">
                                    </div>
                                    </div>
            
                            </div>
                          </div>
                      </div>
            
            
            
                        <div class="flex items-center">
            
                            <a href="" class="bg-gradient-to-tr from-primary-600 to-primary-900 p-[7px] rounded-full text-white">
                                <span><i class="w-5 h-5 text-white" data-feather="user"></i></span>
                            </a>
            
            
                            @guest
                            <a href="{{route('login-register-form')}}" class="hidden sm:block text-sm mr-2 hover:text-[#00c7ba]">ورود / ثبت نام</a>
                            @endguest
                            @auth
                            <div class="mr-2 hidden sm:block">
                                <p class="text-gray-500 text-sm -mb-[2px]">سلام؛ {{auth()->user()->name}}</p>
                                {{-- <a class="flex items-center text-[#25bdb4] text-[10px]" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="text-[#25bdb4]"> <i data-feather="log-out" class="w-3 h-3 mr-2"></i>خروج از حساب</a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                               </form> --}}
                               <a class="flex items-center text-primary-500 text-[10px]" href="#" class="text-[#25bdb4]"> <i data-feather="log-out" class="w-3 h-3 mr-2"></i>مشاهده پروفایل</a>

                              </div>
                            @endauth
                        </div>
            
            
                    </div>
                  </div>
                </div>
            
                <!-- Mobile menu, show/hide based on menu state. -->
                <div x-show="open" x-cloak class="sm:hidden" id="mobile-menu">
                  <div  x-data="{ listmenu2: $persist(false).using(sessionStorage) , listmenu3: $persist(false).using(sessionStorage) , listmenu4: $persist(false).using(sessionStorage) , listmenu5: $persist(false).using(sessionStorage) , listmenu6: $persist(false).using(sessionStorage) , listmenu: $persist(true).using(sessionStorage)}" class="px-5 pt-2 pb-3 space-y-1">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a @click="listmenu = true ; listmenu2 = false ; listmenu3 = false ; listmenu4 = false ; listmenu5 = false ; listmenu6 = false" :class="listmenu ? 'text-[#25bdb4]' : 'text-[#7e7e7e]' " href="/" class=" p-[7px] block px-3 py-2 rounded-md text-base font-medium" aria-current="page">صفحه اصلی</a>
            
                    <a @click="listmenu = false ; listmenu2 = true ; listmenu3 = false ; listmenu4 = false ; listmenu5 = false ; listmenu6 = false" :class="listmenu2 ? 'text-[#25bdb4]' : 'text-[#7e7e7e]' " href="/category/traders" class=" block px-3 py-2 rounded-md text-base font-medium">مصاحبه با تریدرها</a>
            
                    <div @click.away="pc = false" class="relative" x-data="{ pc: false }">
                        <button @click="pc = !pc" :class="listmenu3 ? 'text-[#25bdb4]' : 'text-[#7e7e7e]'" class="border-nav px-3 py-2 text-sm font-medium">
                          <span>تی دبلیو پلاس</span>
                          <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': pc, 'rotate-0': !pc}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1 rotate-0"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div x-show="pc" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="inherit right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48" style="display: none;">
                          <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                            <a @click="listmenu = false ; listmenu2 = false ; listmenu3 = true ; listmenu4 = true ; listmenu5 = false ; listmenu6 = false" :class="listmenu4 ? 'text-[#25bdb4]' : 'text-[#7e7e7e]' " class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg " href="/category/journal">ژورنال معاملاتی</a>
                            <a @click="listmenu = false ; listmenu2 = false ; listmenu3 = true ; listmenu4 = false ; listmenu5 = true ; listmenu6 = false" :class="listmenu5 ? 'text-[#25bdb4]' : 'text-[#7e7e7e]' " class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg " href="/category/financial-intelligence">هوش مالی</a>
                            <a @click="listmenu = false ; listmenu2 = false ; listmenu3 = true ; listmenu4 = false ; listmenu5 = true ; listmenu6 = true" :class="listmenu6 ? 'text-[#25bdb4]' : 'text-[#7e7e7e]' " class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg " href="/category/personal-development">توسعه فردی</a>
                          </div>
                        </div>
                      </div>
            
                    <a href="#contact" class="text-[#7e7e7e] block px-3 py-2 rounded-md text-base font-medium">ارتباط با ما</a>
                  </div>
                </div>
              </nav>









              <main class="my-auto">

                    @section('content')

                    @show

              </main>





              <footer class="text-center lg:text-left bg-[url('/storage/admin-image/hero.jpg')] text-gray-600">

                
                  <!-- Section 1 -->
                  <section>
                    <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
                        <nav class="flex flex-wrap justify-center -mx-5 -my-2">
                            <div class="px-5 py-2">
                                <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                    صفحه اصلی
                                </a>
                            </div>
                            <div class="px-5 py-2">
                                <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                    مقالات
                                </a>
                            </div>
                            <div class="px-5 py-2">
                                <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                    خدمات
                                </a>
                            </div>
                            <div class="px-5 py-2">
                                <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                    ارتباط با ما
                                </a>
                            </div>
                            <div class="px-5 py-2">
                                <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                    تماس با ما
                                </a>
                            </div>
                            <div class="px-5 py-2">
                                <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                                    ورود اعضا
                                </a>
                            </div>
                        </nav>
                        <div class="flex justify-center mt-8 space-x-6 space-x-reverse">
                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Facebook</span>
                                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Instagram</span>
                                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Twitter</span>
                                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">GitHub</span>
                                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Dribbble</span>
                                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                        <p class="mt-8 text-base leading-6 text-center text-gray-400">
                            © طراحی و برنامه نویسی سایت توسط شرکت آریاتک
                        </p>
                    </div>
                  </section>

              </footer>

              

          <script>
            feather.replace()
          </script>
         



            @show
            @section('footer-scripts')
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
              <x-livewire-alert::scripts />
            @livewireScripts

        </body>


</html>
