@extends('template')
@section('main_section')

    @include('dashboard.includes.alerts')

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Add New City</h2>
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

                        {{-- Form to add a new city --}}
                        <form method="POST" action="{{ route('city.add') }}"> {{-- Ensure this action is correct --}}
                            @csrf

                            {{-- Country ID Field (Dropdown populated from countries) --}}
                            <div class="mb-3">
                                <label for="country_id" class="form-label">Country:</label>
                                <select class="form-select @error('country_id') is-invalid @enderror" id="country_id"
                                    name="country_id" required>
                                    <option value="">Select a Country</option> {{-- Default option --}}
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">
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
                                    id="city_name" name="city_name" value="{{ old('city_name') }}" required>
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
                                    id="zip_code" name="zip_code" value="{{ old('zip_code') }}">
                                @error('zip_code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- City Slug --}}
                            <div class="mb-3">
                                <label for="actual_slug" class="form-label">Country Slug:</label>
                                <input type="text" name="actual_slug" id="actual_slug" class="form-control"
                                    onkeyup="generateSlug()" required>
                                <div class="form-text">Lowercase, alphanumeric, and hyphens only (e.g., `united-states`).
                                </div>
                                @error('actual_slug')
                                    <div class="invalid-feedback"> {{-- Corrected typo: 'invalid-feeback' to 'invalid-feedback' --}}
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Actual Slug --}}
                            <div class="mb-3">
                                <label for="city_slug" class="form-label">Actual Slug:</label>
                                <input type="text" class="form-control" id="city_slug" name="city_slug"
                                    placeholder="This will be your actual slug!" readonly>

                                @error('city_slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add City</button>
                            {{-- Add a Cancel button if needed --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function generateSlug() {
            var packageName = document.getElementById('actual_slug').value;
            // var packageSlug = packageName.trim().toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
            var packageSlug = packageName
                .trim()
                .toLowerCase()
                .replace(/[^a-z0-9äöüß]+/g, '-') // Allow ÄäÖöÜüß
                .replace(/^-|-$/g, '');

            document.getElementById('city_slug').value = packageSlug;
        }
    </script>

@endsection
