<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Forgot Password</title>
    <link rel="stylesheet" href="{{asset('assets/css/forgot-password.css')}}">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="top">
                <div class="logo">
                    <img src="{{asset('assets/images/Emu-dau-logo.png')}}" alt="">
                </div>
                <div class="header">
                    <h3>Forgot My Password</h3>
                </div>
            </div>
            <div class="forgot-password-form">
                <form action="">
                    <div class="email-container">
                        <label class="email-lbl" for="email-input">E-mail</label>
                        <input type="text" id="email-input" name="email" placeholder="Enter your e-mail...">
                        <p class="error-message">Email is required*</p>
                        <p class="error-message">Your e-mail address did not match with any acoount.*</p>
                    </div>
                    <div class="login-btn">
                        <button type="submit">Send Link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>