@extends('template')

@section('main_section')
    {{-- Success and Error Messages --}}
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @elseif (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif

    <script src="{{ asset('tinymce\tinymce.min.js') }}" referrerpolicy="origin"></script>

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
                <h4 class="mb-0"><i class="fas fa-edit me-2"></i> Edit News</h4>
                <a href="{{ route('news.show') }}" class="btn btn-light btn-sm rounded-pill px-4 py-2 shadow-sm">
                    <i class="fas fa-arrow-left me-2"></i> Back to News
                </a>
            </div>

            <div class="card-body">
                {{-- Form for editing --}}
                <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH') {{-- Use PUT method for update --}}

                    <div class="mb-5">
                        <h5 class="section-title">Basic Information</h5>
                        <div class="row g-4">


                            {{-- Language Selection in radio btn --}}
                            {{-- <div class="col-md-6">
                                <label class="form-label">Language <span class="required-star">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input @error('language') is-invalid @enderror"
                                        type="radio" name="language" id="language" value="en"
                                        {{ old('language', $news->language) == 'en' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="language">English</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('language') is-invalid @enderror"
                                        type="radio" name="language" id="language" value="ur"
                                        {{ old('language', $news->language) == 'ur' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="language">Urdu</label>
                                </div>
                                @error('language')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror                               
                            </div> --}}

                            {{-- Language Selector in radio btn --}}
                            <div class="col-md-12">
                                <label class="form-label">Language <span class="required-star">*</span></label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('language') is-invalid @enderror" type="radio"
                                        name="language" id="language_en" value="en"
                                        {{ old('language', $news->language) == 'en' ? 'checked' : '' }} required
                                        onchange="filterAndPopulateCategories(this.value)">
                                    <label class="form-check-label" for="language_en">English</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('language') is-invalid @enderror" type="radio"
                                        name="language" id="language_ur" value="ur"
                                        {{ old('language', $news->language) == 'ur' ? 'checked' : '' }}
                                        onchange="filterAndPopulateCategories(this.value)">
                                    <label class="form-check-label" for="language_ur">Urdu</label>
                                </div>
                                @error('language')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <p class="form-note">Select the language for the news content.</p>
                            </div>

                            <hr>


                            {{-- Your Categories Dropdown --}}
                            <div class="col-md-12">
                                <label for="category_id" class="form-label">Select a Category <span
                                        class="required-star">*</span></label>
                                <select class="form-select @error('category_id') is-invalid @enderror" id="category_id"
                                    name="category_id" required>
                                    <option value="">Select Category</option>
                                    {{-- Loop through ALL categories passed from the controller --}}
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" data-language="{{ $category->language }}"
                                            {{ old('category_id', $news->category_id) == $category->id ? 'selected' : '' }}>
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

                            {{-- Country from database --}}
                            <div class="col-md-6">
                                <label for="country_id" class="form-label">Country</label>
                                <select class="form-select @error('country_id') is-invalid @enderror" id="country_id"
                                    name="country_id" required>
                                    <option value="" disabled>Select a country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ old('country_id', $news->country_id) == $country->id ? 'selected' : '' }}>
                                            {{ $country->country_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- News Status --}}
                            <div class="col-md-6">
                                <label for="news_status" class="form-label">Status</label>
                                <select class="form-select" id="news_status" name="news_status" required>
                                    <option value="active"
                                        {{ old('news_status', $news->news_status) == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="inactive"
                                        {{ old('news_status', $news->news_status) == 'inactive' ? 'selected' : '' }}>
                                        Inactive
                                    </option>
                                </select>
                                @error('news_status')
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

                            {{-- Category from database --}}
                            {{-- <div class="col-md-6">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="form-select @error('category_id') is-invalid @enderror" id="category_id"
                                    name="category_id">
                                    <option value="">Select a Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $news->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}

                            {{-- News title --}}
                            <div class="col-md-12">
                                <label for="news_title" class="form-label">News Title </label>
                                <input type="text" class="form-control @error('news_title') is-invalid @enderror"
                                    id="news_title" name="news_title" placeholder="Enter news title"
                                    value="{{ old('news_title', $news->news_title) }}" required>
                                @error('news_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- News Content --}}
                            <div class="col-md-12">
                                <label for="news_content" class="form-label">News Content </label>
                                <textarea id="news_content" name="news_content"
                                    class="form-control tinymce @error('news_content') is-invalid @enderror" placeholder="Enter news content"
                                    rows="20">{{ old('news_content', $news->news_content) }}</textarea>
                                @error('news_content')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- News description --}}
                            <div class="col-md-12">
                                <label for="news_description" class="form-label">News Description</label>
                                <textarea class="form-control @error('news_description') is-invalid @enderror" id="news_description"
                                    name="news_description" rows="5" placeholder="Enter the full news description here">{{ old('news_description', $news->news_description) }}</textarea>
                                @error('news_description')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Custom Slug --}}
                            <div class="col-md-12">
                                <label for="slug" class="form-label">News Slug</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="slug" name="slug" placeholder="Write a slug"
                                    value="{{ old('slug', $news->slug) }}" onkeyup="generateSlug()">
                                @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Slug which stored in database (System Generated Slug) --}}
                            <div class="col-md-12">
                                <label for="news_slug" class="form-label">System Generated Slug</label>
                                <input type="text" class="form-control" id="news_slug" name="news_slug"
                                    placeholder="Auto-generated from title"
                                    value="{{ old('news_slug', $news->news_slug) }}" readonly>
                                @error('news_slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Image Upload --}}
                    <div class="mb-5">
                        <h5 class="section-title">Featured Image</h5>
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="image-upload-container" id="image-upload-area">
                                    <input type="file" id="news_image" name="news_image" accept="image/*"
                                        style="display: none;">

                                    {{-- This is where the image preview will appear --}}
                                    <img id="image-preview" {{-- **CORRECTION HERE: Added '/' before $news->news_image** --}}
                                        src="{{ $news->news_image ? asset('news/news_images/' . $news->news_image) : '' }}"
                                        alt="Image Preview"
                                        style="max-width: 200px; height: auto; border-radius: 8px; margin-top: 15px; {{ $news->news_image ? 'display: block;' : 'display: none;' }}">

                                    {{-- Show upload area text/icon only if no image is present initially --}}
                                    <div id="upload-prompt"
                                        style="{{ $news->news_image ? 'display: none;' : 'display: block;' }}">
                                        <div class="upload-icon">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                        </div>
                                        <h5>Drag & Drop or Click to Upload</h5>
                                        <p class="text-muted">Recommended size: 1200x630 pixels (JPG, PNG, or GIF)</p>
                                        <p class="text-muted">Max file size: 5MB</p>
                                    </div>
                                </div>
                            </div>
                            @error('news_image')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                            <p class="form-note">Leave blank to keep the current image.</p>
                        </div>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn-submit">
                            <i class="fas fa-save me-2"></i> Update News
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Image Upload Functionality
            const imageUploadArea = document.getElementById('image-upload-area');
            const newsImageInput = document.getElementById('news_image');
            const imagePreview = document.getElementById('image-preview');

            // Make the whole container clickable
            imageUploadArea.addEventListener('click', function() {
                newsImageInput.click(); // Trigger the hidden file input
            });

            // Display a preview when a file is selected
            newsImageInput.addEventListener('change', function() {
                const file = this.files[0];

                if (file) {
                    // Optional: File size validation
                    const maxSize = 5 * 1024 * 1024; // 5 MB in bytes
                    if (file.size > maxSize) {
                        alert('File size exceeds the maximum limit of 5MB.');
                        this.value = ''; // Clear the input
                        imagePreview.src =
                            "{{ $news->news_image ? asset('storage/' . $news->news_image) : '' }}"; // Revert to old image or empty
                        imagePreview.style.display = "{{ $news->news_image ? 'block' : 'none' }}";
                        // Show original text/icon if validation fails and no existing image
                        if (!"{{ $news->news_image }}") { // Only show upload text if no existing image
                            imageUploadArea.querySelector('.upload-icon').style.display = 'block';
                            imageUploadArea.querySelector('h5').style.display = 'block';
                            imageUploadArea.querySelectorAll('p.text-muted').forEach(p => p.style.display =
                                'block');
                        }
                        return;
                    }

                    const reader = new FileReader();

                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                        // Hide the upload instructions
                        imageUploadArea.querySelector('.upload-icon').style.display = 'none';
                        imageUploadArea.querySelector('h5').style.display = 'none';
                        imageUploadArea.querySelectorAll('p.text-muted').forEach(p => p.style.display =
                            'none');
                    };

                    reader.readAsDataURL(file);
                } else {
                    // If no file is selected (e.g., dialog cancelled), revert to old image or hide preview
                    imagePreview.src =
                        "{{ $news->news_image ? asset('storage/' . $news->news_image) : '' }}";
                    imagePreview.style.display = "{{ $news->news_image ? 'block' : 'none' }}";

                    // Show original text/icon if no image is currently set or selected
                    if (!"{{ $news->news_image }}") {
                        imageUploadArea.querySelector('.upload-icon').style.display = 'block';
                        imageUploadArea.querySelector('h5').style.display = 'block';
                        imageUploadArea.querySelectorAll('p.text-muted').forEach(p => p.style.display =
                            'block');
                    }
                }
            });

            // Basic Drag & Drop visual feedback and file handling
            imageUploadArea.addEventListener('dragover', function(e) {
                e.preventDefault(); // Allow drop
                imageUploadArea.style.borderColor =
                    'var(--primary-color)'; // Use primary color on drag over
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
                    newsImageInput.files = files; // Assign dropped files to the input
                    // Manually trigger the 'change' event to update the preview
                    newsImageInput.dispatchEvent(new Event('change', {
                        bubbles: true
                    }));
                }
            });


            // --- DOM Elements ---
            const countrySelect = document.getElementById('country_id');
            const citySelect = document.getElementById('city_id');
            const noCitiesMessage = document.getElementById('noCitiesMessage');
            const selectCountryMessage = document.getElementById('selectCountryMessage');

            // --- Old Input for City (for validation re-population) ---
            // Use the actual news->city_id if no old input exists
            const oldSelectedCityId = "{{ old('city_id', $news->city_id) }}";

            // --- Function to Filter and Populate Cities Dropdown ---
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
                    if (String(city.country_id) === String(
                            selectedCountryId)) { // Ensure comparison type matches
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

                // Attempt to re-select the old value (if page reloaded due to validation error or initial load)
                if (oldSelectedCityId) {
                    // Check if the old ID exists as an option
                    if (citySelect.querySelector(`option[value="${oldSelectedCityId}"]`)) {
                        citySelect.value = oldSelectedCityId;
                    } else if (oldSelectedCityId === 'N/A' && !citiesFoundForCountry) {
                        // If old value was 'N/A' and still no cities found, ensure 'N/A' is selected
                        citySelect.value = 'N/A';
                    } else {
                        // If oldSelectedCityId exists but isn't valid for the new country, reset to default
                        citySelect.value = '';
                    }
                } else if (citiesFoundForCountry) {
                    // If no old ID, and cities were found, ensure "Select a City" is chosen
                    citySelect.value = '';
                }
            }

            // --- Event Listener ---
            // Trigger filterCitiesDropdown when the country selection changes
            if (countrySelect) {
                countrySelect.addEventListener('change', filterCitiesDropdown);
            } else {
                console.warn(
                    "Country select element with ID 'country_id' not found. Dynamic city filtering will not work."
                );
            }

            // --- Initial Call on Page Load ---
            // This handles cases where the page loads with a pre-selected country (e.g., after a validation error or initial edit load)
            filterCitiesDropdown();

            // If page loads with no country selected but old input was 'N/A', ensure 'N/A' is selected
            if (!countrySelect.value && oldSelectedCityId === 'N/A') {
                // Add N/A option if not already present (filterCitiesDropdown would have cleared it)
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

    <script>
        // IMPORTANT: This line passes all cities data from Laravel to JavaScript
        // Ensure $cities is an Eloquent Collection (or array of objects) with id, city_name, and country_id
        const allCitiesData = @json($cities);

        function generateSlug() {
            var newsTitle = document.getElementById('news_title').value; // Use news_title for slug generation
            var customSlugInput = document.getElementById('slug'); // The manual slug input
            var autoSlugInput = document.getElementById('news_slug'); // The system generated slug input

            // If the custom slug input is empty, generate from news_title
            if (customSlugInput.value.trim() === '') {
                var generatedSlug = newsTitle
                    .trim()
                    .toLowerCase()
                    .replace(/[^a-z0-9äöüß]+/g, '-') // Allow ÄäÖöÜüß and replace non-alphanumeric with hyphen
                    .replace(/^-|-$/g, ''); // Remove leading/trailing hyphens
                autoSlugInput.value = generatedSlug;
            } else {
                // If custom slug is entered, use that for auto_slug (ensure it's also formatted)
                var formattedCustomSlug = customSlugInput.value
                    .trim()
                    .toLowerCase()
                    .replace(/[^a-z0-9äöüß]+/g, '-')
                    .replace(/^-|-$/g, '');
                autoSlugInput.value = formattedCustomSlug;
            }
        }

        // Add event listener to news_title to generate slug automatically when typing
        document.getElementById('news_title').addEventListener('input', generateSlug);
        // Also add event listener to custom slug so it updates auto slug if a custom one is typed
        document.getElementById('slug').addEventListener('input', generateSlug);

        // Call generateSlug on page load to pre-fill if data exists (for edit view)
        document.addEventListener('DOMContentLoaded', generateSlug);
    </script>

    {{-- TinyMCE Editor --}}
    <script>
        tinymce.init({
            selector: 'textarea:not(#news_description)', // Initialize TinyMCE for all textareas EXCEPT news_description
            advcode_inline: true,
            plugins: 'searchreplace autolink directionality visualblocks visualchars image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap emoticons autosave fullscreen code',
            toolbar: "undo redo print spellcheckdialog formatpainter | blocks fontfamily fontsize | bold italic underline forecolor backcolor | link image | alignleft aligncenter alignright alignjustify | code | checklist numlist bullist indent outdent | table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol",
            file_picker_types: 'image',
            file_picker_callback: function(callback, value, meta) {
                if (meta.filetype === 'image') {
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
                        height = maxHeight;
                    }
                }

                canvas.width = width;
                canvas.height = height;
                ctx.drawImage(img, 0, 0, width, height);

                // Convert canvas to base64 with compression
                const compressedImage = canvas.toDataURL('image/jpeg', 0.7); // Adjust quality here
                callback(compressedImage);
            };
            img.src = base64Image;
        }
    </script>


    {{-- JavaScript for client-side filtering  categories by language --}}
    <script>
        let allCategoriesOptions = []; // This will store clones of all initial HTML option elements

        // Function to populate the category dropdown with filtered options
        function populateCategoryDropdown(optionsToDisplay, selectedCategoryId = null) {
            const categoryDropdown = document.getElementById('category_id');
            if (!categoryDropdown) {
                console.error("populateCategoryDropdown: Category dropdown with ID 'category_id' not found.");
                return;
            }

            // Clear existing options, but keep the "Select Category" option
            categoryDropdown.innerHTML = '<option value="">Select Category</option>';

            let foundCategories = false;
            optionsToDisplay.forEach(option => {
                const clonedOption = option.cloneNode(true); // Always append a clone
                // If a selectedCategoryId is provided, mark the corresponding option as selected
                if (selectedCategoryId !== null && clonedOption.value == selectedCategoryId) {
                    clonedOption.selected = true;
                }
                categoryDropdown.appendChild(clonedOption);
                foundCategories = true;
            });

            if (!foundCategories) {
                const noCategoriesOption = document.createElement('option');
                noCategoriesOption.value = '';
                noCategoriesOption.textContent = 'No categories found for this language.';
                categoryDropdown.appendChild(noCategoriesOption);
            }
        }

        // Function to filter categories based on selected language and update dropdown
        function filterAndPopulateCategories(selectedLanguage, selectedCategoryId = null) {
            // Filter the stored original options based on the data-language attribute
            const filteredOptions = allCategoriesOptions.filter(option => {
                return option.dataset.language === selectedLanguage;
            });

            // Populate the dropdown with the filtered options, also passing the pre-selected category ID
            populateCategoryDropdown(filteredOptions, selectedCategoryId);
        }

        // Initial load: When the DOM is fully loaded, read all category options
        // and then filter based on the initially checked language radio button,
        // also setting the pre-selected category.
        document.addEventListener('DOMContentLoaded', function() {
            const categoryDropdown = document.getElementById('category_id');
            if (categoryDropdown) {
                // Read and store all options (except the first "Select Category" one)
                const currentOptions = Array.from(categoryDropdown.options);
                for (let i = 1; i < currentOptions.length; i++) { // Start from 1 to skip "Select Category"
                    allCategoriesOptions.push(currentOptions[i].cloneNode(true));
                }
            } else {
                console.error("DOMContentLoaded: Category dropdown with ID 'category_id' not found.");
            }

            // Determine the initially checked language
            const initialLanguageInput = document.querySelector('input[name="language"]:checked');
            let initialLanguage = initialLanguageInput ? initialLanguageInput.value :
            'en'; // Default to 'en' if none checked

            // Get the ID of the category that was previously selected for this news item
            // This value is passed from Laravel via the $news object
            const preSelectedCategoryId = "{{ old('category_id', $news->category_id ?? '') }}";
            // Convert to null if empty string to match populateDropdown signature
            const finalSelectedCategoryId = preSelectedCategoryId ? preSelectedCategoryId : null;

            // Trigger initial filtering and population, including setting the pre-selected category
            filterAndPopulateCategories(initialLanguage, finalSelectedCategoryId);
        });
    </script>
@endsection
