@extends('template')
@section('main_section')

    {{-- Full error display section --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- End full error display section --}}

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.update', $category->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            {{-- Category Name --}}
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" name="category_name" id="category_name" class="form-control" value="{{ $category->category_name }}">
                            </div>
                            {{-- Category Slug --}}
                            <div class="form-group">
                                <label for="actual_slug">Category Slug</label>
                                <input type="text" name="actual_slug" id="actual_slug" class="form-control" value="{{ $category->category_slug }}" onkeyup="generateSlug()">
                            </div>
                               {{-- Actual Slug --}}
                               <div class="form-group">
                                <label for="category_slug">Category Slug</label>
                                <input type="text" name="category_slug" id="category_slug" class="form-control" value="{{ $category->category_slug }}" readonly>
                            </div>
                            {{-- Category Status --}}
                            <div class="form-group">
                                <label for="category_status">Category Status</label>
                                <select name="category_status" id="category_status" class="form-control">
                                    <option value="" selected>Select Status</option>
                                    <option value="active" {{ $category->category_status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $category->category_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Category</button>
                            <a href="{{ route('category.show') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <script>

function generateSlug() {
    var inputSlug = document.getElementById('actual_slug').value;
    var generatedSlug = inputSlug
    .trim()
    .toLowerCase()
    .replace(/[^a-z0-9äöüß]+/g, '-')
    .replace(/^-|-$/g, '');
    document.getElementById('category_slug').value = generatedSlug;
}
document.addEventListener('DOMContentLoaded', generateSlug);

        </script>

@endsection