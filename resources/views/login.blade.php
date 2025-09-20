<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Login Page</title>
</head>

<body>
    <h1 class="title yellow">hoKAbento</h1>
    <div class="register-container">
        <h3>Sign Up</h3>
        <div class="line"></div>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label class="question">Email: </label>
            <input placeholder="Input Your Email" name="email" value="{{old('email')}}"/>
            <label class="question">Password: </label>
            <input placeholder="Input Your Password" name="password" type="password"/>
            <a href="/register">Don't have an account?</a>
            <button type="submit" class="signup-btn">Sign In</button>
        </form>
    </div>

    <script>
        @if ($errors->any())
            alert("{{ $errors->first() }}");
        @endif
    </script>
</body>

</html>
