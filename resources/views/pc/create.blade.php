<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah PC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: radial-gradient(circle, #800000 0%, #ffffff 100%);
            margin: 0;
            padding: 0;
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
        /* Header */
        .header {
            background-color: #7b1616;
            color: white;
            padding: 2px 2px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed; /* Menambahkan properti fixed */
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000; /* Agar header tetap di atas elemen lain */
        }

        .header-logo {
            display: flex;
            align-items: center;
        }

        .header-logo img {
            height: 40px;
            margin-right: 10px;
        }
        /* Tombol Back dipindahkan ke header */
        .back-btn {
            padding: 10px 20px;
            background-color: #7b1616;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }
        .back-btn:hover {
            background-color: #ff4d4d;
        }

        .container {
            max-width: 500px;
            margin: 200px auto; /* Mengatur margin-top agar konten tidak tertutup header */
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #7b1616;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #833939;
        }
    </style>
</head>
<body>

    <!-- Header dengan tombol back -->
<div class="header">
    <div class="header-logo">
        <img src="{{ asset('storage/images/logopinjam.png') }}" alt="TechLend Logo">
        <h2>TechLend</h2>
    </div>
    <a href="{{ route('pc.index') }}" class="back-btn">Back</a>
</div>

<div class="container">
    <h2>Tambah PC</h2>
    <form action="{{ route('pc.store') }}" method="POST">
        @csrf
        <input type="text" name="nama" placeholder="Nama PC" required>
        <button type="submit">Simpan</button>
    </form>
</div>
</body>
</html>