<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tanggal Kembali</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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
        input {
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
    </style>
</head>
<body> 



<div class="container">
    <h1>Edit Tanggal Kembali</h1>
            <form action="{{ route('konfirmasi.store', ['pinjam_id' => $pinjam->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="pinjam_id" value="{{ $pinjam->id }}">
            <label for="tanggalKembali">Tanggal Kembali</label>
            <input type="date" id="tanggalKembali" name="tanggal_kembali" value="{{ old('tanggal_kembali', $pinjam->tanggal_kembali) }}" required>
        <button type="submit">Update</button>
    </form>
</div>
</body>
</html>
