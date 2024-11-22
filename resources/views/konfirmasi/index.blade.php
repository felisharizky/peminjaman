<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pengembalian</title>
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
            background: radial-gradient(circle, rgba(144, 211, 255, 0.6) 30%, transparent 70%);
            border-radius: 50%;
            z-index: -1;
        }

        .header {
            background-color: #87CEEB;
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
            background-color: #87CEEB;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }
        .back-btn:hover {
            background-color: #93DBFD;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 120px auto;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }

        h1 {
            text-align: center;
            color: #87CEEB;
        }

        .table-container {
            overflow-x: auto;
            display: flex;
            justify-content: center;
            width: 100%;
        }

        table {
            width: 100%;
            max-width: 100%;
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
            color: #000;
            height: 20px;
            white-space: nowrap;
        }

        td:first-child {
            min-width: 80px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .btn-success {
            background-color: #32a852;
        }

        .btn-success:hover {
            background-color: #29a04e;
        }

        .btn-danger {
            background-color: #d9534f;
        }

        .btn-danger:hover {
            background-color: #c9302c;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
                width: 95%;
            }

            table, th, td {
                font-size: 14px;
                padding: 8px;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.2em;
            }

            .header-logo img {
                height: 30px;
            }

            table, th, td {
                font-size: 12px;
                padding: 6px;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="header">
    <div class="header-logo">
        <img src="{{ asset('storage/images/logopinjam.png') }}" alt="TechLand Logo">
        <h2>TechLand</h2>
    </div>
    <a href="{{ route('dashboard.index') }}" class="back-btn">Back</a>
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
                @if($konfirmasis->isEmpty())
                    <tr>
                        <td colspan="8" style="text-align: center; color: red;">Tidak ada data pengembalian untuk dikonfirmasi</td>
                    </tr>
                @else
                    @foreach($konfirmasis as $konfirmasi)
                        <tr>
                            <td>{{ $konfirmasi->pinjam->user->first_name }} {{ $konfirmasi->pinjam->user->last_name }}</td>
                            <td>{{ $konfirmasi->pinjam->user->kelas }}</td>
                            
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
                                <form action="{{ route('konfirmasi.update', $konfirmasi->id) }}" method="POST" onsubmit="confirmAction(event, this, 'Apakah Anda yakin ingin mengonfirmasi peminjaman ini?')">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">Konfirmasi</button>
                                </form>
                                <form action="{{ route('konfirmasi.tolak', $konfirmasi->id) }}" method="POST" style="margin-top: 10px;" onsubmit="confirmAction(event, this, 'Apakah Anda yakin ingin menolak peminjaman ini?')">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger">Tolak</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="pagination-container">
            <ul class="pagination">
                {{$konfirmasis->links('pagination::bootstrap-4') }}
            </ul>
        </div>
    </div>
</div>

<script>
    function confirmAction(event, form, message) {
        event.preventDefault();
        Swal.fire({
            title: 'Konfirmasi',
            text: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, lanjutkan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); 
            }
        });
    }
</script>
</body>
</html>