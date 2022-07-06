@extends('site.Customer.layouts.master')
@section('title' , 'صفحه اصلی')



@section('header-scripts')
<script src="//unpkg.com/alpinejs" defer></script>

@endsection
@section('content')


   

<!-- Section 1 -->
<section >
   <div class="bg-[url('/storage/admin-image/hero.jpg')]  to-primary-100 pt-20">
        <div class="max-w-screen-xl px-8 mx-auto flex flex-col lg:flex-row items-start justify-center items-center">
           <div class="flex flex-col w-full lg:w-6/12 justify-center items-start text-center lg:text-left mb-5 md:mb-0">
                <h1 data-aos="fade-right" data-aos-once="true" class="my-4 text-5xl font-bold leading-tight text-darken aos-init aos-animate">
                    <span class="w-full text-transparent bg-clip-text bg-gradient-to-r from-primary-400 via-primary-500 to-primary-800 lg:inline text-6xl">تی وان</span> حامی ایده های برتر
                </h1>
                <p data-aos="fade-down" data-aos-once="true" data-aos-delay="300" class="leading-normal text-2xl mb-8 aos-init aos-animate">اولین پلتفرم رســمی ثـبت ایــده و اخــتراعات در ایران</p>
                <div data-aos="fade-up" data-aos-once="true" data-aos-delay="700" class="w-full md:flex items-center justify-center lg:justify-start md:space-x-5 aos-init aos-animate">
                    <a href="{{route('login-register-form')}}" class="lg:ml-10 bg-primary-600 text-white text-md font-bold rounded-full py-4 px-6 btn-zoom"> عضویت در سایت </a>
                    <div class="flex items-center justify-center space-x-3 mt-5 md:mt-0 btn-zoom">
                        <a href="{{route('login-register-form')}}" class="bg-white animate-pulse  w-12 h-12 rounded-full flex items-center justify-center ml-2"><svg viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2"><path d="M22.5751 12.8097C23.2212 13.1983 23.2212 14.135 22.5751 14.5236L1.51538 27.1891C0.848878 27.5899 5.91205e-07 27.1099 6.25202e-07 26.3321L1.73245e-06 1.00123C1.76645e-06 0.223477 0.848877 -0.256572 1.51538 0.14427L22.5751 12.8097Z" fill="#7d94bd"></path></svg></a><span class="cursor-pointer">درباره ما بیشتر بدانید</span>
                    </div>
                </div>
            </div>
            <div id="girl" class="w-full lg:w-6/12 lg:-mt-10 relative">
                        <img data-aos="fade-up" data-aos-once="true" src="{{'/storage/admin-image/home.png'}}" class="w-10/12 mx-auto 2xl:-mb-20 aos-init aos-animate">
                        <div data-aos="fade-up" data-aos-delay="300" data-aos-once="true" class="absolute top-20 -left-6 sm:top-32 sm:left-10 md:top-40 md:left-16 lg:-left-0 lg:top-52 floating-4 aos-init aos-animate">
                            <img src="https://mhaecal.github.io/frontend/img/calendar.svg" class="animate-bounce-up bg-white bg-opacity-80 rounded-lg h-12 sm:h-16">
                        </div>

                        <div data-aos="fade-up" data-aos-delay="400" data-aos-once="true" class="absolute top-20 right-10 sm:right-24 sm:top-28 md:top-36 md:right-32 lg:top-32 lg:right-16 floating aos-init aos-animate"><svg viewBox="0 0 149 149" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-16 sm:h-24"><g filter="url(#filter0_d)"><rect x="40" y="32" width="69" height="69" rx="14" fill="#F3627C"></rect></g><rect x="51.35" y="44.075" width="47.3" height="44.85" rx="8" fill="white"></rect><path d="M74.5 54.425V78.575" stroke="#F25471" stroke-width="4" stroke-linecap="round"></path><path d="M65.875 58.7375L65.875 78.575" stroke="#F25471" stroke-width="4" stroke-linecap="round"></path><path d="M83.125 63.9125V78.575" stroke="#F25471" stroke-width="4" stroke-linecap="round"></path><defs><filter id="filter0_d" x="0" y="0" width="149" height="149" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix><feOffset dy="8"></feOffset><feGaussianBlur stdDeviation="20"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0.825 0 0 0 0 0.300438 0 0 0 0 0.396718 0 0 0 0.26 0"></feColorMatrix><feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"></feBlend><feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"></feBlend></filter></defs></svg>
                        </div>
                       
                        <div data-aos="fade-up" data-aos-delay="500" data-aos-once="true" class="absolute bottom-14 -left-4 sm:left-2 sm:bottom-20 lg:bottom-24 lg:-left-4 floating aos-init aos-animate">
                            <img src="https://mhaecal.github.io/frontend/img/ux-class.svg" alt="" class=" bg-white bg-opacity-80 rounded-lg h-20 sm:h-28">
                        </div>
                        <div data-aos="fade-up" data-aos-delay="600" data-aos-once="true" class="absolute bottom-20 md:bottom-48 lg:bottom-52 -right-6 lg:right-8 floating-4 aos-init aos-animate">
                            <img src="https://mhaecal.github.io/frontend/img/congrat.svg" alt="" class="animate-bounce-down bg-white bg-opacity-80 rounded-lg h-12 sm:h-16">
                         </div>
            </div>
        </div>
        <div class="text-white -mt-14 sm:-mt-24 lg:-mt-36 z-1 relative"><svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="xl:h-40 xl:w-full"><path d="M600,112.77C268.63,112.77,0,65.52,0,7.23V120H1200V7.23C1200,65.52,931.37,112.77,600,112.77Z" fill="currentColor"></path></svg>
            <div class="bg-white w-full h-20 -mt-px">
            </div>
        </div>




        
      </div>
      <div class="max-w-4xl mx-auto mb-20">
        <h1 class="text-center mb-3 text-gray-400 font-medium">همکاری با بیش از +500 شرکت فعال دانش بنیان</h1>
        <div class="grid grid-cols-3 lg:grid-cols-6 gap-4 justify-items-center">
            <img src="{{'/storage/admin-image/icons/1.jpg'}}" >
            <img src="{{'/storage/admin-image/icons/2.jpg'}}" >
            <img src="{{'/storage/admin-image/icons/3.jpg'}}">
            <img src="{{'/storage/admin-image/icons/4.jpg'}}" >
            <img src="{{'/storage/admin-image/icons/5.jpg'}}" >
            <img src="{{'/storage/admin-image/icons/6.png'}}" >


          </div>
      </div>
  </section>
  
  
  
<section class="py-20 bg-[url('/storage/admin-image/cube.png')] bg-no-repeat bg-contain bg-center">
    <div class="container max-w-6xl mx-auto ">
        <h2 class="text-primary-800 text-5xl font-bold tracking-tight text-center">خدمات و ویژگی ها</h2>
        <p class="mt-2 text-lg text-center text-gray-600">با تی وان ایده های خود را ثبت کنید</p>
        <div class="grid grid-cols-4 gap-8 mt-10 sm:grid-cols-8 lg:grid-cols-12 sm:px-8 xl:px-0">

            <div class=" zoom-in relative flex flex-col flex-start items-center col-span-4 px-8 pb-8 space-y-4  bg-white sm:rounded-xl" style="
            box-shadow: 0px 7px 22px #f0f0f0;">
               
                <div class="relative -top-[17px] p-3 text-white bg-blue-500 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M14 3v4a1 1 0 0 0 1 1h4"></path><path d="M5 8v-3a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-5"></path><circle cx="6" cy="14" r="3"></circle><path d="M4.5 17l-1.5 5l3 -1.5l3 1.5l-1.5 -5"></path></svg>
                </div>
                <h4 class="text-xl font-medium text-gray-700">گواهینامه ها</h4>
                <p class="text-base text-center text-gray-500">ارائه گواهینامه رسمی از سوی سازمان ثبت اسناد کشور</p>
                
            </div>

            <div class=" zoom-in relative flex flex-col flex-start items-center col-span-4 px-8 pb-8 space-y-4  bg-white sm:rounded-xl" style="
            box-shadow: 0px 7px 22px #f0f0f0;">
                    <div class="relative -top-[17px] p-3 text-white bg-blue-500 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M18 8a3 3 0 0 1 0 6"></path><path d="M10 8v11a1 1 0 0 1 -1 1h-1a1 1 0 0 1 -1 -1v-5"></path><path d="M12 8h0l4.524 -3.77a0.9 .9 0 0 1 1.476 .692v12.156a0.9 .9 0 0 1 -1.476 .692l-4.524 -3.77h-8a1 1 0 0 1 -1 -1v-4a1 1 0 0 1 1 -1h8"></path></svg>
                </div>
                <h4 class="text-xl font-medium text-gray-700">معرفی و تبلیغات</h4>
                <p class="text-base text-center text-gray-500">راه اندازی کمپین های تبلیغاتی به منظور معرفی محصول</p>
            </div>


            <div class=" zoom-in relative flex flex-col flex-start items-center col-span-4 px-8 pb-8 space-y-4  bg-white sm:rounded-xl" style="
            box-shadow: 0px 7px 22px #f0f0f0;">
                    <div class="relative -top-[17px] p-3 text-white bg-blue-500 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline><line x1="12" y1="12" x2="20" y2="7.5"></line><line x1="12" y1="12" x2="12" y2="21"></line><line x1="12" y1="12" x2="4" y2="7.5"></line><line x1="16" y1="5.25" x2="8" y2="9.75"></line></svg>
                </div>
                <h4 class="text-xl font-medium text-gray-700">مشاوره کسب و کار</h4>
                <p class="text-base text-center text-gray-500">ارائه مشاوره های تخصصی توسط کارشناسان و کارآفرینان ملی</p>
            </div>

            <div class=" zoom-in relative flex flex-col flex-start items-center col-span-4 px-8 pb-8 space-y-4  bg-white sm:rounded-xl" style="
            box-shadow: 0px 7px 22px #f0f0f0;">
                    <div class="relative -top-[17px] p-3 text-white bg-blue-500 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l3 3l-3 3"></path><line x1="13" y1="15" x2="16" y2="15"></line><rect x="3" y="4" width="18" height="16" rx="2"></rect></svg>
                </div>
                <h4 class="text-xl font-medium text-gray-700">توسعه برندینگ</h4>
                <p class="text-base text-center text-gray-500">ارائه روش ها و ابزارهای مدرن به منظور ارتقاء برندینگ</p>
            </div>

            <div class=" zoom-in relative flex flex-col flex-start items-center col-span-4 px-8 pb-8 space-y-4  bg-white sm:rounded-xl" style="
            box-shadow: 0px 7px 22px #f0f0f0;">
                    <div class="relative -top-[17px] p-3 text-white bg-blue-500 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="9.5" y1="11" x2="9.51" y2="11"></line><line x1="14.5" y1="11" x2="14.51" y2="11"></line><path d="M9.5 15a3.5 3.5 0 0 0 5 0"></path><path d="M7 5h1v-2h8v2h1a3 3 0 0 1 3 3v9a3 3 0 0 1 -3 3v1h-10v-1a3 3 0 0 1 -3 -3v-9a3 3 0 0 1 3 -3"></path></svg>
                </div>
                <h4 class="text-xl font-medium text-gray-700">ثبت برند</h4>
                <p class="text-base text-center text-gray-500"> مشاوره ثبت برند و اخذ علامت تجاری زیر نظر کارشناسان حقوقی</p>
            </div>

            <div class=" zoom-in relative flex flex-col flex-start items-center col-span-4 px-8 pb-8 space-y-4  bg-white sm:rounded-xl" style="
            box-shadow: 0px 7px 22px #f0f0f0;">
                    <div class="relative -top-[17px] p-3 text-white bg-blue-500 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="15" y1="5" x2="15" y2="7"></line><line x1="15" y1="11" x2="15" y2="13"></line><line x1="15" y1="17" x2="15" y2="19"></line><path d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2"></path></svg>
                </div>
                <h4 class="text-xl font-medium text-gray-700">فروش محصولات</h4>
                <p class="text-base text-center text-gray-500">معرفی و فروش مستقیم محصولات دانش بنیان زیر نظر ذینفعان</p>
            </div>

        </div>
    </div>
</section>






<!-- Section 1 -->
<section class="flex items-center justify-center py-16 min-w-screen">
    <div class="max-w-6xl mx-auto  md:px-16 xl:px-10">
        <div class="flex flex-col items-center lg:flex-row">
            <div class="flex flex-col items-start justify-center w-full h-full pl-8 mb-10 lg:mb-0 lg:w-1/2">
                <p class="mb-2 text-base font-medium tracking-tight text-primary-800 uppercase">کاربرانی که همراه ما بوده اند</p>
                <h2 class="text-4xl font-extrabold leading-10 tracking-tight text-primary-800 sm:text-5xl sm:leading-none md:text-6xl lg:text-5xl xl:text-6xl">تجربه کاربران</h2>
                <p class="my-6 text-lg text-gray-600">ایده ها و فرصت های بسیاری در تی وان تبدیل به سرمایه و توسعه یک برند شده اند و همواره در تلاش هستیم تجربیات موفق دیگران را در اختیار شما قرار دهیم.</p>
                <div class="flex items-center justify-center space-x-3 mt-5 md:mt-0 btn-zoom">
                    <a href="http://127.0.0.1:8000/login-register" class="bg-primary-100 animate-pulse  w-12 h-12 rounded-full flex items-center justify-center ml-2"><svg viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2"><path d="M22.5751 12.8097C23.2212 13.1983 23.2212 14.135 22.5751 14.5236L1.51538 27.1891C0.848878 27.5899 5.91205e-07 27.1099 6.25202e-07 26.3321L1.73245e-06 1.00123C1.76645e-06 0.223477 0.848877 -0.256572 1.51538 0.14427L22.5751 12.8097Z" fill="#7d94bd"></path></svg></a><span class="cursor-pointer">درباره ما بیشتر بدانید</span>
                </div>
            </div>

            <div class="w-full lg:w-1/2">
                <blockquote style="box-shadow:  0px 7px 22px #f0f0f0;" class="flex items-center justify-between w-full col-span-1 p-6 bg-white rounded-lg shadow">
                    <div class="flex flex-col pr-8">
                        <div class="relative pl-12">
                            <svg class="absolute left-0 w-10 h-10 text-indigo-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 125">
                                <path d="M30.7 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2C12.7 83.1 5 72.6 5 61.5c0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S30.7 31.6 30.7 42zM82.4 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2-11.8 0-19.5-10.5-19.5-21.6 0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S82.4 31.6 82.4 42z"></path>
                            </svg>
                            <p class="mt-2 text-sm text-gray-600 sm:text-base lg:text-sm xl:text-base">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده .......</p>
                        </div>

                        <h3 class="pl-12 mt-3 text-sm font-medium leading-5 text-gray-800 truncate sm:text-base lg:text-sm lg:text-base">
                            ملیکا صابری
                            <span class="mt-1 text-sm leading-5 text-gray-500 truncate">- CEO SomeCompany</span>
                        </h3>
                    </div>
                    <img class="hidden md:block flex-shrink-0 w-20 h-20 bg-gray-300 rounded-full xl:w-24 xl:h-24" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                </blockquote>
                <blockquote style="box-shadow:  0px 7px 22px #f0f0f0;" class="flex items-center justify-between w-full col-span-1 p-6 mt-4 bg-white rounded-lg shadow">
                    <div class="flex flex-col pr-10">
                        <div class="relative pl-12">
                            <svg class="absolute left-0 w-10 h-10 text-indigo-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 125">
                                <path d="M30.7 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2C12.7 83.1 5 72.6 5 61.5c0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S30.7 31.6 30.7 42zM82.4 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2-11.8 0-19.5-10.5-19.5-21.6 0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S82.4 31.6 82.4 42z"></path>
                            </svg>
                            <p class="mt-2 text-sm text-gray-600 sm:text-base lg:text-sm xl:text-base">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده .......</p>
                        </div>
                        <h3 class="pl-12 mt-3 text-sm font-medium leading-5 text-gray-800 truncate sm:text-base lg:text-sm lg:text-base">
                            محمد یوسفی
                            <span class="mt-1 text-sm leading-5 text-gray-500 truncate">- CEO SomeCompany</span>
                        </h3>
                        <p class="mt-1 text-sm leading-5 text-gray-500 truncate"></p>
                    </div>
                    <img class="hidden md:block  flex-shrink-0 w-24 h-24 bg-gray-300 rounded-full" src="https://images.unsplash.com/photo-1527980965255-d3b416303d12?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;aauto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                </blockquote>
                <blockquote style="box-shadow:  0px 7px 22px #f0f0f0;" class="flex items-center justify-between w-full col-span-1 p-6 mt-4 bg-white rounded-lg shadow">
                    <div class="flex flex-col pr-10">
                        <div class="relative pl-12">
                            <svg class="absolute left-0 w-10 h-10 text-indigo-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 125">
                                <path d="M30.7 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2C12.7 83.1 5 72.6 5 61.5c0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S30.7 31.6 30.7 42zM82.4 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2-11.8 0-19.5-10.5-19.5-21.6 0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S82.4 31.6 82.4 42z"></path>
                            </svg>
                            <p class="mt-2 text-sm text-gray-600 sm:text-base lg:text-sm xl:text-base">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده .......</p>
                        </div>

                        <h3 class="pl-12 mt-3 text-sm font-medium leading-5 text-gray-800 truncate sm:text-base lg:text-sm lg:text-base">
                            علی جهانی
                            <span class="mt-1 text-sm leading-5 text-gray-500 truncate">- CEO SomeCompany</span>
                        </h3>
                        <p class="mt-1 text-sm leading-5 text-gray-500 truncate"></p>
                    </div>
                    <img class="hidden md:block  flex-shrink-0 w-24 h-24 bg-gray-300 rounded-full" src="https://images.unsplash.com/photo-1545167622-3a6ac756afa4?ixlib=rrb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;aauto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                </blockquote>
            </div>
        </div>
    </div>
</section>






<section class="relative w-full bg-white">
    <div class="absolute w-full h-32 "></div>
    <div class="relative w-full px-5 py-10 mx-auto sm:py-12 md:py-16 md:px-10 max-w-7xl">

        <h2 class="text-primary-800 text-5xl font-bold tracking-tight text-center">اخبار و مقالات</h2>
        <p class="mt-2 text-lg text-center text-gray-600">آخرین اخبار و مقالات حوزه فناوری</p>
        <div class="flex grid h-full grid-cols-12 gap-10 pb-10 mt-8 sm:mt-16">

            <div class="grid grid-cols-12 col-span-12 gap-7">
                <div class="flex flex-col items-start col-span-12 overflow-hidden shadow-sm rounded-xl md:col-span-6 lg:col-span-4">
                    <a href="#_" class="block transition duration-200 ease-out transform hover:scale-110">
                        <img class="object-cover w-full shadow-sm " src="https://cdn.devdojo.com/images/may2021/workstation.jpg">
                    </a>
                    <div class="relative flex flex-col items-start px-6 bg-white border border-t-0 border-gray-200 py-7 rounded-b-2xl">
                        <div class="bg-indigo-400 absolute top-0 -mt-3 flex items-center px-3 py-1.5 leading-none w-auto inline-block rounded-full text-xs font-medium uppercase text-white inline-block">
                            <span>مقالات آموزشی</span>
                        </div>
                        <h2 class="text-base font-bold sm:text-lg md:text-xl"><a href="#_">تکنیک های برتر توسعه برند چیست ؟</a></h2>
                        <p class="mt-2 text-sm text-gray-500">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،..... </p>
                    </div>
                </div>

                <div class="flex flex-col items-start col-span-12 overflow-hidden shadow-sm rounded-xl md:col-span-6 lg:col-span-4">
                    <a href="#_" class="block transition duration-200 ease-out transform hover:scale-110">
                        <img class="object-cover w-full shadow-sm" src="https://cdn.devdojo.com/images/may2021/workstation.jpg">
                    </a>
                    <div class="relative flex flex-col items-start px-6 bg-white border border-t-0 border-gray-200 py-7 rounded-b-2xl">
                        <div class="bg-red-400 absolute top-0 -mt-3 flex items-center px-3 py-1.5 leading-none w-auto inline-block rounded-full text-xs font-medium uppercase text-white inline-block">
                            <span>مقالات آموزشی</span>
                        </div>
                        <h2 class="text-base font-bold sm:text-lg md:text-xl"><a href="#_">مراحل قانونی ثبت اختراع چیست ؟</a></h2>
                        <p class="mt-2 text-sm text-gray-500">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،.....</p>
                    </div>
                </div>

                <div class="flex flex-col items-start col-span-12 overflow-hidden shadow-sm rounded-xl md:col-span-6 lg:col-span-4">
                    <a href="#_" class="block transition duration-200 ease-out transform hover:scale-110">
                        <img class="object-cover w-full shadow-sm " src="https://cdn.devdojo.com/images/may2021/workstation.jpg">
                    </a>
                    <div class="relative flex flex-col items-start px-6 bg-white border border-t-0 border-gray-200 py-7 rounded-b-2xl">
                        <div class="bg-purple-500 absolute top-0 -mt-3 flex items-center px-3 py-1.5 leading-none w-auto inline-block rounded-full text-xs font-medium uppercase text-white inline-block">
                            <span>مقالات آموزشی</span>
                        </div>
                        <h2 class="text-base font-bold sm:text-lg md:text-xl"><a href="#_">شرایط فروش محصول بعد از توسعه</a></h2>
                        <p class="mt-2 text-sm text-gray-500">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،.....</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


    
@endsection