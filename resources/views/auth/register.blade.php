<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: radial-gradient(circle, #87CEEB 0%, #ffffff 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative;
            background-size: cover;
            background-position: center;
        }

        body::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -150px;
            width: 800px;
            height: 800px;
            background: linear-gradient(135deg, #87CEEB 30%, #ffffff 70%);
            border-radius: 50%;
            z-index: -1;
            background-size: cover;
            background-position: center;
        }

        body::after {
            content: '';
            position: absolute;
            bottom: -100px;
            left: -150px;
            width: 600px;
            height: 600px;
            background: linear-gradient(135deg, #87CEEB 30%, #ffffff 70%);
            border-radius: 50%;
            z-index: -1;
            background-size: cover;
            background-position: center;
        }

        .container {
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 900px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        .form-container {
            width: 50%;
            padding: 30px;
        }

        h2 {
            font-size: 30px;
            color: #00BFFF;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 16px;
            display: flex;
            position: relative; 
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 12px;
            font-size: 15px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .form-group.flex-row {
            display: flex;
            gap: 10px; 
        }

        .form-group.flex-row input {
            flex: 1;
        }

        .btn {
            width: 100%;
            padding: 15px;
            background-color: #00BFFF;
            color: white;
            font-size: 17px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #93DBFD;
            box-shadow: 0px 8px 20px rgba(30, 144, 255, 0.3);
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 15px;
            width: 100%;
        }

        .login-link a {
            color: #00BFFF;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .illustration {
            width: 50%;
            background-color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .illustration img {
            width: 100%;
            height: auto;
            border-radius: 15px;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                width: 90%;
                padding: 20px;
            }

            .form-container {
                width: 100%;
                padding: 20px;
            }

            .illustration {
                width: 100%;
                padding: 20px;
                order: -1; 
            }

            body::before, body::after {
                width: 400px; 
                height: 400px;
                top: -50px;
                right: -50px;
                bottom: -50px;
                left: -50px;
            }

            h2 {
                font-size: 30px; 
            }

            .form-group input {
                font-size: 14px; 
            }

            .btn {
                padding: 12px;
                font-size: 16px; 
            }
        }
        @media (max-width: 480px) {
            .form-container {
                padding: 10px;
            }
        }

        .form-group .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #aaa;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2>Create Account</h2>

        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="form-group flex-row">
                <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
                <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
            </div>

            <div class="form-group">
                <select id="kelas" name="kelas" required>
                    <option value="X RPL 1">X RPL 1</option>
                    <option value="X RPL 2">X RPL 2</option>
                    <option value="XI RPL 1">XI RPL 1</option>
                    <option value="XI RPL 2">XI RPL 2</option>
                    <option value="XII RPL 1">XII RPL 1</option>
                    <option value="XII RPL 2">XII RPL 2</option>
                </select>
            </div>

            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="Email Address" required>
            </div>
            <div class="form-group" style="position: relative;">
                <input type="password" id="password" name="password" placeholder="Password" required>
                <i class="fas fa-eye-slash toggle-password" onclick="togglePassword('password', this)"></i>
            </div>
    
            <div class="form-group" style="position: relative;">
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                <i class="fas fa-eye-slash toggle-password" onclick="togglePassword('password_confirmation', this)"></i>
            </div>

            <button class="btn" type="submit">Create Account</button>
        </form>

        <div class="login-link">
            <p>Have an account? <a href="/login">Go to Login</a></p>
        </div>
    </div>

    <div class="illustration">
        <img src="{{ asset('storage/images/register.png') }}" alt="Gambar Orang">
    </div>
</div>

<script>
    function togglePassword(inputId, iconElement) {
        const inputField = document.getElementById(inputId);
        if (inputField.type === 'password') {
            inputField.type = 'text';
            iconElement.classList.remove('fa-eye-slash');
            iconElement.classList.add('fa-eye');
        } else {
            inputField.type = 'password';
            iconElement.classList.remove('fa-eye');
            iconElement.classList.add('fa-eye-slash');
        }
    }
</script>

</body>
</html>
