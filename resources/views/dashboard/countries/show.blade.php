@extends('template') {{-- Assuming your base layout file is 'template.blade.php' --}}
@section('main_section')

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10"> {{-- Increased column size for table --}}
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2>All Countries</h2>
                        <a href="{{ route('country.add') }}" class="btn btn-primary">Add New Country</a>
                    </div>
                    <div class="card-body">
                        @include('dashboard.includes.alerts')

                        @if ($countries->isEmpty())
                            <div class="alert alert-info" role="alert">
                                No countries found. Click "Add New Country" to get started!
                            @else
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Country Name</th>
                                                <th>Code</th>
                                                <th>Slug</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- FOREACH LOOP STARTS HERE --}}
                                            @foreach ($countries as $country)
                                                <tr>
                                                    {{-- Use $country->id or $country->country_id based on your actual model's
                                                    primary key --}}
                                                    <td>{{ $country->id }}</td> {{-- Added flexibility for 'id' or
                                                    'country_id' --}}
                                                    <td>{{ $country->country_name }}</td>
                                                    <td>{{ $country->country_code }}</td>
                                                    <td>{{ $country->country_slug }}</td>
                                                    <td>{{ $country->country_status }}</td>
                                                    <td>
                                                        {{-- THIS IS THE CORRECT LINE FOR THE EDIT BUTTON --}}
                                                        <a href="{{ route('country.edit', $country->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>

                                                        {{-- Delete Form (ensure the action attribute points to the correct route
                                                        with ID) --}}
                                                        <form action="{{ route('country.delete', $country->id) }}"
                                                            method="POST" class="d-inline"
                                                            onsubmit="return confirm('Are you sure you want to delete {{ $country->country_name }}?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            {{-- FOREACH LOOP ENDS HERE --}}
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
