<!DOCTYPE html>
<html>
<head>
  @include('includes.head')
</head>
<body>
  <header class="align-items-start">
    @include('includes.header')
  </header>
  <div class="container">
    <div id="main" class="row">
      @yield('content')
    </div>
    <footer class="row">
      @include('includes.footer')
    </footer>
  </div>
</body>
</html>