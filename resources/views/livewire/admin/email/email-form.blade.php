<div>




       <div class="flex items-center justify-center ">
        <div class="container">

                @include('livewire.admin.email.email-create')
                @if (count($crons) > 0 )
                @include('livewire.admin.email.email-cron')
                @endif

                <h2>ایمیل های ثبت شده</h2>
            <table class="w-full bg-white flex flex-row text-right flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                <thead class="text-white text-center">
                    <tr class="bg-gradient-to-tr from-primary-500 to-[#00abc7] flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        {{-- <th class="px-4 py-3">انتخاب</th> --}}
                        <th class="px-4 py-3">ردیف</th>
                        <th class="px-4 py-3">تاریخ ثبت</th>
                        <th class="px-4 py-3">ایمیل</th>
                        <th class="px-4 py-3">اقدامات</th>
                    </tr>
                </thead>
                <tbody class="flex-1 sm:flex-none">
                    @foreach ( $emails as $email)
                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 transition hover:bg-gray-100 sm:mb-0 text-gray-700 text-center">
                        {{-- <td class="px-4 py-3 text-sm">
                               <input type="checkbox" wire:model="email_id" name="email_id[]" value="{{$email->email}}">
                        </td> --}}
                        <td class="px-4 py-3 text-sm">
                          {{$loop->iteration}}
                          </td>

                        <td class="px-4 py-3 text-sm">
                            {{-- {{jdate($user->created_at)->format('%d %B، %Y')}} --}}
            
                            {{jdate($email->created_at)}}

                        </td>
                         <td class="px-4 py-3 text-sm">
                            {{$email->email}}
                        </td>
                        
                        <td class="px-4 py-3 text-sm">
                            <div class="flex justify-center items-center">
                                <a class="cursor-pointer flex items-center mr-3 pl-2 border-l-2" wire:click="edit({{ $email->id }})"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> ویرایش </a>
                                <a class="text-rose-600 cursor-pointer flex items-center text-theme-6 pr-2" onclick="confirm('آیا از حذف ایمیل مطمئن هستید ؟') || event.stopImmediatePropagation()" wire:click="delete({{ $email->id }})"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> حذف </a>
                            </div>
                        </td>
                      </tr>

                    @endforeach

                </tbody>
            </table>


            {{ $emails->links() }}
        </div>
      </div>
</div>
