<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam PC</title>
    <style>
        /* body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        } */

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #800000, #ffffff);
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
       
        .container {
            width: 100%;
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #7b1616;
        }
        .header {
            background-color: #7b1616;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header-logo {
            display: flex;
            align-items: center;
        }
        .header-logo img {
            height: 40px;
            margin-right: 10px;
        }
        .header-buttons {
            display: flex;
            gap: 0px;
            justify-content: center;
            flex-grow: 19; 
            margin-right: 100px;
        }
        .header-buttons button {
            background-color: transparent;
            color: #fff;
            border: none;
            padding: 10px 10px;
            cursor: pointer;
            font-size: 16px;
            margin: 0 10px;
        }
        .logout-form {
            margin-right: 20px;
        }
        .logout-form button {
            background-color: transparent;
            color: white;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }
        h1 {
            text-align: center;
            color: #7b1616;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }
        button {
            padding: 10px;
            background-color: #7b1616;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #a51e1e;
        }
        .kelengkapan-checkbox {
            display: flex;
            flex-direction: column;
        }
        .kelengkapan-checkbox label {
            margin-bottom: 0;
        }
    </style>
</head>

<body>
<div class="header">
    <div class="header-logo">
        <img src="{{ asset('storage/images/logopinjam.png') }}" alt="TechLend Logo">
        <h2>TechLend</h2>
    </div>
    <div class="header-buttons">
        <button onclick="location.href='/pinjam/create'">Pinjam PC</button>
        <button onclick="location.href='/pinjam'">Data Peminjaman PC</button>
    </div>
    <div class="logout-form">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
    
</div>

<div class="container">
    <h1>Pinjam PC</h1>
    <form action="{{ route('pinjam.store') }}" method="POST">
        @csrf
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" required>

        <label for="kelas">Kelas</label>
        <select id="kelas" name="kelas" required>
            <option value="X RPL 1">X RPL 1</option>
            <option value="X RPL 2">X RPL 2</option>
            <option value="XI RPL 1">XI RPL 1</option>
            <option value="XI RPL 2">XI RPL 2</option>
            <option value="XII RPL 1">XII RPL 1</option>
            <option value="XII RPL 2">XII RPL 2</option>
        </select>

        <label for="pc">Pilih PC</label>
        <select id="pc" name="pc_id" required>
            @foreach($pcs as $pc)
                @if($pc->available)
                    <option value="{{ $pc->id }}">{{ $pc->nama }}</option>
                @endif
            @endforeach
        </select>

        <label>Kelengkapan</label>
        <div class="kelengkapan-checkbox">
            <label><input type="checkbox" name="kelengkapan[]" value="Mouse"> Mouse</label>
            <label><input type="checkbox" name="kelengkapan[]" value="Keyboard"> Keyboard</label>
            <label><input type="checkbox" name="kelengkapan[]" value="Kabel Power"> Kabel Power</label>
        </div>

        <label for="tanggalPinjam">Tanggal Pinjam</label>
        <input type="date" id="tanggalPinjam" name="tanggalPinjam" required>

        <button type="submit">Pinjam</button>
    </form>
</div>

</body>
</html>
