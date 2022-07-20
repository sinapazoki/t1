@extends('site.Customer.layouts.master')
@section('title' , $post->seo_title)



@section('header-scripts')
<script src="//unpkg.com/alpinejs" defer></script>
<link rel="canonical" href="{{asset($post->path())}}" />
<meta name="description" content="{{$post->seo_description}}">

@endsection


@section('content')

  <section class="relative block h-[13rem] mt-12">
    <div class="absolute top-0 w-full h-full bg-left sm:bg-center bg-cover" >
      <span id="blackOverlay" class="w-full h-full absolute bg-gray-200">
        <div class="max-w-7xl mx-auto relative top-[20%] sm:top-[30%] p-4">

        <div class="md:top-1/4 text-[#071623] bg-white sm:bg-inherit text-white p-4 sm:p-0 rounded-lg ">
            <p class="text-2xl md:text-4xl">وبلاگ</p>
            <div class="breadcrumbs">
              <!-- Breadcrumb NavXT 6.4.0 -->
              <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="" href="/" class="home text-[12px] md:text-[16px]">
                  <span property="name">{{Config::get('seo.name')}}</span>
                </a>
                <meta property="position" content="1">
              </span> 
                  <i class="fa fa-angle-left"></i> <span property="itemListElement" typeof="ListItem">
                  <a property="item" typeof="WebPage" title="Go to the مقالات category archives." href="/posts" class="taxonomy category text-[12px] md:text-[16px]">
                  <span property="name">مقالات</span>
                </a>
                <i class="fa fa-angle-left"></i> <span property="itemListElement" typeof="ListItem">
                  <a property="item" typeof="WebPage" title="Go to the category archives." href="{{$post->PostCategoryPath()}}" class="taxonomy category text-[12px] md:text-[16px]">
                    <span property="name">{{$post->PostCategory->name}}</span>
                  </a>
                <meta property="position" content="2"></span> <i class="fa fa-angle-left"></i> <span class="text-[12px] md:text-[16px] post post-post current-item">{{$post->title}}</span>
              </div>

        </div>
        </div>
      </span>
    </div>
  </section>


  <section class="single-blog-page relative pb-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 pt-14 sm:mt-0 sm:pt-6">
        <div class="relative flex flex-col min-w-0 break-words w-full rounded-lg">
        <div class="md:grid lg:grid-cols-12 gap-3 mb-20 relative ">
            <div class=" xl:col-span-9 lg:col-span-8  break-word rounded-lg px-4 py-6 bg-white ">  

                 <h1 class="flex items-center text-primary-800 text-xl md:text-4xl pb-6 font-bold">{{$post->title}}</h1>
                 <hr>


                <div class="flex space-x-6 space-x-reverse text-[13px] mt-4">
                  <div class="flex space-x-2 flex-col-reverse md:flex-row-reverse justify-end items-center">
                    <span class="text-center blog-detail">{{jdate($post->created_at)->format('%d %B، %Y')}}</span> <i class="w-4 text-primary-500" data-feather="clock"></i>
                  </div>
                  <div class="flex space-x-2 flex-col-reverse md:flex-row-reverse justify-end items-center">
                    <span class="text-center blog-detail">توسط : {{$post->Author->last_name}}</span> <i class="w-4 text-primary-500"  data-feather="user"></i>
                  </div>
                  <div class="flex space-x-2 flex-col-reverse md:flex-row-reverse justify-end items-center">
                    <a  class="text-center blog-detail" href="{{$post->PostCategoryPath()}}">{{$post->PostCategory->name}}</a> <i class="w-4 text-primary-500" data-feather="folder"></i>
                  </div>
                  <div class="flex space-x-2 flex-col-reverse md:flex-row-reverse justify-end items-center">
                    <span class="text-center blog-detail">{{$post->reads}} بازدید</span> <i class="w-4 text-primary-500" data-feather="eye"></i>
                  </div>
                </div>

                  <div>
                    <img class="mt-6 w-full" src="{{asset($post->image)}}" alt="{{$post->title}}">
                  </div>

              
                 <div class="text-justify text-slate-500 pt-3 leading-8">
                     {!!$post->body!!}


                </div>

            </div>
           

{{-- show related and more blogs --}}

            <div class="xl:col-span-3 break-words lg:col-span-4 mt-4 md:mt-0">
              <div class="bg-white px-6 py-6 shadow-sm rounded-lg ">
                  <h3 class="flex items-center text-primary-800 pt-4 text-xl font-bold"><i class="bg-primary-800 ml-1 w-2 h-2 rounded-full sm:flex hidden"></i>مطالب پیشنهادی</h3>
                  <div class="mt-2">
                    @foreach ( $related as $item )
                    <div class="group sm:px-4 px-2 py-3 border-b-[1px] border-gray-80 border-opacity-60">
                        <div>
                            <div class="flex items-center">
                                <div class="w-12 rounded-md ml-2  flex items-center justify-center flex-shrink-0">
                                    <a href="{{$item->path()}}">
                                        <img class="w-full h-full object-cover rounded-lg" src="{{asset($item->image)}}" alt="{{$item->title}}">
                                    </a>
                                </div>
                                <div>
                                  <h3 class="text-sm"><a href="{{$item->path()}}">{{$item->title}}</a></h3>
                                  <div class="flex space-x-3 space-x-reverse" >
                                    <div class="flex space-x-2 flex-row-reverse justify-end items-center">
                                      <span class="text-[10px]">{{jdate($post->created_at)->format('%d %B، %Y')}}</span> <i class="w-4 text-primary-500" data-feather="clock"></i>
                                    </div>
                                    <div class="flex space-x-2 flex-row-reverse justify-end items-center">
                                      <span class="text-[10px]">{{$post->reads}} بازدید</span> <i class="w-4 text-primary-500" data-feather="eye"></i>
                                    </div>
                                  </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
              </div>


                          {{-- show all blog categories --}}
              <div class="bg-white px-6 py-6 shadow-sm rounded-lg mt-5">
                <h3 class="flex items-center text-primary-800 pt-4 text-xl font-bold"><i class="bg-primary-800 ml-1 w-2 h-2 rounded-full sm:flex hidden"></i>دسته بندی ها</h3>
                <div class="mt-2">
                  @foreach ( $categories as $category )
                  <div class="group sm:px-4 px-2 py-3 border-b-[1px] border-gray-80 border-opacity-60">

                    <ul class="post-category">
                      <li class="text-sm"><a href="{{$category->PostCategoryPath()}}">{{$category->name}}</a></li>
                    </ul>

                  </div>
                  @endforeach
              </div>
            </div>
          </div>






          </div>
        </div>
    </div>
</section>
    

@endsection



@section('footer-scripts')

  @endsection


