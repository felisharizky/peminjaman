<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar PC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: radial-gradient(circle, #87CEEB 0%, #ffffff 100%);
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

        /* Header */
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

        .container {
            max-width: 1000px;
            margin: 120px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        .filter-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .filter-container select {
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #87CEEB;
            color: white;
        }

        /* Tombol Update (warna biru muda) */
        .edit-btn {
            padding: 5px 10px;
            background-color: #14a7e0;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .edit-btn:hover {
            background-color: #5aaed7;
        }

        .edit-btn:active {
            background-color: #4a9dbb;
        }

        /* Tombol Delete (warna merah) */
        .btn {
            padding: 5px 10px;
            background-color: #e60000;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #d60000;
        }

        .btn:active {
            background-color: #b50000;
        }

        .add-btn {
            margin-bottom: 20px;
            display: block;
            width: 150px;
            text-align: center;
            padding: 10px;
            background-color: #14a7e0;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }

        .add-btn:hover {
            background-color: #87CEEB;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            width: 100%;
        }

        .pagination {
            display: flex;
            list-style-type: none;
            padding: 0;
            gap: 10px;
        }

        .pagination li {
            display: inline-block;
        }

        .pagination a,
        .pagination span {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            color: #007bff;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-weight: bold;
        }

        .pagination a:hover,
        .pagination a:focus {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .pagination .active span {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
            font-weight: bold;
            cursor: default;
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
    <h2>Daftar PC</h2>

    <!-- Filter dan Tambah PC -->
    <div class="filter-container">
        <a href="{{ route('pc.create') }}" class="add-btn">Tambah PC</a>
        <form action="{{ route('pc.index') }}" method="GET">
            <select name="status" onchange="this.form.submit()">
                <option value="">Semua</option>
                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Tersedia</option>
                <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Tidak Tersedia</option>
            </select>
        </form>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama PC</th>
                <th>Ketersediaan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pcs as $index => $pc)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pc->nama }}</td>
                <td>{{ $pc->available ? 'Tersedia' : 'Tidak Tersedia' }}</td>
                <td>
                    <!-- Button Update -->
                    <a href="{{ route('pc.edit', $pc->id) }}" class="edit-btn">Update</a>
                    <!-- Button Hapus -->
                    <form action="{{ route('pc.destroy', $pc->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Pagination di dalam container -->
    <div class="pagination-container">
        <ul class="pagination">
            {{ $pcs->links('pagination::bootstrap-4') }}
        </ul>
    </div>
</div>

</body>
</html>