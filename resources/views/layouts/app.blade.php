<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">


    <!-- INI BUAT JUDUL HALAMAN -->

    <title>

        @yield('title', 'Sertifikasi')

    </title>


    <!-- ======================================== -->
    <!-- INI BUAT MEMANGGIL BOOTSTRAP -->
    <!-- ======================================== -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>


<body class="bg-light">


<!-- ======================================== -->
<!-- INI BUAT NAVBAR / MENU ADMIN -->
<!-- ======================================== -->

<nav class="navbar navbar-dark bg-success">

    <div class="container">


        <!-- ======================================== -->
        <!-- INI BUAT NAMA APLIKASI -->
        <!-- ======================================== -->

        <a class="navbar-brand"
           href="{{ route('dashboard') }}">

            Sertifikasi

        </a>


        <!-- ======================================== -->
        <!-- INI BUAT MEMASTIKAN USER SUDAH LOGIN -->
        <!-- ======================================== -->

        @auth

            <div class="d-flex align-items-center gap-3">


                <!-- ======================================== -->
                <!-- INI BUAT MENU DASHBOARD -->
                <!-- ======================================== -->

                <a href="{{ route('dashboard') }}"
                   class="text-white text-decoration-none">

                    Dashboard

                </a>


                <!-- ======================================== -->
                <!-- INI BUAT MENU DATA PESERTA -->
                <!-- ======================================== -->

                <a href="{{ route('peserta.index') }}"
                   class="text-white text-decoration-none">

                    Peserta

                </a>


                <!-- ======================================== -->
                <!-- INI BUAT MENU DATA SKEMA -->
                <!-- ======================================== -->

                <a href="{{ route('skema.index') }}"
                   class="text-white text-decoration-none">

                    Sertifikasi

                </a>


                <!-- ======================================== -->
                <!-- INI BUAT FORM LOGOUT -->
                <!-- ======================================== -->

                <form action="{{ route('logout') }}"
                      method="POST">

                    <!-- INI BUAT KEAMANAN FORM -->

                    @csrf


                    <!-- INI BUAT TOMBOL LOGOUT -->

                    <button class="btn btn-danger mt-8">

                        Logout

                    </button>

                </form>


            </div>

        @endauth

    </div>

</nav>



<!-- ======================================== -->
<!-- INI BUAT BAGIAN UTAMA HALAMAN -->
<!-- ======================================== -->

<div class="container py-4">


    <!-- ======================================== -->
    <!-- INI BUAT MENAMPILKAN PESAN BERHASIL -->
    <!-- ======================================== -->

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif



    <!-- ======================================== -->
    <!-- INI BUAT MENAMPILKAN PESAN ERROR -->
    <!-- ======================================== -->

    @if(session('error'))

        <div class="alert alert-danger">

            {{ session('error') }}

        </div>

    @endif



    <!-- ======================================== -->
    <!-- INI BUAT MENAMPILKAN ISI HALAMAN -->
    <!-- ======================================== -->

    @yield('content')


</div>


</body>

</html>

