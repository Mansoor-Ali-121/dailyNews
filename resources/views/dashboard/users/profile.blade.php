@extends('template')

@section('main_section')
    <style>
        .profile-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.12);
        }

        .profile-img {
            /* Ensures image fits within its container and maintains aspect ratio */
            max-width: 150px;
            height: auto;
            /* Fixed dimensions for consistent circular avatar */
            width: 150px;
            height: 150px;
            object-fit: cover;
            /* Prevents stretching */
            border: 5px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .profile-img:hover {
            transform: scale(1.05);
            border-color: rgba(255, 255, 255, 0.4);
        }

        /* Adjusting text color for better readability against the gradient if text-white-80 is not defined */
        .profile-header p.text-white-80,
        .profile-header h2.fw-bold {
            color: white;
            /* Ensures text is clearly white */
        }

        .table-borderless tbody tr {
            border-bottom: 1px solid rgba(0, 0, 0, 0.03);
        }

        .table-borderless tbody tr:last-child {
            border-bottom: none;
        }

        .table-borderless tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.01);
        }

        .btn-light {
            background-color: rgba(255, 255, 255, 0.9);
            color: #333;
        }

        .btn-light:hover {
            background-color: white;
        }

        .btn-outline-light {
            border-color: rgba(255, 255, 255, 0.5);
            color: white;
        }

        .btn-outline-light:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: white;
        }

        .badge {
            padding: 6px 10px;
            font-weight: 500;
            letter-spacing: 0.5px;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">

                {{-- Profile Header Section --}}
                <div class="profile-header rounded-3 p-4 mb-4">
                    <div class="row align-items-center">
                        {{-- Image Column --}}
                        <div class="col-12 col-sm-4 col-md-2 text-center mb-3 mb-sm-0">
                            <div class="profile-img-container">
                                <img src="{{ Auth::user()->user_image ? asset('images/users/' . Auth::user()->user_image) : asset('images/users/default-avatar.png') }}"
                                    alt="{{ Auth::user()->name }}" class="profile-img rounded-circle"
                                    onerror="this.src='{{ asset('images/users/default-avatar.png') }}'">
                            </div>
                        </div>

                        {{-- User Info Column --}}
                        <div class="col-12 col-sm-8 col-md-10">
                            <div class="d-flex flex-column align-items-center align-items-sm-start">
                                {{-- User Type with Animation --}}
                                <div class="user-type-badge mb-2">
                                    <span class="badge user-type-label animate-fade-in">
                                        {{ ucfirst(Auth::user()->user_type) }}
                                    </span>
                                </div>

                                {{-- Additional user info can go here --}}
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Personal Info Card Section --}}
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">
                                    <i class="bi bi-person-lines-fill me-2 text-primary"></i>Personal Information
                                </h5>
                                <div class="last-active-badge">
                                    @if (Auth::user()->last_login_at)
                                        <span class="badge bg-light text-dark">
                                            <i class="bi bi-clock-history me-1"></i>
                                            Last active: {{ Auth::user()->last_login_at->diffForHumans() }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <th width="30%" class="text-muted">Full Name</th>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="fw-medium">{{ Auth::user()->name }}</span>
                                                        @if (Auth::user()->is_verified)
                                                            <span class="badge bg-success ms-2">
                                                                <i class="bi bi-check-circle-fill me-1"></i>Verified
                                                            </span>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-muted">Email</th>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span>{{ Auth::user()->email }}</span>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="text-muted">Description</th>
                                                <td>
                                                    @if (Auth::user()->user_description)
                                                        {{ Auth::user()->user_description }}
                                                    @else
                                                        <span class="text-muted">Not provided</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-muted">Account Status</th>
                                                <td>
                                                    @if (Auth::user()->user_status)
                                                        <span class="badge bg-success">
                                                            <i class="bi bi-check-circle-fill me-1"></i>Active
                                                        </span>
                                                    @else
                                                        <span class="badge bg-secondary">
                                                            <i class="bi bi-slash-circle-fill me-1"></i>Inactive
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-muted">Member Since</th>
                                                <td>
                                                    {{ Auth::user()->created_at->format('M d, Y') }}
                                                    <small
                                                        class="text-muted ms-2">({{ Auth::user()->created_at->diffForHumans() }})</small>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <div>
                                        @if (Auth::user()->updated_at)
                                            <small class="text-muted">
                                                <i class="bi bi-info-circle me-1"></i>
                                                Last updated: {{ Auth::user()->updated_at->diffForHumans() }}
                                            </small>
                                        @endif
                                    </div>
                                    <div>
                                        <a href="{{ route('user.edit', Auth::user()->id) }}"> <button
                                                class="btn btn-edit-neumorphic" data-bs-toggle="modal"
                                                data-bs-target="#editProfileModal">
                                                <i class="bi bi-pencil-fill me-2"></i> Edit Profile
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <style>
                    .profile-header {
                        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                        color: white;
                        box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.12);
                        position: relative;
                        overflow: hidden;
                        transition: all 0.3s ease;
                    }

                    .profile-header:hover {
                        transform: translateY(-2px);
                        box-shadow: 0 6px 24px rgba(0, 0, 0, 0.15);
                    }

                    .profile-img-container {
                        display: inline-block;
                        position: relative;
                        transition: all 0.3s ease;
                    }

                    .profile-img {
                        width: 120px;
                        height: 120px;
                        object-fit: cover;
                        border: 4px solid rgba(255, 255, 255, 0.2);
                        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
                        transition: all 0.3s ease;
                    }

                    .profile-img:hover {
                        transform: scale(1.05);
                        border-color: rgba(255, 255, 255, 0.4);
                        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
                    }

                    .user-type-badge {
                        text-align: center;
                        width: 100%;
                    }

                    .user-type-label {
                        background: rgba(255, 255, 255, 0.15);
                        backdrop-filter: blur(5px);
                        color: white;
                        font-size: 1.1rem;
                        padding: 8px 20px;
                        border-radius: 50px;
                        border: 1px solid rgba(255, 255, 255, 0.2);
                        text-transform: uppercase;
                        letter-spacing: 1px;
                        font-weight: 500;
                        transition: all 0.3s ease;
                        display: inline-block;
                    }

                    .user-type-label:hover {
                        background: rgba(255, 255, 255, 0.25);
                        transform: scale(1.05);
                    }

                    .animate-fade-in {
                        animation: fadeIn 0.8s ease-in-out;
                    }

                    @keyframes fadeIn {
                        from {
                            opacity: 0;
                            transform: translateY(10px);
                        }

                        to {
                            opacity: 1;
                            transform: translateY(0);
                        }
                    }

                    /* Responsive adjustments */
                    @media (max-width: 767.98px) {
                        .profile-img {
                            width: 100px;
                            height: 100px;
                        }

                        .user-type-label {
                            font-size: 1rem;
                            padding: 6px 16px;
                        }
                    }

                    @media (min-width: 768px) {
                        .user-type-badge {
                            text-align: left;
                        }
                    }

                    .table-hover tbody tr:hover {
                        background-color: rgba(0, 0, 0, 0.02);
                    }

                    .table-borderless th {
                        font-weight: 500;
                        padding-left: 0;
                    }

                    .table-borderless td {
                        font-weight: 500;
                        padding-right: 0;
                    }

                    .last-active-badge .badge {
                        font-size: 0.8rem;
                        padding: 0.35rem 0.75rem;
                        border-radius: 50px;
                    }

                    /* button edit */

                    .btn-edit-neumorphic {
                        background: #f0f0f0;
                        border: none;
                        color: #555;
                        padding: 10px 24px;
                        border-radius: 12px;
                        font-weight: 600;
                        box-shadow: 5px 5px 10px #d9d9d9,
                            -5px -5px 10px #ffffff;
                        transition: all 0.2s ease;
                    }

                    .btn-edit-neumorphic:hover {
                        color: #2575fc;
                        box-shadow: inset 5px 5px 10px #d9d9d9,
                            inset -5px -5px 10px #ffffff;
                    }

                    .btn-edit-neumorphic:active {
                        transform: scale(0.95);
                    }
                </style>
            </main>
        </div>
    </div>
@endsection
