<html>
    <head>
        <title>{{ 'Welcome' }}</title>
        <script src="https://kit.fontawesome.com/cdf2a0a58b.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        @vite(['resources/css/app.scss', 'resources/css/admin/admin.scss', 'resources/js/app.js'])
    </head>
    <body>
        @include('admin.layout.snippets.menu')

        <!-- Main page content -->
        <div class="main-content">
            <!-- Basic header of every page -->
            @include("admin.layout.snippets.content.content-menu")

            <!-- Main content of every page -->
            @yield('content')
        </div>
    </body>
</html>
