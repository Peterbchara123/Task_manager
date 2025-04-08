@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <div class="card shadow-lg" style="background-color: #f8f9fa;">
                <div class="card-header bg-warning text-white text-center">
                    <h4>Edit Category</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
                        </div>

                        
                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Update Category</button>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection
