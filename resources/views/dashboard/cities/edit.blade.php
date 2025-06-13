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