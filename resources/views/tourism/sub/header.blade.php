
<!-- header -->
<header class="site-header mo-left header navstyle1" >
    <div class="top-bar" style="background: #f3f3f3;">
        <div class="container">
            <div class="alert" style='padding:0px !important;padding-top:10px !important;' >
                <a href="javascript:void(0);" class="close ti-close" data-dismiss="alert" aria-label="close"></a>
                <a href="{{ route('covid') }}"><i class="fa fa-exclamation-circle" style="color:#ec1a39"></i><b style="color:#000"> Policies and Information Related To Covid-19, Click Here <i class="fa fa-arrow-right"></i></b></a>
            </div>
        </div>
    </div>
    <div class="top-bar">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="dlab-topbar-left">
                    <ul>
                        <li><a href="{{ route('investasi') }}">Industry & Investment</a></li>
                        <li><a href="{{ route('profile') }}">LBF Tourism Authority</a></li>
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
                <div class="logo-header mostion logo-white">
                    <a href="{{ route('home') }}"><img src="{{asset('images/logo-boplbf2.png')}}" alt=""></a>
                </div>
                <!-- nav toggle button -->
                <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <!-- main nav -->
                <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
                    <div class="logo-header d-md-block d-lg-none">
                        <a href="{{ route('profile') }}"><img src="{{asset('images/logo-7.png')}}" alt=""></a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="has-mega-menu"> <a href="#home">Home</a></li>
                        <li class="has-mega-menu"> <a href="#profile">Labuan Bajo</a></li>
                        <li class="has-mega-menu"> <a href="#beyond">Beyond Labuan Bajo</a></li>
                        <li class="has-mega-menu"> <a href="#attraction">Attraction</a></li>
                        <li class="has-mega-menu"> <a href="#Booking" class="site-button radius-no btnhover13" style="line-height:unset;color: #fff">Online Booking</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- main header END -->
</header>
<!-- header END -->