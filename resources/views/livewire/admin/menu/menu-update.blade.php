<div>

  <div class="bg-gray-100 flex items-center justify-center">
      <div class="container mx-auto">
        <div>
             <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-2">


            
              <input type="hidden" wire:model="menu_id">

              <div class="lg:col-span-2">

                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">

                  <div class="md:col-span-2">
                    <label for="name">عنوان منو</label>
                    <input wire:model="name" type="text" name="name" class="h-10 border rounded px-4 w-full bg-gray-50" value="" />
                    @error('name')
                    {{$message}}
                    @enderror
                  </div>

                  <div class="md:col-span-2">
                    <label for="name">آدرس منو</label>
                    <input wire:model="url" type="text" name="url" class=" h-10 border rounded px-4 w-full bg-gray-50" value="" />
                    @error('url')
                    {{$message}}
                    @enderror
                  </div>



                  <div wire:ignore class="mt-2 md:col-span-2">
                    <label class="mb-[5px]" for="user_id">انتخاب والد</label>
                    <select wire:model="parent_id" id="select2-dropdown"  class="emails-list h-10 border rounded px-4 w-full bg-gray-50">
                      <option></option>
                        @foreach ($parents as $parent )
                        <option value="{{$parent->id}}">{{$parent->name}}</option>
                        @endforeach

                    </select>
                        @error('parent_id')
                        {{$message}}
                        @enderror


                            <script>
                        $(document).ready(function () {
                            $('#select2-dropdown').select2({
                                width: '100%',
                                placeholder: "یک منو انتخاب کنید ...",
                            });
                            $('#select2-dropdown').on('change', function (e) {
                                let data = $(this).val();
                                @this.set('parent_id', data);
                            });
                            window.livewire.on('reset', () => {
                                $('#select2-dropdown').select2();
                            });


                        });
                        
                    </script>

                    </div>


                    <div class="md:col-span-6 text-left">
                      <div class="inline-flex items-end">
  
                        <button wire:click.prevent="cancel()" class="w-40 ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            انصراف
                          </button>
                       <button wire:click.prevent="update()" class="w-40 bg-gradient-to-tr from-primary-500 to-[#00abc7] hover:from-[#00abc7] hover:to-primary-500 text-white font-bold py-2 px-6 rounded">ثبت تغییرات</button>
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
