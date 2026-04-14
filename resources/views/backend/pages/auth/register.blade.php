<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            height: 100vh;
        }
        .register-card {
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        .form-control {
            border-radius: 8px;
        }
        .btn-custom {
            background-color: #4e73df;
            color: white;
            border-radius: 8px;
        }
        .btn-custom:hover {
            background-color: #2e59d9;
        }
    </style>
</head>
<body>

<div class="d-flex justify-content-center align-items-center h-100">
    <div class="card register-card p-4" style="width: 400px;">
        <h3 class="text-center mb-4">Create Account</h3>

        {{-- Error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter name" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>

            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" required>
            </div>

            <button type="submit" class="btn btn-custom w-100">Register</button>
        </form>

        <p class="text-center mt-3">
            Already have an account? 
            <a href="{{ route('login') }}">Login</a>
        </p>
    </div>
</div>

</body>
</html>