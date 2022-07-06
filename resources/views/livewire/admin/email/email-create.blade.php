<div>

  <div class="bg-gray-100 flex items-center justify-center">
      <div class="container mx-auto">
        <div>
             <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-2">


            

              <div class="lg:col-span-2">

                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">

                  <div class="md:col-span-2">
                    <label for="name">عنوان پیام</label>
                    <input wire:model="title" type="text" name="title" class="mt-4 h-10 border rounded px-4 w-full bg-gray-50" value="" />
                    @error('title')
                    {{$message}}
                    @enderror
                  </div>





                  <div wire:ignore class="mt-2 md:col-span-2">
                    <label class="mb-[5px]" for="user_id">انتخاب ایمیل</label>
                    <select multiple wire:model="email_id" id="select2-dropdown"  class="emails-list h-10 border rounded px-4 w-full bg-gray-50">
                      <option value="all">انتخاب همه</option>
                        @foreach ($email_lists as $email )
                        <option value="{{$email->email}}">{{$email->email}}</option>
                        @endforeach

                    </select>
                        @error('email_id')
                        {{$message}}
                        @enderror


                            <script>
                        $(document).ready(function () {
                            $('#select2-dropdown').select2({
                                width: '100%',
                                placeholder: "یک ایمیل انتخاب کنید ...",
                            });
                            $('#select2-dropdown').on('change', function (e) {
                                let data = $(this).val();
                                @this.set('email_id', data);
                            });
                            window.livewire.on('productStore', () => {
                                $('#select2-dropdown').select2();
                            });

                            $('.emails-list').on("select2:select", function (e) { 
                              var data = e.params.data.text;
                              if(data=='انتخاب همه'){
                                $(".emails-list > option").prop("selected","selected");
                                $(".emails-list > option:nth-child(1)").prop("selected","");
                                $(".emails-list").trigger("change");
                              }
                          });
                        });
                        
                    </script>

                    </div>








                  <div class="md:col-span-2">
                    <label for="name">تاریخ ارسال</label>
                    <input data-jdp wire:model="time" name="time"  class="mt-4 h-10 border rounded px-4 w-full bg-gray-50" />
                    @error('time')
                    {{$message}}
                    @enderror
                  </div>
                  
                  

                  <div class="md:col-span-6">
                    <label for="email">متن پیام</label>
                    <textarea  wire:model="text"  name="text" class="border mt-4 rounded p-4 w-full bg-gray-50" value="" placeholder="email@domain.com" ></textarea>
                    @error('text')
                    {{$message}}
                   @enderror
                  </div>


                

 

                  <div class="md:col-span-6 text-left">
                    <div class="inline-flex items-end">
                      <button wire:click.prevent="SendEmailNotifies()" class="w-40 bg-gradient-to-tr from-primary-500 to-[#00abc7] hover:from-[#00abc7] hover:to-primary-500 text-white font-bold py-2 px-6 rounded">ارسال پیام</button>
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
