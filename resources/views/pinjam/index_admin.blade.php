<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman PC</title>
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
            margin: 150px auto; 
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
            background-color: #7b1616; /* Ubah warna dasar tombol */
            color: white;
            padding: 5px 10px; /* Tambah padding agar tombol lebih besar */
            border-radius: 8px; /* Lebih melengkung */
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease; /* Tambahkan transisi pada box-shadow */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Efek bayangan */
        }

        td a:hover {
            background-color: #5a0f0f; /* Warna tombol saat hover */
            transform: translateY(-4px); /* Efek tombol terangkat */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Bayangan lebih besar saat hover */
        }

        td a:active {
            background-color: #4a0d0d; /* Warna tombol saat di-klik */
            transform: translateY(0); /* Kembali ke posisi normal */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Kembali ke bayangan normal */
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
            @foreach($pinjams as $pinjam)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pinjam->nama }}</td>
                <td>{{ $pinjam->kelas }}</td>
                <td>{{ $pinjam->pc->nama }}</td>
                <td>
                    @if($pinjam->kelengkapan)
                        {{ implode(', ', array_filter(json_decode($pinjam->kelengkapan, true))) }} <!-- Menampilkan kelengkapan sebagai string -->
                    @else
                        Tidak ada kelengkapan
                    @endif
                </td>
                <td>{{ $pinjam->tanggalPinjam }}</td>
                <td>{{ $pinjam->tanggalKembali ?? 'Belum Dikembalikan' }}</td> 
                <td>{{ $pinjam->konfirmasi ? $pinjam->konfirmasi->status : 'dipinjam' }}</td>
                <td>
                    @if($pinjam->konfirmasi && $pinjam->konfirmasi->status == 'pending')
                        <a href="{{ route('admin.konfirmasi.index') }}" class="btn btn-primary">Pengembalian</a>
                    @elseif($pinjam->konfirmasi && $pinjam->konfirmasi->status == 'dipinjam')
                        <a href="{{ route('admin.konfirmasi.index') }}" class="btn btn-primary">Pengembalian</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>