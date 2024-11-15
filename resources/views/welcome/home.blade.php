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
            background-color: #87CEEB;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
            flex-direction: column;
            border-radius: 10px;
        }

        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 50%;
            background-color: #87CEEB;
            z-index: 0;
            border-radius: 10px 10px 0 0;
        }

        .welcome-container {
            display: flex;
            flex-direction: row;
            align-items: center;
            background-color: #FFFFFF;
            max-width: 800px;
            width: 90%;
            min-height: 500px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            z-index: 1;
            animation: slideUp 1s ease-out forwards;
            border-radius: 20px;
            overflow: hidden;
            flex-wrap: wrap;
            margin-top: 100px; 
        }

        .background-decoration {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: radial-gradient(circle, rgba(173, 216, 230, 0.3) 0%, rgba(135, 206, 235, 0.3) 100%);
            z-index: -1;
            border-radius: 20px;
        }

        .welcome-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-right: 20px;
            text-align: center;
        }

        .slogan {
            margin: 0;
            font-size: 22px;
            color: #555;
            margin-bottom: 20px;
        }

        .image-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-left: 20px;
        }

        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            position: absolute;
            top: 20px; 
            right: 20px;
            z-index: 2; 
            padding: 10px;
        }

        .logo-container img {
            width: 60px;
            height: auto;
            border-radius: 10px;
            filter: drop-shadow(2px 4px 6px rgba(0, 0, 0, 0.3));
            transition: transform 0.3s ease;
        }

        .logo-container img:hover {
            transform: scale(1.1);
        }

        .welcome-container h1 {
            font-family: 'Pacifico', cursive;
            font-size: 36px;
            color: #007BFF;
            margin-bottom: 15px;
            animation: textGlow 1s infinite alternate, textMove 1.5s infinite alternate;
        }

        .custom-title {
            font-size: 40px;
            text-align: center;
            line-height: 1.2;
        }

        .welcome-container p {
            font-family: 'Arial', sans-serif;
            font-size: 20px;
            color: #555;
            margin-bottom: 20px;
            max-width: 200px;
            line-height: 1.5;
        }

        .btn-container {
            display: flex;
            flex-direction: row;
            gap: 20px;
            justify-content: center;
            text-align: center;
            margin-top: 10px;
            flex-wrap: wrap;
        }

        .btn {
            background: linear-gradient(135deg, #007BFF, #0056b3);
            color: white;
            padding: 15px 50px; 
            border: none;
            border-radius: 12px;
            cursor: pointer;
            text-decoration: none;
            font-size: 18px; 
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            width: 300px;
        }

        .btn:hover {
            background-color: #0056b3;
            transform: scale(1.1);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        }

        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes textGlow {
            0% { text-shadow: 0 0 5px rgba(0, 123, 255, 0.8), 0 0 10px rgba(0, 123, 255, 0.8), 0 0 15px rgba(0, 123, 255, 0.8); }
            100% { text-shadow: 0 0 10px rgba(0, 162, 255, 1), 0 0 20px rgba(0, 162, 255, 1), 0 0 30px rgba(0, 162, 255, 1); }
        }

        @keyframes textMove {
            0% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
            100% { transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .welcome-container {
                flex-direction: column;
                padding: 20px;
                margin-top: 150px;
            }

            .logo-container {
                position: absolute;
                flex-direction: row;
                gap: 10px;
                top: 10px; 
                left: 50%; 
                transform: translateX(-50%); 
                padding: 0;
                z-index: 2;
            }

            .welcome-container h1 {
                font-size: 28px;
            }

            .welcome-container p {
                font-size: 16px;
            }

            .image-container img {
                max-width: 80%;
                height: auto;
            }

            .btn {
                font-size: 18px;
                padding: 15px 40px;
                width: 100%; 
            }
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <div class="wave"></div>

    <div class="logo-container">
        <img src="{{ asset('storage/images/LogoPPLG.png') }}" alt="Logo PPLG">
        <img src="{{ asset('storage/images/logopinjam.png') }}" alt="Logo Pinjam">
        <img src="{{ asset('storage/images/LogoNeskar.png') }}" alt="Logo Neskar">
    </div>

    <div class="welcome-container">
        <div class="background-decoration"></div>
        <div class="welcome-content">
            <h1 class="custom-title">
                Welcome to the <br> TechLand Website
            </h1>
            <p class="slogan">Adaptive, Creative, Innovative</p>
            <div class="btn-container">
                <a href="/login" class="btn">LOGIN</a>
            </div>
        </div>
        <div class="image-container">
            <img src="{{ asset('storage/images/register.png') }}" alt="Home Image">
        </div>
    </div>
</body>
</html>