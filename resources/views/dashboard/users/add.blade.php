@extends('template')
@section('main_section')
    {{-- success message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        {{-- error message --}}
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
                        <h2>Add User</h2>
                        <a href="{{ route('user.add') }}" class="btn btn-primary">Add User</a>
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

                        <form action="{{ route('user.add') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{-- Name --}}
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- Email --}}
                            <div class="form-group">
                                <label for="email">User Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- Password --}}
                            <div class="form-group">
                                <label for="password">User Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- User Image --}}
                            <div class="form-group">
                                <label for="user_image">User Image</label>
                                <input type="file" name="user_image" id="user_image" class="form-control">
                                @error('user_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- User Type --}}
                            <div class="form-group">
                                <label for="user_type">User Role</label>
                                <select name="user_type" id="user_type" class="form-control">
                                    {{-- The "Select Role" option should not be selectable if user_type is required --}}
                                    <option value="" {{ old('user_type') == '' ? 'selected' : '' }}>Select User type
                                    </option>

                                    <option value="admin" {{ old('user_type') == 'admin' ? 'selected' : '' }}>Admin
                                    </option>
                                    <option value="editor" {{ old('user_type') == 'editor' ? 'selected' : '' }}>Editor
                                    </option>
                                    <option value="author" {{ old('user_type') == 'author' ? 'selected' : '' }}>Author
                                    </option>
                                    <option value="rewiewer" {{ old('user_type') == 'rewiewer' ? 'selected' : '' }}>
                                        Rewiewer</option>
                                </select>
                                @error('user_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            {{-- actual slug --}}
                            <div class="form-group">
                                <label for="actual_slug">User Slug</label>
                                <input type="text" name="actual_slug" id="actual_slug" class="form-control"
                                    onkeyup="generateSlug()">
                                @error('actual_slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- user slug  which is read only and saved in database --}}
                            <div class="form-group">
                                <label for="user_slug">Actual Slug</label>
                                <input type="text" name="user_slug" id="user_slug" class="form-control" readonly>
                                @error('user_slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add User</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function generateSlug() {
                var inputslug = document.getElementById('actual_slug').value;
                var ganerateSlug = inputslug.trim().toLowerCase().replace(/[^a-z0-9äöüß]+/g, '-')
                    .replace(/^-|-$/g, '');
                document.getElementById('user_slug').value = ganerateSlug;
            }
        </script>

    @endsection
