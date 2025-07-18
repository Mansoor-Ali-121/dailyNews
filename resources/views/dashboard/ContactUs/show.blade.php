@extends('template')
@section('main_section')
@include('dashboard.includes.alerts')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-lg overflow-hidden">
                    <div class="card-header position-relative" style="background: var(--primary-gradient);">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div>
                                <h2 class="h3 mb-2 text-white"><i class="fas fa-envelope me-3" aria-hidden="true"></i>
                                    Contact Us Messages</h2>
                                <p class="mb-0 text-white-50 fs-5">Manage all contact messages from users</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        @if ($contacts->isEmpty())
                            <div class="empty-state">
                                <div class="mb-5">
                                    <i class="fas fa-envelope-open-text empty-state-icon"></i>
                                </div>
                                <h4 class="h3 text-muted mb-4">No Messages Found</h4>
                                <p class="text-muted fs-5 mb-5">No contact messages have been received yet</p>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table id="contactsTable" class="table align-middle mb-0 display">
                                    <thead class="bg-light">
                                        <tr class="">
                                            <th class="ps-4 py-3 text-uppercase fw-bold text-muted fs-5 border-0">ID</th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">Name</th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">Email</th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">Subject</th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">Message</th>
                                            <th class="py-3 text-uppercase fw-bold text-muted fs-5 border-0">Timestamps</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $contact)
                                            <tr class="border-top">
                                                <td class="ps-4 fw-bold text-muted fs-5">{{ $contact->id }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <h6 class="mb-1 fw-bold fs-5">
                                                                {{ $contact->name }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <small class="text-muted fs-6">
                                                            <i class="fas fa-envelope me-2" aria-hidden="true"></i>
                                                            {{ $contact->email }}
                                                        </small>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <small class="text-muted fs-6">
                                                            <i class="fas fa-tag me-2" aria-hidden="true"></i>
                                                            {{ $contact->subject }}
                                                        </small>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <small class="text-muted fs-6">
                                                            <i class="fas fa-comment me-2" aria-hidden="true"></i>
                                                            {{ ($contact->message) }}
                                                        </small>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <small class="text-muted fs-6">
                                                            <i class="fas fa-clock me-2" aria-hidden="true"></i>
                                                            {{ $contact->created_at->format('M d, Y') }}
                                                        </small>
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

    </style>

@endsection