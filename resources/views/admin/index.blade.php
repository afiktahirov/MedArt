<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link id="pagestyle" href="{{ asset('assets/control/css/material-dashboard.min.css') }}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link href="{{ asset('assets/control/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/control/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('assets/front/icons/favicon.svg') }}" type="image/x-icon">
    <link href="{{ asset('assets/control/css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset("css/admin.css")}}">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <link rel="stylesheet" href="{{asset("css/swiper.min.css")}}">


    <script src="{{asset("js/custom.js")}}"></script>
    <title>Responsive Dashboard Design #2 | AsmrProg</title>
</head>

<body class="{{ Cache::get('darkMode') ? 'dark' : '' }}">

    <!-- Sidebar -->
    <div class="sidebar close">
        <a href="#" class="logo">
            <i class='bx bx-code-alt'></i>
            <div class="logo-name"><span>Adim</span>Panel</div>
        </a>
        <ul class="side-menu">
            <li class="{{request()->routeIs("admin.dashboard")?"active":""}}"><a href="{{route("admin.dashboard")}}"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li class="{{request()->routeIs("admin.shoup")?"active":""}}"><a href="{{route("admin.shoup")}}"><i class='bx bxs-news'></i>News</a></li>
            <li class="{{request()->routeIs("admin.dslider")?"active":""}}"><a href="{{route("admin.dslider")}}"><i class='bx bx-analyse'></i>Analytics</a></li>
            <li class="{{request()->routeIs("admin.settingsPages")?"active":""}}"><a href="{{route("admin.settingsPages")}}"><i class='bx bx-message-square-dots'></i>Tickets</a></li>
            <li class=""><a href="#"><i class='bx bx-group'></i>Users</a></li>
            <li class=""><a href="#"><i class='bx bx-cog'></i>Settings</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden {{ Cache::get('darkMode', false) ? 'checked' : ''}}>
            <label for="theme-toggle" class="theme-toggle" class="checked"></label>
            <a href="#" class="notif">
                <i class='bx bx-bell'></i>
                <span class="count">12</span>
            </a>
            <a href="#" class="profile">
                <img src="images/logo.png">
            </a>
        </nav>

        <!-- End of Navbar -->


        {{-- content --}}

        @yield("content")

    </div>

    <script src="{{asset("js/admin.js")}}"></script>
    <script src="{{ asset('assets/control/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/control/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/control/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/control/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/control/js/material-dashboard.min.js') }}"></script>
    <script src="{{ asset('assets/control/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/control/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>