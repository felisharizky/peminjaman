<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        body::before {
    content: '';
    position: absolute;
    top: -80px;  
    right: -100px; 
    width: 600px;  
    height: 600px;  
    background: linear-gradient(135deg, #800000 30%, #ffffff 70%);
    border-radius: 50%;
    z-index: -1;
}

body::after {
    content: '';
    position: absolute;
    bottom: -80px;  
    left: -100px;  
    width: 500px; 
    height: 500px;  
    background: linear-gradient(135deg, #800000 30%, #ffffff 70%);
    border-radius: 50%;
    z-index: -1;
}

/* Elemen tambahan di bagian kiri atas */
.extra-element {
    position: absolute;
    top: -30px;
    left: -60px;  
    width: 300px;  
    height: 300px;  
    background: radial-gradient(circle, rgba(128,0,0,0.6) 30%, transparent 70%);
    border-radius: 90%;
    z-index: -1;
}

        .header {
            background-color: #7b1616;
            color: white;
            padding: 20px;
            position: relative; /* Menjadikan container relatif untuk penempatan absolut */
            display: flex;
            align-items: center;
            justify-content: center; /* Mengatur agar konten di tengah secara horizontal */
            /* border-bottom: 5px solid #e60000; */
        }
        .header-logo {
            display: flex;
            align-items: center;
            position: absolute;
            left: 20px; /* Menempatkan logo di kiri */
        }
        .header-logo img {
            width: 50px; /* Sesuaikan ukuran logo */
            margin-right: 10px; /* Spasi antara logo dan teks */
        }
        .header h1 {
            margin: 0;
            font-size: 36px;
        }
        .container {
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            flex-grow: 1;
        }
        .btn-container {
            display: flex;
            justify-content: center;
            margin-top: 50px;
            flex-wrap: wrap;
        }
        .btn {
            padding: 15px 30px;
            font-size: 16px;
            background-color: #7b1616;
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin: 10px;
        }
        .btn:hover {
            background-color: #e60000;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .btn i {
            font-size: 20px;
        }
        .logout-form {
            display: inline;
        }
        .footer {
            background-color: #7b1616;
            color: white;
            text-align: center;
            padding: 20px;
            /* border-top: 5px solid #e60000; */
        }
        .footer p {
            margin: 0;
            font-size: 14px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<div class="header">
    <div class="header-logo">
        <img src="{{ asset('storage/images/logopinjam.png') }}" alt="TechLend Logo">
        <h2>TechLand</h2>
    </div>
    <h1>Admin Dashboard</h1>
</div>

<div class="container">
    <div class="btn-container">
        <a href="{{ route('data.index_admin') }}" class="btn"><i class="fas fa-clipboard-list"></i> Data Pinjam</a>
        <a href="{{ route('pc.index') }}" class="btn"><i class="fas fa-desktop"></i> Data PC</a>
        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="btn"><i class="fas fa-power-off"></i> Logout</button>
        </form>
    </div>    
</div>


{{-- <div class="footer">
    <p>&copy; 2024 Admin Dashboard | All Rights Reserved --}}