@extends('site.Customer.layouts.master-noheader')
@section('title' , 'صفحه ورود و عضویت')

@section('header-scripts')
<script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection


@section('content')
<div class="square_box box_four hidden md:block"></div>
<div class="lg-background">

<div class="min-h-full flex bg-[#e8f0fe] rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-3xl">
  <div class="hidden lg:grid lg:w-1/2 bg-cover" style="background-image:url('{{asset('storage/admin-image/login.jpg')}}')"> 
    <div class="flex">
      <img class="m-auto h-20 w-auto" src="{{'/storage/admin-image/logo-white.png'}}" alt="Workflow">

    </div>
  </div>
    <div x-data="{ register: $persist(true).using(sessionStorage) , login:$persist(false).using(sessionStorage) }" class="max-w-sm w-full space-y-8 bg-[#e8f0fe] p-6 rounded-md">
      <div>
        <h2 class="mt-6 text-right text-3xl font-extrabold text-primary-800">ورود | ثبت نام</h2>

      </div>

    {{-- show register form with alpine --}}
      <div x-show="register"  x-cloak>
        <p class="!-mt-5 text-right text-sm text-gray-600">
          <span class="font-medium text-gray-600 hover:text-indigo-500"> برای عضویت در سایت اطلاعات خود را وارد نمایید</span>
        </p>
      <form  class="mt-8 space-y-4" action="{{route('register')}}" method="POST">
        @csrf
        <input type="hidden" name="remember" value="true">
        <div class="rounded-md shadow-sm -space-y-px">
          <div class="relative">
              <input name="first_name" value="{{old('first_name')}}" type="text" id="floating_outlined" class="block border-solid border-2 px-2.5 pb-1.5 pt-2.5 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
              <label for="floating_outlined" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-[#e8f0fe] dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 right-1">نام</label>
            </div>

      </div>
      @error('first_name')
      <div class="text-sm !mt-[5px] text-red-500">
        <span>
          {{$message}}
        </span>
      </div>

    @enderror
      <div class="rounded-md shadow-sm space-y-0.5">
        <div class="relative">
            <input name="last_name" value="{{old('last_name')}}" type="text" id="floating_outlined" class="block border-solid border-2 px-2.5 pb-1.5 pt-2.5 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_outlined" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-[#e8f0fe] dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 right-1">نام خانوادگی</label>
          </div>

    </div>
          @error('last_name')
          <div class="text-sm !mt-[5px] text-red-500">
            <span>
              {{$message}}
            </span>
          </div>

        @enderror
        <div class="rounded-md shadow-sm space-y-0.5">
            <div class="relative">
                <input name="phone" value="{{old('phone')}}" type="text" id="floating_outlined" class="block border-solid border-2 px-2.5 pb-1.5 pt-2.5 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="floating_outlined" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-[#e8f0fe] dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 right-1">شماره موبایل</label>
              </div>

        </div>
        @error('phone')
        <div class="text-sm !mt-[5px] text-red-500">
          <span>
            {{$message}}
          </span>
        </div>

      @enderror
  
        <div>
          <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary-700 hover:bg-primary-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
              </svg>
            </span>
            تایید شماره موبایل
          </button>
        </div>
      </form>
        </div>
        {{-- end of register form --}}
     
   
    <div x-show="register" class="text-center text-sm !mt-[15px] text-gray-400">
      <button @click="register = !register ; login = !login ">برای ورود به سایت کلیک کنید</button>
    </div>


    {{-- show login form with alpine --}}

    <div x-show="login"  x-cloak>
      <p class="!-mt-5 text-right text-sm text-gray-600">
        <span class="font-medium text-gray-600 hover:text-indigo-500">برای ورود به سایت شماره موبایل خود را وارد نمایید</span>
      </p>
      <form  class="mt-8 space-y-4" action="{{route('login')}}" method="POST">
        @csrf


        <div class="rounded-md shadow-sm space-y-0.5">
            <div class="relative">
                <input name="mobile" value="{{old('mobile')}}" type="text" id="floating_outlined" class="block border-solid border-2 px-2.5 pb-1.5 pt-2.5 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="floating_outlined" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-[#e8f0fe] dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 right-1">شماره موبایل</label>
              </div>

        </div>
        @error('mobile')
        <div class="text-sm !mt-[5px] text-red-500">
          <span>
            {{$message}}
          </span>
        </div>

      @enderror
  
        <div>
          <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary-700 hover:bg-primary-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
              </svg>
            </span>
            ورود به سایت
          </button>
        </div>
      </form>
        </div>

        {{-- end of login form --}}

        <div x-show="login" class="text-center text-sm !mt-[15px] text-gray-400">
          <button @click="register = !register ; login = !login ">برای ثبت نام در سایت کلیک کنید</button>
        </div>

    </div>
  </div>
  <div class="text-indigo-500 text-center text-sm !mt-[15px]">
    <a class="group-hover:animate-[left_1s_ease-in-out_infinite] flex justify-center flex-row-reverse" href="/" >بازگشت به سایت اصلی  <i class="w-4 ml-2" data-feather="arrow-right"></i>
    </a>
  </div>

</div>
@endsection