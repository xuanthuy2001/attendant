<html lang="en"><head>
    <meta charset="utf-8">
    <title>quản lý - @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- third party css -->
    <link href="{{ asset('css/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css">
    <!-- third party css end -->

    <!-- App css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app-creative.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app-creative-dark.min.css') }}" rel="stylesheet" type="text/css">
    @yield('css')
</head>

<body class="" >
    <div class="wrapper mm-active">
            @include('layout.sidebar')
        <div class="content-page">
            <div class="content">
                @include('layout.topbar')
                    <div class="container-fluid">
                        @yield('content')
                    </div>
            </div>

            @include('layout.footer')

        </div>

      

    </div>
    <script src="{{ asset('js/vendor.min.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>

    <!-- third party js -->
    <script src="{{ asset('js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('js/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('js/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- third party js ends -->

    <!-- demo app -->
    <script src="{{ asset('js/demo.dashboard.js') }}"></script>
    @yield('js')
    <!-- end demo js-->
</body></html>