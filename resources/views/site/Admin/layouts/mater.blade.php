<!DOCTYPE html>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
       
        <script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://unpkg.com/feather-icons"></script>
        @section('header-scripts')

        @show

        <title>  @yield('title')</title>

        @livewireStyles

   </head>


        <body  x-data="dropdown" class="main font-iranyekan">
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <div
            class="flex h-screen bg-gray-50 dark:bg-gray-900"
            :class="{ 'overflow-hidden': open }"
          >
            <!-- Desktop sidebar -->
            <aside
              class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0"
            >
              <div class="py-4 text-gray-500 dark:text-gray-400">
                <a
                  class=""
                  href="#"
                >
                <img class="mx-auto w-[60%] -mb-[20px]" src="{{'/storage/admin-image/logo.png'}}">
                </a>
                <ul class="mt-6">
                  <li class="relative px-6 py-3">
                    <span
                      class="absolute inset-y-0 right-0 w-1 bg-cyan-600 rounded-tl-lg rounded-bl-lg"
                      aria-hidden="true"
                    ></span>
                    <a aria-current="page" class="space-x-2 space-x-reverse inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 " href="">
                    <div class="menu__icon "> <i data-feather="home"></i> </div>
                    <div class="menu__title "> پیشخوان </div>
                    </a>
                  </li>
                </ul>
                <ul>
                  <li class="relative px-6 py-3">
                    <a
                      class="space-x-2 space-x-reverse inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      href="{{route('admin-post-list')}}"
                    >
                    <div class="menu__icon"> <i data-feather="book"></i> </div>
                    <div class="menu__title">مطالب وبلاگ </div>
                    </a>
                  </li>
                  <li class="relative px-6 py-3">
                    <a
                      class="space-x-2 space-x-reverse inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      href="{{route('admin-post-category')}}"
                    >
                    <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                    <div class="menu__title">مدیریت دسته بندی ها</div>
                    </a>
                  </li>
                  <li class="relative px-6 py-3">
                    <a
                      class="space-x-2 space-x-reverse inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      href="{{route('admin-email-list')}}"
                    >
                    <div class="menu__icon"> <i data-feather="mail"></i> </div>
                    <div class="menu__title">اطلاعیه ایمیل</div>
                    </a>
                  </li>
                  <li class="relative px-6 py-3">
                    <a
                      class="space-x-2 space-x-reverse inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      href="{{route('admin-user-list')}}"
                    >
                    <div class="menu__icon"> <i data-feather="users"></i> </div>
                    <div class="menu__title"> مدیریت کاربران</div>
                    </a>
                  </li>
                  <li class="relative px-6 py-3">
                    <a
                      class="space-x-2 space-x-reverse inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      href=""
                    >
                    <div class="menu__icon"> <i data-feather="tool"></i> </div>
                    <div class="menu__title"> تنظیمات سایت</div>
                    </a>
                  </li>
                  <li class="relative px-6 py-3">
                    <a
                      class="space-x-2 space-x-reverse inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      href=""
                    >
                    <div class="menu__icon"> <i data-feather="image"></i> </div>
                    <div class="menu__title"> مدیریت فایل ها</div>
                    </a>
                  </li>
                 </ul>
                <div class="px-6 my-6">
                  <a
                  href="/" class="inline-flex items-center justify-around w-full text-sm font-semibold transition-colors duration-150 p-2 rounded-lg bg-gradient-to-tr from-[#00c7ba] to-[#00abc7] text-white shadow-md"
                  >
                    مشاهده سایت اصلی
                    <span class="ml-2" aria-hidden="true"><i data-feather="home"></i></span>
                </a>
                </div>
              </div>
            </aside>
            <!-- Mobile sidebar -->
            <!-- Backdrop -->
            <div
              x-show="open"
              x-cloak
              x-transition:enter="transition ease-in-out duration-150"
              x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100"
              x-transition:leave="transition ease-in-out duration-150"
              x-transition:leave-start="opacity-100"
              x-transition:leave-end="opacity-0"
              class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
            ></div>
            <aside
              class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
              x-show="open"
              x-cloak
              x-transition:enter="transition ease-in-out duration-150"
              x-transition:enter-start="opacity-0 transform -translate-x-20"
              x-transition:enter-end="opacity-100"
              x-transition:leave="transition ease-in-out duration-150"
              x-transition:leave-start="opacity-100"
              x-transition:leave-end="opacity-0 transform -translate-x-20"
              @click.away="open = false"
            >
              <div class="py-4 text-gray-500 dark:text-gray-400">
                <a
                  class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
                  href="#"
                >
                <img class="mx-auto w-[60%] -mb-[20px]" src="{{ asset('/storage/site/logo.png') }}">
            </a>
                <ul class="mt-6">
                  <li class="relative px-6 py-3">
                    <span
                      class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                      aria-hidden="true"
                    ></span>
                    <a aria-current="page" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 p-2 rounded-lg bg-gradient-to-tr from-[#00c7ba] to-[#00abc7] text-white shadow-md" href="">
                        <div class="menu__icon text-white"> <i data-feather="home"></i> </div>
                        <div class="menu__title text-white"> پیشخوان </div>
                        </a>
                  </li>
                </ul>
                <ul>
                  <li class="relative px-6 py-3">
                    <a
                      class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      href="{{route('admin-post-list')}}"
                    >
                    <div class="menu__icon"> <i data-feather="book"></i> </div>
                    <div class="menu__title">  مطالب وبلاگ</div>
                    </a>
                  </li>
                  <li class="relative px-6 py-3">
                    <a
                      class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      href="{{route('admin-post-category')}}"
                    >
                    <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                    <div class="menu__title">مدیریت دسته بندی ها</div>
                    </a>
                  </li>
                  <li class="relative px-6 py-3">
                    <a
                      class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      href="{{route('admin-email-list')}}"
                    >
                    <div class="menu__icon"> <i data-feather="mail"></i> </div>
                    <div class="menu__title">اطلاعیه ایمیل</div>
                    </a>
                  </li>
                  <li class="relative px-6 py-3">
                    <a
                      class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      href=""
                    >
                    <div class="menu__icon"> <i data-feather="users"></i> </div>
                    <div class="menu__title"> مدیریت کاربران</div>
                    </a>
                  </li>
                  <li class="relative px-6 py-3">
                    <a
                      class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      href="#"
                    >
                    <div class="menu__icon"> <i data-feather="tool"></i> </div>
                    <div class="menu__title"> تنظیمات سایت</div>
                    </a>
                  </li>
                  <li class="relative px-6 py-3">
                    <a
                      class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      href=""
                    >
                    <div class="menu__icon"> <i data-feather="image"></i> </div>
                    <div class="menu__title"> مدیریت فایل ها</div>
                    </a>
                  </li>


                </ul>
                <div class="px-6 my-6">
                    <a
                    href="/" class="inline-flex items-center justify-around w-full text-sm font-semibold transition-colors duration-150 p-2 rounded-lg bg-gradient-to-tr from-[#00c7ba] to-[#00abc7] text-white shadow-md"
                    >
                      مشاهده سایت اصلی
                      <span class="ml-2" aria-hidden="true"><i data-feather="home"></i></span>
                  </a>
                  </div>
              </div>
            </aside>
            <div x-data="isSideMenuOpen" class="flex flex-col flex-1 w-full">
              <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
                <div
                  class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300"
                >
                  <!-- Mobile hamburger -->
                  <button
                    class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
                    @click="toggle"
                    aria-label="Menu"
                  >
                    <svg
                      class="w-6 h-6"
                      aria-hidden="true"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"
                      ></path>
                    </svg>
                  </button>

                  <ul class="flex mr-auto items-center flex-shrink-0 space-x-6">
                    <!-- Theme toggler -->
                    <li class="flex">
                      <button
                        class="rounded-md focus:outline-none focus:shadow-outline-purple"

                        aria-label="Toggle color mode"
                      >
                        <template x-if="!dark">
                          <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                          >
                            <path
                              d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                            ></path>
                          </svg>
                        </template>
                        <template x-if="dark">
                          <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                              clip-rule="evenodd"
                            ></path>
                          </svg>
                        </template>
                      </button>
                    </li>

                    <!-- Profile menu -->
                    <li class="relative">
                      <div
                        class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none flex items-center"

                        aria-label="Account"
                        aria-haspopup="true"
                      >
                        <img
                          class="object-cover w-8 h-8 rounded-full shadow-md ml-2"
                          src="{{asset('/storage/site/thumbs/profile.jpeg')}}"
                          alt=""
                          aria-hidden="true"
                        />
                        <div>
                            <p class="text-gray-500 text-sm -mb-[2px]">سلام؛ {{Auth::user()->first_name}} </p>
                            <a class="flex items-center text-[#25bdb4] text-[10px]" href="{{ route('logout') }}"  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="text-[#25bdb4]"> <i data-feather="log-out" class="w-3 h-3 mr-2"></i>خروج از حساب</a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                           </form>
                        </div>
                    </div>
                      <template x-if="isProfileMenuOpen">
                        <ul
                          x-transition:leave="transition ease-in duration-150"
                          x-transition:leave-start="opacity-100"
                          x-transition:leave-end="opacity-0"

                          class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                          aria-label="submenu"
                        >
                          <li class="flex">
                            <a
                              class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                              href="#"
                            >
                              <svg
                                class="w-4 h-4 mr-3"
                                aria-hidden="true"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                              >
                                <path
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                ></path>
                              </svg>
                              <span>Profile</span>
                            </a>
                          </li>
                          <li class="flex">
                            <a
                              class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                              href="#"
                            >
                              <svg
                                class="w-4 h-4 mr-3"
                                aria-hidden="true"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                              >
                                <path
                                  d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                                ></path>
                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                              </svg>
                              <span>Settings</span>
                            </a>
                          </li>
                          <li class="flex">
                            <a
                              class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                              href="#"
                            >
                              <svg
                                class="w-4 h-4 mr-3"
                                aria-hidden="true"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                              >
                                <path
                                  d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                                ></path>
                              </svg>
                              <span>Log out</span>
                            </a>
                          </li>
                        </ul>
                      </template>
                    </li>
                  </ul>
                </div>
              </header>
              <main class="h-full overflow-y-auto bg-[#f3f3f3]">
                <div class="container px-6 mx-auto grid">
                    <h2
                    class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    @yield('title')
                  </h2>
                    @section('content')

                    @show
                </div>
              </main>
            </div>
          </div>
          <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('dropdown', () => ({
                    open: false,

                    toggle() {
                        this.open = ! this.open
                    }
                }))
            })
        </script>
          <script>
            feather.replace()
          </script>
                  @livewireScripts

        @section('footer-scripts')

        @show

        <x-livewire-alert::scripts />
        </body>


</html>
