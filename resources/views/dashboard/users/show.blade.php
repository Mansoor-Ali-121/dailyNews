@extends('template')

@section('main_section')
    @include('dashboard.includes.alerts')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-lg overflow-hidden" style="border-radius: 20px;">
                    <!-- Card Header with Gradient Background -->
                    <div class="card-header position-relative"
                        style="background: linear-gradient(135deg, #0f4c81 0%, #1b8b9c 100%);">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div>
                                <h2 class="h3 mb-2 text-white"><i class="fas fa-user-cog me-3" aria-hidden="true"></i>
                                    User Management Dashboard</h2>
                                <p class="mb-0 text-white-50 fs-5">Manage all system users and their permissions</p>
                            </div>
                            <div class="d-flex gap-3 mt-3 mt-md-0">
                                {{-- Accessible Add New User Button --}}
                                <a href="{{ route('user.add') }}"
                                    class="btn btn-light btn-lg rounded-pill px-4 py-2 shadow-sm" id="addUserBtn"
                                    aria-label="Add New User">
                                    <i class="fas fa-plus-circle me-2" aria-hidden="true"></i> Add New User
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <div class="global-stats">
                            @php
                                $totalUsers = count($users);
                                $activeUsers = $users->where('user_status', 'active')->count();
                                $inactiveUsers = $users->where('user_status', 'inactive')->count();
                                $adminUsers = $users->where('user_type', 'admin')->count();
                            @endphp

                            <div class="stat-item">
                                <div class="stat-value">{{ $totalUsers }}</div>
                                <div class="stat-label">Total Users</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">{{ $activeUsers }}</div>
                                <div class="stat-label">Active</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">{{ $inactiveUsers }}</div>
                                <div class="stat-label">Inactive</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">{{ $adminUsers }}</div>
                                <div class="stat-label">Admin Users</div>
                            </div>
                        </div>

                        @if ($users->isEmpty())
                            <div class="empty-state">
                                <div class="mb-5">
                                    <i class="fas fa-users-slash empty-state-icon"></i>
                                </div>
                                <h4 class="h3 text-muted mb-4">No Users Found</h4>
                                <p class="text-muted fs-5 mb-5">Get started by adding your first user to the system</p>
                                <a href="{{ route('user.add') }}" class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm"
                                    aria-label="Create First User">
                                    <i class="fas fa-user-plus me-2"></i> Create First User
                                </a>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table id="usersTable" class="table align-middle mb-0 display">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="ps-4 py-3 text-uppercase fw-bold text-muted fs-5 border-0">ID</th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">User Profile
                                            </th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">User Details
                                            </th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">Status</th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">Activity</th>
                                            <th
                                                class="pe-4 py-3 text-uppercase fw-bold text-muted fs-5 border-0 text-center">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr class="border-top">
                                                <td class="ps-4 fw-bold text-muted fs-5">#{{ $user->id }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="position-relative me-3">
                                                            <img src="{{ asset('images/users/' . $user->user_image) }}"
                                                                class="rounded-circle shadow" width="60" height="60"
                                                                alt="{{ $user->name }}">
                                                            @if ($user->user_status == 'active')
                                                                <span
                                                                    class="position-absolute bottom-0 end-0 bg-success rounded-circle border border-2 border-white"
                                                                    style="width: 15px; height: 15px;"></span>
                                                            @endif
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-1 fw-bold fs-5">{{ $user->name }}</h6>
                                                            <small class="text-muted fs-6">{{ $user->email }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column gap-2">
                                                        <span
                                                            class="badge admin-badge fs-6 bg-{{ $user->user_type == 'admin' ? 'info' : 'primary' }} px-3 py-2">
                                                            <i
                                                                class="fas fa-{{ $user->user_type == 'admin' ? 'crown' : 'user' }} me-2"></i>
                                                            {{ ucfirst($user->user_type) }}
                                                        </span>
                                                        <small class="text-muted fs-6"><i class="fas fa-link me-2"></i>
                                                            {{ $user->user_slug }}</small>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge rounded-pill fs-6 bg-{{ $user->user_status == 'active' ? 'success' : 'warning' }} bg-opacity-10 text-{{ $user->user_status == 'active' ? 'success' : 'warning' }} px-3 py-2">
                                                        <i
                                                            class="fas fa-{{ $user->user_status == 'active' ? 'check-circle' : 'exclamation-triangle' }} me-2"></i>
                                                        {{ ucfirst($user->user_status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column gap-2">
                                                        <small class="d-block text-muted fs-6"><i
                                                                class="far fa-calendar-plus me-2"></i>
                                                            {{ $user->created_at->format('d M Y, H:i') }}</small>
                                                        <small class="d-block text-muted fs-6"><i
                                                                class="far fa-calendar-check me-2"></i>
                                                            {{ $user->updated_at->format('d M Y, H:i') }}</small>
                                                    </div>
                                                </td>
                                                <td class="pe-4 text-end">
                                                    <div class="d-flex justify-content-end gap-2 action-buttons">
                                                        <a href="{{ route('user.edit', $user->id) }}"
                                                            class="btn btn-outline-primary" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Edit User"
                                                            aria-label="Edit User {{ $user->name }}">
                                                            <i class="fas fa-edit me-1" aria-hidden="true"></i> Edit
                                                        </a>
                                                        <a href="{{ route('user.delete', $user->id) }}"
                                                            class="btn btn-outline-danger" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Delete User"
                                                            aria-label="Delete User {{ $user->name }}">
                                                            <i class="fas fa-trash-alt me-1" aria-hidden="true"></i>
                                                            Delete
                                                        </a>
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
                                            @if ($users->onFirstPage())
                                                <li class="page-item disabled" aria-disabled="true">
                                                    <span class="page-link">
                                                        <i class="fas fa-chevron-left"></i>
                                                        <span class="d-none d-sm-inline ms-2">Prev</span>
                                                    </span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $users->previousPageUrl() }}"
                                                        rel="prev">
                                                        <i class="fas fa-chevron-left"></i>
                                                        <span class="d-none d-sm-inline ms-2">Prev</span>
                                                    </a>
                                                </li>
                                            @endif

                                            {{-- Pagination Elements --}}
                                            @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                                                @if ($page == $users->currentPage())
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
                                            @if ($users->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $users->nextPageUrl() }}"
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

        /* Table styling */
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
            /* transform: scale(1.005); */
            box-shadow: 0 6px 15px rgba(15, 76, 129, 0.1);
        }

        /* DataTables styling */
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

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.5em 0.8em;
            margin-left: 2px;
            border-radius: 0.25rem;
            border: 1px solid #dee2e6;
            background-color: #fff;
            color: #0d6efd;
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

        .admin-badge {
            color: white !important;
            background: #0f4c81 !important;
        }

        .user-image {
            border-radius: 50%;
            width: 60px;
            height: 60px;
            object-fit: cover;
            border: 2px solid #fff;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        }
    </style>

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
@endsection
