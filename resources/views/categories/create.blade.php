@extends('layout.app')

@section('content')
<div class="container">
    <h2>Create New Category</h2>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary btn-sm btn-md btn-lg">Create Category</button>
        </div>
    </form>
</div>
@endsection
