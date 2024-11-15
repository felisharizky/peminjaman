<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit PC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: radial-gradient(circle, #87CEEB 0%, #ffffff 100%);
            margin: 0;
            padding: 0;
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
            background: radial-gradient(circle, rgba(171, 206, 243, 0.6) 30%, transparent 70%);
            border-radius: 50%;
            z-index: -1;
        }
        .header {
            background-color: #87CEEB;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .header-logo {
            display: flex;
            align-items: center;
        }

        .header-logo img {
            height: 40px;
            margin-right: 10px;
        }

        .header-text {
            font-size: 24px;
            font-weight: bold;
        }

        .back-btn {
            padding: 10px 20px;
            background-color: #87CEEB;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }

        .back-btn:hover {
            background-color: #87CEEB;
        }

        .container {
            max-width: 400px;
            margin: 250px auto;
            padding: 20px;
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        input[type="text"], select {
            width: 94%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #87CEEB;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #87CEEB;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="header-logo">
            <img src="{{ asset('storage/images/logopinjam.png') }}" alt="Logo Pinjam">
            <span class="header-text">TechLand</span>
        </div>
        <a href="{{ route('pc.index') }}" class="back-btn">Back</a>
    </div>

    <div class="container">
        <h2>Edit PC</h2>
        <form action="{{ route('pc.update', $pc->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="nama" value="{{ $pc->nama }}" placeholder="Nama PC" required>

            <input type="hidden" name="available" value="{{ $pc->available }}">

            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>

</body>
</html>