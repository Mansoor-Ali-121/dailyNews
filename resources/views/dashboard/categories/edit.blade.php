@extends('template')

@section('main_section')

    {{-- Custom Styles for Edit Category Page --}}
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

        /* General label for non-floating inputs */
        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.75rem;
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

        /* Buttons with Hover Effects */
        .btn-primary {
            background: linear-gradient(135deg, #8A2BE2 0%, #A020F0 100%); /* Deeper purple gradient */
            border: none;
            font-weight: 600; /* Slightly bolder text */
            transition: all 0.3s ease, background-position 0.5s ease;
            background-size: 200% 100%; /* For background-position animation */
            padding: 0.75rem 1.75rem; /* Adjusted padding for better look */
            border-radius: 0.75rem; /* Consistent border-radius */
        }

        .btn-primary:hover {
            background-position: -100% 0; /* Shift gradient on hover */
            box-shadow: 0 8px 20px rgba(138, 43, 226, 0.3); /* Enhanced shadow */
        }

        /* Corrected btn-light for cancel button */
        .btn-light {
            border-radius: 0.75rem; /* Consistent border-radius */
            padding: 0.75rem 1.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
            color: #495057; /* Ensure text is visible */
            background-color: #f8f9fa; /* Light background */
            border: 1px solid #ced4da; /* Subtle border */
        }

        .btn-light:hover {
            background-color: #e2e6ea;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
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
            0% { box-shadow: 0 0 0 0 rgba(138, 43, 226, 0.4); } /* Use primary color for pulse */
            70% { box-shadow: 0 0 0 12px rgba(138, 43, 226, 0); }
            100% { box-shadow: 0 0 0 0 rgba(138, 43, 226, 0); }
        }

        /* Alert Messages */
        .alert {
            border-radius: 10px;
            padding: 1.25rem 1.5rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border-left: 5px solid; /* For a prominent visual cue */
        }
        .alert-success { border-color: #28a745; background-color: #d4edda; color: #155724; }
        .alert-danger { border-color: #dc3545; background-color: #f8d7da; color: #721c24; }
        .alert ul { margin-bottom: 0; padding-left: 20px; }


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

    @include('dashboard.includes.alerts')

    <div class="container-fluid px-5 py-4">
        <div class="row g-4 justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-lg overflow-hidden">
                    {{-- Card Header with Animated Gradient --}}
                    <div class="card-header p-5 position-relative overflow-hidden">
                        <div class="gradient-animation" style="background: linear-gradient(135deg, #7F00FF 0%, #E100FF 100%); position: absolute; top: 0; left: 0; width: 200%; height: 100%; animation: gradientShift 8s ease infinite;"></div>
                        <div class="d-flex justify-content-between align-items-center position-relative" style="z-index: 2;">
                            <div>
                                <h2 class="h3 mb-2 text-white"><i class="fas fa-edit me-3"></i> Edit Category</h2>
                                <p class="mb-0 text-white-50 fs-5">Modify the details of your category</p>
                            </div>
                            <a href="{{ route('category.show') }}" class="btn btn-light btn-lg rounded-pill px-4 py-2 shadow-sm hover-scale">
                                <i class="fas fa-arrow-left me-2"></i> Back to Categories
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

                        {{-- FULL ERROR DISPLAY SECTION (Enhanced Styling) --}}
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

                        <form action="{{ route('category.update', $category->id) }}" method="post">
                            @csrf
                            @method('PATCH')

                            <div class="row g-4">
                                {{-- Category Name Field with Floating Icon --}}
                                <div class="col-12">
                                    <div class="form-floating position-relative">
                                        <i class="fas fa-folder-open floating-icon"></i>
                                        <input type="text"
                                            class="form-control border-2 ps-5 py-3 @error('category_name') is-invalid @enderror"
                                            id="category_name" name="category_name" value="{{ old('category_name', $category->category_name) }}" required placeholder="Category Name" onkeyup="generateSlug()">
                                        <label for="category_name" class="form-label text-muted ms-4">Category Name</label>
                                        @error('category_name')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Category Slug (User Editable Input for Slug Generation) --}}
                                <div class="col-12">
                                    <div class="form-floating position-relative">
                                        <i class="fas fa-link floating-icon"></i>
                                        <input type="text"
                                            class="form-control border-2 ps-5 py-3 @error('actual_slug') is-invalid @enderror"
                                            id="actual_slug" name="actual_slug" value="{{ old('actual_slug', $category->category_slug) }}" onkeyup="generateSlug()" required placeholder="Custom Slug (Optional)">
                                        <label for="actual_slug" class="form-label text-muted ms-4">Custom Slug (Optional)</label>
                                        @error('actual_slug')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Generated Category Slug (Read-only) --}}
                                <div class="col-12">
                                    <div class="form-floating position-relative">
                                        <i class="fas fa-hashtag floating-icon"></i>
                                        <input type="text"
                                            class="form-control border-2 ps-5 py-3 bg-light"
                                            id="category_slug" name="category_slug" value="{{ old('category_slug', $category->category_slug) }}" readonly placeholder="System Generated Slug">
                                        <label for="category_slug" class="form-label text-muted ms-4">System Generated Slug</label>
                                        @error('category_slug')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Category Status Select --}}
                                <div class="col-12">
                                    <div class="form-floating position-relative">
                                        <i class="fas fa-toggle-on floating-icon"></i>
                                        <select name="category_status" id="category_status"
                                            class="form-select border-2 ps-5 py-3 @error('category_status') is-invalid @enderror" required>
                                            <option value="" disabled {{ old('category_status', $category->category_status) == '' ? 'selected' : '' }}>Select Status</option>
                                            <option value="active" {{ old('category_status', $category->category_status) == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ old('category_status', $category->category_status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        <label for="category_status" class="form-label text-muted ms-4">Category Status</label>
                                        @error('category_status')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Submit and Cancel Buttons --}}
                                <div class="col-12 mt-4">
                                    <div class="d-flex justify-content-end gap-3">
                                        <a href="{{ route('category.show') }}" class="btn btn-lg btn-light rounded-pill px-4 shadow-sm hover-scale">
                                            <i class="fas fa-times me-2"></i> Cancel
                                        </a>
                                        <button type="submit" class="btn btn-lg btn-primary rounded-pill px-4 shadow-sm hover-scale pulse-on-hover">
                                            <i class="fas fa-save me-2"></i> Update Category
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
    <script>
        function generateSlug() {
            // Get value from the user-editable 'actual_slug' field (or category_name if you want to use that for initial slug)
            var inputSlug = document.getElementById('category_name').value; // Default to category_name
            if (document.getElementById('actual_slug').value !== '') { // Prioritize actual_slug if user types there
                inputSlug = document.getElementById('actual_slug').value;
            }

            // Generate a clean slug
            var generatedSlug = inputSlug
                .trim()
                .toLowerCase()
                .replace(/[^a-z0-9äöüß]+/g, '-') // Allow ÄäÖöÜüß and replace non-alphanumeric with hyphens
                .replace(/^-|-$/g, ''); // Remove leading/trailing hyphens

            // Set the generated slug to the read-only 'category_slug' field
            document.getElementById('category_slug').value = generatedSlug;
        }

        // Call generateSlug on page load to ensure the read-only slug field is populated and consistent
        document.addEventListener('DOMContentLoaded', generateSlug);

        // Also call it when the user types in the category name field
        document.getElementById('category_name').addEventListener('keyup', generateSlug);
    </script>
@endsection