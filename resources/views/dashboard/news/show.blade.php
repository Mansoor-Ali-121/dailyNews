@extends('template')
@section('main_section')

    @include('dashboard.includes.alerts')

    <div class="container-fluid px-lg-5">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-lg overflow-hidden">
                    <div class="card-header position-relative" style="background: var(--primary-gradient);">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div>
                                <h2 class="h3 mb-2 text-white"><i class="fas fa-newspaper me-3" aria-hidden="true"></i>
                                    News Management Dashboard</h2>
                                <p class="mb-0 text-white-50 fs-5">Manage all News and their information</p>
                            </div>
                            <div class="d-flex gap-3 mt-3 mt-md-0">

                                {{-- Accessible Add New News Button --}}
                                <a href="{{ route('news.add') }}"
                                    class="btn btn-light btn-lg rounded-pill px-4 py-2 shadow-sm" id="addNewsBtn"
                                    aria-label="Add New News">
                                    <i class="fas fa-plus-circle me-2" aria-hidden="true"></i> Add New News
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        {{-- Counter --}}
                        <div class="global-stats">
                            @php
                                // Assuming $news is the variable holding your news collection
                                $totalNews = count($news);
                                $activeNews = $news->where('news_status', 'active')->count();
                                $inactiveNews = $news->where('news_status', 'inactive')->count();
                                $recentlyAddedNews = $news
                                    ->filter(function ($item) {
                                        // Adjust 'created_at' if your column name is different
                                        return now()->diffInDays($item->created_at) <= 30;
                                    })
                                    ->count();
                            @endphp

                            <div class="stat-item">
                                <div class="stat-value">{{ $totalNews }}</div>
                                <div class="stat-label">Total News</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">{{ $activeNews }}</div>
                                <div class="stat-label">Active News</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">{{ $inactiveNews }}</div>
                                <div class="stat-label">Inactive News</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">{{ $recentlyAddedNews }}</div>
                                <div class="stat-label">Recently Added</div>
                            </div>
                        </div>

                        {{-- Check if the $news collection is empty --}}
                        @if ($news->isEmpty())
                            <div class="empty-state">
                                <div class="mb-5">
                                    <i class="fas fa-newspaper empty-state-icon"></i>
                                </div>
                                <h4 class="h3 text-muted mb-4">No News Found</h4>
                                <p class="text-muted fs-5 mb-5">Get started by adding your first news article to the system
                                </p>
                                <a href="{{ route('news.add') }}" class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm"
                                    aria-label="Create First News">
                                    <i class="fas fa-plus-circle me-2"></i> Create First News
                                </a>
                            </div>
                        @else
                            <div class="table-responsive">
                                {{-- Add id="newsTable" for DataTables initialization --}}
                                <table id="newsTable" class="table align-middle mb-0 display">
                                    <thead class="bg-light">
                                        <tr class="text-center">
                                            <th class="ps-4 py-3 text-uppercase fw-bold text-muted fs-5 border-0">ID</th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">News Category</th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">Language</th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">Country</th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">Status</th>
                                            <th class="pe-4 py-3 text-uppercase fw-bold text-muted fs-5 border-0"> Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- Loop through the $news collection --}}
                                        @foreach ($news as $item)
                                            <tr class="border-top">
                                                <td class="ps-4 fw-bold text-muted fs-5">{{ $item->id }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <h6 class="mb-1 fw-bold fs-5">{{ $item->category->category_name }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <h6 class="mb-1 fw-bold fs-5">{{ $item->language }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                {{-- Country --}}
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <small class="text-muted fs-6">
                                                            {{-- Assuming a relationship or direct property --}}
                                                            {{ $item->country->country_name ?? 'N/A' }}
                                                        </small>
                                                    </div>
                                                </td>

                                                <td>
                                                    @if ($item->news_status == 'active')
                                                        <span
                                                            class="badge rounded-pill fs-6 bg-success bg-opacity-10 text-success px-3 py-2">
                                                            <i class="fas fa-circle me-2" aria-hidden="true"></i>
                                                            {{ $item->news_status }}
                                                        </span>
                                                    @elseif ($item->news_status == 'inactive')
                                                        <span
                                                            class="badge rounded-pill fs-6 bg-danger bg-opacity-10 text-danger px-3 py-2">
                                                            <i class="fas fa-times-circle me-2" aria-hidden="true"></i>
                                                            {{ $item->news_status }}
                                                        </span>
                                                    @else
                                                        <span
                                                            class="badge rounded-pill fs-6 bg-secondary bg-opacity-10 text-secondary px-3 py-2">
                                                            <i class="fas fa-question-circle me-2" aria-hidden="true"></i>
                                                            {{ $item->news_status }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="pe-4 text-end">
                                                    <div class="d-flex justify-content-end gap-2 action-buttons">
                                                        {{-- Edit Button --}}
                                                        <a href="{{ route('news.edit', $item->id) }}"
                                                            class="btn btn-outline-primary btn-sm text-center"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit News"
                                                            aria-label="Edit News {{ $item->news_title }}">
                                                            <i class="fas fa-edit me-1" aria-hidden="true"></i> Edit
                                                        </a>

                                                        {{-- Corrected View Button --}}
                                                        <a href="{{ route('news.view', $item->id) }}"
                                                            class="btn btn-outline-info btn-sm text-center"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="View News"
                                                            aria-label="View News {{ $item->news_title }}">
                                                            <i class="fas fa-eye me-1" aria-hidden="true"></i> View
                                                        </a>

                                                        {{-- Delete Form (kept as is, it's correct for a DELETE request) --}}
                                                        <form action="{{ route('news.delete', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger btn-sm text-center"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Delete News"
                                                                onclick="return confirm('Are you sure you want to delete?')">
                                                                <i class="fas fa-trash-alt me-1"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- Replace your current pagination code with this -->
                                <div class="pagination-container">
                                    <nav aria-label="Cities pagination">
                                        <ul class="pagination">
                                            {{-- Previous Page Link --}}
                                            @if ($news->onFirstPage())
                                                <li class="page-item disabled" aria-disabled="true">
                                                    <span class="page-link">
                                                        <i class="fas fa-chevron-left"></i>
                                                        <span class="d-none d-sm-inline ms-2">Prev</span>
                                                    </span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $news->previousPageUrl() }}"
                                                        rel="prev">
                                                        <i class="fas fa-chevron-left"></i>
                                                        <span class="d-none d-sm-inline ms-2">Prev</span>
                                                    </a>
                                                </li>
                                            @endif
                                            {{-- Pagination Elements --}}
                                            @foreach ($news->getUrlRange(1, $news->lastPage()) as $page => $url)
                                                @if ($page == $news->currentPage())
                                                    <li class="page-item active" aria-current="page">
                                                        <span class="page-link">{{ $page }}</span>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <a class="page-link"
                                                            href="{{ $url }}">{{ $page }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                            {{-- Next Page Link --}}
                                            @if ($news->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $news->nextPageUrl() }}"
                                                        rel="next">
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

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #0f4c81 0%, #1b8b9c 100%);
            --secondary-gradient: linear-gradient(135deg, #1b8b9c 0%, #0f4c81 100%);
            --active-color: #1b8b9c;
            --inactive-color: #f56036;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        .card {
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.05);
            border: none;
            margin-bottom: 30px;
        }

        .card:hover {
            /* transform: translateY(-8px);   public function show()
                                {
                                    $news = News::all();
                                    return view('dashboard.news.show', compact('news'));
                                }
                             */
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            position: relative;
            overflow: hidden;
            padding: 2rem !important;
            color: white;
        }

        /* --- DataTable Specific Styling Adjustments --- */
        /* Basic table styling - DataTables will apply some of these if integrated correctly with Bootstrap */
        .table {
            margin-bottom: 0;
            border-collapse: separate;
            /* Important for border-spacing below */
            border-spacing: 0 10px;
            /* Adds space between rows */
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
            /* Note: border-radius on TR only works if table has border-collapse: separate */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
        }

        .table tr:hover {
            background-color: rgba(15, 76, 129, 0.03) !important;
            transform: scale(1.005);
            box-shadow: 0 6px 15px rgba(15, 76, 129, 0.1);
        }

        /* DataTables search input and length dropdown styling */
        .dataTables_wrapper .dataTables_filter input,
        .dataTables_wrapper .dataTables_length select {
            border-radius: 0.25rem;
            /* Bootstrap default for form controls */
            border: 1px solid #ced4da;
            /* Bootstrap default */
            padding: 0.375rem 0.75rem;
            /* Bootstrap default */
            margin-left: 0.5rem;
            /* Add some space if needed */
        }

        .dataTables_wrapper .dataTables_filter input:focus,
        .dataTables_wrapper .dataTables_length select:focus {
            border-color: #80bdff;
            /* Bootstrap focus color */
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
            /* Bootstrap focus shadow */
        }

        /* DataTables pagination styling */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.5em 0.8em;
            margin-left: 2px;
            border-radius: 0.25rem;
            border: 1px solid #dee2e6;
            background-color: #fff;
            color: #0d6efd;
            /* Bootstrap blue for links */
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #e9ecef;
            border-color: #dee2e6;
            color: #0a58ca;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background-color: #0d6efd;
            /* Bootstrap blue for active */
            border-color: #0d6efd;
            color: #fff !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover {
            color: #6c757d !important;
            background-color: #fff;
            border-color: #dee2e6;
            cursor: default;
        }

        /* DataTables info text */
        .dataTables_wrapper .dataTables_info {
            color: #6c757d;
            /* Bootstrap muted text color */
            padding-top: 0.85em;
        }

        /* --- End DataTable Specific Styling Adjustments --- */

        .badge {
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.2s ease;
            padding: 0.6em 1em;
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

        .fs-5 {
            font-size: 1.1rem !important;
        }

        .fs-6 {
            font-size: 1rem !important;
        }

        .flag-container {
            width: 60px;
            height: 40px;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
            background: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .flag-icon {
            font-size: 2rem;
        }

        .action-buttons .btn {
            border-radius: 30px;
            padding: 0.5rem 1.25rem;
        }

        .empty-state {
            padding: 4rem 0;
            text-align: center;
        }

        .empty-state-icon {
            font-size: 5rem;
            opacity: 0.2;
            color: #0f4c81;
            margin-bottom: 1.5rem;
        }

        .search-container {
            max-width: 350px;
        }

        .search-input {
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: #1b8b9c;
            box-shadow: 0 0 0 0.25rem rgba(27, 139, 156, 0.25);
        }

        .status-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
        }

        .status-active {
            background-color: #1b8b9c;
        }

        .status-inactive {
            background-color: #f56036;
        }

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

        .continent-badge {
            background: #e9f7fe;
            color: #0f4c81;
            border-radius: 20px;
            padding: 0.4em 1em;
            font-weight: 500;
            display: inline-block;
            margin-top: 0.5rem;
        }

        .dt-container .justify-content-between {
            display: none !important;
        }
    </style>

    {{-- Include jQuery (required by DataTables) and DataTables JS --}}
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-2.0.8/datatables.min.js"></script>
    {{-- Include Bootstrap JS (for tooltips and general Bootstrap functionality) --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script> --}}

    {{-- Pgination --}}
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

    <script>
        // Initialize tooltips (ensure Bootstrap JS is loaded before this)
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl, {
                    animation: true,
                    delay: {
                        "show": 100,
                        "hide": 50
                    }
                });
            });

            // Initialize DataTables
            // This will target the table with id="newsTable"
            $('#newsTable').DataTable({
                "paging": true,
                "ordering": true,
                "info": true,
                "searching": true,
                responsive: true
            });

            // If you want your custom search input to filter the DataTable:
            // This requires you to disable DataTables' default search input (searching: false)
            // Or you can target DataTables' default search input using .dataTables_filter input
            $('.search-input').on('keyup', function() {
                $('#newsTable').DataTable().search($(this).val()).draw();
            });

            // Prevent default form submission for the search form if JavaScript handles search
            $('form[role="search"]').on('submit', function(e) {
                e.preventDefault();
            });
        });
    </script>

@endsection
