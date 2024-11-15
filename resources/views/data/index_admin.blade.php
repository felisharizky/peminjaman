<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman PC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: radial-gradient(circle, #87CEEB 0%, #ffffff 100%);
            margin: 0;
            padding: 0;
        }

        body::before, body::after, .extra-element {
            content: '';
            position: absolute; 
            border-radius: 50%;
            z-index: -1;
        }
        body::before {
            top: -100px; right: -150px;
            width: 800px; height: 800px;
            background: linear-gradient(135deg, #87CEEB 30%, #ffffff 70%);
        }
        body::after {
            bottom: -100px; left: -150px;
            width: 600px; height: 600px;
            background: linear-gradient(135deg, #87CEEB 30%, #ffffff 70%);
        }
        .extra-element {
            top: -50px; left: -100px;
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(128,0,0,0.6) 30%, transparent 70%);
        }
        
        .header {
            background-color: #87CEEB;
            color: white;
            padding: 2px 2px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0; left: 0; right: 0;
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
            background-color: #87CEEB;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }
        .back-btn:hover {
            background-color: #5cb3e6;
        }

        .container {
            width: 90%;
            margin: 150px auto;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            overflow-x: auto;
        }
        h1 {
            text-align: center;
            color: #87CEEB;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            min-width: 800px;
            table-layout: auto; 
            margin: 0 auto;
        }
        th, td {
            border: 1px solid #888;
            padding: 12px;
            text-align: left;
            white-space: nowrap; 
            word-wrap: break-word; 
        }
        th {
            background-color: #87CEEB;
            color: white;
        }
        td {
            background-color: #f9f9f9;
            color: #000;
            height: 20px;
        }

        .filter-form {
            text-align: center;
            margin-bottom: 20px;
        }
        .filter-form input[type="date"],
        .filter-form button {
            padding: 8px;
            margin: 5px;
            font-size: 16px;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }
            .header-logo h2 {
                font-size: 18px;
            }
            .container {
                width: 100%;
                margin-top: 100px;
                padding: 20px;
            }
            table, th, td {
                font-size: 14px;
                padding: 8px;
            }
            .header-logo img {
                height: 30px;
            }
        }

        @media (max-width: 480px) {
            th, td {
                padding: 6px;
            }
            .filter-form input[type="date"],
            .filter-form button {
                font-size: 14px;
                padding: 6px;
            }
            table {
                min-width: 100%;
                overflow-x: scroll; 
            }
        }
    </style>
</head>
<body>

<div class="header">
    <div class="header-logo">
        <img src="{{ asset('storage/images/logopinjam.png') }}" alt="TechLend Logo">
        <h2>TechLend</h2>
    </div>
    <a href="{{ route('dashboard.index') }}" class="back-btn">Back</a>
</div>

<div class="container">
    <h1>Data Peminjaman</h1>

    <form method="GET" action="{{ route('data.index_admin') }}" class="filter-form">
        <label for="start_date">Dari Tanggal:</label>
        <input type="date" id="start_date" name="start_date" value="{{ request('start_date') }}">
        <label for="end_date">Sampai Tanggal:</label>
        <input type="date" id="end_date" name="end_date" value="{{ request('end_date') }}">
        <button type="submit" class="back-btn">Filter</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>PC</th>
                <th>Kelengkapan</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status Konfirmasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pinjams as $pinjam)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pinjam->nama }}</td>
                <td>{{ $pinjam->kelas }}</td>
                <td>{{ $pinjam->pc->nama }}</td>
                <td>
                    @if($pinjam->kelengkapan)
                        {{ implode(', ', array_filter(json_decode($pinjam->kelengkapan, true))) }}
                    @else
                        Tidak ada kelengkapan
                    @endif
                </td>
                <td>{{ $pinjam->tanggalPinjam }}</td>
                <td>{{ $pinjam->tanggalKembali ?? 'Belum Dikembalikan' }}</td>
                <td>{{ $pinjam->konfirmasi ? $pinjam->konfirmasi->status : 'dipinjam' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>