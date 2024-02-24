<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>E-Libs JCC Batch 2</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('theme/images/logo-elibs.png')}}">
    <!-- Custom Stylesheet -->
    <link href="{{asset('theme/css/style.css')}}" rel="stylesheet">
    @stack('style')
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="{{asset('theme/images/logo-elibs.png')}}" alt=""> </b>
                    <span class="logo-compact"><img src="{{asset('theme/./images/logo-elibs-compact.png')}}" alt=""></span>
                    <span class="brand-title">
                        <img src="{{asset('theme/images/logo-elibs-text.png')}}" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @include('partial.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @if (Auth::user()->enrole->role_id == 1)
            @include('partial.sidebar')
        @else
            @include('partial.usidebar')
        @endif
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard </a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p style="margin: 0em;">&copy; 2023. Hand-crafted & Made with <span style="color:#e25555">❤</span></p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('theme/plugins/common/common.min.js')}}"></script>
    <script src="{{asset('theme/js/custom.min.js')}}"></script>
    <script src="{{asset('theme/js/settings.js')}}"></script>
    <script src="{{asset('theme/js/gleek.js')}}"></script>
    <script src="{{asset('theme/js/styleSwitcher.js')}}"></script>
    
    @stack('scripts')
</body>

</html>