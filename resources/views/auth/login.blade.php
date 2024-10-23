<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

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
            align-items: flex-start;
            height: 100vh;
            overflow: hidden;
            position: relative;
            padding-top: 50px;
        }

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
            transform: translateY(50px);
        }

       
        .form-container {
            width: 50%;
            background-color: #ffffff; 
            padding: 40px;
        }

        h2 {
            font-size: 50px;
            color: #800000;
            margin-bottom: 30px;
            text-align: center; 
        }

        .form-group {
            margin-bottom: 15px;
            justify-content: space-between;
            display: flex;
        }

        .form-group input {
            width: 100%;
            padding: 17px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .btn {
            width: 100%;
            padding: 15px;
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
        .show-password {
            margin-top: 20px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .show-password input {
            margin-right: 10px;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 30%;
            cursor: pointer;
        }

        .popup {
    display: none;
    position: fixed;
    top: 20%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #ffffff;
    color: rgb(0, 0, 0);
    padding: 20px;
    border-radius: 10px;
    z-index: 1000;
    text-align: center;
    overflow: hidden;
}

.popup.show {
    display: block;
}

.popup .close-btn {
    cursor: pointer;
    position: absolute; 
    right: 10px; 
    top: 10px; 
    color: rgb(182, 31, 31);
    font-size: 24px; 
    transition: color 0.3s ease; 
}

.popup .close-btn:hover {
    color: #ffcccc; 
}

.popup .message {
    margin-top: 30px;
    font-family: 'Roboto', sans-serif;
}


    </style>
</head>
<body>

<div class="extra-element"></div>

<div class="popup" id="errorPopup">
    <span class="close-btn" onclick="closePopup()">
        <i class="fas fa-times"></i> 
    </span>
    <div class="message" id="errorMessage"></div>
</div>

<div class="container">
    <div class="form-container">
        <h2>Login</h2>

        <form action="{{ route('auth.authenticate') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="Email Address" required>
            </div>

            <div class="input-group">
                <div class="form-group" style="position: relative;">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <span class="toggle-password" onclick="togglePassword('password', 'togglePasswordIcon')">
                        <i id="togglePasswordIcon" class="fas fa-eye-slash"></i>
                    </span>
                </div>
            </div>

            <button class="btn" type="submit">Login</button>
        </form>

        <div class="login-link">
            <p>Have an account? <a href="/register/create">Sing Up</a></p>
        </div>
    </div>

    <div class="illustration">
        <img src="{{ asset('storage/images/Donna.jpeg') }}" alt="Gambar Orang"> 
    </div>
</div>

<script>
    function togglePassword(fieldId, iconId) {
        const passwordField = document.getElementById(fieldId);
        const icon = document.getElementById(iconId);
        
       
        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        } else {
            passwordField.type = "password";
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }
    }

    // Fungsi untuk menampilkan pop-up
    function showPopup(message) {
        document.getElementById('errorMessage').innerText = message;
        document.getElementById('errorPopup').classList.add('show');
    }

    // Fungsi untuk menutup pop-up
    function closePopup() {
        document.getElementById('errorPopup').classList.remove('show');
    }

    // Menangani error jika ada di sesi
    window.onload = function() {
        @if ($errors->has('login'))
            showPopup("Tolong masukkan username dan password yang benar."); // Tampilkan error jika ada
        @endif
    }
    
</script>
</body>
</html>
