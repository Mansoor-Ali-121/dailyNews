@extends('template')
@section('main_section')
    @include('dashboard.includes.alerts') {{-- Ensure this alert partial displays session flashes --}}

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{-- Header --}}
                    <div class="card-header">
                        <h2>Edit Country</h2>
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

                        {{-- Form start --}}
                        {{-- Make sure your route for updating includes the country ID --}}
                        <form action="{{ route('country.update', $country->id) }}" method="POST">
                            @csrf
                            @method('PATCH') {{-- Use PUT method for updates --}}

                            {{-- Country Name --}}
                            <div class="mb-3">
                                <label for="country_name" class="form-label">Country Name:</label>
                                <input type="text" name="country_name" id="country_name"
                                    class="form-control @error('country_name') is-invalid @enderror"
                                    value="{{ old('country_name', $country->country_name) }}" onkeyup="generateSlug()"
                                    required>
                                @error('country_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Country Code --}}
                            <div class="mb-3">
                                <label for="country_code" class="form-label">Country Code:</label>
                                <input type="text" name="country_code" id="country_code"
                                    class="form-control @error('country_code') is-invalid @enderror"
                                    value="{{ old('country_code', $country->country_code) }}" required>
                                @error('country_code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Country Status Field (Dropdown) --}}
                            <div class="mb-3">
                                <label for="country_status" class="form-label">Country Status:</label>
                                <select class="form-select @error('country_status') is-invalid @enderror"
                                    id="country_status" name="country_status" required>
                                    <option value="">Select Status</option>
                                    <option value="active"
                                        {{ old('country_status', $country->country_status) == 'active' ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="inactive"
                                        {{ old('country_status', $country->country_status) == 'inactive' ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                                @error('country_status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Country Slug (Actual Slug) --}}
                            <div class="mb-3">
                                <label for="actual_slug" class="form-label">Country Slug:</label>
                                <input type="text" name="actual_slug" id="actual_slug"
                                    class="form-control @error('actual_slug') is-invalid @enderror"
                                    value="{{ old('actual_slug', $country->country_slug) }}" onkeyup="generateSlug()"
                                    required>
                                <div class="form-text">Lowercase, alphanumeric, and hyphens only (e.g., `united-states`).
                                </div>
                                @error('actual_slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Auto-generated Slug --}}
                            <div class="mb-3">
                                <label for="country_slug" class="form-label">Auto-Generated Slug:</label>
                                <input type="text" class="form-control" id="country_slug" name="country_slug"
                                    placeholder="This will be your actual slug!"
                                    value="{{ old('country_slug', $country->country_slug) }}" readonly>
                                @error('country_slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Submit Button --}}
                            <button type="submit" class="btn btn-primary">Update Country</button>
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

            document.getElementById('country_slug').value = generatedSlug;
        }

        // Call generateSlug on page load to populate the slug field if editing an existing country
        document.addEventListener('DOMContentLoaded', generateSlug);
    </script>
@endsection
