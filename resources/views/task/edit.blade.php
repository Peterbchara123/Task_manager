<!-- resources/views/task/edit.blade.php -->
@extends('layout.app')

@section('content')
<div class="container mt-5">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('task.index') }}">Tasks</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Task</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Card for Task Edit -->
            <div class="card shadow-lg border-primary">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0 text-center">Edit Task</h3>
                </div>
                <div class="card-body">
                    <!-- Display Validation Errors if any -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form to Edit Task -->
                    <form action="{{ route('task.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Task Title Field -->
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Task Title</label>
                            <input type="text" name="title" id="title" class="form-control" 
                                   value="{{ old('title', $task->title) }}" required>
                        </div>

                        <!-- Category Dropdown -->
                        <div class="form-group mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-select" required>
                                <option value="">Select a Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" 
                                            {{ $category->id == $task->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <a href="{{ route('task.index') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-success">Update Task</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Add some padding below the card -->
            <div class="mt-4 text-center">
                <a href="{{ route('task.index') }}" class="btn btn-outline-primary">Back to Task List</a>
            </div>
        </div>
    </div>
</div>
@endsection
