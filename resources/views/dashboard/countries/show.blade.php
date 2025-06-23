@extends('template')

@section('main_section')

    {{-- Include DataTables CSS for Bootstrap 5 integration --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-2.0.8/datatables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    {{-- <body> --}}
    <div class="container-fluid px-lg-5">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-lg overflow-hidden">
                    <div class="card-header position-relative" style="background: var(--primary-gradient);">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div>
                                <h2 class="h3 mb-2 text-white"><i class="fas fa-globe-americas me-3" aria-hidden="true"></i>
                                    Country Management Dashboard</h2>
                                <p class="mb-0 text-white-50 fs-5">Manage all countries and their information</p>
                            </div>
                            <div class="d-flex gap-3 mt-3 mt-md-0">
                                {{-- Accessible Add New Country Button --}}
                                <a href="{{ route('country.add') }}"
                                    class="btn btn-light btn-lg rounded-pill px-4 py-2 shadow-sm" id="addCountryBtn"
                                    aria-label="Add New Country">
                                    <i class="fas fa-plus-circle me-2" aria-hidden="true"></i> Add New Country
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <div class="global-stats">
                            @php
                                $totalCountries = count($countries);
                                $activeCountries = $countries->where('country_status', 'active')->count();
                                $inactiveCountries = $countries->where('country_status', 'inactive')->count();
                                $recentlyAdded = $countries
                                    ->filter(function ($country) {
                                        return now()->diffInDays($country->created_at) <= 30;
                                    })
                                    ->count();
                            @endphp

                            <div class="stat-item">
                                <div class="stat-value">{{ $totalCountries }}</div>
                                <div class="stat-label">Total Countries</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">{{ $activeCountries }}</div>
                                <div class="stat-label">Active</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">{{ $inactiveCountries }}</div>
                                <div class="stat-label">Inactive</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">{{ $recentlyAdded }}</div>
                                <div class="stat-label">Recently Added</div>
                            </div>
                        </div>

                        @if ($countries->isEmpty())
                            <div class="empty-state">
                                <div class="mb-5">
                                    <i class="fas fa-globe-americas empty-state-icon"></i>
                                </div>
                                <h4 class="h3 text-muted mb-4">No Countries Found</h4>
                                <p class="text-muted fs-5 mb-5">Get started by adding your first country to the system
                                </p>
                                <a href="{{ route('country.add') }}"
                                    class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm"
                                    aria-label="Create First Country">
                                    <i class="fas fa-plus-circle me-2"></i> Create First Country
                                </a>
                            </div>
                        @else
                            <div class="table-responsive">
                                {{-- Add id="countriesTable" for DataTables initialization --}}
                                <table id="countriesTable" class="table align-middle mb-0 display">
                                    <thead class="bg-light">
                                        <tr class="text-center">
                                            <th class="ps-4 py-3 text-uppercase fw-bold text-muted fs-5 border-0">ID
                                            </th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">Country
                                            </th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">Country
                                                Slug</th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">Country
                                                Code</th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">Status</th>
                                            <th class="pe-4 py-3 text-uppercase fw-bold text-muted fs-5 border-0 text-center">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($countries as $country)
                                            <tr class="border-top">
                                                <td class="ps-4 fw-bold text-muted fs-5">{{ $country->id }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <h6 class="mb-1 fw-bold fs-5">{{ $country->country_name }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <small class="text-muted fs-6"><i class="fas fa-link me-2"
                                                                aria-hidden="true"></i>{{ $country->country_slug }}</small>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <small class="text-muted fs-6">
                                                            <i class="fas fa-globe me-2" aria-hidden="true"></i>
                                                            {{-- Changed from fa-code to fa-globe --}}
                                                            {{ $country->country_code }}
                                                        </small>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($country->country_status == 'active')
                                                        <span
                                                            class="badge rounded-pill fs-6 bg-success bg-opacity-10 text-success px-3 py-2">
                                                            <i class="fas fa-circle me-2" aria-hidden="true"></i>
                                                            {{ $country->country_status }}
                                                        </span>
                                                    @elseif ($country->country_status == 'inactive')
                                                        <span
                                                            class="badge rounded-pill fs-6 bg-danger bg-opacity-10 text-danger px-3 py-2">
                                                            <i class="fas fa-times-circle me-2" aria-hidden="true"></i>
                                                            {{ $country->country_status }}
                                                        </span>
                                                    @else
                                                        <span
                                                            class="badge rounded-pill fs-6 bg-secondary bg-opacity-10 text-secondary px-3 py-2">
                                                            <i class="fas fa-question-circle me-2" aria-hidden="true"></i>
                                                            {{ $country->country_status }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="pe-4 text-end">
                                                    <div class="d-flex justify-content-end gap-2 action-buttons">
                                                        <a href="{{ route('country.edit', $country->id) }}"
                                                            class="btn btn-outline-primary" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Edit Country"
                                                            aria-label="Edit Country {{ $country->country_name }}">
                                                            <i class="fas fa-edit me-1" aria-hidden="true"></i> Edit
                                                        </a>
                                                        <a href="{{ route('country.delete', $country->id) }}"
                                                            class="btn btn-outline-danger" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Delete Country"
                                                            aria-label="Delete Country {{ $country->country_name }}">
                                                            <i class="fas fa-trash-alt me-1" aria-hidden="true"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
            /* Hide the default DataTables search input if you use your own */
            /* Or simply let DataTables handle it and remove your custom search-container */
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
            /* This might be redundant if using Bootstrap badges */
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
        }

        .status-active {
            /* This might be redundant if using Bootstrap badges */
            background-color: #1b8b9c;
        }

        .status-inactive {
            /* This might be redundant if using Bootstrap badges */
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
            /* Added for responsiveness on smaller screens */
        }

        .stat-item {
            text-align: center;
            padding: 0 1rem;
            flex-grow: 1;
            /* Allows items to grow and fill space */
            min-width: 120px;
            /* Minimum width before wrapping */
            margin-bottom: 1rem;
            /* Space between items when wrapping */
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
            // This will target the table with id="countriesTable"
            $('#countriesTable').DataTable({
                // You can add options here if needed, e.g.:
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
                $('#countriesTable').DataTable().search($(this).val()).draw();
            });

            // Prevent default form submission for the search form if JavaScript handles search
            $('form[role="search"]').on('submit', function(e) {
                e.preventDefault();
            });
        });
    </script>
    {{-- </body> --}}

@endsection
