@extends('template')
@section('main_section')

    @include('dashboard.includes.alerts')

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Category</h4>
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

                        {{-- Form to add a new category --}}
                        <form method="POST" action="{{ route('category.add') }}">
                            @csrf

                            {{-- Category Name Field --}}
                            <div class="mb-3">
                                <label for="category_name" class="form-label">Category Name</label>
                                <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name="category_name" required>
                                @error('category_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Category Slug Field --}}
                            <div class="mb-3">
                                <label for="actual_slug" class="form-label">Category Slug</label>
                                <input type="text" class="form-control @error('actual_slug') is-invalid @enderror" id="actual_slug" name="actual_slug"   onkeyup="generateSlug()"  required>
                                @error('actual_slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Actual Slug Field --}}
                            <div class="mb-3">
                                <label for="category_slug" class="form-label">Category Slug</label>
                                <input type="text" class="form-control @error('category_slug') is-invalid @enderror" id="category_slug" name="category_slug" readonly>
                                @error('category_slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Submit Button --}}
                            <button type="submit" class="btn btn-primary">Add Category</button>
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

            document.getElementById('category_slug').value = packageSlug;
        }
    </script>
@endsection