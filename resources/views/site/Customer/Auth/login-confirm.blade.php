@extends('site.Customer.layouts.master-noheader')
@section('title' , 'صفحه ورود و عضویت')

@section('header-scripts')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>

@endsection

@section('content')
<div class="square_box box_four hidden md:block"></div>

<div class="lg-background">

<div class="min-h-full flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-3xl">
  <div class="hidden lg:grid lg:w-1/2 bg-cover" style="background-image:url('{{asset('storage/admin-image/login.jpg')}}')"> 
    <div class="flex">
      <img class="m-auto h-20 w-auto" src="{{'/storage/admin-image/logo-white.png'}}" alt="Workflow">

    </div>
  </div>
        <div class="max-w-sm w-full space-y-8 bg-white p-6 rounded-md">
      <div>
        <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-indigo-600">کد تایید</h2>
        <div class="mt-2 text-center text-sm text-gray-600">
                    <p class="font-medium text-gray-600">کد تایید ارسال شده به شماره زیر را وارد نمایید</p>
                    <p class="mt-[10px] font-medium text-indigo-500">{{$otp->login_id}}</p>
        </div>
      </div>



<div>
        <form x-data="otpForm()" class="!mt-0 space-y-6 otp-form" action="{{route('login-confirm' , $token)}}" method="POST">
        @csrf
        <div class="flex justify-between flex-row-reverse">

        <template x-for="(input, index) in length" :key="index">
          <input
          type="tel"
          maxlength="1"
          class="border border-gray-300 w-14 h-10 text-center otp-field shadow-sm rounded-lg"
          :x-ref="index"
          x-on:input="handleInput($event)"
          x-on:paste="handlePaste($event)"
          x-on:keydown.backspace="$event.target.value || handleBackspace($event.target.getAttribute('x-ref'))"
        />
        </template>
        </div>
        <input type="hidden" name="otp" x-model="value" />

  
        <div>
          <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary-700 hover:bg-primary-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <!-- Heroicon name: solid/lock-closed -->
              <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
              </svg>
            </span>
            تایید 
          </button>
        </div>
      </form> 
</div>
      <div class="text-indigo-500 text-center text-sm !mt-[15px]">
        <a href="{{route('login-confirm-resend' , $token)}}" id="resend" class="flex justify-center flex-row-reverse hidden"  >دریافت مجدد کد تایید  <i class="w-4 ml-2" data-feather="repeat"></i>
        </a>
      </div>
      <section>
        <div class="text-center text-sm" id="timer"></div>
      </section>




    </div>
  </div>
  <div class="text-indigo-500 text-center text-sm !mt-[15px]">
    <a class="flex justify-center flex-row-reverse" href="{{route('login-register-form')}}" >بازگشت به مرحله قبل  <i class="w-4 ml-2" data-feather="arrow-right"></i>
    </a>
  </div>


</div>



  @section('footer-scripts')


  @php
    
  $timer = ((new \Carbon\Carbon($otp->created_at))->addMinute(5)->timestamp  - \Carbon\Carbon::now()->timestamp ) * 1000 ;

  @endphp

  <script>

    var countDownDate = new Date().getTime() + {{$timer}};
    var timer = $('#timer') ;
    var resendotp = $('#resend');
    var x = setInterval( function() {
        var now = new Date().getTime();
        var distance = countDownDate - now ;
        var minutes = Math.floor((distance % (1000 * 60 *60)) / (1000 *60));
        var seconds = Math.floor((distance % (1000 * 60)) / (1000));
        if(minutes == 0)
        {
          timer.html(seconds+'   ثانیه تا درخواست مجدد کد تایید');
        }
        else
        {
          timer.html(minutes+':'+seconds+'  تا درخواست مجدد کد تایید');

        }
        if(distance < 0)
        {
          clearInterval(x);
          timer.addClass('hidden');
          resendotp.removeClass('hidden');

        }

    }, 1000);

  </script>

  <script>
    function otpForm() {
      return {
        length: 5,
        value: "",
            handleInput(e) {
            const input = e.target;

            this.value = Array.from(Array(this.length), (element, i) => {
              return this.$refs[i].value || "";
            }).join("");

            if (input.nextElementSibling && input.value) {
              input.nextElementSibling.focus();
              input.nextElementSibling.select();
            }
          },
        handlePaste(e) {
          const paste = e.clipboardData.getData("text");
          this.value = paste;

          const inputs = Array.from(Array(this.length));

          inputs.forEach((element, i) => {
            this.$refs[i].value = paste[i] || "";
          });
        },
        handleBackspace(e) {
        const previous = parseInt(e, 10) - 1;
        this.$refs[previous] && this.$refs[previous].focus();
        },
      };
    }
  </script>
  @endsection
  
@endsection