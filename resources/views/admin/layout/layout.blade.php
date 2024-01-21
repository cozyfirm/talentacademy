<html>
    <head>
        <title>{{ 'Welcome' }}</title>
        <script src="https://kit.fontawesome.com/cdf2a0a58b.js"></script>
        @vite(['resources/css/app.scss', 'resources/css/admin/admin.scss', 'resources/js/app.js'])
    </head>
    <body>
        @include('admin.layout.snippets.menu')
    </body>
</html>
