@extends('template')

@section('main_section')
    {{-- Display Success/Error Messages from Session --}}
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @elseif (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif

    {{-- Display Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script src="{{ asset('tinymce\tinymce.min.js') }}" referrerpolicy="origin"></script>

    {{-- Custom CSS for styling the form --}}
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
                <h4 class="mb-0">
                    <i class="fas fa-newspaper me-2"></i> Edit Policy {{-- Changed "Add New" to "Edit" --}}
                </h4>
                <div class="d-flex align-items-center">
                    {{-- Assuming 'privacy.show_all' is the route to list all policies --}}
                    <a href="{{ route('privacy.show') }}" class="btn btn-light btn-sm rounded-pill px-4 py-2 shadow-sm ms-3">
                        <i class="fas fa-arrow-left me-2"></i> Back to Policies
                    </a>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('privacy.update', $privacy->id) }}" method="POST">
                    @method('PATCH') {{-- Use PATCH method for updates --}}
                    @csrf
                    <div class="mb-5">
                        <div class="row g-4">

                            {{-- Language Selector using radio buttons --}}
                            <div class="col-md-12">
                                <label class="form-label">Language <span class="required-star">*</span></label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('language') is-invalid @enderror" type="radio"
                                        name="language" id="language_en" value="en"
                                        {{ old('language', $privacy->language) == 'en' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="language_en">English</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('language') is-invalid @enderror" type="radio"
                                        name="language" id="language_ur" value="ur"
                                        {{ old('language', $privacy->language) == 'ur' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="language_ur">Urdu</label>
                                </div>
                                @error('language')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <p class="form-note">Select the language for the privacy content.</p>
                            </div>

                            {{-- Policy Status dropdown --}}
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status"
                                    name="status" required>
                                    {{-- Correctly set 'selected' based on old input or current $privacy->status --}}
                                    <option value="active"
                                        {{ old('status', $privacy->status) == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive"
                                        {{ old('status', $privacy->status) == 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                                {{-- This div will only be displayed if there is a validation error for 'status' --}}
                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                {{-- Optional: Add a small help text if needed --}}
                                {{-- <p class="form-note">Set the active status for the policy.</p> --}}
                            </div>

                            {{-- Privacy Content using TinyMCE --}}
                            <div class="col-md-12">
                                <label for="content" class="form-label">Policy Content </label>
                                <textarea id="content" name="content" class="form-control tinymce @error('content') is-invalid @enderror"
                                    placeholder="Enter policy content" rows="20">{{ old('content', $privacy->content) }}</textarea> {{-- Uses old input or $privacy->content --}}
                                @error('content')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- Privacy Content end --}}

                            <div class="mt-5">
                                <button type="submit" class="btn-submit">
                                    <i class="fas fa-save me-2"></i> Update Policy {{-- Changed button text to "Update" --}}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- TinyMCE Editor Initialization and Image Resizing Script --}}
    <script>
        // Initialize TinyMCE for the content textarea
        tinymce.init({
            selector: 'textarea#content', // Explicitly target the 'content' textarea
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

        // Function to open a file picker dialog for TinyMCE
        function openFilePicker(callback) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            input.onchange = function() {
                var file = this.files[0];

                if (window.FileReader) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
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

        // Function to resize and compress images before TinyMCE inserts them
        function resizeImage(base64Image, callback) {
            const img = new Image();
            img.onload = function() {
                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');

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

                const compressedImage = canvas.toDataURL('image/jpeg', 0.7);
                callback(compressedImage);
            };
            img.src = base64Image;
        }
    </script>
@endsection
