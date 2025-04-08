@extends('layout.app')

@section('content')
<div class="container mt-5 bg-light p-4 rounded ">
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"></li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            <!-- Card for Completed Tasks -->
            <div class="card shadow-lg border-secondary">
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0 text-center">Completed Tasks</h3>
                </div>
                <div class="card-body">
                    
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="text-center">
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
                                        <td class="text-center">
                                            <!-- Buttons Wrapper for Responsive Layout -->
                                            <div class="d-flex flex-wrap justify-content-center gap-2">
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
                                                    <button type="submit" class="btn btn-danger btn-sm " 
                                                            onclick="return confirm('Are you sure you want to delete this task permanently?');">
                                                        <i class="fas fa-trash-alt"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Back to Task List -->
                    <div class=" mt-3">
                        <a href="{{ route('task.index') }}" class="btn btn-outline-primary">Back to Task List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
