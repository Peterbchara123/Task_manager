@extends('layout.app')

@section('content')
<div class="container mt-5">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"></li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Card for Categories -->
            <div class="card shadow-lg border-info">
                <div class="card-header bg-info text-white">
                    <h3 class="mb-0 text-center">Categories List</h3>
                </div>
                <div class="card-body">
                    <!-- Display Success Message if Any -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Add New Category Button -->
                    <div class="mb-3 text-end">
                        <a href="{{ route('categories.create') }}" class="btn btn-info">
                            <i class="fas fa-plus"></i> Create New Category
                        </a>
                    </div>

                    <!-- Category Table -->
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <!-- Edit Button -->
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        <!-- Delete Button with Confirmation -->
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" 
                                                    onclick="return confirm('Are you sure you want to delete this category?');">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Back to Task List -->
                    <a href="{{ route('task.index') }}" class="btn btn-outline-primary">Back to Tasks</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
