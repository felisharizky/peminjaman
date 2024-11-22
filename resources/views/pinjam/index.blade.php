    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pinjam PC</title>
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
                top: 0;
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
                bottom: -50px;
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
                background: radial-gradient(circle, #87CEEB 30%, transparent 70%);
                border-radius: 50%;
                z-index: -1;
            }

            .container {
                width: 90%;
                max-width: none;
                margin: 100px auto;
                background-color: rgba(255, 255, 255, 0.9);
                padding: 30px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                border-radius: 15px;
            }

            h1 {
                text-align: center;
                color: #87CEEB;
            }

            .header {
                background-color: #87CEEB;
                color: white;
                padding: 1px 2px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                position: fixed;
                top: 0;
                width: 100%;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                z-index: 1;
            }

            .header-logo {
                display: flex;
                align-items: center;
            }

            .header-logo img {
                height: 45px;
                margin-right: 10px;
            }

            .header-buttons {
                display: flex;
                gap: 0px;
                justify-content: center;
                flex-grow: 19;
                margin-right: 100px;
            }

            .header-buttons button {
                background-color: transparent;
                color: #fff;
                border: none;
                padding: 5px 8px;
                cursor: pointer;
                font-size: 18px;
                margin: 0 10px;
            }

            .header-buttons button.active {
                border-bottom: 3px solid white;
                font-weight: bold;
            }

            .logout-form button {
                background-color: transparent;
                color: #fff;
                border: none;
                padding: 5px 8px;
                cursor: pointer;
                font-size: 18px;
                margin: 0 10px;
            }

            .table-container {
                overflow-x: auto; 
                width: 100%;
            }

            table {
                width: 100%;
                min-width: 800px; 
                border-collapse: collapse;
                margin: 30px auto;
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

            @media (max-width: 768px) {
                .header-buttons {
                    flex-direction: column;
                    margin-right: 0;
                }

                .header-logo h2 {
                    font-size: 20px;
                }

                .header-buttons button {
                    margin: 5px 0;
                }
            }
        </style>
    </head>
    <body>

    <div class="header">
        <div class="header-logo">
            <img src="{{ asset('storage/images/logopinjam.png') }}" alt="TechLend Logo">
            <h2>TechLand</h2>
        </div>
        <div class="header-buttons">
            <button 
                onclick="location.href='/pinjam/create'" 
                class="{{ Request::is('pinjam/create') ? 'active' : '' }}">
                Pinjam PC
            </button>
            <button 
                onclick="location.href='/pinjam'" 
                class="{{ Request::is('pinjam') ? 'active' : '' }}">
                Data Peminjaman PC
            </button>
        </div>
        <div class="logout-form">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>

    <div class="container">
        <h1>Data Peminjaman</h1>

        <div class="table-container">
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
                                @if(auth()->check() && auth()->user()->id == $pinjam->user_id && 
                                    (!$pinjam->tanggalKembali && (!$pinjam->konfirmasi || $pinjam->konfirmasi->status == 'ditolak')) )
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
            <div class="pagination-container">
                <ul class="pagination">
                    {{$pinjams->links('pagination::bootstrap-4') }}
                </ul>
            </div>
        </div>
    </div>

    </body>
    </html>