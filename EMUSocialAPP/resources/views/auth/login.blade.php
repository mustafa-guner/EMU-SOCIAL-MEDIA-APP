<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>

<body>
    <div class="container">
        <div class="form-container">
            <div class="top">
                <div class="logo">
                    <img src="{{ asset('assets/images/Emu-dau-logo.png') }}" alt="">
                </div>
                <div class="header">
                    <h2>EMUBOOK</h2>
                </div>
            </div>
            <div class="login-form">
                <form action="/login" method="POST">
                    {{ csrf_field() }}
                    <div class="stdno-container">
                        <label class="stdno-lbl" for="email-input">E-mail</label>
                        <input type="email" id="stdno-input" name="email" placeholder="Enter e-mail">


                    </div>
                    <div class="passwrd-container">
                        <label class="passwrd-lbl" for="passwrd-input">Password</label>
                        <input type="password" id="passwrd-input" name="password" placeholder="Enter Password">

                    </div>
                    <div class="remember-me-check">
                        <input type="checkbox" id="remember-me-input" name="remember-me" value="remember-me">
                        <label class="remember-me-lbl" for="remember-me-input">Remember Me</label>
                    </div>
                    <div class="questions">
                        <div class="forgot-passwrd">
                            <a href="/forgot-password">Forgot your password? Reset your password.</a>
                        </div>
                        <div class="register">
                            <a href="/registration">Don't have account? Register here.</a>
                        </div>
                    </div>
                    <div class="recaptcha">
                        <p>Google ReCaptcha</p>
                    </div>

                    @if (count($errors) > 0)
                        @foreach ($errors as $error)
                            <p class="error-message">{{ $error }}</p>
                        @endforeach
                    @endif

                    <div class="login-btn">
                        <button type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
