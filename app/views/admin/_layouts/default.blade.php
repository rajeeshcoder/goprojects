<!doctype html>
<html lang="en" >
<head>
        <meta charset="utf-8">
        <title>Car Service</title>

        @include('common.includes.assets')
        <script>
    	angular.module("app").constant("CSRF_TOKEN", '<?php echo csrf_token(); ?>');
  </script>
</head>
<body>
<div class="container">
        @include('admin._partials.header')

        @yield('main')
</div>
</body>
</html>