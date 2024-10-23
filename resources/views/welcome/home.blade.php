<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechLand</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background: radial-gradient(circle, #800000 0%, #ffffff 100%);
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        body::before, body::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            z-index: -1;
        }

        body::before {
            top: -100px;
            right: -150px;
            width: 800px;
            height: 800px;
            background: linear-gradient(135deg, #800000 30%, #ffffff 70%);
            filter: blur(80px);
        }

        body::after {
            bottom: -100px;
            left: -150px;
            width: 600px;
            height: 600px;
            background: linear-gradient(135deg, #800000 30%, #ffffff 70%);
            filter: blur(100px);
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

        .logo-container {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 20px;
            animation: fadeIn 1s ease-in-out;
        }

        .logo-container img {
            width: 70px;
            height: auto;
        }

        .welcome-container {
            display: flex;
            flex-direction: row;
            background-color: #fff;
            max-width: 1200px;
            width: 100%;
            height: 500px;
            border-radius: 25px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            z-index: 10;
            margin-top: 60px;
            position: relative;
            transform: translateY(100px);
            animation: slideUp 1s ease-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(100px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .left-side {
            background-color: #ffffff;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            text-align: center;
        }

        .right-side {
            background-color: #800000;
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            position: relative;
            animation: fadeIn 1.5s ease-in-out;
        }

        .right-side img {
            width: 500px;
            height: auto;
            animation: slideIn 1s ease-in-out;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .left-side h1 {
            font-size: 48px;
            color: #333;
            margin-bottom: 20px;
            letter-spacing: 3px;
            text-align: center;
            text-transform: uppercase;
            background: linear-gradient(135deg, #ff6666, #7b1616);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 3px 3px 7px rgba(0, 0, 0, 0.3);
            animation: textGlow 2s infinite alternate;
        }

        @keyframes textGlow {
            from {
                text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            }
            to {
                text-shadow: 5px 5px 15px rgba(255, 255, 255, 0.5);
            }
        }

        .left-side .btn-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
            text-align: center;
        }

        .btn {
            background: linear-gradient(135deg, #ff6666, #7b1616);
            color: white;
            padding: 15px 50px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .btn:hover {
            background-color: #5c0f0f;
            transform: scale(1.1);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        }

        /* Responsif untuk perangkat mobile */
        @media (max-width: 768px) {
            .welcome-container {
                flex-direction: column;
                height: auto;
            }

            .left-side, .right-side {
                width: 100%;
                padding: 20px;
            }

            .right-side img {
                width: 200px;
            }

            .left-side h1 {
                font-size: 36px;
            }

            .btn {
                font-size: 18px;
                padding: 12px 24px;
            }
        }
    </style>
</head>
<body>

    <div class="extra-element"></div>

    <div class="logo-container">
        <img src="{{ asset('storage/images/LogoPPLG.png') }}" alt="Logo PPLG">
        <img src="{{ asset('storage/images/LogoNeskar.png') }}" alt="Logo Neskar">
    </div>

    <div class="welcome-container">
        <!-- Bagian kiri putih dengan teks dan tombol -->
        <div class="left-side">
            <h1>Selamat Datang di Website TechLand</h1>
            <div class="btn-container">
                <a href="/register/create" class="btn">REGISTER</a>
                <a href="/login" class="btn">LOGIN</a>
            </div>
        </div>

        <!-- Bagian kanan merah dengan logo -->
        <div class="right-side">
            <img src="{{ asset('storage/images/logopinjam.png') }}" alt="Logo Pinjam">
        </div>
    </div>

</body>
</html>