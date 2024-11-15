<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: radial-gradient(circle, #87CEEB 2%, #ffffff 80%);
            margin: 0;
            padding: 0;
            line-height: 1.6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
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
        }
         .extra-element {
            position: absolute;
            top: -50px;
            left: -100px;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(144, 211, 255, 0.6) 30%, transparent 70%);
            border-radius: 50%;
            z-index: -1;
        }

        .container {
            max-width: 900px; 
            padding: 30px; 
            background-color: white;
            border-radius: 15px; 
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .header-logo img {
            width: 50px; 
            margin-right: 15px;
        }

        .header-logo h1 {
            font-size: 28px; 
            font-weight: bold;
            color: #00BFFF;
            margin: 0;
        }

        .btn-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); 
            gap: 20px; 
            margin-top: 30px;
            width: 100%;
        }

        .btn {
            padding: 16px 30px;
            font-size: 16px; 
            background-color: #00BFFF;
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            min-width: 250px;
        }

        .btn:hover {
            background-color: #1E90FF;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .btn i {
            margin-right: 10px; 
        }

        .logout-container {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 25px;
        }

        .logout-btn {
            background-color: #FF6347;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 30px;
            text-decoration: none;
            color: white;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            align-items: center;
        }

        .logout-btn:hover {
            background-color: #FF4500;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.2);
        }

        .logout-btn i {
            margin-right: 10px;
        }

        .footer {
            background-color: #87CEEB;
            color: white;
            text-align: center;
            padding: 10px;
            width: 100%;
            position: fixed;
            bottom: 0;
        }

        .footer p {
            margin: 0;
            font-size: 14px;
        }
    </style>

    <!-- Menambahkan link CDN Font Awesome yang benar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="header-logo">
            <img src="{{ asset('storage/images/logopinjam.png') }}" alt="TechLend Logo">
            <h1>Admin Dashboard</h1>
        </div>

        <div class="btn-container">
            <a href="{{ route('data.index_admin') }}" class="btn"><i class="fas fa-clipboard-list"></i> Data Pinjam</a>
            <a href="{{ route('pc.index') }}" class="btn"><i class="fas fa-desktop"></i> Data PC</a>
            <a href="{{ route('admin.konfirmasi.index') }}" class="btn"><i class="fas fa-undo-alt"></i> Data Pengembalian</a>
        </div>

        <div class="logout-container">
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <a href="#" class="logout-btn" onclick="this.closest('form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </form>
        </div>
    </div>
</body>
</html>