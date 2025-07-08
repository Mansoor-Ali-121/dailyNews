<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <div class="user-info text-center py-4">
            <div class="profile-pic-container">
                @auth
                    {{-- Define a default image path for users with no custom image --}}


                    <img src="{{ asset('images/users/' . Auth::user()->user_image) }}" {{-- Use default image file for non-existing user_image --}}
                        class="profile-pic rounded-circle shadow" alt="Admin Profile"> {{-- Use default image file on error --}}

                @endauth
            </div>
            <h2 class="user-role fancy-text">{{ Auth::user()->user_type }}</h2>
        </div>

        <style>
            .profile-pic-container {
                display: inline-block;
                background: linear-gradient(145deg, #34495e, #2c3e50);
                border-radius: 50%;
                padding: 5px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
                position: relative;
                overflow: hidden;
            }

            .profile-pic {
                width: 80px;
                height: 80px;
                border-radius: 50%;
                object-fit: cover;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);
            }

            .profile-pic-container::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                border-radius: 50%;
                box-shadow:
                    0 0 20px rgb(171, 15, 233),
                    0 0 40px rgba(188, 81, 255, 0.7);
                opacity: 0.5;
                /* animation: glow-picture 1.5s infinite alternate; */
            }

            .user-info {
                background: linear-gradient(145deg, #2c3e50, #1c1c1c);
                border-radius: 10px;
                padding: 20px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            }

            .user-role {
                margin-top: 10px;
                color: #ecf0f1;
                font-weight: 600;
                font-size: 2.5rem;
            }

            .fancy-text {
                background: linear-gradient(90deg, #12c2f3, #e74c3c);
                background-clip: text;
                -webkit-background-clip: text;
                color: transparent;
                font-family: 'Satisfy', cursive;
                text-shadow:
                    2px 2px 10px rgb(114, 60, 231),
                    0 0 20px rgba(114, 60, 231, 0.5),
                    0 0 30px rgba(114, 60, 231, 0.3);
                animation: text-glow 1.5s ease-in-out infinite alternate;
            }

            @keyframes text-glow {
                from {
                    text-shadow:
                        2px 2px 10px rgba(109, 86, 159, 0.8),
                        0 0 20px rgba(126, 71, 160, 0.963),
                        0 0 30px rgb(75, 59, 110);
                }

                to {
                    text-shadow:
                        2px 2px 10px rgba(46, 204, 113, 0.5),
                        0 0 20px rgba(46, 204, 113, 0.3),
                        0 0 30px rgba(46, 204, 113, 0.1);
                }
            }

            @keyframes glow-picture {
                0% {
                    box-shadow:
                        0 0 20px rgb(126, 48, 157),
                        0 0 40px rgba(90, 48, 116, 0.7);
                    opacity: 0.5;
                    transform: scale(1);
                }

                100% {
                    box-shadow:
                        0 0 30px rgba(46, 204, 113, 1),
                        0 0 60px rgba(46, 204, 113, 0.7);
                    opacity: 1;
                    transform: scale(1.1);
                }
            }

            /* Remove the dropdown indicator */
            .sidebar-link.dropdown-toggle::after {
                content: none !important;
            }
        </style>

        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="">
                    <i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            {{-- User --}}
            <li class="sidebar-item dropdown">
                <a class="sidebar-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Users</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="{{ route('user.show') }}">View Users</a></li>
                    <li><a class="dropdown-item" href="{{ route('user.add') }}">Add User</a></li>
                </ul>
            </li>
            {{-- User end --}}

            {{-- Admin profile --}}
            <li class="sidebar-item dropdown">
                <a class="sidebar-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                    <li><a class="dropdown-item" href="{{ route('profile') }}">View Profile</a></li>
                    {{-- <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a></li> --}}
                </ul>
            </li>
            {{-- Admin profile end --}}

            {{-- Countries --}}
            <li class="sidebar-item dropdown">
                <a class="sidebar-link dropdown-toggle" href="" id="menuDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="align-middle" data-feather="globe"></i> <span class="align-middle">Countries</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="menuDropdown">
                    <li><a class="dropdown-item" href="{{ route('country.show') }}">View countries</a></li>
                    <li><a class="dropdown-item" href="{{ route('country.add') }}">Add countries</a></li>
                </ul>
            </li>
            {{-- Countries end --}}

            {{-- Categories --}}
            <li class="sidebar-item dropdown">
                <a class="sidebar-link dropdown-toggle" href="#" id="categoryDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Categories</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                    <li><a class="dropdown-item" href="{{ route('category.show') }}">View Categories</a></li>
                    <li><a class="dropdown-item" href="{{ route('category.add') }}">Add Categories</a></li>
                </ul>
            </li>
            {{-- Categories end --}}

            {{-- Cites --}}
            <li class="sidebar-item dropdown">
                <a class="sidebar-link dropdown-toggle" href="#" id="chefDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="align-middle" data-feather="map-pin"></i> <span class="align-middle">Cites</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="chefDropdown">
                    <li><a class="dropdown-item" href="{{ route('city.show') }}">View Cites</a></li>
                    <li><a class="dropdown-item" href="{{ route('city.add') }}">Add Cites</a></li>
                </ul>
            </li>
            {{-- Cites end --}}

            {{-- News --}}
            <li class="sidebar-item dropdown">
                <a class="sidebar-link dropdown-toggle" href="#" id="eventsDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">News</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="eventsDropdown">
                    <li><a class="dropdown-item" href="{{ route('news.show') }}">View News</a></li>
                    {{-- Using Blade's @if directive --}}
                    @if ((Auth::check() && Auth::user()->user_type == 'author') || Auth::user()->user_type == 'admin')
                        <li><a class="dropdown-item" href="{{ route('news.add') }}">Add News</a></li>
                    @endif
                </ul>
            </li>
            {{-- News end --}}

            {{-- Breaking News --}}
            <li class="sidebar-item dropdown">
                <a class="sidebar-link dropdown-toggle" href="#" id="galleryDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="align-middle" data-feather="alert-triangle"></i> <span class="align-middle">Breaking
                        News</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="galleryDropdown">
                    <li><a class="dropdown-item" href="{{ route('breakingnews.show') }}">View Breaking News</a></li>
                    <li><a class="dropdown-item" href="{{ route('breakingnews.add') }}">Add Breaking News</a></li>
                </ul>
            </li>
            {{-- Breaking News end --}}

            {{-- Live Videos --}}
            <li class="sidebar-item dropdown">
                <a class="sidebar-link dropdown-toggle" href="#" id="galleryDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="align-middle" data-feather="video"></i> <span class="align-middle">Live Videos</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="galleryDropdown">
                    <li><a class="dropdown-item" href="{{ route('livevideo.show') }}">View Live Videos</a></li>
                    <li><a class="dropdown-item" href="{{ route('livevideo.add') }}">Add Live Videos</a></li>
                </ul>
            </li>
            {{-- Live Videos end --}}

            {{-- Blogs --}}
            <li class="sidebar-item dropdown">
                <a class="sidebar-link dropdown-toggle" href="#" id="galleryDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Blogs</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="galleryDropdown">
                    <li><a class="dropdown-item" href="{{ route('blog.show') }}">View Blogs</a></li>
                    <li><a class="dropdown-item" href="{{ route('blog.add') }}">Add Blogs</a></li>
                </ul>
            </li>
            {{-- Blogs end --}}

            <li class="sidebar-item">
                <a class="sidebar-link text-danger" href="{{ route('logout') }}">
                    <i class="align-middle" data-feather="power"></i> <span class="align-middle">Logout</span>
                </a>
            </li>
        </ul>


    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace();
</script>
