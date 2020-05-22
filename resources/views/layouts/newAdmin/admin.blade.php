<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="subject" content="Model">
  <meta name="copyright" content="Model">
  <meta name="language" content="ES">
  <meta name="classification" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="Model">
  @include('layouts.newAdmin.styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed text-sm">
  <div class="wrapper" id="app">
    @include('layouts.newAdmin.nav')
    @include('layouts.newAdmin.sidebar')
    <div class="content-wrapper bg-white">
      @yield('content')
    </div>
    @include('layouts.newAdmin.footer')
  </div>
  @include('layouts.newAdmin.scriptInclude')
</body>

</html>