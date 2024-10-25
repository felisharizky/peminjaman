<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechLand</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background: linear-gradient(to bottom, #E0F7FA, #B2EBF2); /* Mengubah kombinasi warna menjadi lebih cerah */
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            border-radius: 10px;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
            flex-direction: column;
        }

        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 50%;
            background-color: #90C8E8;
            z-index: 0;
            border-radius: 10px 10px 0 0; /* Tumpul di bagian atas */
        }

        .welcome-container {
            display: flex;
            flex-direction: row;
            align-items: center;
            text-align: left;
            background-color: #FFFFFF; /* Latar belakang putih */
            max-width: 1200px;
            width: 100%;
            min-height: 700px;
            padding: 90px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            z-index: 10;
            animation: slideUp 1s ease-out forwards;
            position: relative;
            border-radius: 20px; /* Sudut tumpul */
            overflow: hidden; /* Agar elemen latar belakang tidak keluar dari container */
        }

        .background-decoration {
            position: absolute; /* Elemen latar belakang di dalam container */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: radial-gradient(circle, rgba(173, 216, 230, 0.3) 0%, rgba(135, 206, 235, 0.3) 100%);
            z-index: -1; /* Menempatkan di belakang konten lainnya */
            border-radius: 20px; /* Sudut tumpul yang sama dengan container */
        }

        .welcome-content {
            flex: 1; /* Mengambil ruang di sebelah kiri */
            display: flex;
            flex-direction: column;
            justify-content: center; /* Menempatkan konten di tengah secara vertikal */
            align-items: center; /* Rata tengah secara horizontal */
            padding-right: 30px; /* Menambahkan padding kanan untuk menjauhkan konten dari gambar */
            text-align: center; /* Rata tengah untuk teks */
        }

        .slogan {
            margin: 0; /* Menghilangkan margin untuk menjaga posisi */
            font-size: 22px;
            color: #555;
            margin-bottom: 40px;
        }

        .image-container {
            flex: 1; /* Mengambil ruang di sebelah kanan */
            display: flex;
            justify-content: center;
            align-items: center;
            padding-left: 20px; /* Menambahkan padding kiri untuk menjauhkan gambar dari konten */
        }

        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px; /* Mengurangi jarak antar logo */
            position: absolute; /* Mengatur posisi logo */
            top: 20px; /* Jarak dari atas halaman */
            right: 20px; /* Jarak dari kanan halaman */
            z-index: 10;
        }

        .logo-container img {
            width: 70px; /* Memperkecil ukuran logo */
            height: auto;
            border-radius: 10px; /* Menghaluskan sudut logo */
            filter: drop-shadow(2px 4px 6px rgba(0, 0, 0, 0.3));
            transition: transform 0.3s ease;
        }

        .logo-container img:hover {
            transform: scale(1.1);
        }

        .welcome-container h1 {
            font-family: 'Pacifico', cursive;
            font-size: 42px;
            color: #007BFF;
            margin-bottom: 25px;
            animation: textGlow 1s infinite alternate, textMove 1.5s infinite alternate; /* Tambahkan animasi untuk glow dan bergerak */
        }

        .custom-title {
            font-size: 50px;
            text-align: center;
            line-height: 1.2;
        }

        .welcome-container p {
            font-family: 'Arial', sans-serif;
            font-size: 22px;
            color: #555;
            margin-bottom: 40px;
            max-width: 800px;
            line-height: 1.5;
        }

        .btn-container {
            display: flex;
            flex-direction: row;
            gap: 30px;
            justify-content: center; /* Rata tengah untuk tombol */
            text-align: center; /* Rata tengah untuk teks */
            margin-top: 20px;
        }

        .btn {
            background: linear-gradient(135deg, #007BFF, #0056b3);
            color: white;
            padding: 18px 60px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .btn:hover {
            background-color: #0056b3;
            transform: scale(1.1);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        }

        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes textGlow {
            0% { text-shadow: 0 0 5px rgba(0, 123, 255, 0.8), 0 0 10px rgba(0, 123, 255, 0.8), 0 0 15px rgba(0, 123, 255, 0.8); }
            100% { text-shadow: 0 0 10px rgba(0, 162, 255, 1), 0 0 20px rgba(0, 162, 255, 1), 0 0 30px rgba(0, 162, 255, 1); }
        }

        @keyframes textMove {
            0% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
            100% { transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .welcome-container {
                flex-direction: column;
                padding: 30px;
            }
            .logo-container {
                flex-direction: column;
                gap: 10px;
            }
            .welcome-container h1 {
                font-size: 36px;
            }
            .welcome-container p {
                font-size: 18px;
            }
            .image-container img {
                max-width: 250%;
                height: auto;
            }
            .btn {
                font-size: 18px;
                padding: 15px 30px;
            }
        }

        .image-container img {
            max-width: 100%; /* Mengatur gambar agar tidak melebihi lebar container */
            height: auto;
            border-radius: 20px; /* Sudut tumpul pada gambar */
        }
    </style>
</head>
<body>
    <div class="wave"></div>
    <div class="logo-container">
        <img src="{{ asset('storage/images/LogoPPLG.png') }}" alt="Logo PPLG">
        <img src="{{ asset('storage/images/logopinjam.png') }}" alt="Logo Pinjam">
        <img src="{{ asset('storage/images/LogoNeskar.png') }}" alt="Logo Neskar">
    </div>
    <div class="welcome-container">
        <div class="background-decoration"></div> <!-- Elemen latar belakang -->
        <div class="welcome-content">
            <h1 class="custom-title">
                Welcome to the <br> TechLand Website
            </h1>
            <p class="slogan">Adaptive, Creative, Innovative</p> <!-- Menambahkan kelas slogan -->
            <div class="btn-container">
                <a href="/register/create" class="btn">REGISTER</a>
                <a href="/login" class="btn">LOGIN</a>
            </div>
        </div>
        <div class="image-container">
            <img src="{{ asset('storage/images/register.png') }}" alt="Home Image">
        </div>
    </div>
</body>
</html>