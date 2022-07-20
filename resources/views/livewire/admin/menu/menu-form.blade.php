<div>

    <div class="flex items-center justify-center ">
        <div class="container">


            @if ($updateMode)
            @include('livewire.admin.menu.menu-update')
            @else
            @include('livewire.admin.menu.menu-create') 
            @endif

  
                <h2> تنظیمات منو سایت </h2>
            <table class="w-full bg-white flex flex-row text-right flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                <thead class="text-white text-center">
                    <tr class="bg-gradient-to-tr from-primary-500 to-[#00abc7] flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        {{-- <th class="px-4 py-3">انتخاب</th> --}}
                        <th class="px-4 py-3">اولویت</th>
                        <th class="px-4 py-3">نام</th>
                        <th class="px-4 py-3">آدرس</th>
                        <th class="px-4 py-3">منو والد</th>
                        <th class="px-4 py-3">وضعیت</th>
                        <th class="px-4 py-3">اقدامات</th>
                    </tr>
                </thead>
                <tbody wire:sortable="updateMenuOrder" class="flex-1 sm:flex-none">
                    @foreach ( $menus as $menu)
                    <tr wire:sortable.item="{{ $menu->id }}" wire:key="menu-{{ $menu->id }}"  class="flex flex-col flex-no wrap sm:table-row mb-2 transition hover:bg-gray-100 sm:mb-0 text-gray-700 text-center">

                        <td wire:ignore class="px-4 py-3 text-sm">
                            <span class="cursor-move" wire:sortable.handle>
                                <img class="m-auto w-5" src="{{asset('storage/admin-image/icons/move-arrows.png')}}" />                       
                            </span>
                        </td>

                        <td class="px-4 py-3 text-sm">
            
                            {{$menu->name}}

                        </td>
                        <td class="px-4 py-3 text-sm">
            
                            {{$menu->url}}

                        </td>
                         <td class="px-4 py-3 text-sm">
                            @if ($menu->parent_id)
                            {{$menu->parent->name}}
                            @else
                            بدون والد
                            @endif
                        </td>


                        <td class="px-4 py-3 text-xs">
                            @if ($menu->status == 1)
                            <a wire:click="status({{ $menu->id }})" class="cursor-pointer justify-center flex items-center text-green-600"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 ml-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                          منتشر شده
                            </a>
                          @else
                          <a wire:click="status({{ $menu->id }})" class="cursor-pointer justify-center flex items-center text-red-600"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 ml-2 text-red"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                            منتشر نشده
                          @endif </a>
                        </td>
                        
                        
                        <td class="px-4 py-3 text-sm">
                            <div class="flex justify-center items-center">
                                <a class="cursor-pointer flex items-center mr-3 pl-2 border-l-2" wire:click="edit({{ $menu->id }})"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> ویرایش </a>
                                <a class="text-rose-600 cursor-pointer flex items-center text-theme-6 pr-2" onclick="confirm('آیا از حذف ایمیل مطمئن هستید ؟') || event.stopImmediatePropagation()" wire:click="delete({{ $menu->id }})"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> حذف </a>
                            </div>
                        </td>
                      </tr>

                    @endforeach

                </tbody>
            </table>


        </div>
      </div>


    </div>
