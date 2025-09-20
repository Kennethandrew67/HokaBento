<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Register Page</title>
</head>

<body>
    <h1 class="title red">hoKAbento</h1>
    <div class="bigger-container">
        <div class="register-container">
            <h3>Sign Up</h3>
            <div class="line"></div>
            <form action="{{ route('register_post') }}" method="POST">
                @csrf
                <label class="question">Email: </label>
                <input placeholder="Input Your Email" name="email" value="{{ old('email') }}" />

                <label class="question">Password: </label>
                <input placeholder="Input Your Password" name="password" type="password" />

                <label class="question">Confirmation Password: </label>
                <input placeholder="Input Your Confirmation Password" name="password_confirmation" type="password" />

                <a href="/login">Already have an account?</a>
                <button type="submit" class="signup-btn">Sign Up</button>
            </form>
        </div>
        <div class="red-container"></div>
    </div>
    <script>
        @if ($errors->any())
            alert("{{ $errors->first() }}");
        @endif
    </script>

</body>

</html>
