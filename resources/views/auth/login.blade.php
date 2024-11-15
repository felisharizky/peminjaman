<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: radial-gradient(circle, #87CEEB 0%, #ffffff 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            overflow: hidden;
            position: relative;
        }
        .bg-circle {
            position: absolute;
            border-radius: 50%;
            z-index: -1;
        }
        .bg-circle.top-right {
            top: -100px;
            right: -150px;
            width: 800px;
            height: 800px;
            background: linear-gradient(135deg, #87CEEB 30%, #ffffff 70%);
        }
        .bg-circle.bottom-left {
            bottom: -100px;
            left: -150px;
            width: 600px;
            height: 600px;
            background: linear-gradient(135deg, #87CEEB 30%, #ffffff 70%);
        }
        .container-login {
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            overflow: hidden;
        }
        .btn-custom {
            background-color: #00BFFF;
            color: white;
            border-radius: 30px;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #93DBFD;
            box-shadow: 0px 8px 20px rgba(30, 144, 255, 0.3);
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="bg-circle top-right"></div>
    <div class="bg-circle bottom-left"></div>

    <div class="container-login d-flex flex-column flex-md-row align-items-center">
        <div class="form-container p-4 col-md-6">
            <h2 class="text-center text-primary">Login</h2>
            <form action="{{ route('auth.authenticate') }}" method="POST">
                @csrf
                <div class="mb-3 position-relative">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required>
                </div>
                <div class="mb-3 position-relative">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                    <span class="toggle-password" onclick="togglePassword('password', 'togglePasswordIcon')">
                        <i id="togglePasswordIcon" class="fas fa-eye-slash"></i>
                    </span>
                </div>
                <button type="submit" class="btn btn-custom w-100">Login</button>
            </form>
            <div class="text-center mt-3">
                <p>Have an account? <a href="/register/create" class="text-primary">Sign Up</a></p>
            </div>
        </div>

        <div class="illustration d-none d-md-flex justify-content-center align-items-center col-md-6 p-4">
            <img src="{{ asset('storage/images/register.png') }}" alt="Gambar Orang" class="img-fluid rounded">
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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
