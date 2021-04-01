<div class="right-sidebar bg-sidenav">
    <div class="slimscrollright">

        <span class="menu-span"><i class="ti-close right-side-toggle"></i></span>
        <!--
            <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
        -->
        
        <div class="r-panel-body p-0">
             <nav class="sidebar-nav active" style="padding: 0">
                <ul id="sidebarnav" class="in">
                    <!--<li class="nav-small-cap">--- PERSONAL</li>-->
                    @auth
                    <li>
                        <div class="sideBarImageHold" style="background:url({{ asset('storage/background_image/'.auth()->user()->background_image) }})">
                            <center>
                                <div class="sideBarImage">
                                    <img src="{{asset('storage/profile_image/'.auth()->user()->profile_image)}}" alt="{{env('APP_NAME')}}">
                                </div>
                                <p class="textWhite mt-1"><b>{{ ucfirst(auth()->user()->name) }}</b></p>
                                <p class="textWhite"><b>{{ auth()->user()->email }}</b></p>
                            </center>
                        </div>
                    </li>     
                    @endauth                            
                    <li>
                        <a class="waves-effect waves-dark" href="/" aria-expanded="false">
                            <i class="fa fa-circle text-white"></i>
                            <span >Home</span>
                        </a>
                    </li>
                    @auth
                    <li>
                        <a class="waves-effect waves-dark" href="{{ route('profile') }}" aria-expanded="false">
                            <i class="fa fa-circle text-white"></i>
                            <span >My Profile</span>
                        </a>
                    </li>
                    @endauth
                    <li>
                        <a class="waves-effect waves-dark" href="{{ route('pricing') }}" aria-expanded="false">
                            <i class="fa fa-circle text-white"></i>
                            <span >Pricing</span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="{{ route('about-us') }}" aria-expanded="false">
                            <i class="fa fa-circle text-white"></i>
                            <span >About Us</span>
                        </a>
                    </li>
                    @auth
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="waves-effect waves-dark" style="background: transparent; color:#fff; margin-left: 50px;" >
                             {{ __('Log out') }}
                            </button>
                        </form>
                    </li>
                    @else
                    <li>
                        <a class="waves-effect waves-dark" href="{{ route('login') }}" aria-expanded="false">
                            <i class="fa fa-circle text-white"></i>
                            <span >Login</span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="{{ route('register') }}" aria-expanded="false">
                            <i class="fa fa-circle text-white"></i>
                            <span >Sign Up</span>
                        </a>
                    </li>
                    @endauth

                                                        
                </ul>
            </nav>
        </div>
    </div>
</div>  