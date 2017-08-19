<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('slick-1.6.0/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('slick-1.6.0/slick/slick-theme.css') }}" rel="stylesheet">
    <link href='http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('pageloader/pageloader.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        @include('inc.cookie')
        <aside>
            @include('inc.nav')
        </aside>

        <div class="wrapper">
            @yield('content')
        </div>

    </div>

    <script src="{{ asset('js/app.js') }}"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('slick-1.6.0/slick/slick.min.js') }}"></script>
    <script src="{{ asset('pageloader/pageloader.js') }}"></script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-68136515-2', 'auto');
      ga('send', 'pageview');

    </script>
</body>
</html>