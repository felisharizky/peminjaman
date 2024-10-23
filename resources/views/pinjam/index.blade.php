<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam PC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            height: 100vh;
             background: linear-gradient(135deg, #800000, #ffffff);
            background-position: center; 
            background-repeat: no-repeat; 
            margin: 0;
            padding: 0;
        }
        .container {
            width: 95%;
            max-width: 800px;
            margin: 150px auto;
            background-color: rgba(255, 255, 255, 0.9); 
            padding: 50px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
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

        .header-logout {
            margin-left: auto;
            margin-right: 0;
        }

        .header-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
            flex-grow: 29;
            margin-right: 100px;
        }

        .header-buttons button {
            background-color: #7b1616;
            color: white;
            border: none;
            padding: 10px;
            margin-right: 10px;
            border-radius: 5px;
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
        .update-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        .update-button:hover {
            background-color: #0056b3; 
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
    <div class="header-logout">
        <button onclick="location.href='/login'">Logout</button>
    </div>
</div>

<div class="container">
    <h1>Data Peminjaman</h1>

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
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pinjams as $pinjam)
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
                    <td>
                        @if($pinjam->konfirmasi)
                            @if($pinjam->konfirmasi->status == 'terkonfirmasi')
                                Terkonfirmasi
                            @elseif($pinjam->konfirmasi->status == 'ditolak')
                                Ditolak
                            @else
                                Menunggu konfirmasi
                            @endif
                        @else
                            Dipinjam
                        @endif
                    </td>
                    <td>
                        @if(auth()->check() && auth()->user()->id == $pinjam->user_id && !($pinjam->konfirmasi && $pinjam->konfirmasi->status == 'terkonfirmasi'))
                        <form action="{{ route('pinjam.edit', $pinjam->id) }}" method="GET">
                            @csrf
                            <button type="submit" class="update-button">Update</button>
                        </form>          
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" style="text-align: center;">Tidak ada data peminjaman</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
</div>

</body>
</html