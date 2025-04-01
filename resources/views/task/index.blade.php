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
            <!-- Card for Task List -->
            <div class="card shadow-lg border-primary">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0 text-center">Tasks List</h3>
                </div>
                <div class="card-body">
                    <!-- Display Success Message if Any -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Add New Task Button -->
                    <div class="mb-3 text-end">
                        <a href="{{ route('task.create') }}" class="btn btn-primary">Create New Task</a>
                    </div>

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
                                        <span class="badge bg-{{ $task->status == 'completed' ? 'success' : 'black' }}">
                                            {{ ucfirst($task->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <!-- Edit Button -->
                                        <a href="{{ route('task.edit', $task->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        <!-- Mark as Done Button -->
                                        @if($task->status != 'completed')
                                            <form action="{{ route('task.done', $task->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="fas fa-check-circle"></i> Mark as Done
                                                </button>
                                            </form>
                                        @else
                                            <!-- Undo Button -->
                                            <form action="{{ route('task.undone', $task->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-secondary btn-sm">
                                                    <i class="fas fa-undo"></i> Undo
                                                </button>
                                            </form>
                                        @endif

                                        <!-- Delete Button with Confirmation -->
                                        <form action="{{ route('task.destroy', $task->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?');">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination (Optional) -->
                    {{-- <div class="d-flex justify-content-center">
                        {{ $tasks->links() }}
                    </div> --}}

                    <a href="{{ route('history') }}" class="btn btn-outline-primary">View Completed Tasks</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
