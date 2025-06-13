@extends('template')

@section('main_section')
    {{-- Success/Error Messages from Session --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2>Edit User</h2>
                        <a href="{{ route('user.show') }}" class="btn btn-primary">User List</a> {{-- Link back to user list --}}
                    </div>
                    <div class="card-body">

                        {{-- FULL VALIDATION ERROR DISPLAY SECTION --}}
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

                        {{-- Form to edit an existing user --}}
                        {{-- The action points to the 'user.update' route and passes the user's ID --}}
                        <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH') {{-- Use PUT method for updating resources --}}

                            {{-- Name Field --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $user->name) }}" required> {{-- Pre-fill with existing data --}}
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Email Field --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">User Email</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $user->email) }}" required> {{-- Pre-fill with existing data --}}
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- User Image Field --}}
                            <div class="mb-3">
                                <label for="user_image" class="form-label">User Image</label>
                                @if ($user->user_image)
                                    <div class="mb-2">
                                        <img src="{{ asset('images/users/' . $user->user_image) }}" alt="Current User Image"
                                            class="img-thumbnail" style="max-width: 150px;">
                                        <p class="text-muted text-sm">Current image. Upload a new one to replace it.</p>
                                    </div>
                                @endif
                                <input type="file" name="user_image" id="user_image"
                                    class="form-control @error('user_image') is-invalid @enderror">
                                @error('user_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- User Type for Edit Form --}}
                            <div class="form-group">
                                <label for="user_type">User Type</label>
                                <select name="user_type" id="user_type" class="form-control">
                
                                    <option value=""
                                        {{ (isset($user) && $user->user_type == '') || old('user_type') == '' ? 'selected' : '' }}>
                                        Select Role
                                    </option>

                                    <option value="admin"
                                        {{ (isset($user) && $user->user_type == 'admin') || old('user_type') == 'admin' ? 'selected' : '' }}>
                                        Admin
                                    </option>
                                    <option value="editor"
                                        {{ (isset($user) && $user->user_type == 'editor') || old('user_type') == 'editor' ? 'selected' : '' }}>
                                        Editor
                                    </option>
                                    <option value="author"
                                        {{ (isset($user) && $user->user_type == 'author') || old('user_type') == 'author' ? 'selected' : '' }}>
                                        Author
                                    </option>
                                    <option value="rewiewer"
                                        {{ (isset($user) && $user->user_type == 'rewiewer') || old('user_type') == 'rewiewer' ? 'selected' : '' }}>
                                        Rewiewer
                                    </option>
                                </select>
                                @error('user_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            {{-- Actual Slug (User Editable Input for Slug Generation) --}}
                            <div class="mb-3">
                                <label for="actual_slug" class="form-label">User Slug (Type here)</label>
                                <input type="text" name="actual_slug" id="actual_slug"
                                    class="form-control @error('user_slug') is-invalid @enderror" {{-- Error applies to 'user_slug' column --}}
                                    value="{{ old('actual_slug', $user->user_slug) }}" onkeyup="generateSlug()" required>
                                {{-- Pre-fill with existing slug --}}
                                @error('user_slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- User Slug (Read-only - Displays Generated Slug) --}}
                            <div class="mb-3">
                                <label for="user_slug" class="form-label">Generated User Slug</label>
                                <input type="text" name="user_slug" id="user_slug" class="form-control"
                                    value="{{ old('user_slug', $user->user_slug) }}" readonly> {{-- Pre-fill and make read-only --}}
                            </div>

                            <button type="submit" class="btn btn-primary">Update User</button>
                            <a href="{{ route('user.show') }}" class="btn btn-secondary ms-2">Back to List</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function generateSlug() {
            // Get value from the user-editable 'actual_slug' field
            var inputslug = document.getElementById('actual_slug').value;
            // Generate a clean slug
            var generatedSlug = inputslug
                .trim()
                .toLowerCase()
                .replace(/[^a-z0-9äöüß]+/g, '-') // Replace non-alphanumeric with hyphens
                .replace(/^-|-$/g, ''); // Remove leading/trailing hyphens
            // Set the generated slug to the read-only 'user_slug_display' field
            document.getElementById('user_slug').value = generatedSlug;
        }

        // Call generateSlug on page load to ensure the read-only slug field is populated
        // with the current user's slug or old input if validation failed.
        window.onload = function() {
            generateSlug();
        };
    </script>
@endsection
