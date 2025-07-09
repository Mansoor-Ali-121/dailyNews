@extends('template')
@section('main_section')
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --accent-color: #e74c3c;
            --light-bg: #f8f9fa;
            --dark-text: #2c3e50;
            --light-text: #7f8c8d;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-bg);
            color: var(--dark-text);
            line-height: 1.6;
        }

        .news-header {
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
            color: white;
            padding: 50px 0;
            margin-bottom: 40px;
        }

        .detail-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            margin-bottom: 40px;
        }

        .detail-table {
            width: 100%;
            border-collapse: collapse;
        }

        .detail-table th {
            background-color: #f8f9fa;
            padding: 16px 20px;
            text-align: left;
            font-weight: 600;
            color: var(--secondary-color);
            border-bottom: 1px solid #eee;
            width: 30%;
        }

        .detail-table td {
            padding: 16px 20px;
            border-bottom: 1px solid #eee;
            vertical-align: top;
        }

        .detail-table tr:last-child th,
        .detail-table tr:last-child td {
            border-bottom: none;
        }

        .news-image-container {
            border-radius: 8px;
            overflow: hidden;
            max-height: 100%;
            margin: 20px 0;
            /* box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); */
        }

        .news-image {
            width: 20%;
            /* height: 100%; */
            object-fit: cover;
            align-items: center;
            border-radius: 8px;
            /* box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); */
        }

        .status-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .status-active {
            background: rgba(46, 204, 113, 0.2);
            color: #27ae60;
        }

        .status-inactive {
            background: rgba(231, 76, 60, 0.2);
            color: #c0392b;
        }

        .content-section {
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .content-section h3 {
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
            margin-bottom: 20px;
            color: var(--secondary-color);
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn-edit {
            background: var(--primary-color);
            border: none;
            padding: 10px 25px;
            font-weight: 600;
        }

        .btn-delete {
            background: var(--accent-color);
            border: none;
            padding: 10px 25px;
            font-weight: 600;
        }

        .info-label {
            font-weight: 600;
            color: var(--dark-text);
            margin-right: 10px;
        }

        @media (max-width: 768px) {

            .detail-table th,
            .detail-table td {
                display: block;
                width: 100%;
            }

            .detail-table th {
                background-color: #f0f5ff;
                padding-top: 20px;
                padding-bottom: 5px;
            }

            .detail-table td {
                padding-top: 5px;
                padding-bottom: 15px;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>


    <!-- Header section -->
    <header class="news-header">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1><i class="fas fa-newspaper me-2"></i>Blogs Details</h1>
                    <p class="lead">Complete information about the blog post</p>
                </div>
            </div>
        </div>
    </header>
    @php
        $item = $blogs;
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="detail-container">
                    <table class="detail-table">
                        <tbody>
                            {{-- Use @forelse for an empty state --}}
                            {{-- Each news item will have its own set of detail rows --}}
                            <tr>
                                <th>Blog Title</th>
                                <td>{{ $item->blog_title ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $item->blog_description ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if ($item->blog_status === 'active')
                                        <span class="status-badge status-active">
                                            <i class="fas fa-check-circle me-2"></i>Active
                                        </span>
                                    @else
                                        <span class="status-badge status-inactive">
                                            <i class="fas fa-times-circle me-2"></i>Inactive
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>
                                    @if ($item->category)
                                        <span class="badge bg-primary">{{ $item->category->category_name }}</span>
                                        {{-- If you have multiple categories per news, you'd loop through $item->categories --}}
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Location</th>
                                <td>
                                    <div class="mb-2">
                                        <span class="info-label">Country:</span>
                                        {{ $item->country->country_name ?? 'N/A' }}
                                    </div>
                                    <div>
                                        <span class="info-label">City:</span> {{ $item->city->city_name ?? '' }}
                                        {{-- Empty string for blank if city is null --}}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Slug</th>
                                <td>{{ $item->blog_slug ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>
                                    @if ($item->blog_image)
                                        <div class="news-image-container">
                                            <img src="{{ asset('Blogs/blog_images/' . $item->blog_image) }}"
                                               alt="{{ $item->blog_title ?? 'News Image' }}"
                                                class="news-image">
                                        </div>
                                        <div class="text-muted mt-2">
                                            <i class="fas fa-info-circle me-2"></i>File: {{ $item->blog_image }}
                                        </div>
                                    @else
                                        <div class="text-muted mt-2">
                                            <i class="fas fa-image me-2"></i>No image available.
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Timestamps</th>
                                <td>
                                    <div class="mb-2">
                                        <span class="info-label">Created:</span>
                                        {{ $item->created_at ? $item->created_at->format('M d, Y') : 'N/A' }}
                                    </div>
                                    <div>
                                        <span class="info-label">Updated:</span>
                                        {{ $item->updated_at ? $item->updated_at->format('M d, Y') : 'N/A' }}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="content-section">
                    <h3>Blog Content</h3>
                    {{-- Use {!! $item->news_content !!} for HTML content --}}
                 <p class="content-section-image"> {!! $item->blog_content !!}
             </p> 

                <div class="action-buttons">
                 <a href="{{url()->previous() }}">   <button type="button" class="btn btn-outline-secondary px-4">
                        <i class="fas fa-times me-2"></i> Cancel
                    </button></a>
                </div>
            </div>
        </div>
    </div>
@endsection


<style>
    .content-section-image img{
        height: 300px !important;
        width: 300px !important
    }
</style>