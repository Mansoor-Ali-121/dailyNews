@extends('template')
@section('main_section')
    {{-- Display errors  --}}
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @elseif (session()->has('error'))
        {{-- Use @elseif for another condition --}}
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @include('dashboard.includes.alerts')
    {{-- Form --}}
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-lg overflow-hidden">
                    <!-- Card Header with Animated Gradient -->
                    <div class="card-header p-5 position-relative overflow-hidden breaking-news-header">
                        <div class="gradient-animation"
                            style="position: absolute; top: 0; left: 0; width: 200%; height: 100%;">
                        </div>
                        <div class="d-flex justify-content-between align-items-center position-relative"
                            style="z-index: 2;">
                            <div>
                                <h2 class="h3 mb-2 text-white"><i class="fas fa-bolt me-3"></i> Add Breaking News</h2>
                                <p class="mb-0 text-white-50 fs-5">Create Breaking news alerts for your readers</p>
                            </div>
                            @if (Auth::check())
                                <div class="me-3 text-end">
                                    <small class="text-light d-block">Logged in as:</small>
                                    <span class="fw-bold">{{ Auth::user()->name }}</span>
                                    <div class="fw-bold">User ID: {{ Auth::user()->id }}</div>
                                </div>
                            @endif

                            <a href="{{ route('breakingnews.show') }}"
                                class="btn btn-light btn-lg rounded-pill px-4 py-2 shadow-sm hover-scale">
                                <i class="fas fa-arrow-left me-2"></i> Back to News
                            </a>
                        </div>
                        <div class="wave-container">
                            <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                                <path
                                    d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                                    style="stroke: none; fill: currentColor;"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Card Body with Enhanced Form -->
                    <div class="card-body p-5">
                        <!-- Form to add breaking news -->
                        <form method="POST" action="{{ route('breakingnews.add') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-4">

                                <!-- Language Selector -->
                                <div class="col-md-12">
                                    <label class="form-label">Language <span class="required-star">*</span></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="language" value="en"
                                            {{ $selectedLang == 'en' ? 'checked' : '' }}>
                                        <label class="form-check-label">English</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="language" value="ur"
                                            {{ $selectedLang == 'ur' ? 'checked' : '' }}>
                                        <label class="form-check-label">Urdu</label>
                                    </div>
                                    <p class="form-note">Select the language for the news content.</p>
                                </div>

                                <!-- Related News Dropdown -->
                                <div class="col-12">
                                    <div class="form-floating position-relative">
                                        <select class="form-select border-2 ps-5 py-3" id="news_id" name="news_id"
                                            required>
                                            <option value="" selected disabled>Select Related News</option>
                                            {{-- Options will be filled by JS --}}
                                        </select>
                                    </div>
                                </div>


                                <!-- Title Field -->
                                <div class="col-12">
                                    <div class="form-floating position-relative">
                                        <i class="fas fa-heading floating-icon breaking-news-icon"></i>
                                        <input type="text" class="form-control border-2 ps-5 py-3" id="title"
                                            name="title" required placeholder="Breaking News Title"
                                            value="{{ old('title') }}">
                                        <label for="title" class="form-label text-muted ms-4">Title</label>
                                    </div>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Description Field -->
                                <div class="col-12">
                                    <div class="form-floating position-relative">
                                        <i class="fas fa-align-left floating-icon breaking-news-icon"></i>
                                        <textarea class="form-control border-2 ps-5 py-3" id="description" name="description" style="height: 150px" required
                                            placeholder="Breaking News Description" value="{{ old('description') }}"></textarea>
                                        <label for="description" class="form-label text-muted ms-4">Description</label>
                                    </div>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Image Upload -->
                                <div class="col-12">
                                    <div class="form-floating position-relative">
                                        <i class="fas fa-image floating-icon breaking-news-icon"></i>
                                        <input type="file" class="form-control border-2 ps-5 py-3" id="image"
                                            name="image" accept="image/*" value="{{ old('image') }}" required>
                                        <div class="form-text ms-4">Recommended size: 1200x630 pixels (Max 2MB)</div>
                                    </div>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Custom Slug Fields not save in datebase -->
                                <div class="col-md-12">
                                    <div class="form-floating position-relative">
                                        <i class="fas fa-hashtag floating-icon breaking-news-icon"></i>
                                        <input type="text" class="form-control border-2 ps-5 py-3 bg-light"
                                            id="slug" name="slug" placeholder="System Generated Slug"
                                            onkeyup="generateSlug()">
                                        <label for="slug" class="form-label text-muted ms-4">Custom
                                            Slug</label>
                                    </div>
                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <!-- Slug Fields which stored in database -->
                                <div class="col-md-12">
                                    <div class="form-floating position-relative">
                                        <i class="fas fa-hashtag floating-icon breaking-news-icon"></i>
                                        <input type="text" class="form-control border-2 ps-5 py-3 bg-light"
                                            id="breakingnews_slug" name="breakingnews_slug" readonly
                                            placeholder="System Generated Slug">
                                        <label for="breakingnews_slug" class="form-label text-muted ms-4">System Generated
                                            Slug</label>
                                    </div>
                                    @error('breakingnews_slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Status Toggle -->
                                <div class="col-12">
                                    <div class="form-floating position-relative">
                                        <i class="fas fa-toggle-on floating-icon breaking-news-icon"></i>
                                        <select name="breakingnews_status" id="breakingnews_status"
                                            class="form-select border-2 ps-5 py-3" required>
                                            <option value="active" selected>Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                        <label for="breakingnews_status" class="form-label text-muted ms-4">Status</label>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 mt-4">
                                    <div class="d-flex justify-content-end gap-3">
                                        <a href="{{ route('breakingnews.show') }}"
                                            class="btn btn-lg btn-light rounded-pill px-4 shadow-sm hover-scale">
                                            <i class="fas fa-times me-2"></i> Cancel
                                        </a>
                                        <button type="submit"
                                            class="btn btn-lg btn-primary rounded-pill px-4 shadow-sm hover-scale pulse-on-hover breaking-news-btn">
                                            <i class="fas fa-bolt me-2"></i> Publish Breaking News
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

    {{-- Form Styling --}}
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

        .form-floating label::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: transparent;
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

        .form-control:focus+.form-label+.floating-icon,
        .form-select:focus+.form-label+.floating-icon {
            color: #6a11cb;
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

        .alert-success {
            border-color: #28a745;
            background-color: #d4edda;
            color: #155724;
        }

        .alert-danger {
            border-color: #dc3545;
            background-color: #f8d7da;
            color: #721c24;
        }

        .alert ul {
            margin-bottom: 0;
            padding-left: 20px;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .card-header {
                padding: 1.5rem !important;
            }

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

        /* Custom styles for breaking news form */
        .breaking-news-header {
            background: linear-gradient(135deg, #7F00FF 0%, #E100FF 100%) !important;
        }

        .breaking-news-btn {
            background: linear-gradient(135deg, #7F00FF 0%, #E100FF 100%) !important;
        }

        .breaking-news-btn:hover {
            background-position: -100% 0 !important;
            box-shadow: 0 8px 20px rgba(127, 0, 255, 0.3) !important;
        }

        .breaking-news-icon {
            color: #7F00FF !important;
        }

        .breaking-news-icon:focus {
            color: #6a11cb !important;
        }

        .wave-container {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 100%;
            overflow: hidden;
            color: rgba(255, 255, 255, 0.15);
            z-index: 1;
        }
    </style>
    {{-- SLug --}}
    <script>
        function generateSlug() {
            const title = document.getElementById('slug').value;
            const slug = title.toLowerCase()
                .replace(/[&\/\\#,+()$~%.'":*?<>{};]/g, '-') // Remove non-word characters
                .replace(/[\s-]+/g, '-') // Replace spaces with hyphens
                .replace(/^-+|-+$/g, ''); // Replace multiple hyphens with single
            document.getElementById('breakingnews_slug').value = slug;
        }
        // Slug end
    </script>

{{-- Related News Filter by Language (Edit File Version) --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const radios = document.querySelectorAll('input[name="language"]');
        const newsDropdown = document.getElementById('news_id');
        const selectedNewsId = "{{ $breakingNews->news_id }}"; // Currently selected news

        radios.forEach(radio => {
            radio.addEventListener('change', function () {
                let selectedLang = this.value;

                fetch(`/breakingnews/get-news-by-language/${selectedLang}`)
                    .then(response => response.json())
                    .then(data => {
                        newsDropdown.innerHTML = '<option value="" disabled selected>Select Related News</option>';

                        data.forEach(item => {
                            let option = document.createElement('option');
                            option.value = item.id;
                            option.text = item.news_slug;

                            if (item.id == selectedNewsId) {
                                option.selected = true;
                            }

                            newsDropdown.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching news:', error);
                    });
            });
        });
    });
</script>



@endsection
