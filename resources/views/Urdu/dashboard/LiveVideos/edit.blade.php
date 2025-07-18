@extends('template')
@section('main_section')
    @include('dashboard.includes.alerts')

    <div class="container-fluid px-5 py-4">
        <div class="row g-4 justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-lg overflow-hidden">
                    {{-- Card Header with Animated Gradient --}}
                    <div class="card-header p-5 position-relative overflow-hidden">
                        <div class="gradient-animation"
                            style="background: linear-gradient(135deg, #7F00FF 0%, #E100FF 100%); position: absolute; top: 0; left: 0; width: 200%; height: 100%; animation: gradientShift 8s ease infinite;">
                        </div>
                        <div class="d-flex justify-content-between align-items-center position-relative" style="z-index: 2;">
                            <div>
                                <h2 class="h3 mb-2 text-white"><i class="fas fa-video me-3"></i> Edit Live Video</h2>
                                <p class="mb-0 text-white-50 fs-5">Modify an existing live video entry</p>
                            </div>
                            {{-- Current User --}}
                            @if (Auth::check())
                                <div class="me-3 text-end">
                                    <small class="text-light d-block">Logged in as:</small>
                                    <span class="fw-bold">{{ Auth::user()->name }}</span>
                                    <div class="fw-bold">User ID: {{ Auth::user()->id }}</div>
                                </div>
                            @endif

                            {{-- Assuming a route named 'videos.index' for the back button --}}
                            <a href="" class="btn btn-light btn-lg rounded-pill px-4 py-2 shadow-sm hover-scale">
                                <i class="fas fa-arrow-left me-2"></i> Back to Videos
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

                    {{-- Card Body with Enhanced Form --}}
                    <div class="card-body p-5">

                        {{-- FULL ERROR DISPLAY SECTION --}}
                        @if ($errors->any())
                            <div class="alert alert-danger mb-4">
                                <strong>Whoops! Something went wrong:</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{-- END FULL ERROR DISPLAY SECTION --}}

                        {{-- Assuming a route named 'videos.update' and $video is passed from controller --}}
                        <form method="POST" action="{{ route('livevideo.update', $video->id) }}" class="needs-validation">
                            @csrf
                            @method('PATCH') {{-- Use PUT method for updates --}}

                            <div class="row g-4">
                                {{-- YouTube Video URL --}}
                                <div class="col-12">
                                    <div class="form-floating position-relative">
                                        <i class="fab fa-youtube floating-icon"></i>
                                        <input type="text"
                                            class="form-control border-2 ps-5 py-3 @error('video_url') is-invalid @enderror"
                                            id="video_url" name="video_url"
                                            value="{{ old('video_url', $video->video_url ?? '') }}" required
                                            placeholder="YouTube Video ID">
                                        <label for="video_url" class="form-label text-muted ms-4">YouTube Video ID</label>
                                        @error('video_url')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        <small class="text-muted ms-5">Example: dQw4w9WgXcQ from
                                            youtube.com/watch?v=dQw4w9WgXcQ</small>
                                    </div>
                                </div>

                                {{-- Category Selection --}}
                                <div class="col-12">
                                    <div class="form-floating position-relative">
                                        <i class="fas fa-tag floating-icon"></i>
                                        <select id="category_id"
                                            class="form-select @error('category_id') is-invalid @enderror"
                                            name="category_id" required>
                                            <option value="" disabled>Select a Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $video->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="category_id" class="form-label text-muted ms-4">Category</label>
                                        @error('category_id')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Video Title --}}
                                <div class="col-12">
                                    <div class="form-floating position-relative">
                                        <i class="fas fa-heading floating-icon"></i>
                                        <input type="text"
                                            class="form-control border-2 ps-5 py-3 @error('video_title') is-invalid @enderror"
                                            id="video_title" name="video_title"
                                            value="{{ old('video_title', $video->video_title ?? '') }}" required
                                            placeholder="Video Title">
                                        <label for="video_title" class="form-label text-muted ms-4">Video Title</label>
                                        @error('video_title')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Video Status Dropdown --}}
                                <div class="col-12">
                                    <div class="form-floating position-relative">
                                        <i class="fas fa-power-off floating-icon"></i>
                                        <select id="video_status"
                                            class="form-select @error('video_status') is-invalid @enderror"
                                            name="video_status" required>
                                            <option value="" disabled>Select Status</option>
                                            <option value="active"
                                                {{ old('video_status', $video->video_status ?? '') == 'active' ? 'selected' : '' }}>
                                                Active
                                            </option>
                                            <option value="inactive"
                                                {{ old('video_status', $video->video_status ?? '') == 'inactive' ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                        </select>
                                        <label for="video_status" class="form-label text-muted ms-4">Video Status</label>
                                        @error('video_status')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Custom Slug Fields --}}
                                <div class="col-md-6">
                                    <div class="form-floating position-relative">
                                        <i class="fas fa-link floating-icon"></i>
                                        <input type="text" name="slug" id="slug"
                                            class="form-control border-2 ps-5 py-3 @error('slug') is-invalid @enderror"
                                            value="{{ old('slug', $video->slug ?? '') }}" onkeyup="generateSlug()"
                                            placeholder="Custom Slug">
                                        <label for="slug" class="form-label text-muted ms-4">Custom Slug
                                        </label>
                                        @error('slug')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- System Generated Slug --}}
                                <div class="col-md-6">
                                    <div class="form-floating position-relative">
                                        <i class="fas fa-hashtag floating-icon"></i>
                                        <input type="text" class="form-control border-2 ps-5 py-3 bg-light"
                                            id="video_slug" name="video_slug"
                                            value="{{ old('video_slug', $video->video_slug ?? '') }}"
                                            placeholder="System Generated Slug" readonly>
                                        <label for="video_slug" class="form-label text-muted ms-4">System Generated
                                            Slug</label>
                                        @error('video_slug')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Submit Button --}}
                                <div class="col-12 mt-4">
                                    <div class="d-flex justify-content-end gap-3">
                                        {{-- Assuming a route named 'videos.index' for the cancel button --}}
                                        <a href=""
                                            class="btn btn-lg btn-light rounded-pill px-4 shadow-sm hover-scale">
                                            <i class="fas fa-times me-2"></i> Cancel
                                        </a>
                                        <button type="submit"
                                            class="btn btn-lg btn-primary rounded-pill px-4 shadow-sm hover-scale pulse-on-hover">
                                            <i class="fas fa-sync-alt me-2"></i> Update Video
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
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        /* Animated Gradient Header */
        .gradient-animation {
            background-size: 200% 200%;
            animation: gradientShift 8s ease infinite;
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Form Elements */
        .form-control,
        .form-select {
            border-radius: 12px;
            border-width: 2px;
            padding: 1rem 1.25rem 1rem 3rem;
            transition: all 0.3s ease;
            background-color: #f8fafc;
            font-size: 1rem;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #8A2BE2;
            box-shadow: 0 0 0 0.25rem rgba(138, 43, 226, 0.2);
            background-color: white;
        }

        /* Floating Labels with Icons */
        .form-floating label {
            color: #6c757d;
            font-weight: 500;
            transition: all 0.2s ease;
            left: 2.5rem;
        }

        .floating-icon {
            position: absolute;
            left: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            color: #8A2BE2;
            font-size: 1.1rem;
            z-index: 3;
            transition: color 0.3s ease;
        }

        /* Buttons with Hover Effects */
        .btn-primary {
            background: linear-gradient(135deg, #8A2BE2 0%, #A020F0 100%);
            border: none;
            font-weight: 600;
            transition: all 0.3s ease, background-position 0.5s ease;
            background-size: 200% 100%;
            padding: 0.75rem 1.75rem;
            border-radius: 0.75rem;
        }

        .btn-primary:hover {
            background-position: -100% 0;
            box-shadow: 0 8px 20px rgba(138, 43, 226, 0.3);
        }

        .btn-light {
            border-radius: 0.75rem;
            padding: 0.75rem 1.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
            color: #495057;
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
        }

        .btn-light:hover {
            background-color: #e2e6ea;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-color: #dae0e5;
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
            0% {
                box-shadow: 0 0 0 0 rgba(138, 43, 226, 0.4);
            }

            70% {
                box-shadow: 0 0 0 12px rgba(138, 43, 226, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(138, 43, 226, 0);
            }
        }

        /* Alert Messages */
        .alert {
            border-radius: 10px;
            padding: 1.25rem 1.5rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border-left: 5px solid;
        }

        /* Status Toggle Buttons */
        .btn-group .btn {
            padding: 0.75rem;
            font-weight: 500;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {

            .card-header,
            .card-body {
                padding: 1.5rem !important;
            }

            .form-control,
            .form-select {
                padding-left: 2.5rem;
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
        function generateSlug() {
            var inputSlug = document.getElementById('slug').value;
            var generatedSlug = inputSlug
                .trim()
                .toLowerCase()
                .replace(/[^a-z0-9äöüß]+/g, '-')
                .replace(/^-|-$/g, '');

            document.getElementById('video_slug').value = generatedSlug;
        }

        // Call generateSlug on page load if a custom slug already exists
        document.addEventListener('DOMContentLoaded', function() {
            // Only generate if the custom slug field has a value
            if (document.getElementById('slug').value) {
                generateSlug();
            }
        });
    </script>
@endsection