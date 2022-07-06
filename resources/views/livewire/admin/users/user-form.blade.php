<div>

    @if ($updateMode)
    @include('livewire.admin.users.user-update')
    @else
    @include('livewire.admin.users.user-create')

    @endif

       <div class="flex items-center justify-center ">
        <div class="container">



            <table class="w-full bg-white flex flex-row text-right flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                <thead class="text-white text-center">
                    <tr class="bg-gradient-to-tr from-primary-500 to-[#00abc7] flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <th class="px-4 py-3">ردیف</th>
                        <th class="px-4 py-3">نام و نام خانوادگی</th>
                        <th class="px-4 py-3">تاریخ عضویت</th>
                        <th class="px-4 py-3">ایمیل</th>
                        <th class="px-4 py-3">شماره تلفن</th>
                        <th class="px-4 py-3">تایید شماره تلفن</th>
                        <th class="px-4 py-3">وضعیت کاربر</th>
                        <th class="px-4 py-3">اقدامات</th>
                    </tr>
                </thead>
                <tbody class="flex-1 sm:flex-none">
                    @foreach ( $users as $user)
                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 transition hover:bg-gray-100 sm:mb-0 text-gray-700 text-center">
                        <td class="px-4 py-3 text-sm">
                          {{$loop->iteration}}
                          </td>
                        <td class="px-4 py-3">
                          <div class="flex items-center text-sm">
                            <div class="relative hidden w-8 h-8 ml-3 rounded-full md:block">
                                @if ($user->image)
                                <img class="object-cover w-full h-full rounded-full" src="{{asset($user->image)}}" alt="" loading="lazy">
                                @else
                                <img class="object-cover w-full h-full rounded-full" src="{{asset('/storage/admin-image/profile.jpeg')}}" alt="" loading="lazy">
                                @endif
                              <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                              <p class="font-semibold">{{$user->first_name.' '.$user->last_name}}</p>
                              <p class="text-xs text-gray-600 dark:text-gray-400">
                                {{ $user->role_id == 2 ? "کاربر" : "ادمین" }}
                              </p>
                            </div>
                          </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{-- {{jdate($user->created_at)->format('%d %B، %Y')}} --}}
            
                            {{jdate($user->created_at)}}

                        </td>
                         <td class="px-4 py-3 text-sm">
                            {{$user->email}}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{$user->phone}}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            @if ($user->phone_verified_at)
                            {{jdate($user->phone_verified_at)}}
                            @endif
                        </td>
                        <td class="px-4 py-3 text-xs">
                            @if ($user->status == 1)
                            <a wire:click="status({{ $user->id }})" class="cursor-pointer justify-center flex items-center text-green-600"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 ml-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                          تایید شده
                            </a>
                           @else
                           <a wire:click="status({{ $user->id }})" class="cursor-pointer justify-center flex items-center text-red-600"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 ml-2 text-red"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                        تایید نشده
                           @endif </a>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <div class="flex justify-center items-center">
                                <a class="cursor-pointer flex items-center mr-3 pl-2 border-l-2" wire:click="edit({{ $user->id }})"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> ویرایش </a>
                                <a class="text-rose-600 cursor-pointer flex items-center text-theme-6 pr-2" onclick="confirm('آیا از حذف کاربر مطمئن هستید ؟') || event.stopImmediatePropagation()" wire:click="delete({{ $user->id }})"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> حذف </a>
                            </div>
                        </td>
                      </tr>

                    @endforeach

                </tbody>
            </table>
            {{-- {{ $users->links() }} --}}
        </div>
      </div>
</div>
