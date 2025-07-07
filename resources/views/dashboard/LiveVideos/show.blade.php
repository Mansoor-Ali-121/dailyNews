@extends('template')
@section('main_section')

@include('dashboard.includes.alerts')

    <div class="container-fluid px-lg-8">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-lg overflow-hidden">
                    <div class="card-header position-relative" style="background: var(--primary-gradient);">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div>
                                <h2 class="h3 mb-2 text-white"><i class="fas fa-video me-3" aria-hidden="true"></i>
                                    Video Management Dashboard</h2>
                                <p class="mb-0 text-white-50 fs-5">Manage all videos and their information</p>
                            </div>
                            <div class="d-flex gap-3 mt-3 mt-md-0">
                                <a href="{{ route('livevideo.add') }}"
                                    class="btn btn-light btn-lg rounded-pill px-4 py-2 shadow-sm" id="addVideoBtn"
                                    aria-label="Add New Video">
                                    <i class="fas fa-plus-circle me-2" aria-hidden="true"></i> Add New Video
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <div class="global-stats">
                            @php
                                $totalVideos = count($videos);
                                $activeVideos = $videos->where('video_status', 'active')->count();
                                $inactiveVideos = $videos->where('video_status', 'inactive')->count();
                                $recentlyAdded = $videos
                                    ->filter(function ($video) {
                                        return now()->diffInDays($video->created_at) <= 30;
                                    })
                                    ->count();
                            @endphp

                            <div class="stat-item">
                                <div class="stat-value">{{ $totalVideos }}</div>
                                <div class="stat-label">Total Videos</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">{{ $activeVideos }}</div>
                                <div class="stat-label">Active</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">{{ $inactiveVideos }}</div>
                                <div class="stat-label">Inactive</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">{{ $recentlyAdded }}</div>
                                <div class="stat-label">Recently Added</div>
                            </div>
                        </div>

                        @if ($videos->isEmpty())
                            <div class="empty-state">
                                <div class="mb-5">
                                    <i class="fas fa-video-slash empty-state-icon"></i>
                                </div>
                                <h4 class="h3 text-muted mb-4">No Videos Found</h4>
                                <p class="text-muted fs-5 mb-5">Get started by adding your first video to the system</p>
                                <a href="{{ route('livevideo.add') }}"
                                    class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm"
                                    aria-label="Create First Video">
                                    <i class="fas fa-plus-circle me-2"></i> Create First Video
                                </a>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table id="videosTable" class="table align-middle mb-0 display">
                                    <thead class="bg-light">
                                        <tr class="text-center">
                                            <th class="ps-4 py-3 text-uppercase fw-bold text-muted fs-5 border-0">ID</th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">Video URL</th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">Category</th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">Slug</th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">Status</th>
                                            <th class="pe-4 py-3 text-uppercase fw-bold text-muted fs-5 border-0 text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($videos as $video)
                                            <tr class="border-top">
                                                <td class="ps-4 fw-bold text-muted fs-5">{{ $video->id }}</td>
                                                 
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <h6 class="mb-1 fw-bold fs-5">{{ $video->video_url }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <h6 class="mb-1 fw-bold fs-5">{{ $video->category->category_name }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <small class="text-muted fs-6">
                                                            <i class="fas fa-link me-2" aria-hidden="true"></i>
                                                            {{ $video->video_slug }}
                                                        </small>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($video->video_status == 'active')
                                                        <span class="badge rounded-pill fs-6 bg-success bg-opacity-10 text-success px-3 py-2">
                                                            <i class="fas fa-circle me-2" aria-hidden="true"></i>
                                                            {{ $video->video_status }}
                                                        </span>
                                                    @else
                                                        <span class="badge rounded-pill fs-6 bg-danger bg-opacity-10 text-danger px-3 py-2">
                                                            <i class="fas fa-times-circle me-2" aria-hidden="true"></i>
                                                            {{ $video->video_status }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="pe-4 text-end">
                                                    <div class="d-flex justify-content-end gap-2 action-buttons">
                                                        <a href="{{ route('livevideo.edit', $video->id) }}"
                                                            class="btn btn-outline-primary" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Edit Video"
                                                            aria-label="Edit Video {{ $video->video_title }}">
                                                            <i class="fas fa-edit me-1" aria-hidden="true"></i> Edit
                                                        </a>
                                                        <form action="{{ route('livevideo.delete', $video->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger" 
                                                                    data-bs-toggle="tooltip" data-bs-placement="top" 
                                                                    title="Delete Video"
                                                                    aria-label="Delete Video {{ $video->video_title }}"
                                                                    onclick="return confirm('Are you sure you want to delete this video?')">
                                                                <i class="fas fa-trash-alt me-1" aria-hidden="true"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                                <!-- Pagination -->
                                <div class="pagination-container">
                                    <nav aria-label="Videos pagination">
                                        <ul class="pagination">
                                            {{-- Previous Page Link --}}
                                            @if ($videos->onFirstPage())
                                                <li class="page-item disabled" aria-disabled="true">
                                                    <span class="page-link">
                                                        <i class="fas fa-chevron-left"></i>
                                                        <span class="d-none d-sm-inline ms-2">Prev</span>
                                                    </span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $videos->previousPageUrl() }}" rel="prev">
                                                        <i class="fas fa-chevron-left"></i>
                                                        <span class="d-none d-sm-inline ms-2">Prev</span>
                                                    </a>
                                                </li>
                                            @endif

                                            {{-- Pagination Elements --}}
                                            @foreach ($videos->getUrlRange(1, $videos->lastPage()) as $page => $url)
                                                @if ($page == $videos->currentPage())
                                                    <li class="page-item active" aria-current="page">
                                                        <span class="page-link">{{ $page }}</span>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                                    </li>
                                                @endif
                                            @endforeach

                                            {{-- Next Page Link --}}
                                            @if ($videos->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $videos->nextPageUrl() }}" rel="next">
                                                        <span class="d-none d-sm-inline me-2">Next</span>
                                                        <i class="fas fa-chevron-right"></i>
                                                    </a>
                                                </li>
                                            @else
                                                <li class="page-item disabled" aria-disabled="true">
                                                    <span class="page-link">
                                                        <span class="d-none d-sm-inline me-2">Next</span>
                                                        <i class="fas fa-chevron-right"></i>
                                                    </span>
                                                </li>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

        {{-- Pagination style --}}

    <style>
        /* Custom Pagination Styles - Add this to your existing CSS */
        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .page-item {
            margin: 0 3px;
        }

        .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            border-radius: 12px !important;
            border: 2px solid #dee2e6;
            background-color: white;
            color: #0f4c81;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .page-link:hover {
            background: linear-gradient(135deg, #0f4c81 0%, #1b8b9c 100%);
            color: white !important;
            border-color: transparent;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(15, 76, 129, 0.2);
        }

        .page-item.active .page-link {
            background: linear-gradient(135deg, #0f4c81 0%, #1b8b9c 100%);
            color: white !important;
            border-color: transparent;
            box-shadow: 0 4px 10px rgba(15, 76, 129, 0.3);
        }

        .page-item.disabled .page-link {
            color: #adb5bd !important;
            background-color: #f8f9fa;
            border-color: #e9ecef;
        }

        .page-item:first-child .page-link,
        .page-item:last-child .page-link {
            width: auto;
            padding: 0 20px;
            border-radius: 30px !important;
        }

        .page-item:first-child .page-link {
            margin-right: 15px;
        }

        .page-item:last-child .page-link {
            margin-left: 15px;
        }

        .page-link i {
            font-size: 1.1rem;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .page-link {
                width: 40px;
                height: 40px;
                font-size: 0.9rem;
            }

            .page-item:first-child .page-link,
            .page-item:last-child .page-link {
                padding: 0 15px;
            }
        }
    </style>    

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #0f4c81 0%, #1b8b9c 100%);
            --secondary-gradient: linear-gradient(135deg, #1b8b9c 0%, #0f4c81 100%);
            --active-color: #1b8b9c;
            --inactive-color: #f56036;
        }

        .empty-state-icon {
            color: #0f4c81;
            font-size: 5rem;
            opacity: 0.2;
            margin-bottom: 1.5rem;
        }

        .video-thumbnail {
            transition: transform 0.3s ease;
        }

        .video-thumbnail:hover {
            transform: scale(1.05);
        }

        .continent-badge {
            background: #e9f7fe;
            color: #0f4c81;
            border-radius: 20px;
            padding: 0.4em 1em;
            font-weight: 500;
            display: inline-block;
        }

        /* Match the country dashboard styles exactly */
        .global-stats {
            display: flex;
            justify-content: space-between;
            background: #f8fafc;
            padding: 1.5rem;
            border-radius: 15px;
            margin-bottom: 2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            flex-wrap: wrap;
        }

        .stat-item {
            text-align: center;
            padding: 0 1rem;
            flex-grow: 1;
            min-width: 120px;
            margin-bottom: 1rem;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: #0f4c81;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .empty-state {
            padding: 4rem 0;
            text-align: center;
        }

        /* Table styles to match country dashboard */
        .table {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        .table th {
            border-top: none;
            font-weight: 700;
            letter-spacing: 0.5px;
            padding: 1.25rem 1.5rem !important;
            background-color: #f8fafc;
            color: #0f4c81;
            border-bottom: 2px solid #dee2e6;
        }

        .table td {
            padding: 1.25rem 1.5rem !important;
            vertical-align: middle;
            background-color: white;
            border-top: none;
            border-bottom: 1px solid #f0f0f0;
        }

        .table tr {
            transition: all 0.3s ease;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
        }

        .table tr:hover {
            background-color: rgba(15, 76, 129, 0.03) !important;
            box-shadow: 0 6px 15px rgba(15, 76, 129, 0.1);
        }

        /* Action buttons */
        .action-buttons .btn {
            border-radius: 30px;
            padding: 0.5rem 1.25rem;
        }

        .btn-outline-primary {
            border-width: 2px;
            font-weight: 500;
            transition: all 0.3s ease;
            color: #0f4c81;
            border-color: #0f4c81;
        }

        .btn-outline-primary:hover {
            background: var(--primary-gradient);
            color: white !important;
            border-color: transparent;
            transform: translateY(-2px);
        }

        .btn-outline-info {
            border-width: 2px;
            font-weight: 500;
            transition: all 0.3s ease;
            color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-outline-info:hover {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            color: white !important;
            border-color: transparent;
            transform: translateY(-2px);
        }

        .btn-outline-danger {
            border-width: 2px;
            font-weight: 500;
            transition: all 0.3s ease;
            color: #f56036;
            border-color: #f56036;
        }

        .btn-outline-danger:hover {
            background: linear-gradient(135deg, #f5365c 0%, #f56036 100%);
            color: white !important;
            border-color: transparent;
            transform: translateY(-2px);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .card-header, .card-body {
                padding: 1.5rem !important;
            }
            
            .global-stats {
                flex-direction: column;
                align-items: center;
            }
            
            .stat-item {
                margin-bottom: 1.5rem;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .action-buttons .btn {
                width: 100%;
            }
        }
    </style>
@endsection