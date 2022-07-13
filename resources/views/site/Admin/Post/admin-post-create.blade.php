@extends('site.Admin.layouts.mater')
@section('title' , 'ایجاد وبلاگ')
@section('header-scripts')
<script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

@endsection


@section('content')


@livewire('admin.post-create' ,  ['name' => Config::get('seo.name')])


@endsection


@section('footer-scripts')

<script>

        var route_prefix = "{{route('unisharp.lfm.show')}}";
        $('#lfm').filemanager('image', {prefix: route_prefix});
    
    </script>
@endsection
