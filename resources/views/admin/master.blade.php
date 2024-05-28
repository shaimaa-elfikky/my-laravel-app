<!doctype html>
<html lang="en">
@include('admin.parcials.head')

<body class="vertical  light  @if ($dir =  LaravelLocalization::getCurrentLocale() == 'ar' ) rtl

@endif">
    <div class="wrapper">
        @include('admin.parcials.navbar')
        @include('admin.parcials.sidebar')
        <!-- main -->

        @yield('content')
    </div> <!-- .wrapper -->
    @include('admin.parcials.script')
</body>

</html>
