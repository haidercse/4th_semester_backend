@extends('backend.layouts.master')

@section('admin-title')
    Edit User
@endsection

@section('admin-content')

<div class="container mt-4">
    <h3>Edit User</h3>

    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control"
                   value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control"
                   value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label>Password (optional)</label>
            <input type="password" name="password" class="form-control"
                   placeholder="Leave blank to keep old password">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>

@endsection