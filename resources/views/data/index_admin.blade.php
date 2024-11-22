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
        }
        th, td {
            border: 1px solid #888;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #87CEEB;
            color: white;
        }
        td {
            background-color: #f9f9f9;
        }

        .filter-form {
            text-align: center;
            margin-bottom: 20px;
        }
        .filter-form input[type="date"],
        .filter-form select,
        .filter-form button {
            padding: 8px;
            margin: 5px;
            font-size: 16px;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: center;
            }
            .header-logo img {
                height: 30px;
            }
            .container {
                width: 100%;
                padding: 20px;
            }
            table, th, td {
                font-size: 14px;
                padding: 8px;
            }
        }

        @media (max-width: 480px) {
            .filter-form input[type="date"],
            .filter-form select,
            .filter-form button {
                font-size: 14px;
                padding: 6px;
            }
            th, td {
                padding: 6px;
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
        
        <label for="status">Status Konfirmasi:</label>
        <select id="status" name="status">
            <option value="">Semua</option>
            <option value="dipinjam" {{ request('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
            <option value="terkonfirmasi" {{ request('status') == 'terkonfirmasi' ? 'selected' : '' }}>Terkonfirmasi</option>
            <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
        </select>

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
                <td>{{ $pinjam->user->first_name }} {{ $pinjam->user->last_name }}</td>
                <td>{{ $pinjam->user->kelas }}</td>
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
    <div class="pagination-container">
        <ul class="pagination">
            {{$pinjams->links('pagination::bootstrap-4') }}
        </ul>
    </div>
</div>
</body>
</html>