<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('task.index')}}">Task Manager</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('task.index') }}">Tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('history') }}">History</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="d-flex flex-column min-vh-100">
        <div class="container my-4">
    <div class="p-4 bg-light text-center rounded shadow-sm">
        <h2 class="text-primary">Welcome to Your Task Manager! 🚀</h2>
        <p class="text-muted">Stay organized and track your tasks efficiently.</p>
    </div>
</div>
        @yield('content')

<div class="container text-center mt-5 ">
    
    <h4 class="text-primary fw-medium">🌟 Keep Going! You’re Doing Great! 🌟</h4>
    <p class="text-muted">Every completed task is a step closer to success.</p>

    @php
        $totalTasks = \App\Models\Task::count();
        $completedTasks = \App\Models\Task::where('status', 'completed')->count();
        $progress = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;
    @endphp

    <div class="progress mt-3 h-25  " >
        <div class="progress-bar bg-success" role="progressbar" 
             style="width: {{ $progress }}%;" 
             aria-valuenow="{{ $progress }}" 
             aria-valuemin="0" aria-valuemax="100">
            {{ round($progress) }}% Completed
        </div>
    </div>

    
    <div class="mt-4">
        <i class="fas fa-smile-beam fa-3x text-warning animate__animated animate__bounce"></i>
    </div>
</div>

        

    </div>

    
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <div class="container d-flex justify-content-between align-items-start">
            <p class="col-4">Created with ❤️ by Peter Bchara</p>
            <p class="col-4">&copy; 2025 Task Manager. All rights reserved.</p>
            <p class="col-4">Rate us on <a href="https://github.com/Peterbchara123/Task_manager" class="text-primary">GitHub</a></p>
        </div>
    </footer>
</body>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</body>
</html>
