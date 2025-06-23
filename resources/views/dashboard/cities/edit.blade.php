@extends('template')

@section('main_section')

    @include('dashboard.includes.alerts')

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit City: {{ $city->city_name }}</h2>
                    </div>
                    <div class="card-body">

                        {{-- FULL ERROR DISPLAY SECTION --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{-- END FULL ERROR DISPLAY SECTION --}}

                        {{-- Form to edit an existing city --}}
                        <form action="{{ route('city.update', $city->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            {{-- Country ID Field (Dropdown populated from countries) --}}
                            <div class="mb-3">
                                <label for="country_id" class="form-label">Country:</label>
                                <select class="form-select @error('country_id') is-invalid @enderror" id="country_id"
                                    name="country_id" required>
                                    <option value="">Select a Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ old('country_id', $city->country_id) == $country->id ? 'selected' : '' }}>
                                            {{ $country->country_name }} ({{ $country->country_code }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- City Name Field --}}
                            <div class="mb-3">
                                <label for="city_name" class="form-label">City Name:</label>
                                <input type="text" class="form-control @error('city_name') is-invalid @enderror"
                                    id="city_name" name="city_name" value="{{ old('city_name', $city->city_name) }}"
                                    required>
                                @error('city_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Zip Code Field --}}
                            <div class="mb-3">
                                <label for="zip_code" class="form-label">Zip Code:</label>
                                <input type="text" class="form-control @error('zip_code') is-invalid @enderror"
                                    id="zip_code" name="zip_code" value="{{ old('zip_code', $city->zip_code) }}">
                                @error('zip_code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- User Input for Slug (Actual Slug) --}}
                            {{-- This field is what the user types to create/modify the slug --}}
                            <div class="mb-3">
                                <label for="actual_slug" class="form-label">City Slug (User Input):</label>
                                <input type="text" name="actual_slug" id="actual_slug"
                                    class="form-control @error('actual_slug') is-invalid @enderror" onkeyup="generateSlug()"
                                    value="{{ old('actual_slug', $city->city_slug) }}" required>
                                <div class="form-text">Lowercase, alphanumeric, and hyphens only (e.g., `new-york-city`).
                                </div>
                                @error('actual_slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Generated Slug (Readonly) --}}
                            {{-- This field displays the generated slug based on 'actual_slug' --}}
                            <div class="mb-3">
                                <label for="city_slug" class="form-label">Generated Slug (Readonly):</label>
                                <input type="text" class="form-control" id="city_slug" name="city_slug"
                                    value="{{ old('city_slug', $city->city_slug) }}"
                                    placeholder="This will be your actual slug!" readonly>
                                {{-- No @error for 'city_slug' here if it's purely generated and not directly validated --}}
                                {{-- If 'city_slug' has a unique rule in controller, you might need @error here --}}
                                @error('city_slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Status Field --}}
                            <div class="mb-3">
                                {{-- CONSISTENCY FIX: Changed 'city_status' to 'status' for name and ID --}}
                                <label for="city_status" class="form-label">Status:</label>
                                <select class="form-select @error('city_status') is-invalid @enderror" id="city_status"
                                    name="city_status" required>
                                    {{-- CONSISTENCY FIX: Added $city->city_status for old() and added 'pending' option --}}
                                    <option value="active" {{ old('city_status', $city->city_status) == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('city_status', $city->city_status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                
                                </select>
                                @error('city_status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update City</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
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
            /* Softer, larger shadow */
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
            /* Increased left padding for icon */
            transition: all 0.3s ease;
            background-color: #f8fafc;
            font-size: 1rem;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #8A2BE2;
            /* A more vibrant primary color on focus */
            box-shadow: 0 0 0 0.25rem rgba(138, 43, 226, 0.2);
            /* Matching glow */
            background-color: white;
        }

        /* Floating Labels with Icons */
        .form-floating label {
            color: #6c757d;
            font-weight: 500;
            transition: all 0.2s ease;
            left: 2.5rem;
            /* Adjust label position */
        }

        .form-floating label::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: transparent;
            /* Prevent label from covering icon */
        }

        /* General label for non-floating inputs */
        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.75rem;
        }

        .floating-icon {
            position: absolute;
            left: 1.25rem;
            /* Position the icon inside the input */
            top: 50%;
            transform: translateY(-50%);
            color: #8A2BE2;
            /* Primary color for icons */
            font-size: 1.1rem;
            z-index: 3;
            /* Ensure icon is above label */
            transition: color 0.3s ease;
        }

        .form-control:focus+.form-label+.floating-icon,
        .form-select:focus+.form-label+.floating-icon {
            color: #6a11cb;
            /* Slight color change on focus */
        }

        /* Buttons with Hover Effects */
        .btn-primary {
            background: linear-gradient(135deg, #8A2BE2 0%, #A020F0 100%);
            /* Deeper purple gradient */
            border: none;
            font-weight: 600;
            /* Slightly bolder text */
            transition: all 0.3s ease, background-position 0.5s ease;
            background-size: 200% 100%;
            /* For background-position animation */
            padding: 0.75rem 1.75rem;
            /* Adjusted padding for better look */
            border-radius: 0.75rem;
            /* Consistent border-radius */
        }

        .btn-primary:hover {
            background-position: -100% 0;
            /* Shift gradient on hover */
            box-shadow: 0 8px 20px rgba(138, 43, 226, 0.3);
            /* Enhanced shadow */
        }

        /* Corrected btn-light for cancel button */
        .btn-light {
            border-radius: 0.75rem;
            /* Consistent border-radius */
            padding: 0.75rem 1.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
            color: #495057;
            /* Ensure text is visible */
            background-color: #f8f9fa;
            /* Light background */
            border: 1px solid #ced4da;
            /* Subtle border */
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

            /* Use primary color for pulse */
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
            /* For a prominent visual cue */
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
                /* Smaller padding for smaller screens */
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
            var inputSlug = document.getElementById('actual_slug').value;
            var generatedSlug = inputSlug
                .trim()
                .toLowerCase()
                .replace(/[^a-z0-9äöüß]+/g, '-') // Allow ÄäÖöÜüß and replace non-alphanumeric with hyphen
                .replace(/^-|-$/g, ''); // Remove leading/trailing hyphens

            document.getElementById('city_slug').value = generatedSlug;
        }
    </script>

@endsection