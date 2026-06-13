<header class="navbar">
    <img src="{{ asset('assets/image/logo-zenthra.png') }}" alt="Logo" class="logo">
    <nav>
        <ul>
            <a href="{{ route('home') }}">
                <li>Home</li>
            </a>
            <a href="{{ route('products.index') }}">
                <li>Product</li>
            </a>
            <a href="{{ route('about') }}">
                <li>About</li>
            </a>
            <a href="{{ route('contact') }}">
                <li>Contact</li>
            </a>
        </ul>
    </nav>
    <div class="user-action">
        <div class="row">
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Product search...">
                <button class="search-btn">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
            <div class="profile-dropdown">
                <button class="profile-btn">
                    <i class="fa-solid fa-circle-user"></i>
                </button>
                <div class="dropdown-content">
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Signup</a>
                    <a href="{{ route('profile.edit') }}">My Profile</a>
                </div>
            </div>
        </div>
    </div>
</header>