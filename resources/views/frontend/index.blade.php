<!DOCTYPE html>
<html lang="id">

<head>
    <!-- INI BUAT PENGATURAN HALAMAN -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Aplikasi Sertifikasi</title>

    <!-- INI BUAT BOOTSTRAP -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body class="bg-light">

    <!-- INI BUAT NAVBAR -->
    <nav class="navbar navbar-dark bg-success">
        <div class="container">

            <a class="navbar-brand" href="{{ route('frontend') }}">
                Aplikasi Sertifikasi
            </a>

            <div>
                <a href="{{ route('login') }}"
                   class="btn btn-warning btn-sm">
                    Login Admin
                </a>
            </div>

        </div>
    </nav>

    <div class="container py-5">

        <!-- INI BUAT JUDUL -->
        <div class="text-center mb-5">
            <h2>
                Aplikasi Pengelolaan Data Peserta Sertifikasi
            </h2>

            <p class="text-muted">
                Sistem informasi untuk pengelolaan data peserta
                dan sertifikasi.
            </p>
        </div>

        <!-- INI BUAT JUMLAH DATA -->
        <div class="row justify-content-center mb-4">

            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body">

                        <h5>Total Peserta</h5>

                        <h2>{{ $totalPeserta }}</h2>

                        <p class="text-muted mb-0">
                            Peserta terdaftar
                        </p>

                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body">

                        <h5>Total Sertifikasi</h5>

                        <h2>{{ $totalSkema }}</h2>

                        <p class="text-muted mb-0">
                            Skema tersedia
                        </p>

                    </div>
                </div>
            </div>

        </div>

        <!-- INI BUAT PENCARIAN PESERTA -->
        <div class="card mb-5 shadow-sm">
            <div class="card-body">

                <h4>Cek Data Peserta</h4>

                <p class="text-muted">
                    Cari berdasarkan ID, nama, NIK, email,
                    atau nomor HP.
                </p>

                <form action="{{ route('frontend') }}" method="GET">

                    <div class="input-group">

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            value="{{ request('search') }}"
                            placeholder="ID, nama, NIK, email, atau no. HP">

                        <button
                            type="submit"
                            class="btn btn-success">
                            Cari
                        </button>

                    </div>

                </form>

            </div>
        </div>

        <!-- INI BUAT HASIL PENCARIAN -->
        @if(request('search'))

            <div class="card mb-5 shadow-sm">
                <div class="card-body">

                    <h4>Hasil Pencarian</h4>

                    @if($peserta)

                        <table class="table table-bordered mt-3">

                            <tr>
                                <th>ID</th>
                                <td>{{ $peserta->id }}</td>
                            </tr>

                            <tr>
                                <th>Nama</th>
                                <td>{{ $peserta->nama }}</td>
                            </tr>

                            <tr>
                                <th>NIK</th>
                                <td>{{ $peserta->nik }}</td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td>{{ $peserta->email }}</td>
                            </tr>

                            <tr>
                                <th>No. HP</th>
                                <td>{{ $peserta->no_hp }}</td>
                            </tr>

                            <tr>
                                <th>Setifikasi</th>
                                <td>
                                    {{ $peserta->skema?->nama_skema ?? '-' }}
                                </td>
                            </tr>

                        </table>

                    @else

                        <div class="alert alert-danger mt-3">
                            Data peserta tidak ditemukan.
                        </div>

                    @endif

                </div>
            </div>

        @endif

        <!-- INI BUAT DATA PESERTA -->
        <h4 class="mb-3">
            Data Peserta Sertifikasi
        </h4>

        <div class="table-responsive mb-5">

            <table class="table table-bordered bg-white shadow-sm">

                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Sertifikasi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($pesertas as $index => $pesertaItem)

                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pesertaItem->nama }}</td>
                            <td>{{ $pesertaItem->nik }}</td>
                            <td>{{ $pesertaItem->email }}</td>
                            <td>{{ $pesertaItem->no_hp }}</td>

                            <td>
                                {{ $pesertaItem->skema?->nama_skema ?? '-' }}
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center">
                                Belum ada data peserta.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <!-- INI BUAT DATA SKEMA -->
        <h4 class="mb-3">
            Sertifikasi
        </h4>

        <div class="table-responsive">

            <table class="table table-bordered bg-white shadow-sm">

                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Sertifikasi</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($skemas as $index => $skema)

                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $skema->kode_skema }}</td>
                            <td>{{ $skema->nama_skema }}</td>
                            <td>{{ $skema->deskripsi ?? '-' }}</td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="text-center">
                                Belum ada data skema.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <!-- INI BUAT FOOTER -->
    <footer class="text-center py-3 bg-white">
        <small class="text-muted">
            Aplikasi Pengelolaan Data Peserta Sertifikasi
        </small>
    </footer>

</body>
</html>