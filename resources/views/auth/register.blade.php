<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #800000, #ffffff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        /* Background dengan gradasi dan lingkaran */
        body::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -150px;
            width: 800px;
            height: 800px;
            background: linear-gradient(135deg, #800000 30%, #ffffff 70%);
            border-radius: 50%;
            z-index: -1;
        }

        body::after {
            content: '';
            position: absolute;
            bottom: -100px;
            left: -150px;
            width: 600px;
            height: 600px;
            background: linear-gradient(135deg, #800000 30%, #ffffff 70%);
            border-radius: 50%;
            z-index: -1;
        }

        /* Elemen tambahan di bagian kiri atas */
        .extra-element {
            position: absolute;
            top: -50px;
            left: -100px;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(128,0,0,0.6) 30%, transparent 70%);
            border-radius: 50%;
            z-index: -1;
        }

        /* Logo di pojok kanan atas */
        .logo-container {
            position: absolute;
            top: 20px; 
            right: 20px; 
            display: flex;
            gap: 10px; 
        }

        .logo-container img {
            width: 50px; 
            height: 50px; 
            object-fit: contain; 
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 1000px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0;
            overflow: hidden;
        }

        .form-container {
            width: 50%;
            background-color: #ffffff;
            padding: 40px;
        }

        h2 {
            font-size: 40px;
            color: #800000;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 16px;
            justify-content: space-between;
            display: flex;
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            font-size: 15px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .btn {
            width: 100%;
            padding: 17px;
            background-color: #800000;
            color: white;
            font-size: 17px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #5a0000;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 15px;
            width: 100%;
        }

        .login-link a {
            color: #007BFF;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .illustration {
            width: 50%;
            background-color: #800000;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .illustration img {
            width: 100%;
            height: auto;
            border-radius: 15px;
        }

        .toggle-password {
            position: absolute; 
            right: 15px;
            top: 50%; 
            transform: translateY(-50%); 
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="extra-element"></div>
<div class="logo-container">
    <img src="{{ asset('storage/images/logopinjam.png') }}" alt="Logo 1"> 
    <img src="{{ asset('storage/images/LogoPPLG.png') }}" alt="Logo 2"> 
    <img src="{{ asset('storage/images/LogoNeskar.png') }}" alt="Logo 3"> 
</div>

<div class="container">
    <div class="form-container">
        <h2>Create Account</h2>

        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
                <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
            </div>
            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="Email Address" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Password" required>
                <span class="toggle-password" onclick="togglePassword('password', 'togglePasswordIcon')">
                    <i id="togglePasswordIcon" class="fas fa-eye-slash"></i>
                </span>
            </div>
    
            <div class="form-group">
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                <span class="toggle-password" onclick="togglePassword('password_confirmation', 'togglePasswordConfirmIcon')">
                    <i id="togglePasswordConfirmIcon" class="fas fa-eye-slash"></i>
                </span>
            </div>

            <button class="btn" type="submit">Create Account</button>
        </form>

        <div class="login-link">
            <p>Have an account? <a href="/login">Go to Login</a></p>
        </div>
    </div>

    <!-- Bagian Kanan: Ilustrasi -->
    <div class="illustration">
        <img src="{{ asset('storage/images/Donna.jpeg') }}" alt="Gambar Orang">
    </div>
</div>

<script>
    function togglePassword(fieldId, iconId) {
        const passwordField = document.getElementById(fieldId);
        const icon = document.getElementById(iconId);
        
        // Toggle the type attribute
        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = "password";
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>

</body>
</html>