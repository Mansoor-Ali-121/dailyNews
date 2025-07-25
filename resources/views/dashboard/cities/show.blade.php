@extends('template')

@section('main_section')

    {{-- Include DataTables CSS for Bootstrap 5 integration --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-2.0.8/datatables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-lg overflow-hidden">
                    <div class="card-header position-relative" style="background: var(--primary-gradient);">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div>
                                <h2 class="h3 mb-2 text-white"><i class="fas fa-city me-3" aria-hidden="true"></i>
                                    City Management Dashboard</h2>
                                <p class="mb-0 text-white-50 fs-5">Manage all cities and their information</p>
                            </div>
                            <div class="d-flex gap-3 mt-3 mt-md-0">
                                {{-- Accessible Add New City Button --}}
                                <a href="{{ route('city.add') }}"
                                    class="btn btn-light btn-lg rounded-pill px-4 py-2 shadow-sm" id="addCityBtn"
                                    aria-label="Add New City">
                                    <i class="fas fa-plus-circle me-2" aria-hidden="true"></i> Add New City
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        @include('dashboard.includes.alerts') {{-- Keep your alerts here --}}

                        {{-- Global Statistics --}}
                        <div class="global-stats">
                            @php
                                $totalCities = count($cities);
                                $activeCities = $cities->where('city_status', 'active')->count();
                                $inactiveCities = $cities->where('city_status', 'inactive')->count();
                                $recentlyAdded = $cities
                                    ->filter(function ($city) {
                                        return now()->diffInDays($city->created_at) <= 30;
                                    })
                                    ->count();
                            @endphp

                            <div class="stat-item">
                                <div class="stat-value">{{ $totalCities }}</div>
                                <div class="stat-label">Total Cities</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">{{ $activeCities }}</div>
                                <div class="stat-label">Active</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">{{ $inactiveCities }}</div>
                                <div class="stat-label">Inactive</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">{{ $recentlyAdded }}</div>
                                <div class="stat-label">Recently Added</div>
                            </div>
                        </div>

                        @if ($cities->isEmpty())
                            <div class="empty-state">
                                <div class="mb-5">
                                    <i class="fas fa-city empty-state-icon"></i>
                                </div>
                                <h4 class="h3 text-muted mb-4">No Cities Found</h4>
                                <p class="text-muted fs-5 mb-5">Get started by adding your first city to the system</p>
                                <a href="{{ route('city.add') }}" class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm"
                                    aria-label="Create First City">
                                    <i class="fas fa-plus-circle me-2"></i> Create First City
                                </a>
                            </div>
                        @else
                            <div class="table-responsive">
                                {{-- Add id="citiesTable" for DataTables initialization --}}
                                <table id="citiesTable" class="table align-middle mb-0 display">
                                    <thead class="bg-light">
                                        <tr class="text-center">
                                            <th class="ps-4 py-3 text-uppercase fw-bold text-muted fs-5 border-0">ID</th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">Country Name
                                            </th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">City Name</th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">City Slug</th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">Status</th>
                                            <th
                                                class="pe-4 py-3 text-uppercase fw-bold text-muted fs-5 border-0 text-center">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cities as $city)
                                            <tr class="border-top">
                                                <td class="ps-4 fw-bold text-muted fs-5">{{ $city->id }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <h6 class="mb-1 fw-bold fs-5">
                                                                {{ $city->country->country_name ?? 'N/A' }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <small class="text-muted fs-6">
                                                            <i class="fas fa-map-marker-alt me-2"
                                                                aria-hidden="true"></i>{{ $city->city_name }}
                                                        </small>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <small class="text-muted fs-6">
                                                            <i class="fas fa-link me-2"
                                                                aria-hidden="true"></i>{{ $city->city_slug }}
                                                        </small>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($city->city_status == 'active')
                                                        <span
                                                            class="badge rounded-pill fs-6 bg-success bg-opacity-10 text-success px-3 py-2">
                                                            <i class="fas fa-circle me-2" aria-hidden="true"></i>
                                                            {{ $city->city_status }}
                                                        </span>
                                                    @elseif ($city->city_status == 'inactive')
                                                        <span
                                                            class="badge rounded-pill fs-6 bg-danger bg-opacity-10 text-danger px-3 py-2">
                                                            <i class="fas fa-times-circle me-2" aria-hidden="true"></i>
                                                            {{ $city->city_status }}
                                                        </span>
                                                    @else
                                                        <span
                                                            class="badge rounded-pill fs-6 bg-secondary bg-opacity-10 text-secondary px-3 py-2">
                                                            <i class="fas fa-question-circle me-2" aria-hidden="true"></i>
                                                            {{ $city->city_status }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="pe-4 text-end">
                                                    <div class="d-flex justify-content-end gap-2 action-buttons">
                                                        <a href="{{ route('city.edit', $city->id) }}"
                                                            class="btn btn-outline-primary" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Edit City"
                                                            aria-label="Edit City {{ $city->city_name }}">
                                                            <i class="fas fa-edit me-1" aria-hidden="true"></i> Edit
                                                        </a>
                                                        <form action="{{ route('city.delete', $city->id) }}" method="POST"
                                                            class="d-inline"
                                                            onsubmit="return confirm('Are you sure you want to delete {{ $city->city_name }}?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Delete City"
                                                                aria-label="Delete City {{ $city->city_name }}">
                                                                <i class="fas fa-trash-alt me-1" aria-hidden="true"></i>
                                                                Delete
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
                                            @if ($cities->onFirstPage())
                                                <li class="page-item disabled" aria-disabled="true">
                                                    <span class="page-link">
                                                        <i class="fas fa-chevron-left"></i>
                                                        <span class="d-none d-sm-inline ms-2">Prev</span>
                                                    </span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $cities->previousPageUrl() }}"
                                                        rel="prev">
                                                        <i class="fas fa-chevron-left"></i>
                                                        <span class="d-none d-sm-inline ms-2">Prev</span>
                                                    </a>
                                                </li>
                                            @endif

                                            {{-- Pagination Elements --}}
                                            @foreach ($cities->getUrlRange(1, $cities->lastPage()) as $page => $url)
                                                @if ($page == $cities->currentPage())
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
                                            @if ($cities->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $cities->nextPageUrl() }}"
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

    {{-- The common styles are better placed in your 'template.blade.php' or a dedicated CSS file.
         However, for now, they are included directly as requested to match the country file's structure. --}}
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
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            position: relative;
            overflow: hidden;
            padding: 2rem !important;
            color: white;
        }

        /* --- DataTable Specific Styling Adjustments --- */
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

        /* DataTables search input and length dropdown styling */
        .dataTables_wrapper .dataTables_filter input,
        .dataTables_wrapper .dataTables_length select {
            border-radius: 0.25rem;
            border: 1px solid #ced4da;
            padding: 0.375rem 0.75rem;
            margin-left: 0.5rem;
        }

        .dataTables_wrapper .dataTables_filter input:focus,
        .dataTables_wrapper .dataTables_length select:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        }

        /* DataTables pagination styling */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.5em 0.8em;
            margin-left: 2px;
            border-radius: 0.25rem;
            border: 1px solid #dee2e6;
            background-color: #fff;
            color: #0d6efd;
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

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-2.0.8/datatables.min.js"></script>

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
            $('#citiesTable').DataTable({
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
                $('#citiesTable').DataTable().search($(this).val()).draw();
            });

            // Prevent default form submission for the search form if JavaScript handles search
            $('form[role="search"]').on('submit', function(e) {
                e.preventDefault();
            });
        });
    </script>
@endsection
