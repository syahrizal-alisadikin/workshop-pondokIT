<!DOCTYPE html>
<html lang="en">

@stack('before-styles')
@include('includes.styles')
@stack('after-styles')

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      {{-- navbar --}}
      @include('includes.navbar')
      {{-- sidebar --}}
      
      @include('includes.sidebar')
      <!-- Main Content -->
      <div class="main-content">
         @yield('content')
      </div>
      {{-- footer --}}
      @include('includes.footer')
    </div>
  </div>
  @stack('before-script')
  @include('includes.script')
  @stack('after-script')
 
</body>
</html>
