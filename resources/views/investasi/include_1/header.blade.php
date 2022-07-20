
<!-- header -->
    <header class="site-header mo-left header navstyle1">
        <div class="top-bar">
            <div class="container" style="padding-right: 0; padding-left: 0; margin-right: 0; margin-left: 0; max-width: none; margin-top: -5px;">
                <div class="d-flex justify-content align-items-center">
                <div class="alert alert-info no-radius" style="width: 100%; padding-left: 50px; padding-right: 50px;"><i class="fa fa-warning"></i> {{ __('header.covid19') }} <a href="{{ route('covid') }}">{{ __('header.covid19Button') }}</a> <img src="{{asset('images/bullet_red.png')}}" class="blink_me" style="margin-top: -3px;"></div>
                </div>
            </div>
            <div class="container">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="dlab-topbar-left">
                        <ul>
                            <li><a href="{{ route('tourism') }}">{{ __('header.tourism') }}</a></li>
                            <li><a href="{{ route('investasi') }}">{{ __('header.invest') }}</a></li>
                            <li><a href="{{ route('boplbf') }}">{{ __('header.authority') }}</a></li>
                        </ul>
                    </div>
                    <div class="dlab-topbar-right">
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @php $locale = session()->get('locale'); @endphp
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @switch($locale)
                                    @case('en')
                                    <img src="images/icon/uk.png" alt="" style="width: 30px;margin-right: 10px;">EN
                                    @break
                                    @case('id')
                                    <img src="images/icon/id.png" alt="" style="width: 30px;margin-right: 10px;">ID
                                    @break
                                    @default
                                    <img src="images/icon/id.png" alt="" style="width: 30px;margin-right: 10px;">ID
                                @endswitch
                                <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="lang/en"><img src="images/icon/uk.png" alt="" style="width: 30px;margin-right: 10px;">EN</a>
                                <a class="dropdown-item" href="lang/id"><img src="images/icon/id.png" alt="" style="width: 30px;margin-right: 10px;">ID</a>
                            </div>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- main header -->
        <div class="sticky-header main-bar-wraper navbar-expand-lg">
            <div class="main-bar clearfix ">
                <div class="container clearfix">
                    <!-- website logo -->
                    <div class="logo-header mostion">
                        <a href="{{route('home')}}"><img src="{{ asset('images/logo-boplbf3.png') }}" alt=""></a>
                    </div>
                    <!-- nav toggle button -->
                    <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <!-- Quik search -->
                    <div class="dlab-quik-search ">
                        <form action="#">
                            <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                            <span id="quik-search-remove"><i class="ti-close"></i></span>
                        </form>
                    </div>
                    <!-- main nav -->
                    <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
                        <div class="logo-header d-md-block d-lg-none">
                            <a href="{{route('home')}}"><img src="images/logo-8.png" alt=""></a>
                        </div>
                        <ul class="nav navbar-nav"> 
                            <li class="has-mega-menu"> <a href="{{route('investasi')}}#home">{{ __('header.home') }}</a></li>
                            <li class="has-mega-menu"> <a href="{{route('investasi')}}#invesment">{{ __('header.opportunity') }}</a></li>
                            <li class="has-mega-menu"> <a href="{{route('investasi')}}#factsheet">{{ __('header.factsheet') }}</a></li>
                            <li class="has-mega-menu"> <a href="{{route('investasi')}}#invest">{{ __('header.howTo') }}</a></li>
                            <li class="has-mega-menu"> <a href="{{route('investasi')}}#bussiness">{{ __('header.insider') }}</a></li>
                        </ul>
                        <div class="dlab-social-icon">
                            <ul>
                                <li><a class="site-button circle fa fa-facebook" href="javascript:void(0);"></a></li>
                                <li><a class="site-button  circle fa fa-twitter" href="javascript:void(0);"></a></li>
                                <li><a class="site-button circle fa fa-linkedin" href="javascript:void(0);"></a></li>
                                <li><a class="site-button circle fa fa-instagram" href="javascript:void(0);"></a></li>
                            </ul>
                        </div>      
                    </div>
                </div>
            </div>
        </div>
        <!-- main header END -->
    </header>
<!-- header END -->