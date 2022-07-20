@extends('site.Customer.layouts.master')
@section('title' , isset($post_category) ? $post_category->name : 'مقالات' )



@section('header-scripts')
<script src="//unpkg.com/alpinejs" defer></script>
<link rel="canonical" href="{{  Request::url() }}" />
@endsection


@section('content')

  <section class="relative block h-[13rem] mt-12">

    <div class="absolute top-0 w-full h-full bg-left sm:bg-center bg-cover" >
      <span id="blackOverlay" class="w-full h-full absolute bg-gray-200">
        <div class="max-w-7xl mx-auto relative top-[20%] sm:top-[30%] p-4">

        <div class="md:top-1/4 text-[#071623] bg-white sm:bg-inherit text-white p-4 sm:p-0 rounded-lg ">
            <h1 class="text-2xl md:text-4xl">
              @if (isset($post_category))
              {{ $post_category->name}}
              @else
              مقالات
              @endif
            </h1>
            <div class="breadcrumbs">
              <!-- Breadcrumb NavXT 6.4.0 -->
              <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="" href="/" class="home text-[12px] md:text-[16px]">
                  <span property="name">{{Config::get('seo.name')}}</span>
                </a>
                <meta property="position" content="1"></span> 
                  <i class="fa fa-angle-left"></i> <span property="itemListElement" typeof="ListItem">
                  <a property="item" typeof="WebPage" title="Go to the مقالات category archives." href="#" class="taxonomy category text-[12px] md:text-[16px]">
                  <span property="name"> 
                    @if (isset($post_category))
                    {{ $post_category->name}}
                    @else
                    مقالات
                    @endif
                  </span>
                </a>
              </div>

        </div>
        </div>
      </span>
    </div>
  </section>


  <section class="blog-page relative pb-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 pt-14 sm:mt-0 sm:pt-6">
        <div class="relative flex flex-col min-w-0 break-words w-full rounded-lg">
          @if (count($posts) == 0)
          <div class="text-center mt-10">
            <img class="m-auto" src="{{asset('storage/admin-image/noblog.png')}}" >
        <div class="text-2xl md:text-4xl mb-5">هیچ محتوایی در دسترس نیست !</div>
        <span class="text-xl ">برای مشاهده مقالات کلیک کنید</span>
        <a href="{{asset('/posts')}}"><button class="btn btn-outline btn-sm flex mx-auto mt-5">مشاهده مقالات</button>        </a>
        </div>      
          @endif  
        <div class="md:grid lg:grid-cols-4 gap-3 mb-20 relative ">
   
          @foreach ( $posts as $post )
            

              <div class="p-4" >
                <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                   
                  <a href="{{asset($post->Path())}}" class=" inline-block overflow-hidden w-full rounded-lg">

                  @if ($post->image)
                  <img class="lg:h-64 md:h-36 w-full object-cover object-center" src="{{asset($post->image)}}" alt="{{$post->name}}">
                  @else
                  <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="/storage/site/holder.png">
                  @endif
                  </a>

                  <div class="p-4">

                    <span class="flex items-center mb-[10px] z-10 rounded-lg p-1 text-primary-900 text-[13px] mx-auto">
                      <i class="w-4 ml-1 text-primary-500" data-feather="folder"></i>  {{$post->PostCategory->name}}
                  </span>
                  <a href="{{asset($post->Path())}}" class="mb-2 inline-block">
                      <span class="text-[1.1rem] font-bold text-gray-800 hover:text-blue-700 duration-200 transition">{{$post->title}}</span>
                  </a>
                      <?php
                          $string_without_tags = strip_tags($post->body); 
                          $paragraph=substr($string_without_tags,0,220) . '...';
                      ?>
                  <div class="mb-2 text-gray-360 text-[12px] text-justify font-normal overflow-hidden leading-4">{!!$paragraph!!}</div>


                  <div class="flex items-center flex-wrap " style="    display: flex;    flex-direction: row-reverse;">
                    <a href="{{asset($post->Path())}}" class="text-primary-800  md:mb-2 lg:mb-0">
                      <p class="inline-flex items-center flex-row-reverse text-sm">مشاهده مطلب
                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M5 12h14"></path>
                          <path d="M12 5l7 7-7 7"></path>
                        </svg>
                      </p>
                    </a>
                    <span class="text-gray-400 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm py-1 border-gray-200">
                      <i class="w-4 ml-1 text-primary-500" data-feather="eye"></i>
                      {{$post->reads}}
                    </span>

                  </div>
                    
                    
                  </div>
                </div>
              </div>
              @endforeach

        </div>
    </div>
</section>
    

@endsection



@section('footer-scripts')

  @endsection


