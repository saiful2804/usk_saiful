@extends('layouts.app')


<!-- ======================================== -->
<!-- INI BUAT MENENTUKAN JUDUL HALAMAN -->
<!-- ======================================== -->

@section('title', 'Dashboard')


@section('content')


<!-- ======================================== -->
<!-- INI BUAT JUDUL DASHBOARD -->
<!-- ======================================== -->

<h2 class="mb-4">

    Dashboard

</h2>


<div class="row">


    <!-- ======================================== -->
    <!-- INI BUAT KARTU TOTAL PESERTA -->
    <!-- ======================================== -->

    <div class="col-md-6 mb-3">

        <div class="card shadow-sm">

            <div class="card-body">


                <!-- INI BUAT JUDUL KARTU -->

                <h5>

                    Total Peserta

                </h5>


                <!-- ======================================== -->
                <!-- INI BUAT MENAMPILKAN JUMLAH PESERTA -->
                <!-- ======================================== -->

                <h1>

                    {{ $totalPeserta }}

                </h1>


                <!-- ======================================== -->
                <!-- INI BUAT TOMBOL MENUJU DATA PESERTA -->
                <!-- ======================================== -->

                <a href="{{ route('peserta.index') }}"
                   class="btn btn-success">

                    Lihat Peserta

                </a>


            </div>

        </div>

    </div>



    <!-- ======================================== -->
    <!-- INI BUAT KARTU TOTAL SERTIFIKASI -->
    <!-- ======================================== -->

    <div class="col-md-6 mb-3">

        <div class="card shadow-sm">

            <div class="card-body">


                <!-- INI BUAT JUDUL KARTU -->

                <h5>

                    Total Sertifikasi

                </h5>


                <!-- ======================================== -->
                <!-- INI BUAT MENAMPILKAN JUMLAH SERTIFIKASI -->
                <!-- ======================================== -->

                <h1>

                    {{ $totalSkema }}

                </h1>


                <!-- ======================================== -->
                <!-- INI BUAT TOMBOL MENUJU DATA SKEMA -->
                <!-- ======================================== -->

                <a href="{{ route('skema.index') }}"
                   class="btn btn-success">

                    Lihat Sertifikasi

                </a>


            </div>

        </div>

    </div>


</div>


@endsection
