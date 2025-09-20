<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .profile-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-header h2 {
            color: #d9534f;
            font-weight: bold;
        }

        .profile-header p {
            font-size: 1.2em;
            color: #6c757d;
        }

        .form-group label {
            font-weight: bold;
            color: #343a40;
        }

        .slider-label {
            font-weight: bold;
            color: #d9534f;
            text-align: center;
            margin-bottom: 10px;
        }

        .points-display {
            font-size: 1.5em;
            text-align: center;
            color: #d9534f;
        }

        .btn-custom {
            background-color: #ffcc00;
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #e6b800;
        }

        .back-button {
            color: #6c757d;
            text-decoration: none;
        }

        .back-button:hover {
            color: #d9534f;
        }

        .logout-button {
            background-color: #d9534f;
            color: #fff;
        }

        .logout-button:hover {
            background-color: #c9302c;
        }

        .logout-button {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="container profile-container">
        <div class="profile-header">
            <h2>User Profile</h2>
            <p>Manage your profile information below</p>
        </div>
        <form id="profile-form" action="{{ route('update.profile') }}" method="POST">
            @csrf <!-- CSRF token for security -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input disabled type="text" class="form-control" value="{{ Auth::user()->email }}" id="email">
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" value="{{ Auth::user()->name }}"
                    id="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Telephone:</label>
                <input type="text" class="form-control" name="phone_number" value="{{ Auth::user()->phone_number }}"
                    id="phone_number" placeholder="Enter your phone number" required>
            </div>
            <div class="form-group">
                <label class="slider-label">Member Points:</label>
                <input type="range" class="form-range" min="0" max="1000"
                    value="{{ Auth::user()->member_point }}" disabled>
                <div class="points-display">Points: {{ Auth::user()->member_point }}</div>
            </div>
            <button type="submit" class="btn btn-custom">Save Changes</button>
            <a href="/" class="btn btn-link back-button">Back</a>
        </form>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn logout-button">Logout</button>
        </form>

    </div>

    <script>
        @if (session('success'))
            alert("{{ session('success') }}");
        @elseif (session('error'))
            alert("{{ session('error') }}");
        @endif
    </script>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
