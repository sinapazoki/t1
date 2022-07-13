@extends('site.Admin.layouts.mater')
@section('title' , 'ارسال ایمیل خبرنامه')
@section('header-scripts')
<script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link type="text/css" rel="stylesheet" href="/jalalidatepicker.min.css" />
<script type="text/javascript" src="/jalalidatepicker.min.js"></script>
@endsection


@section('content')

@livewire('admin.email-form')
@endsection


@section('footer-scripts')
<script>
jalaliDatepicker.startWatch({
minDate:"today", //میتوان تاریخ هم وارد کرد
});
</script>

@endsection
