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
            <!-- Card for Completed Tasks -->
            <div class="card shadow-lg border-secondary">
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0 text-center">Completed Tasks</h3>
                </div>
                <div class="card-body">
                    <!-- Display Success Message if Any -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Task Table -->
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->category->name }}</td>
                                    <td>
                                        <span class="badge bg-success">Completed</span>
                                    </td>
                                    <td>
                                        <!-- Restore Button -->
                                        <form action="{{ route('task.undone', $task->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-warning btn-sm">
                                                <i class="fas fa-undo"></i> Restore
                                            </button>
                                        </form>

                                        <!-- Delete Button with Confirmation -->
                                        <form action="{{ route('task.destroy', $task->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" 
                                                    onclick="return confirm('Are you sure you want to delete this task permanently?');">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Back to Task List -->
                    <a href="{{ route('task.index') }}" class="btn btn-outline-primary">Back to Task List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
