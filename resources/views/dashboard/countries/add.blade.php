@extends('template')
@section('main_section')
    @include('dashboard.includes.alerts') {{-- Ensure this alert partial displays session flashes --}}


    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{-- Header --}}
                    <div class="card-header">
                        <h2>Add Country</h2>
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
                        <form action="{{ route('country.add') }}" method="POST"> {{-- Corrected route name --}}
                            @csrf

                            {{-- Country Name --}}
                            <div class="mb-3">
                                <label for="country_name" class="form-label">Country Name:</label>
                                <input type="text" name="country_name" id="country_name" class="form-control"
                                    onkeyup="generateSlug()" required>
                                @error('country_name')
                                    <div class="invalid-feedback"> {{-- Corrected typo: 'invalid-feeback' to 'invalid-feedback' --}}
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            {{-- Country Code --}}
                            <div class="mb-3">
                                <label for="country_code" class="form-label">Country Code:</label>
                                <input type="text" name="country_code" id="country_code" class="form-control" required>
                                @error('country_code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Country Slug --}}
                            <div class="mb-3">
                                <label for="actal_slug" class="form-label">Country Slug:</label>
                                {{-- Added 'is-invalid' class for Bootstrap validation feedback --}}
                                {{-- Added old() helper to repopulate input after validation error --}}
                                <input type="text" name="actal_slug" id="actal_slug" class="form-control"
                                    onkeyup="generateSlug()" required>
                                           <div class="form-text">Lowercase, alphanumeric, and hyphens only (e.g., `united-states`).
                                </div>
                                @error('actal_slug')
                                    <div class="invalid-feedback"> {{-- Corrected typo: 'invalid-feeback' to 'invalid-feedback' --}}
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Actual Slug --}}
                            <div class="mb-3">
                                <label for="country_slug" class="form-label">Actual Slug:</label>
                                <input type="text" class="form-control" id="country_slug" name="country_slug"
                                    placeholder="This will be your actual slug!" readonly>
                         
                                @error('country_slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Submit Button --}}
                            <button type="submit" class="btn btn-primary">Add Country</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function generateSlug() {
            var packageName = document.getElementById('actal_slug').value;
            // var packageSlug = packageName.trim().toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
            var packageSlug = packageName
                .trim()
                .toLowerCase()
                .replace(/[^a-z0-9äöüß]+/g, '-') // Allow ÄäÖöÜüß
                .replace(/^-|-$/g, '');

            document.getElementById('country_slug').value = packageSlug;
        }
    </script>
@endsection
