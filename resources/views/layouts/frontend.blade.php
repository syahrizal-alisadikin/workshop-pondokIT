<!DOCTYPE html>
<html lang="en">

{{-- head --}}
@include('includes.frontend.styles')
@stack('after-style')
<body>
   <!-- Header -->
@include('includes.frontend.header')
  
   <!-- Header -->

   @yield('content')
   <!-- Product -->
   <!-- Footer -->
   @include('includes.frontend.footer')
   <!-- Footer -->

   @include('includes.frontend.script')
   @stack('after-script')
   
</body>

</html>