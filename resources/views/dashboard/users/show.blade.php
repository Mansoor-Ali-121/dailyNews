@extends('template')
@section('main_section')

    @include('dashboard.includes.alerts')

    <div class="container-fluid px-5 py-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="card border-0 shadow-lg overflow-hidden" style="border-radius: 20px;">
                    <!-- Card Header with Gradient Background -->
                    <div class="card-header p-5 position-relative"
                        style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="h3 mb-2 text-white"><i class="fas fa-user-cog me-3"></i> User Management Dashboard
                                </h2>
                                <p class="mb-0 text-white-50 fs-5">Manage all system users and their permissions</p>
                            </div>
                            <a href="{{ route('user.add') }}" class="btn btn-light btn-lg rounded-pill px-4 py-2 shadow-sm"
                                id="addUserBtn" style="position: relative; z-index: 2;">
                                <i class="fas fa-plus-circle me-2"></i> Add New User
                            </a>
                        </div>
                        <div class="position-absolute bottom-0 end-0 w-100 overflow-hidden"
                            style="color: rgba(255,255,255,0.1); z-index: 1;">
                            <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                                <path
                                    d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                                    style="stroke: none; fill: currentColor;"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-0">
                        @if ($users->isEmpty())
                            <div class="text-center py-6">
                                <div class="mb-5">
                                    <i class="fas fa-users-slash fa-5x text-muted opacity-25"></i>
                                </div>
                                <h4 class="h3 text-muted mb-4">No Users Found</h4>
                                <p class="text-muted fs-5 mb-5">Get started by adding your first user to the system</p>
                                <a href="{{ route('user.add') }}"
                                    class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm">
                                    <i class="fas fa-user-plus me-2"></i> Create First User
                                </a>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="ps-5 py-4 text-uppercase fw-bold text-muted fs-5 border-0">ID</th>
                                            <th class="py-4 text-uppercase fw-bold text-muted fs-5 border-0">User Profile
                                            </th>
                                            <th class="py-4 text-uppercase fw-bold text-muted fs-5 border-0">User Details
                                            </th>
                                            <th class="py-4 text-uppercase fw-bold text-muted fs-5 border-0">Status</th>
                                            <th class="py-4 text-uppercase fw-bold text-muted fs-5 border-0">Activity</th>
                                            <th
                                                class="pe-5 py-4 text-uppercase fw-bold text-muted fs-5 border-0 text-end text-center">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr class="border-top">
                                                <td class="ps-5 fw-bold text-muted fs-5">#{{ $user->id }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="position-relative me-4">
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
                                                            class="badge admin-badge fs-6 bg-{{ $user->user_type == 'admin' ? 'secondary' : 'primary' }} px-3 py-2">
                                                            <i
                                                                class="fas fa-{{ $user->user_type == 'admin' ? 'crown' : 'user' }} me-2 {{ $loop->first ? 'text-warning' : '' }}"></i>
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
                                                <td class="pe-5 text-end">
                                                    <div class="d-flex justify-content-end gap-3">
                                                        <a href="{{ route('user.edit', $user->id) }}"
                                                            class="btn btn-lg btn-outline-primary rounded-pill px-4 shadow-sm"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit User">
                                                            <i class="fas fa-pen-fancy me-2"></i> Edit
                                                        </a>
                                                        <form action="{{ route('user.delete', $user->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-lg btn-outline-danger rounded-pill px-4 shadow-sm"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Delete User"
                                                                onclick="return confirm('Are you sure you want to delete {{ $user->name }}?')">
                                                                <i class="fas fa-trash-alt me-2"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                    {{-- 
                @if ($users->hasPages())
                <div class="card-footer bg-white border-0 py-4">
                    <div class="d-flex justify-content-between align-items-center px-5">
                        <div class="text-muted fs-5">
                            Showing <span class="fw-bold">{{ $users->firstItem() }}</span> to <span class="fw-bold">{{ $users->lastItem() }}</span> of <span class="fw-bold">{{ $users->total() }}</span> entries
                        </div>
                        <div>
                            {{ $users->onEachSide(1)->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
                @endif --}}
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <style>
        .admin-badge {
            color: black !important;
            background: #f5365c !important;
        }

        .card {
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.05);
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            position: relative;
            overflow: hidden;
            padding: 2rem !important;
        }

        .table {
            margin-bottom: 0;
        }

        .table th {
            border-top: none;
            font-weight: 700;
            letter-spacing: 0.5px;
            padding: 1.5rem !important;
            background-color: #f8fafc;
        }

        .table td {
            padding: 1.5rem !important;
            vertical-align: middle;
        }

        .table tr {
            transition: all 0.3s ease;
        }

        .table tr:hover {
            background-color: rgba(106, 17, 203, 0.03) !important;
            transform: scale(1.005);
        }

        .badge {
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.2s ease;
        }

        .bg-purple {

            background-color: #6f42c1 !important;
        }

        .text-purple {

            color: #6f42c1 !important;

        }

        .btn-outline-primary {
            border-width: 2px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white !important;
            border-color: transparent;
            transform: translateY(-2px);
        }

        .btn-outline-danger {
            border-width: 2px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-outline-danger:hover {
            background: linear-gradient(135deg, #f5365c 0%, #f56036 100%);
            color: white !important;
            border-color: transparent;
            transform: translateY(-2px);
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            border-color: transparent;
            font-weight: 600;
        }

        .pagination .page-link {
            padding: 0.75rem 1.25rem;
            font-size: 1rem;
            border-radius: 12px !important;
            margin: 0 5px;
        }

        .fs-5 {
            font-size: 1.1rem !important;
        }

        .fs-6 {
            font-size: 1rem !important;
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Initialize tooltips
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
        });
    </script>
@endpush
