<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pengembalian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: radial-gradient(circle, #800000 0%, #ffffff 100%);
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
    
        .header {
            background-color: #7b1616;
            color: white;
            padding: 2px 2px;
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
            width: 90%; 
            max-width: none;
            margin: 120px auto; 
            background-color: rgba(255, 255, 255, 0.9); 
            padding: 30px; 
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }
        h1 {
            text-align: center;
            color: #7b1616;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }
        th, td {
            border: 1px solid #888; 
            padding: 12px;  
            text-align: left;
        }
        th {
            background-color: #7b1616; 
            color: white; 
        }
        td {
            background-color: #f9f9f9; 
            color: #000; 
            height: 20px; 
        }
        td a {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        td a:hover {
            background-color: #0056b3; 
            transform: scale(1.05); 
        }
        td a:active {
            background-color: #004494;
            transform: scale(0.95); 
        }
    </style>
</head>
<body>

<div class="header">
    <div class="header-logo">
        <img src="{{ asset('storage/images/logopinjam.png') }}" alt="TechLand Logo">
        <h2>TechLand</h2>
    </div>
    <a href="{{ route('pinjam.index_admin') }}" class="back-btn">Back</a>
</div>

<div class="container">
    <h1>Konfirmasi PC</h1>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kelas</th>
                <th>PC</th>
                <th>Kelengkapan</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($konfirmasis as $konfirmasi)
                <tr>
                    <td>{{ $konfirmasi->pinjam->nama }}</td>
                    <td>{{ $konfirmasi->pinjam->kelas }}</td>
                    <td>{{ $konfirmasi->pinjam->pc->nama }}</td>
                    <td>
                        @if($konfirmasi->pinjam->kelengkapan)
                            {{ implode(', ', array_filter(json_decode($konfirmasi->pinjam->kelengkapan, true))) }} 
                        @else
                            Tidak ada kelengkapan
                        @endif
                    </td>
                    <td>{{ $konfirmasi->pinjam->tanggalPinjam }}</td>
                    <td>{{ $konfirmasi->tanggalKembali ?? 'Belum Dikembalikan' }}</td>
                    <td>{{ $konfirmasi->status }}</td>
                    <td>
                        <form action="{{ route('konfirmasi.update', $konfirmasi->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Konfirmasi</button>
                        </form>
                        <form action="{{ route('konfirmasi.tolak', $konfirmasi->id) }}" method="POST" style="margin-top: 10px;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger">Tolak</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>