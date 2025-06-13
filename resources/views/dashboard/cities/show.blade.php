@extends('template')
@section('main_section')

@include('dashboard.includes.alerts')

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center"> {{-- Corrected 'align-item-center' to 'align-items-center' --}}
                        <h2>City List</h2> {{-- Changed "Add City" to "City List" for clarity on this page --}}
                        <a href="{{ route('city.add') }}" class="btn btn-primary">Add New City</a> {{-- Changed text to "Add New City" --}}
                    </div>
                    <div class="card-body">
                        @if ($cities->isEmpty())
                            <div class="alert alert-info" role="alert">
                                No City Found! Please click on add city button to add a city.
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>City Id</th>
                                            <th>Country Name</th> {{-- CHANGED: From Country Id to Country Name --}}
                                            <th>City Name</th>
                                            <th>City Status</th>
                                            <th>City Slug</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cities as $city)
                                            <tr>
                                                <td>{{ $city->id }}</td>
                                                {{-- CHANGED: Access the country relationship to get the country_name --}}
                                                <td>{{ $city->country->country_name ?? 'N/A' }}</td>
                                                <td>{{ $city->city_name }}</td>
                                                <td>{{ $city->city_status }}</td>
                                                <td>{{ $city->city_slug }}</td>
                                                <td>
                                                    {{-- You'll need to define the routes for edit and delete --}}
                                                    <a href="{{ route('city.edit', $city->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('city.delete', $city->id) }}" method="POST" class="d-inline"
                                                        onsubmit="return confirm('Are you sure you want to delete {{ $city->city_name }}?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
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