<header class="header-area style-2">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="header-logo">
            <a href="index.html"><img src="{{ asset('storage/' . $settings->large_logo) }}" alt="" class="img-fluid" style="width: 100px;" /></a>
        </div>
        <div class="main-menu">
            <div class="mobile-logo-area d-lg-none d-flex justify-content-between align-items-center">
                <div class="menu-close-btn">
                    <i class="bi bi-x-lg"></i>
                </div>
            </div>
            <ul class="menu-list">
                <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="drop-down">Home</a>
                </li>
                <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                    <a href="{{ route('about') }}">About</a>
                </li>
                <li class="mob-d-none">
                    <a href="{{ route('home') }}"> <img src="{{ asset('storage/' . $settings->large_logo) }}" alt="" class="img-fluid" style="width: 100px;" /></a>
                </li>
                <li class="{{ request()->routeIs('all-gallery') ? 'active' : '' }}">
                    <a href="{{ route('all-gallery') }}">Gallery</a>
                </li>
                <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                    <a href="{{ route('contact') }}">Contact</a><i class="bi bi-plus dropdown-icon"></i>
                </li>
            </ul>            
            <div class="for-mobile-menu d-lg-none d-block">
                <div class="hotline mb-5">
                    <div class="hotline-info">
                        <span>Click To Call</span>
                        <h6><a href="tel:+65{{ $settings->contact_number1 }}">(+65) {{ $settings->contact_number1 }}</a></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-right d-flex justify-content-end align-items-center">
            <div class="hotline-info">
                <span>Call Us Now</span>
                <h6><a href="tel:+65{{ $settings->contact_number1 }}">(+65) {{ $settings->contact_number1 }}</a></h6>
            </div>
            <div class="sidebar-button mobile-menu-btn">
                <i class="bi bi-list"></i>
            </div>
        </div>
    </div>
</header>