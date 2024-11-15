<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam PC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: radial-gradient(circle, #87CEEB 0%, #ffffff 100%);
            margin: 0;
            padding: 0;
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
            background: linear-gradient(135deg, #87CEEB 30%, #ffffff 70%);
        }

        body::after {
            bottom: -100px;
            left: -150px;
            width: 600px;
            height: 600px;
            background: linear-gradient(135deg, #87CEEB 30%, #ffffff 70%);
        }

        .extra-element {
            position: absolute;
            top: -50px;
            left: -100px;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, #87CEEB 30%, transparent 70%);
            border-radius: 50%;
            z-index: -1;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 100px auto 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #87CEEB;
        }

        .header {
            background-color: #87CEEB;
            color: white;
            padding: 1px 2px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .header-logo {
            display: flex;
            align-items: center;
        }

        .header-logo img {
            height: 45px;
            margin-right: 10px;
        }

        .header-buttons {
            display: flex;
            gap: 0px;
            justify-content: center;
            flex-grow: 19;
        }

        .header-buttons button {
            background-color: transparent;
            color: #fff;
            border: none;
            padding: 5px 8px;
            cursor: pointer;
            font-size: 18px;
            margin: 0 10px;
            transition: border-bottom 0.3s, font-weight 0.3s;
        }

        .header-buttons button.active {
            position: relative;
            font-weight: bold; 
        }

        .header-buttons button.active::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            right: 0;
            margin: auto;
            width: 60%;
            height: 2px; 
            background-color: white;
            border-radius: 1px;
        }

        .logout-form button {
            background-color: transparent;
            color: #fff;
            border: none;
            padding: 5px 8px;
            cursor: pointer;
            font-size: 18px;
            margin: 0 10px;
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
            background-color: #87CEEB;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #87CEEB;
        }

        .kelengkapan-checkbox {
            display: flex;
            flex-direction: column;
        }

        .kelengkapan-checkbox label {
            margin-bottom: 0;
        }

        @media (max-width: 768px) {
            .header-buttons {
                flex-direction: column;
                align-items: center;
                margin-right: 0;
            }

            .header-buttons button {
                margin: 5px 0;
            }

            .container {
                padding: 15px;
                margin-top: 80px;
            }
        }

        @media (max-width: 480px) {
            .header-logo h2 {
                font-size: 16px;
            }

            .header-buttons button {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="header-logo">
            <img src="{{ asset('storage/images/logopinjam.png') }}" alt="TechLend Logo">
            <h2>TechLand</h2>
        </div>
        <div class="header-buttons">
            <button id="pinjamPcButton" onclick="location.href='/pinjam/create'">Pinjam PC</button>
            <button id="dataPeminjamanButton" onclick="location.href='/pinjam'">Data Peminjaman PC</button>
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

    <script>
        // document.addEventListener('DOMContentLoaded', () => {
        //     const currentPath = window.location.pathname;
        //     const pinjamPcButton = document.getElementById('pinjamPcButton');
        //     const dataPeminjamanButton = document.getElementById('dataPeminjamanButton');

        //     if (currentPath === '/pinjam/create') {
        //         pinjamPcButton.classList.add('active');
        //         dataPeminjamanButton.classList.remove('active');
        //     } else if (currentPath === '/pinjam') {
        //         dataPeminjamanButton.classList.add('active');
        //         pinjamPcButton.classList.remove('active');
        //     }
        // });


      
    document.addEventListener('DOMContentLoaded', (event) => {
        const tanggalPinjamInput = document.getElementById('tanggalPinjam');
        const today = new Date().toISOString().split('T')[0];
        
        tanggalPinjamInput.setAttribute('min', today);
        tanggalPinjamInput.setAttribute('max', today);
        tanggalPinjamInput.value = today;
    });

        
    </script>
</body>
</html>