<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tanggal Kembali</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: radial-gradient(circle, #87CEEB 0%, #ffffff 100%);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative;
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

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 10px 20px;
            background-color: #87CEEB;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            box-sizing: border-box;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 10px; 
        }

        .logo-container img {
            height: 40px;
        }

        .navbar h1 {
            color: white;
            margin: 0;
            font-size: 20px; 
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #87CEEB;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-left: 10px;
        }

        .navbar a:hover {
            background-color: #87CEEB;
        }

        .container {
            width: 100%;
            max-width: 500px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            text-align: center;
            margin-top: 80px; 
        }

        h1 {
            color: #87CEEB;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
            width: 100%;
            text-align: left;
        }

        input, button {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            outline: none;
            box-sizing: border-box;
        }

        input {
            border: 1px solid #ccc;
        }

        button {
            background-color: #87CEEB;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #93DBFD;
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 10px;
                justify-content: center;
                text-align: center;
            }
            .logo-container {
                justify-content: center;
            }
            .navbar h1 {
                font-size: 18px;
            }
            .container {
                width: 90%;
                margin-top: 100px;
                padding: 15px;
            }
            input, button {
                padding: 8px;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .navbar {
                flex-direction: column;
                text-align: center;
            }
            .navbar h1 {
                font-size: 16px;
            }
            .container {
                width: 100%;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo-container">
            <img src="{{ asset('storage/images/logopinjam.png') }}" alt="TechLend Logo">
            <h1>TechLand</h1>
        </div>
        <a href="{{ route('pinjam.index') }}">Back</a>
    </div>

    <div class="container">
        <h1>Edit Tanggal Kembali</h1>
        <form action="{{ route('konfirmasi.store', ['pinjam_id' => $pinjam->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="pinjam_id" value="{{ $pinjam->id }}">
            <label for="tanggalKembali">Tanggal Kembali</label>
            <input type="date" id="tanggalKembali" name="tanggal_kembali" value="{{ old('tanggal_kembali', $pinjam->tanggal_kembali) }}" required>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>