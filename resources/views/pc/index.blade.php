<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar PC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: radial-gradient(circle, #800000 0%, #ffffff 100%);
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

        /* Header */
        .header {
            background-color: #7b1616;
            color: white;
            padding: 2px 2px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed; /* Menambahkan properti fixed */
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000; /* Agar header tetap di atas elemen lain */
        }

        .header-logo {
            display: flex;
            align-items: center;
        }

        .header-logo img {
            height: 40px;
            margin-right: 10px;
        }

        /* Tombol Back dipindahkan ke header */
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
            max-width: 1000px;
            margin: 120px auto; /* Mengatur margin-top agar konten tidak tertutup header */
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
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
            background-color: #7b1616;
            color: white;
        }
        .btn {
            padding: 5px 10px;
            background-color: #ff4d4d;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #e60000;
        }
        .edit-btn {
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .edit-btn:hover {
            background-color: #0056b3;
        }
        .add-btn {
            margin-bottom: 20px;
            display: block;
            width: 150px;
            text-align: center;
            padding: 10px;
            background-color: #7b1616;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }
        .add-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<!-- Header dengan tombol back -->
<div class="header">
    <div class="header-logo">
        <img src="{{ asset('storage/images/logopinjam.png') }}" alt="TechLend Logo">
        <h2>TechLend</h2>
    </div>
    <a href="{{ route('dashboard.index') }}" class="back-btn">Back</a>
</div>

<div class="container">
    <h2>Daftar PC</h2>
    
    <a href="{{ route('pc.create') }}" class="add-btn">Tambah PC</a>
    
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
                <td>{{ $loop->iteration }}</td> <!-- Menggunakan loop iteration untuk ID berurutan -->
                <td>{{ $pc->nama }}</td>
                <td>{{ $pc->available ? 'Tersedia' : 'Tidak Tersedia' }}</td>
                <td>
                    <!-- Button Edit -->
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
</div>

</body>
</html>