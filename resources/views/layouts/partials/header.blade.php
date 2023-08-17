    <header class="site-header">
        <div class="nav-bar">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                        <div class="site-branding d-flex align-items-center">
                            <a class="d-block" href="" rel="home"><img class="d-block"
                                    src="{{ asset('images/logo.png') }}" alt="logo"></a>
                        </div>
                        <nav class="site-navigation d-flex justify-content-end align-items-center">
                            <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-items-center">
                                <li class="{{ empty(request()->segment(2)) ? 'current-menu-item' : '' }}"><a
                                        href="{{ route('home', ['locale' => app()->getLocale()]) }}">{{__("words.homepage")}}</a></li>
                                <li class="{{ request()->routeIs('about') ? 'current-menu-item' : '' }}"><a
                                        href="{{ route('about', ['locale' => app()->getLocale()]) }}">{{__("words.about_us")}}</a></li>
                                <li class="{{ request()->routeIs('services') ? 'current-menu-item' : '' }}"><a
                                        href="{{ route('services', ['locale' => app()->getLocale()]) }}">{{__("words.services")}}</a></li>
                                <li class="{{ request()->routeIs('news') ? 'current-menu-item' : '' }}"><a
                                        href="{{ route('news', ['locale' => app()->getLocale()]) }}">{{__("words.news")}}</a></li>
                                <li class="{{ request()->routeIs('contact') ? 'current-menu-item' : '' }}"><a
                                        href="{{ route('contact', ['locale' => app()->getLocale()]) }}">{{__("words.contact")}}</a></li>
                                <li><a href="{{ route('home', ['locale' => app()->getLocale()]) }}"><i style="font-size:35px;"
                                            class="fa-solid fa-circle-user"></i></a></li>
                                <li class="call-btn button gradient-bg mt-3 mt-md-0">
                                    <a class="d-flex justify-content-center align-items-center" href="#"><img
                                            src="{{ asset('images/emergency-call.png') }}"> +994773883238</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="hamburger-menu d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @if (empty(request()->segment(2)))
            @include('home.partials.header')
        @endif
        @if (request()->is('*/about*'))
            @include('aboute.partials.header')
        @endif
        @if (request()->is('*/services'))
            @include('services.partials.header')
        @endif
        @if (request()->is('*/news*'))
            @include('news.partials.header')
        @endif
        @if (request()->is('*/contact*'))
            @include('contact.partials.header')
        @endif
    </header>
