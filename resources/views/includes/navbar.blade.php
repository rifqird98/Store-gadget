<header class="header">
  <nav
   class="navbar navbar-expand-lg navbar-light nav-store fixed-top navbar-fixed-top scrolled main_nav"
   data-aos="fade-down"
 >
   <div class="container">
     <a href="/index.html" class="navbar-brand">
       <img src="/images/Logoo.svg" alt="logo" class="w-25" />
     </a>
     <button
       class="navbar-toggler"
       type="button"
       data-toggle="collapse"
       data-target="#navbarresponsive"
     >
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarresponsive">
       <ul class="navbar-nav ml-auto">
         <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
           <a href="/" class="nav-link">Home</a>
         </li>

         <li class="nav-item {{ request()->is('category') ? 'active' : '' }}">
           <a href="/category" class="nav-link">Catagories</a>
         </li>

         <li class="nav-item">
           <a href="#" class="nav-link">Rewards</a>
         </li>

         @guest
         <li class="nav-item">
          <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
        </li>

        <li class="nav-item">
          <a
            href="{{ route('login') }}"
            class="btn btn-grad"
            >Sign In</a
          >
        </li>    
         @endguest         
       </ul>
       @auth
            <!-- Desktop Menu -->
            <ul class="navbar-nav d-none d-lg-flex">
                <li class="nav-item dropdown">
                    <a
                        href="#"
                        class="nav-link"
                        id="navbarDropdown"
                        role="button"
                        data-toggle="dropdown"
                    >
                        <img
                            src="/images/icon-user.png"
                            alt=""
                            class="rounded-circle mr-2 profile-picture"
                        />
                        Hi, {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                        {{-- <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a> --}}
                        <a href="#" class="dropdown-item">
                        {{-- <a href="{{ route('dashboard-settings-account') }}" class="dropdown-item"> --}}
                            Settings
                        </a>
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                               Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
                        @php
                            $carts = \App\models\Cart::where('users_id', Auth::user()->id)->count();
                        @endphp
                        @if($carts > 0)
                            <img src="{{ asset('/') }}images/icon-cart-filled.svg" alt="" />
                            <div class="card-badge">{{ $carts }}</div>
                        @else
                            <img src="{{ asset('/') }}images/icon-cart-empty.svg" alt="" />
                        @endif
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item">
                    {{-- <a href="{{ route('dashboard') }}" class="nav-link">
                        Hi, {{ Auth::user()->name }}
                    </a> --}}
                    <a href="#" class="nav-link">
                        Hi, {{ Auth::user()->name }}
                    </a>
                </li>
                <li class="nav-item">
                    {{-- <a href="{{ route('cart') }}" class="nav-link d-inline-block">
                        Cart
                    </a> --}}
                    <a href="#" class="nav-link d-inline-block">
                        Cart
                    </a>
                </li>
            </ul>    
        @endauth
     </div>
   </div>
 </nav>
 
 <!-- Menu -->
 <span class="custom_dropdown_placeholder"></span>
 <div class="custom_list">
   
 </div>
 
</header>
