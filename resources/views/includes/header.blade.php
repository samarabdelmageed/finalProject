<header class="site-navbar site-navbar-target" role="banner">

<div class="container">
  <div class="row align-items-center position-relative">

    <div class="col-3">
      <div class="site-logo">
        <a href="{{ route('home') }}"><strong>CarRental</strong></a>
      </div>
    </div>

    <div class="col-9  text-right">
      
      <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>

      <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
        <ul class="site-menu main-menu js-clone-nav ml-auto ">
          <li><a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
          <li><a href="{{ route('listing') }}" class="nav-item nav-link {{ request()->routeIs('listing') ? 'active' : '' }}">Listing</a></li>
          <li><a href="{{ route('testimonials') }}" class="nav-item nav-link {{ request()->routeIs('testimonials') ? 'active' : '' }}">Testimonials</a></li>
          <li><a href="{{ route('blog') }}" class="nav-item nav-link {{ request()->routeIs('blog') ? 'active' : '' }}">Blog</a></li>
          <li><a href="{{ route('about') }}" class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
          <li><a href="{{ route('contact') }}" class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
          <li><a href="{{ route('dashboardHome') }}" class="btn btn-primary rounded-pill px-3 d-none d-lg-block {{ request()->routeIs('dashboardHome') ? 'active' : '' }}">Admin login/register</a></li>
        </ul>
      </nav>
    </div>

    
  </div>
</div>

</header>
