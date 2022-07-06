<div>

    <div class="sm:mt-10">
        <div class="w-full max-w-2xl mx-auto">
          <p class="mt-5 text-right">برای اطلاع از آخرین اخبار تی وان ایمیل خود را وارد نمایید.</p>
    <div class="flex items-center border-b border-primary-600 py-2">

      <input wire:model="email" name="email" class="appearance-none bg-transparent border-none w-full text-white mr-3 py-1 px-2 leading-tight focus:outline-none" type="email" placeholder="username@email.ext" aria-label="Full name">

      <button wire:click.prevent="store()" class="flex-shrink-0 bg-primary-600  border-primary-600  text-lg border-4 text-white py-1 px-2 rounded" type="button">
        ثبت ایمیل
      </button>
    </div>

    <div class="text-right mt-5">
        @error('email')
        {{$message}}
        @enderror
    </div>

    </div>
      </div>

    </div>
