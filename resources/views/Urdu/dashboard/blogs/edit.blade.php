@extends('template')

@section('main_section')
    {{-- Display success or error messages --}}
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @elseif (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif

    {{-- Display validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script src="{{ asset('tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

    <style>
        :root {
            --primary-color: #0f4c81;
            --secondary-color: #1b8b9c;
            --light-bg: #f8f9fa;
            --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        .form-container {
            max-width: 1000px;
            margin: 40px auto;
        }

        .card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 20px 25px;
            font-weight: 600;
            border: none;
        }

        .card-body {
            padding: 30px;
        }

        .section-title {
            border-left: 4px solid var(--primary-color);
            padding-left: 15px;
            margin-bottom: 25px;
            font-weight: 600;
            color: var(--primary-color);
        }

        .form-label {
            font-weight: 500;
            color: #555;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(15, 76, 129, 0.25);
        }

        .image-upload-container {
            border: 2px dashed #ddd;
            border-radius: 10px;
            padding: 25px;
            text-align: center;
            background-color: var(--light-bg);
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 150px;
        }

        .image-upload-container:hover {
            border-color: var(--primary-color);
            background-color: rgba(15, 76, 129, 0.05);
        }

        .upload-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .preview-container {
            margin-top: 20px;
            text-align: center;
            display: none;
        }

        .image-preview {
            max-width: 100%;
            max-height: 300px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            padding: 12px 25px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            width: 100%;
            color: white;
            font-size: 1.1rem;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 15px rgba(15, 76, 129, 0.3);
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 500;
        }

        .status-active {
            background-color: rgba(40, 167, 69, 0.15);
            color: #28a745;
        }

        .status-inactive {
            background-color: rgba(220, 53, 69, 0.15);
            color: #dc3545;
        }

        .required-star {
            color: #dc3545;
            font-size: 1.2rem;
            margin-left: 4px;
        }

        .form-note {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 6px;
        }

        .tab-content {
            padding: 25px 0;
        }

        .nav-tabs .nav-link {
            border: none;
            color: #555;
            font-weight: 500;
            padding: 12px 25px;
            border-radius: 8px 8px 0 0;
            transition: all 0.3s ease;
        }

        .nav-tabs .nav-link.active {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            border: none;
        }

        .nav-tabs .nav-link:not(.active):hover {
            background-color: rgba(15, 76, 129, 0.08);
        }

        @media (max-width: 768px) {
            .form-container {
                margin: 20px auto;
            }

            .card-body {
                padding: 20px;
            }
        }
    </style>

    <div class="form-container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">
                    <i class="fas fa-newspaper me-2"></i> Edit Blog
                </h4>
                <div class="d-flex align-items-center">
                    @if (Auth::check())
                        <div class="me-3 text-end">
                            <small class="text-light d-block">Logged in as:</small>
                            <span class="fw-bold">{{ Auth::user()->name }}</span>
                            <div class="fw-bold">User ID: {{ Auth::user()->id }}</div>
                        </div>
                    @endif
                    <a href="{{ route('blog.show') }}" class="btn btn-light btn-sm rounded-pill px-4 py-2 shadow-sm ms-3">
                        <i class="fas fa-arrow-left me-2"></i> Back to Blogs
                    </a>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCh') {{-- Use PUT method for updates --}}
                    <div class="mb-5">
                        <div class="row g-4">

                            {{-- Country from database --}}
                            <div class="col-md-6">
                                <label for="country_id" class="form-label">Country </label>
                                <select class="form-select @error('country_id') is-invalid @enderror" id="country_id"
                                    name="country_id">
                                    <option value=""
                                        {{ old('country_id', $blog->country_id) === null || old('country_id', $blog->country_id) === '' ? 'selected' : '' }}>
                                        Select a country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ (string) old('country_id', $blog->country_id) === (string) $country->id ? 'selected' : '' }}>
                                            {{ $country->country_name }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Blogs Status --}}
                            <div class="col-md-6">
                                <label for="blog_status" class="form-label">Status</label>
                                <select class="form-select" id="blog_status" name="blog_status" required>
                                    <option value="active" {{ old('blog_status', $blog->blog_status) == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('blog_status', $blog->blog_status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('blog_status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- City Dropdown (Dynamic based on Country) --}}
                            <div class="col-md-6">
                                <label for="city_id" class="form-label">City</label>
                                <select class="form-select @error('city_id') is-invalid @enderror" id="city_id"
                                    name="city_id">
                                    <option value="">Select a Country First</option>
                                    {{-- Cities will be populated by JavaScript --}}
                                </select>
                                <p id="noCitiesMessage" class="text-muted" style="display: none;">No cities found for the
                                    selected country.</p>
                                <p id="selectCountryMessage" class="text-muted" style="display: block;">Select a country to
                                    see available cities.</p>

                                @error('city_id')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Category from database (now a dropdown) --}}
                            <div class="col-md-6">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="form-select @error('category_id') is-invalid @enderror" id="category_id"
                                    name="category_id">
                                    <option value="" {{ old('category_id', $blog->category_id) == '' ? 'selected' : '' }}>Select a Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Blogs title --}}
                            <div class="col-md-12">
                                <label for="blog_title" class="form-label">Blog Title </label>
                                <input type="text" class="form-control" id="blog_title" name="blog_title"
                                    placeholder="Enter news title" value="{{ old('blog_title', $blog->blog_title) }}" required>
                                @error('blog_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Blogs Content --}}
                            <div class="col-md-12">
                                <label for="blog_content" class="form-label">Blog Content </label>
                                <textarea type="text" id="blog_content" name="blog_content" class="form-control tinymce"
                                    placeholder="Enter news content" rows="20">{{ old('blog_content', $blog->blog_content) }}</textarea>
                                @error('blog_content')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Blog description --}}
                            <div class="col-md-12">
                                <label for="blog_description" class="form-label">Blog Description</label>
                                <textarea class="form-control @error('blog_description') is-invalid @enderror" id="blog_description"
                                    name="blog_description" rows="5" placeholder="Enter the full blog description here">{{ old('blog_description', $blog->blog_description) }}</textarea>

                                @error('blog_description')
                                    <div class="invalid-feedback d-block"> {{-- 'd-block' ensures it shows for textareas too --}}
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- Custom Slug --}}
                            <div class="col-md-12">
                                <label for="slug" class="form-label">Blog Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                    placeholder="Write a slug" value="{{ old('slug', $blog->slug) }}" onkeyup="generateSlug()">
                                @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- Custom Slug end --}}

                            {{-- Slug which stored in database --}}
                            <div class="col-md-12">
                                <label for="blog_slug" class="form-label">System Generated Slug</label>
                                <input type="text" class="form-control" id="blog_slug" name="blog_slug"
                                    placeholder="Auto-generated from title" value="{{ old('blog_slug', $blog->blog_slug) }}" readonly>
                                @error('blog_slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- End of IMPORTANT section --}}

                        </div>
                    </div>
                    {{-- Image Upload --}}
                    <div class="mb-5">
                        <h5 class="section-title">Featured Image</h5>
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="image-upload-container" id="image-upload-area">
                                    <div class="upload-icon" style="{{ $blog->blog_image ? 'display: none;' : 'display: block;' }}">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                    </div>
                                    <h5 style="{{ $blog->blog_image ? 'display: none;' : 'display: block;' }}">Drag & Drop or Click to Upload</h5>
                                    <p class="text-muted" style="{{ $blog->blog_image ? 'display: none;' : 'display: block;' }}">Recommended size: 1200x630 pixels (JPG, PNG, or GIF)</p>
                                    <p class="text-muted" style="{{ $blog->blog_image ? 'display: none;' : 'display: block;' }}">Max file size: 5MB</p>
                                    <input type="file" id="blog_image" name="blog_image" accept="image/*"
                                        style="display: none;">

                                    {{-- Image preview --}}
                                    <img id="image-preview" src="{{ asset('Blogs/blog_images/' . $blog->blog_image) }}" alt="Image Preview"
                                        style="max-width: 200px; height: auto; border-radius: 8px; margin-top: 15px; {{ $blog->blog_image ? 'display: block;' : 'display: none;' }}">
                                    @if ($blog->blog_image)
                                        <small class="text-muted mt-2">Current Image: {{ basename($blog->blog_image) }}</small>
                                    @endif
                                </div>
                                @error('blog_image')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- Button --}}
                    <div class="mt-5">
                        <button type="submit" class="btn-submit">
                            <i class="fas fa-save me-2"></i> Update Blog
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Image and City Filter Functionality --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Image Upload Functionality
            const imageUploadArea = document.getElementById('image-upload-area');
            const blogImageInput = document.getElementById('blog_image'); // Renamed from newsImageInput
            const imagePreview = document.getElementById('image-preview');
            const uploadIcon = imageUploadArea.querySelector('.upload-icon');
            const uploadTitle = imageUploadArea.querySelector('h5');
            const uploadTexts = imageUploadArea.querySelectorAll('p.text-muted');

            // Function to show/hide upload instructions
            function toggleUploadInstructions(show) {
                uploadIcon.style.display = show ? 'block' : 'none';
                uploadTitle.style.display = show ? 'block' : 'none';
                uploadTexts.forEach(p => p.style.display = show ? 'block' : 'none');
            }

            // Make the whole container clickable
            imageUploadArea.addEventListener('click', function() {
                blogImageInput.click(); // Trigger the hidden file input
            });

            // Display a preview when a file is selected
            blogImageInput.addEventListener('change', function() {
                const file = this.files[0];

                if (file) {
                    // Optional: File size validation
                    const maxSize = 5 * 1024 * 1024; // 5 MB in bytes
                    if (file.size > maxSize) {
                        alert('File size exceeds the maximum limit of 5MB.');
                        this.value = ''; // Clear the input
                        imagePreview.src = '';
                        imagePreview.style.display = 'none';
                        toggleUploadInstructions(true); // Show original text/icon if validation fails
                        return;
                    }

                    const reader = new FileReader();

                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                        toggleUploadInstructions(false); // Hide the upload instructions
                    };

                    reader.readAsDataURL(file);
                } else {
                    // If no file is selected (e.g., dialog cancelled), hide preview if no current image
                    if (!imagePreview.src || imagePreview.src.includes('http')) { // Check if it's not a local file path
                        imagePreview.src = '';
                        imagePreview.style.display = 'none';
                        toggleUploadInstructions(true); // Show original text/icon
                    }
                }
            });

            // Basic Drag & Drop visual feedback and file handling
            imageUploadArea.addEventListener('dragover', function(e) {
                e.preventDefault(); // Allow drop
                imageUploadArea.style.borderColor = 'var(--primary-color)'; // Use primary color on drag over
            });

            imageUploadArea.addEventListener('dragleave', function(e) {
                e.preventDefault();
                imageUploadArea.style.borderColor = '#ddd'; // Reset border color
            });

            imageUploadArea.addEventListener('drop', function(e) {
                e.preventDefault();
                imageUploadArea.style.borderColor = '#ddd'; // Reset border color

                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    blogImageInput.files = files; // Assign dropped files to the input
                    // Manually trigger the 'change' event to update the preview
                    blogImageInput.dispatchEvent(new Event('change', {
                        bubbles: true
                    }));
                }
            });

            // --- City Filter Functionality ---
            const countrySelect = document.getElementById('country_id');
            const citySelect = document.getElementById('city_id');
            const noCitiesMessage = document.getElementById('noCitiesMessage');
            const selectCountryMessage = document.getElementById('selectCountryMessage');

            // IMPORTANT: This line passes all cities data from Laravel to JavaScript
            const allCitiesData = @json($cities);

            // Old Input for City (for validation re-population or initial data)
            const oldSelectedCityId = "{{ old('city_id', $blog->city_id) }}";

            // Function to Filter and Populate Cities Dropdown
            function filterCitiesDropdown() {
                const selectedCountryId = countrySelect.value;
                let citiesFoundForCountry = false;

                // Clear previous city options, then add a placeholder
                citySelect.innerHTML = '';
                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.textContent = 'Select a City';
                citySelect.appendChild(defaultOption);

                // Hide all messages initially
                selectCountryMessage.style.display = 'none';
                noCitiesMessage.style.display = 'none';

                if (!selectedCountryId) {
                    // If no country is selected, reset city dropdown and show "select country" message
                    citySelect.value = '';
                    selectCountryMessage.style.display = 'block';
                    return;
                }

                // Loop through all cities data to find matches for the selected country
                allCitiesData.forEach(city => {
                    if (String(city.country_id) === String(selectedCountryId)) { // Ensure comparison type matches
                        const option = document.createElement('option');
                        option.value = city.id;
                        option.textContent = city.city_name;
                        citySelect.appendChild(option);
                        citiesFoundForCountry = true;
                    }
                });

                // Handle scenario: no cities found for the selected country
                if (!citiesFoundForCountry) {
                    const naOption = document.createElement('option');
                    naOption.value = 'N/A';
                    naOption.textContent = 'N/A (No City)';
                    citySelect.appendChild(naOption);
                    // If no cities found, automatically select 'N/A'
                    citySelect.value = 'N/A';
                    noCitiesMessage.style.display = 'block';
                }

                // Attempt to re-select the old value (if page reloaded due to validation error or initial data)
                if (oldSelectedCityId) {
                    if (citySelect.querySelector(`option[value="${oldSelectedCityId}"]`)) {
                        citySelect.value = oldSelectedCityId;
                    } else if (oldSelectedCityId === 'N/A' && !citiesFoundForCountry) {
                        citySelect.value = 'N/A';
                    } else {
                        citySelect.value = ''; // Reset if old ID is not valid for new country
                    }
                } else if (citiesFoundForCountry) {
                    citySelect.value = ''; // If no old ID and cities were found, ensure "Select a City" is chosen
                }
            }

            // Event Listener
            if (countrySelect) {
                countrySelect.addEventListener('change', filterCitiesDropdown);
            } else {
                console.warn(
                    "Country select element with ID 'country_id' not found. Dynamic city filtering will not work."
                );
            }

            // Initial Call on Page Load
            filterCitiesDropdown();

            // If page loads with no country selected but old input was 'N/A', ensure 'N/A' is selected
            if (!countrySelect.value && oldSelectedCityId === 'N/A') {
                if (!citySelect.querySelector('option[value="N/A"]')) {
                    const naOption = document.createElement('option');
                    naOption.value = 'N/A';
                    naOption.textContent = 'N/A (No City)';
                    citySelect.appendChild(naOption);
                }
                citySelect.value = 'N/A';
                selectCountryMessage.style.display = 'none';
                noCitiesMessage.style.display = 'none';
            }
        });
    </script>
    {{-- Slug --}}
    <script>
        function generateSlug() {
            var blogTitle = document.getElementById('blog_title').value; // Changed to blog_title for source of slug
            var customSlugInput = document.getElementById('slug'); // Get the custom slug input
            var systemSlugInput = document.getElementById('blog_slug'); // Get the system generated slug input

            // If the custom slug input is empty, generate from blog title, otherwise use custom slug
            var sourceText = customSlugInput.value.trim() !== '' ? customSlugInput.value : blogTitle;

            var generatedSlug = sourceText
                .trim()
                .toLowerCase()
                .replace(/[^a-z0-9äöüß]+/g, '-') // Allow ÄäÖöÜüß
                .replace(/^-|-$/g, '');

            systemSlugInput.value = generatedSlug;
        }

        // Add event listener to blog_title to generate slug initially and on change
        document.addEventListener('DOMContentLoaded', function() {
            const blogTitleInput = document.getElementById('blog_title');
            const customSlugInput = document.getElementById('slug');

            // Initial generation on page load (useful if old('blog_title') exists)
            generateSlug();

            // Generate slug automatically when blog title changes, but only if custom slug is empty
            blogTitleInput.addEventListener('input', function() {
                if (customSlugInput.value.trim() === '') {
                    generateSlug();
                }
            });

            // If custom slug is being typed, it should directly influence the system slug
            customSlugInput.addEventListener('input', generateSlug);
        });
    </script>

    {{-- Editor --}}
    <script>
        // Initialize TinyMCE for all textareas
        tinymce.init({
            selector: 'textarea:not(#blog_description)',
            advcode_inline: true,
            plugins: 'searchreplace autolink directionality visualblocks visualchars image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap emoticons autosave fullscreen code',
            toolbar: "undo redo print spellcheckdialog formatpainter | blocks fontfamily fontsize | bold italic underline forecolor backcolor | link image | alignleft aligncenter alignright alignjustify | code | checklist numlist bullist indent outdent | table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol",
            file_picker_types: 'image',
            file_picker_callback: function(callback, value, meta) {
                if (meta.filetype === 'image') {
                    // Open a file picker dialog
                    openFilePicker(callback);
                }
            },
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                "See docs to implement AI Assistant")),
            content_css: [
                'data:text/css;charset=utf-8,' +
                encodeURIComponent('img { width: 100% !important; height: auto !important; }')
            ],
        });

        // Function to open file picker dialog
        function openFilePicker(callback) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            input.onchange = function() {
                var file = this.files[0];

                if (window.FileReader) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        // Resize and compress image before passing it to TinyMCE
                        resizeImage(e.target.result, function(resizedImage) {
                            callback(resizedImage, {
                                alt: file.name
                            });
                        });
                    };

                    reader.readAsDataURL(file);
                } else {
                    alert('FileReader is not supported in this browser.');
                }
            };

            input.click();
        }

        function resizeImage(base64Image, callback) {
            const img = new Image();
            img.onload = function() {
                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');

                // Determine new dimensions
                let width = img.width;
                let height = img.height;
                const maxWidth = 1920;
                const maxHeight = 1080;

                if (width > maxWidth || height > maxHeight) {
                    if (width / height > maxWidth / maxHeight) {
                        height = Math.round(maxWidth * (height / width));
                        width = maxWidth;
                    } else {
                        width = Math.round(maxHeight * (width / height));
                    }
                    canvas.width = width;
                    canvas.height = height;
                    ctx.drawImage(img, 0, 0, width, height);
                    callback(canvas.toDataURL('image/jpeg', 0.8)); // Adjust quality here (0.8 = 80%)
                } else {
                    callback(base64Image); // No resize needed
                }
            };
            img.src = base64Image;
        }
    </script>
@endsection