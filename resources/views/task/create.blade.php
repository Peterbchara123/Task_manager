@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Card for Create Task Form with Background Color -->
            <div class="card shadow-lg" style="background-color: #f8f9fa;">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Create a New Task</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('task.store') }}" method="POST">
                        @csrf

                        <!-- Task Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Task Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>

                        <!-- Category Dropdown -->
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">Select a Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Create Task</button>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection
