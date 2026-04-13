<div class="topbar">
        <div class="logo">
            <a style="text-decoration: none;" href="{{ route('home') }}">DCH</a>
        </div>
        <div class="container topnav">
            <nav class="nav-links">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>

                <a href="{{ route('meet_potters') }}"
                    class="{{ request()->routeIs('meet_potters') ? 'active' : '' }}">Meet the Potters</a>

                <a href="{{ route('gallery_shop') }}"
                    class="{{ request()->routeIs('gallery_shop') ? 'active' : '' }}">Gallery &amp; Shop</a>

                <a href="{{ route('plan_visit') }}" class="{{ request()->routeIs('plan_visit') ? 'active' : '' }}">Plan
                    Your Visit</a>

                <a href="{{ route('contact_support') }}"
                    class="{{ request()->routeIs('contact_support') ? 'active' : '' }}">Contact</a>
            </nav>
        </div>
    </div>