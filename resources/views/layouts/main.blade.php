<html>
    <head>
        <title>Alpha - @yield('title')</title>
        <link rel="stylesheet" href="/css/styles.css">

    </head>
    <body>
        @yield('content')

        <script src="/bower_resources/jquery/dist/jquery.js"></script>
        <script src="/bower_resources/bootstrap/dist/js/bootstrap.js"></script>
        <script src="/bower_resources/bootstrap-material-design/dist/js/material.js"></script>
        <script src="/bower_resources/bootstrap-material-design/dist/js/ripples.js"></script>
        <script src="/bower_resources/vue/dist/vue.js"></script>
        <script src="/js/main.js"></script>
        <script src="/js/bundle.js"></script>
        <script>$.material.init()</script>
    </body>
</html>
