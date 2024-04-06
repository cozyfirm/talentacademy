<html>
    <head>
        <title> @yield('title', 'Talent Academy') </title>
        <script src="https://kit.fontawesome.com/cdf2a0a58b.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.typekit.net/uyb8hzd.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        @vite(['resources/css/public-part/layout.scss', 'resources/js/app.js'])
    </head>

    <body>
        <!-- Static element on every page -->
        @include('public-part.layout.snippets.menu')

        <!-- Public content wrapper should be used in every public page -->
        <div class="public-content">
            <!-- Yield data into it -->
            @yield('public-content')
        </div>

        <!-- Static element on every page -->
        @include('public-part.layout.snippets.footer')
    </body>
</html>
