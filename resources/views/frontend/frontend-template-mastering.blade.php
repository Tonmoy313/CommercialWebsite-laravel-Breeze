<!DOCTYPE html>
<html lang="en">
  @include('frontend.layouts.header')
  <body>
   @include('frontend.layouts.nav-top')
   @include('frontend.layouts.brandingAreaTop')
   @include('frontend.layouts.navbar')

    
    @yield('main-content')

    @include('frontend.layouts.footerTop')
    @include('frontend.layouts.footerBottom')
   
    @include('frontend.layouts.footer')
  </body>
</html>