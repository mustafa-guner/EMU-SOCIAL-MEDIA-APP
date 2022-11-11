<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Forgot Password</title>
    <link rel="stylesheet" href="{{asset('assets/css/create-new-password.css')}}">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="top">
                <div class="logo">
                    <img src="{{asset('assets/images/Emu-dau-logo.png')}}" alt="">
                </div>
                <div class="header">
                    <h3>Create New Password</h3>
                </div>
            </div>
            <div class="new-password-form">
                <form action="">
                    <div class="new-passwrd-container">
                        <label class="new-passwrd-lbl" for="new-passwrd-input">New Password</label>
                        <input type="text" id="new-passwrd-input" name="new-passwrd" placeholder="Enter your new password...">
                        <p class="error-message">Password is required*</p>
                    </div>
                    <div class="confirm-passwrd-container">
                        <label class="confirm-new-passwrd-lbl" for="confirm-new-passwrd-input">Confirm New Password</label>
                        <input type="text" id="confirm-new-passwrd-input" name="confirm-new-passwrd" placeholder="Enter your new password...">
                        <p class="error-message">Password is required*</p>
                    </div>
                    <div class="update-password-btn">
                        <button type="submit">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>