@extends('template')
@section('main_section')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @elseif (session()->has('error'))
        {{-- Use @elseif for another condition --}}
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif

    {{-- Dispaly errors --}}
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
            /* Added for vertical centering of content */
            flex-direction: column;
            /* Added for vertical centering of content */
            align-items: center;
            /* Added for horizontal centering of content */
            justify-content: center;
            /* Added for vertical centering of content */
            min-height: 150px;
            /* Ensure a minimum height */
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
                    <i class="fas fa-newspaper me-2"></i> Add New About
                </h4>
                <div class="d-flex align-items-center">
                    <a href="{{ route('about.show') }}" class="btn btn-light btn-sm rounded-pill px-4 py-2 shadow-sm ms-3">
                        <i class="fas fa-arrow-left me-2"></i> Back to About Us
                    </a>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('about.add') }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <div class="row g-4">

                            {{-- Language Selector in radio btn --}}
                            <div class="col-md-12">
                                <label class="form-label">Language <span class="required-star">*</span></label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('language') is-invalid @enderror" type="radio"
                                        name="language" id="language" value="en"
                                        {{ old('language', 'en') == 'en' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="language">English</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('language') is-invalid @enderror" type="radio"
                                        name="language" id="language" value="ur"
                                        {{ old('language', 'en') == 'ur' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="language">Urdu</label>
                                </div>
                                @error('language')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <p class="form-note">Select the language for the about content.</p>
                            </div>

                            {{-- News Status --}}
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- About Content --}}
                            <div class="col-md-12">
                                <label for="news_content" class="form-label">News Content </label>
                                <textarea type="text" id="content" name="content" class="form-control tinymce" placeholder="Enter news content"
                                    value="{{ old('content') }}" rows="20">{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- About Content end --}}


                            <div class="mt-5">
                                <button type="submit" class="btn-submit">
                                    <i class="fas fa-plus-circle me-2"></i> Add About
                                </button>
                            </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Editor --}}

    <script>
        // Initialize TinyMCE for all textareas
        tinymce.init({
            selector: 'textarea:not(#news_description)',
            advcode_inline: true,
            plugins: 'searchreplace autolink directionality visualblocks visualchars image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap emoticons autosave fullscreen code',
            toolbar: "undo redo print spellcheckdialog formatpainter | blocks fontfamily fontsize | bold italic underline forecolor backcolor | link image | alignleft aligncenter alignright alignjustify | code | checklist numlist bullist indent outdent | table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol",
            file_picker_types: 'image',
            file_picker_callback: function(callback, value, meta) {
                if (meta.filetype === 'image') {
                    // Open a file picker dialog
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




        // // Function to open file picker dialog
        // function openFilePicker(callback) {
        //     var input = document.createElement('input');
        //     input.setAttribute('type', 'file');
        //     input.setAttribute('accept', 'image/*');

        //     input.onchange = function() {
        //         var file = this.files[0];

        //         if (window.FileReader) {
        //             var reader = new FileReader();

        //             reader.onload = function(e) {
        //                 // Resize and compress image before passing it to TinyMCE
        //                 resizeImage(e.target.result, function(resizedImage) {
        //                     callback(resizedImage, {
        //                         alt: file.name
        //                     });
        //                 });
        //             };

        //             reader.readAsDataURL(file);
        //         } else {
        //             alert('FileReader is not supported in this browser.');
        //         }
        //     };

        //     input.click();
        // }


        // function resizeImage(base64Image, callback) {
        //     const img = new Image();
        //     img.onload = function() {
        //         const canvas = document.createElement('canvas');
        //         const ctx = canvas.getContext('2d');

        //         // Determine new dimensions
        //         let width = img.width;
        //         let height = img.height;
        //         const maxWidth = 1920;
        //         const maxHeight = 1080;

        //         if (width > maxWidth || height > maxHeight) {
        //             if (width / height > maxWidth / maxHeight) {
        //                 height = Math.round(maxWidth * (height / width));
        //                 width = maxWidth;
        //             } else {
        //                 width = Math.round(maxHeight * (width / height));
        //                 height = maxHeight;
        //             }
        //         }

        //         canvas.width = width;
        //         canvas.height = height;
        //         ctx.drawImage(img, 0, 0, width, height);

        //         // Convert canvas to base64 with compression
        //         const compressedImage = canvas.toDataURL('image/jpeg', 0.7); // Adjust quality here
        //         callback(compressedImage);
        //     };
        //     img.src = base64Image;
        // }
    </script>

@endsection
