@extends('template')

@section('main_section')

    @include('dashboard.includes.alerts')

    <div class="container-fluid px-5 py-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="card border-0 shadow-lg overflow-hidden" style="border-radius: 20px;">
                    <div class="card-header p-5 position-relative"
                        style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="h3 mb-2 text-white"><i class="fas fa-layer-group me-3"></i> Category Management
                                </h2>
                                <p class="mb-0 text-white-50 fs-5">Manage all system categories</p>
                            </div>
                            <a href="{{ route('category.add') }}" class="btn btn-light btn-lg rounded-pill px-4 py-2 shadow-sm"
                                id="addCategoryBtn" style="position: relative; z-index: 2;">
                                <i class="fas fa-plus-circle me-2"></i> Add New Category
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

                    <div class="card-body p-0">
                        @if ($categories->isEmpty())
                            <div class="text-center py-6">
                                <div class="mb-5">
                                    <i class="fas fa-box-open fa-5x text-muted opacity-25"></i>
                                </div>
                                <h4 class="h3 text-muted mb-4">No Categories Found</h4>
                                <p class="text-muted fs-5 mb-5">Get started by adding your first category to the system</p>
                                <a href="{{ route('category.add') }}"
                                    class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm">
                                    <i class="fas fa-plus-square me-2"></i> Create First Category
                                </a>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="ps-5 py-4 text-uppercase fw-bold text-muted fs-5 border-0">ID</th>
                                            <th class="py-4 text-uppercase fw-bold text-muted fs-5 border-0">Category Details
                                            </th>
                                            <th class="py-4 text-uppercase fw-bold text-muted fs-5 border-0">Status</th>
                                            <th class="py-4 text-uppercase fw-bold text-muted fs-5 border-0">Activity</th>
                                            <th
                                                class="pe-5 py-4 text-uppercase fw-bold text-muted fs-5 border-0 text-end text-center">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr class="border-top">
                                                <td class="ps-5 fw-bold text-muted fs-5">#{{ $category->id }}</td>
                                                <td>
                                                    <div class="d-flex flex-column gap-2">
                                                        <h6 class="mb-1 fw-bold fs-5">{{ $category->category_name }}</h6>
                                                        <small class="text-muted fs-6"><i class="fas fa-link me-2"></i>
                                                            {{ $category->category_slug }}</small>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge rounded-pill fs-6 bg-{{ $category->category_status == 'active' ? 'success' : 'warning' }} bg-opacity-10 text-{{ $category->category_status == 'active' ? 'success' : 'warning' }} px-3 py-2">
                                                        <i
                                                            class="fas fa-{{ $category->category_status == 'active' ? 'check-circle' : 'exclamation-triangle' }} me-2"></i>
                                                        {{ ucfirst($category->category_status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column gap-2">
                                                        <small class="d-block text-muted fs-6"><i
                                                                class="far fa-calendar-plus me-2"></i>
                                                            {{ $category->created_at->format('d M Y, H:i') }}</small>
                                                        <small class="d-block text-muted fs-6"><i
                                                                class="far fa-calendar-check me-2"></i>
                                                            {{ $category->updated_at->format('d M Y, H:i') }}</small>
                                                    </div>
                                                </td>
                                                <td class="pe-5 text-end">
                                                    <div class="d-flex justify-content-end gap-3">
                                                        <a href="{{ route('category.edit', $category->id) }}"
                                                            class="btn btn-lg btn-outline-primary rounded-pill px-4 shadow-sm"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit Category">
                                                            <i class="fas fa-pen-fancy me-2"></i> Edit
                                                        </a>
                                                        <form action="{{ route('category.delete', $category->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-lg btn-outline-danger rounded-pill px-4 shadow-sm"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Delete Category"
                                                                onclick="return confirm('Are you sure you want to delete {{ $category->category_name }}?')">
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
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <style>
        /*
        The following CSS is directly copied from your user.show.blade.php
        It ensures consistency in styling across your dashboard list pages.
        */

        .admin-badge { /* This specific class might not be directly used for categories but is included for full replication */
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

        .pagination .page-item.active .page-link { /* This might not be used if you're not paginating, but included for completeness */
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            border-color: transparent;
            font-weight: 600;
        }

        .pagination .page-link { /* This might not be used if you're not paginating, but included for completeness */
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