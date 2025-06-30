@extends('template')
@section('main_section')

    @include('dashboard.includes.alerts')

    <div class="container-fluid px-5 py-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="card border-0 shadow-lg overflow-hidden" style="border-radius: 20px;">
                    <div class="card-header p-5 position-relative overflow-hidden">
                        <div class="gradient-animation" style="background: linear-gradient(135deg, #7F00FF 0%, #E100FF 100%); position: absolute; top: 0; left: 0; width: 200%; height: 100%; animation: gradientShift 8s ease infinite;"></div>
                        <div class="d-flex justify-content-between align-items-center position-relative" style="z-index: 2;">
                            <div>
                                <h2 class="h3 mb-2 text-white"><i class="fas fa-user-plus me-3"></i> Add New User</h2>
                                <p class="mb-0 text-white-50 fs-5">Create a new system user with appropriate permissions</p>
                            </div>
                            <a href="{{ route('user.show') }}" class="btn btn-light btn-lg rounded-pill px-4 py-2 shadow-sm hover-scale">
                                <i class="fas fa-arrow-left me-2"></i> Back to Users
                            </a>
                        </div>
                        <div class="position-absolute bottom-0 end-0 w-100 overflow-hidden"
                            style="color: rgba(255,255,255,0.15); z-index: 1;">
                            <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                                <path
                                    d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                                    style="stroke: none; fill: currentColor;"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="card-body p-5">
                        <form action="{{ route('user.add') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-floating position-relative">
                                        <i class="fas fa-user floating-icon"></i>
                                        <input type="text" name="name" id="name" class="form-control border-2 ps-5 py-3" 
                                            value="{{ old('name') }}" required placeholder="Full Name">
                                        <label for="name" class="form-label text-muted ms-4">Full Name</label>
                                        @error('name')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-floating position-relative">
                                        <i class="fas fa-envelope floating-icon"></i>
                                        <input type="email" name="email" id="email" class="form-control border-2 ps-5 py-3"
                                            value="{{ old('email') }}" required placeholder="User Email">
                                        <label for="email" class="form-label text-muted ms-4">User Email</label>
                                        @error('email')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-floating position-relative">
                                        <i class="fas fa-lock floating-icon"></i>
                                        <input type="password" name="password" id="password" class="form-control border-2 ps-5 py-3"
                                            required placeholder="Password">
                                        <label for="password" class="form-label text-muted ms-4">Password</label>
                                        <i class="fas fa-eye position-absolute end-0 top-50 translate-middle-y me-3 text-muted hover-pointer" 
                                           onclick="togglePassword('password')"></i>
                                        @error('password')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="password-strength mt-2">
                                        <div class="progress" style="height: 5px;">
                                            <div id="password-strength-bar" class="progress-bar" role="progressbar" style="width: 0%"></div>
                                        </div>
                                        <small id="password-strength-text" class="text-muted"></small>
                                    </div>
                                </div>
                                {{-- User description --}}
                                <div class="col-md-6">
                                    <div class="form-floating position-relative">
                                        <i class="fas fa-user floating-icon"></i>
                                        <input type="text" name="user_description" id="user_description" class="form-control border-2 ps-5 py-3"
                                            value="{{ old('user_description') }}" required placeholder="User Description">
                                        <label for="user_description" class="form-label text-muted ms-4">User Description</label>
                                        @error('user_description')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>



                                {{-- User image --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user_image" class="form-label text-muted mb-3">
                                            <i class="fas fa-camera me-2"></i>User Profile Image
                                        </label>
                                        <div class="file-upload-wrapper">
                                            <input type="file" name="user_image" id="user_image" 
                                                class="form-control border-2 py-3 file-upload-input" onchange="previewImage(this)">
                                            <div class="file-upload-label">
                                                <i class="fas fa-cloud-upload-alt me-2"></i>
                                                <span>Choose file or drag & drop</span>
                                            </div>
                                        </div>
                                        <div class="mt-3 text-center">
                                            <img id="imagePreview" src="#" alt="Image Preview" 
                                                class="img-thumbnail rounded-circle shadow-sm d-none hover-zoom" 
                                                style="width: 120px; height: 120px; object-fit: cover; transition: all 0.3s ease;">
                                        </div>
                                        @error('user_image')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                {{-- User type --}}
                                <div class="col-md-6">
                                    <div class="form-floating position-relative">
                                        <i class="fas fa-user-tag floating-icon"></i>
                                        <select name="user_type" id="user_type" class="form-select border-2 ps-5 py-3" required>
                                            <option value="" {{ old('user_type') == '' ? 'selected' : '' }} disabled>Select User type</option>
                                            <option value="admin" {{ old('user_type') == 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="editor" {{ old('user_type') == 'editor' ? 'selected' : '' }}>Editor</option>
                                            <option value="author" {{ old('user_type') == 'author' ? 'selected' : '' }}>Author</option>
                                            <option value="reviewer" {{ old('user_type') == 'reviewer' ? 'selected' : '' }}>Reviewer</option>
                                        </select>
                                        <label for="user_type" class="form-label text-muted ms-4">User Role</label>
                                        @error('user_type')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-floating position-relative">
                                        <i class="fas fa-link floating-icon"></i>
                                        <input type="text" name="actual_slug" id="actual_slug" 
                                            class="form-control border-2 ps-5 py-3" value="{{ old('actual_slug') }}"
                                            onkeyup="generateSlug()" placeholder="Custom Slug (Optional)">
                                        <label for="actual_slug" class="form-label text-muted ms-4">Custom Slug</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-floating position-relative">
                                        <i class="fas fa-hashtag floating-icon"></i>
                                        <input type="text" name="user_slug" id="user_slug" 
                                            class="form-control border-2 ps-5 py-3 bg-light" value="{{ old('user_slug') }}" 
                                            readonly placeholder="System Generated Slug">
                                        <label for="user_slug" class="form-label text-muted ms-4">System Generated Slug</label>
                                        @error('user_slug')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-12 mt-4">
                                    <div class="d-flex justify-content-end gap-3">
                                        <a href="{{ url()->previous() }}" class="btn btn-lg btn-outline-secondary rounded-pill px-4 shadow-sm hover-scale">
                                            <i class="fas fa-times me-2"></i> Cancel
                                        </a>
                                        <button type="submit" class="btn btn-lg btn-primary rounded-pill px-4 shadow-sm hover-scale pulse-on-hover">
                                            <i class="fas fa-user-plus me-2"></i> Add User
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Base Card Styles */
        .card {
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15); /* Softer, larger shadow */
        }

        /* Animated Gradient Header */
        .gradient-animation {
            background-size: 200% 200%;
            animation: gradientShift 8s ease infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Form Elements */
        .form-control, .form-select {
            border-radius: 12px;
            border-width: 2px;
            padding: 1rem 1.25rem 1rem 3rem; /* Increased left padding for icon */
            transition: all 0.3s ease;
            background-color: #f8fafc;
            font-size: 1rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: #8A2BE2; /* A more vibrant primary color on focus */
            box-shadow: 0 0 0 0.25rem rgba(138, 43, 226, 0.2); /* Matching glow */
            background-color: white;
        }

        /* Floating Labels with Icons */
        .form-floating label {
            color: #6c757d;
            font-weight: 500;
            transition: all 0.2s ease;
            left: 2.5rem; /* Adjust label position */
        }

        .form-floating label::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: transparent; /* Prevent label from covering icon */
        }

        .floating-icon {
            position: absolute;
            left: 1.25rem; /* Position the icon inside the input */
            top: 50%;
            transform: translateY(-50%);
            color: #8A2BE2; /* Primary color for icons */
            font-size: 1.1rem;
            z-index: 3; /* Ensure icon is above label */
            transition: color 0.3s ease;
        }

        .form-control:focus + .form-label + .floating-icon,
        .form-select:focus + .form-label + .floating-icon {
            color: #6a11cb; /* Slight color change on focus */
        }

        /* Enhanced File Upload */
        .file-upload-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
        }

        .file-upload-input {
            opacity: 0;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            cursor: pointer;
            z-index: 2;
        }

        .file-upload-label {
            padding: 1rem;
            border: 2px dashed #9370DB; /* More distinct dashed border */
            border-radius: 12px;
            text-align: center;
            color: #6c757d;
            background-color: #F0F8FF; /* Light background */
            transition: all 0.3s ease;
            display: block; /* Ensure it takes full width */
            font-weight: 500;
        }

        .file-upload-label:hover {
            border-color: #6a11cb;
            background-color: rgba(106, 17, 203, 0.1); /* Slightly more opaque hover */
            color: #6a11cb;
        }

        /* Image Preview */
        #imagePreview {
            border: 3px solid rgba(138, 43, 226, 0.5); /* Thicker, colored border */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Buttons with Hover Effects */
        .btn-primary {
            background: linear-gradient(135deg, #8A2BE2 0%, #A020F0 100%); /* Deeper purple gradient */
            border: none;
            font-weight: 600; /* Slightly bolder text */
            transition: all 0.3s ease, background-position 0.5s ease;
            background-size: 200% 100%; /* For background-position animation */
        }

        .btn-primary:hover {
            background-position: -100% 0; /* Shift gradient on hover */
            box-shadow: 0 8px 20px rgba(138, 43, 226, 0.3); /* Enhanced shadow */
        }

        .hover-scale {
            transition: transform 0.3s ease;
        }

        .hover-scale:hover {
            transform: translateY(-3px) scale(1.02);
        }

        .pulse-on-hover:hover {
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(138, 43, 226, 0.4); } /* Use primary color for pulse */
            70% { box-shadow: 0 0 0 12px rgba(138, 43, 226, 0); }
            100% { box-shadow: 0 0 0 0 rgba(138, 43, 226, 0); }
        }

        /* Interactive Elements */
        .hover-pointer {
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .hover-pointer:hover {
            color: #8A2BE2 !important; /* Brighter color on hover */
        }

        .hover-zoom:hover {
            transform: scale(1.08); /* Slightly more zoom */
        }

        /* Password Strength Meter */
        .password-strength .progress {
            border-radius: 3px;
            background-color: #e9ecef;
        }
        .progress-bar.success { background-color: #28a745; }
        .progress-bar.warning { background-color: #ffc107; }
        .progress-bar.danger { background-color: #dc3545; }
        .text-success { color: #28a745 !important; }
        .text-warning { color: #ffc107 !important; }
        .text-danger { color: #dc3545 !important; }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .card-header {
                padding: 1.5rem !important;
            }
            .card-body {
                padding: 1.5rem !important;
            }
            .form-control, .form-select {
                padding-left: 2.5rem; /* Smaller padding for smaller screens */
            }
            .floating-icon {
                left: 0.75rem;
            }
            .form-floating label {
                left: 1.5rem;
            }
        }
    </style>
    
    <script>
        // Enhanced Slug Generation
        function generateSlug() {
            const input = document.getElementById('actual_slug');
            const output = document.getElementById('user_slug');
            const slug = input.value.trim().toLowerCase()
                .replace(/[^a-z0-9äöüß]+/g, '-')
                .replace(/^-|-$/g, '');
            output.value = slug;
        }

        // Password Visibility Toggle
        function togglePassword(id) {
            const input = document.getElementById(id);
            const icon = input.nextElementSibling;
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        // Password Strength Indicator
        document.getElementById('password').addEventListener('input', function() {
            const strengthBar = document.getElementById('password-strength-bar');
            const strengthText = document.getElementById('password-strength-text');
            const strength = calculatePasswordStrength(this.value);
            
            strengthBar.style.width = strength.percentage + '%';
            strengthBar.className = 'progress-bar ' + strength.class;
            strengthText.textContent = strength.text;
            strengthText.className = 'text-' + strength.class;
        });

        function calculatePasswordStrength(password) {
            let strength = 0;
            if (password.length > 0) strength += 10;
            if (password.length >= 8) strength += 30;
            if (/[A-Z]/.test(password)) strength += 20;
            if (/[0-9]/.test(password)) strength += 20;
            if (/[^A-Za-z0-9]/.test(password)) strength += 20;
            
            if (strength >= 80) return { percentage: strength, class: 'success', text: 'Strong' };
            if (strength >= 50) return { percentage: strength, class: 'warning', text: 'Medium' };
            return { percentage: strength, class: 'danger', text: 'Weak' };
        }

        // Image Preview with File Validation
        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            const file = input.files[0];
            
            if (file) {
                if (!file.type.match('image.*')) {
                    alert('Please select an image file');
                    input.value = '';
                    preview.classList.add('d-none'); // Hide if invalid
                    return;
                }
                
                if (file.size > 2 * 1024 * 1024) {
                    alert('Image must be less than 2MB');
                    input.value = '';
                    preview.classList.add('d-none'); // Hide if invalid
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                }
                reader.readAsDataURL(file);
            } else {
                preview.classList.add('d-none'); // Hide if no file selected
            }
        }

        // Enhanced Form Validation
        (function() {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                        
                        // Scroll to first invalid field
                        const firstInvalid = form.querySelector(':invalid');
                        if (firstInvalid) {
                            firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            firstInvalid.focus();
                        }
                    }
                    
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
@endsection