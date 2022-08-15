<!DOCTYPE html>
<html lang="zxx">


<head>
    <meta charset="utf-8">
    <title>BIZTROX @yield('title')</title>


    <!-- mobile responsive meta -->
    @include('front.includes.assets.css')

</head>

<body>


<!-- preloader start -->
<div class="preloader">
    <img src="src="{{asset('/')}}front-assets/images/preloader.gif" alt="preloader">
</div>
<!-- preloader end -->

<!-- navigation -->
<header>
    <!-- top header -->
   @include('front.includes.header')
    <!-- nav bar -->
    @include('front.includes.menu')
</header>

<!-- Search Form -->
@include('front.includes.search-form')
<!-- /navigation -->

@yield('body')
<!-- /client logo slider -->

<!-- footer -->
@include('front.includes.footer')
<!-- /footer -->
@include('front.includes.assets.script')

</body>

</html>
