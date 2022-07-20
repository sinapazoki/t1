<div>

  <div class="bg-gray-100 flex items-center justify-center">
      <div class="container mx-auto">
        <div>
             <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
              <div class="text-gray-600">
                <div class="md:col-span-full mt-5">


               <div id="holder" class="relative category-profile flex flex-col items-center m-auto h-[150px]">
                  @if (empty($image))
                  <img class="bg-gray-50" src="{{ asset('/storage/admin-image/placeholder-image.png') }}">
                  @else
                  <a wire:click.prevent="removeimage()" class="cursor-pointer absolute bg-[#b31e27] w-[23px] h-[25px] right-0 rounded-full p-[5px] text-white " >✕</a>
                  <img src="{{ asset($image) }}">
                  @endif
               </div>


                 <a id="lfm" data-input="thumbnail" data-preview="holder">
                  <label class="w-64 m-auto flex justify-center items-center py-1.5 rounded-md tracking-wide uppercase ursor-pointer text-gray ease-linear transition-all duration-150">
                      <svg class="animate-[image_1s_ease-in-out_infinite] h-10 w-10 text-[#00b9c0]" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                          <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex flex-col">
                          <span class="mt-2 text-base leading-normal">برای آپلود تصویر کلیک کنید</span>
                          <span class="leading-normal text-[10px]">PNG, JPG</span>
                        </div>
                        <input wire:model="image" id="thumbnail" class="form-control hidden" type="text" name="image"  onchange="this.dispatchEvent(new InputEvent('input'))" />
                  </label>
                 </a>
                 @error('image')
                 {{$message}}
                 @enderror

              </div>
              </div>

              <div class="lg:col-span-2">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">

                  <div class="md:col-span-6">
                    <label for="name">عنوان</label>
                    <input wire:model="name" type="text" name="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                    @error('name')
                    {{$message}}
                    @enderror
                  </div>




                  <div class="md:col-span-6">
                    <label for="email">توضیحات دسته</label>
                    <textarea  wire:model="description"  name="description" class="border mt-4 rounded p-4 w-full bg-gray-50" value="" placeholder="توضیحات خود را بنویسید ...." ></textarea>
                    @error('description')
                    {{$message}}
                   @enderror
                  </div>


                

                  <div class="md:col-span-6 text-left">
                    <div class="inline-flex items-end">
                      <button wire:click.prevent="store()" class="w-40 bg-gradient-to-tr from-primary-500 to-[#00abc7] hover:from-[#00abc7] hover:to-primary-500 text-white font-bold py-2 px-6 rounded">ایجاد دسته جدید</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
</div>
