@extends('layouts.app')

<!-- INI BUAT MENENTUKAN JUDUL HALAMAN -->

@section('title', 'Edit Sertifikasi')


@section('content')

<!-- INI BUAT JUDUL HALAMAN -->

<h2 class="mb-4">

    Edit Sertifikasi

</h2>



<!-- ======================================== -->
<!-- INI BUAT CARD FORM EDIT SKEMA -->
<!-- ======================================== -->

<div class="card">

    <div class="card-body">


        <!-- ======================================== -->
        <!-- INI BUAT MENAMPILKAN PESAN VALIDASI ERROR -->
        <!-- ======================================== -->

        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">


                    <!-- ======================================== -->
                    <!-- INI BUAT PERULANGAN MENAMPILKAN ERROR -->
                    <!-- ======================================== -->

                    @foreach($errors->all() as $error)

                        <li>

                            {{ $error }}

                        </li>

                    @endforeach

                </ul>

            </div>

        @endif



        <!-- ======================================== -->
        <!-- INI BUAT FORM EDIT SKEMA -->
        <!-- ======================================== -->

        <form
            action="{{ route('skema.update', $skema->id) }}"
            method="POST">


            <!-- ======================================== -->
            <!-- INI BUAT KEAMANAN FORM -->
            <!-- ======================================== -->

            @csrf


            <!-- ======================================== -->
            <!-- INI BUAT MENGUBAH METHOD POST MENJADI PUT -->
            <!-- ======================================== -->

            @method('PUT')



            <!-- ======================================== -->
            <!-- INI BUAT INPUT KODE SKEMA -->
            <!-- ======================================== -->

            <div class="mb-3">

                <label class="form-label">

                    Kode Sertifikasi

                </label>


                <input
                    type="text"
                    name="kode_skema"
                    class="form-control"
                    value="{{ old('kode_skema', $skema->kode_skema) }}">

            </div>



            <!-- ======================================== -->
            <!-- INI BUAT INPUT NAMA SKEMA -->
            <!-- ======================================== -->

            <div class="mb-3">

                <label class="form-label">

                    Nama Sertifikasi

                </label>


                <input
                    type="text"
                    name="nama_skema"
                    class="form-control"
                    value="{{ old('nama_skema', $skema->nama_skema) }}">

            </div>



            <!-- ======================================== -->
            <!-- INI BUAT INPUT DESKRIPSI -->
            <!-- ======================================== -->

            <div class="mb-3">

                <label class="form-label">

                    Deskripsi

                </label>


                <textarea
                    name="deskripsi"
                    class="form-control"
                    rows="4">{{ old('deskripsi', $skema->deskripsi) }}</textarea>

            </div>



            <!-- ======================================== -->
            <!-- INI BUAT TOMBOL UPDATE -->
            <!-- ======================================== -->

            <button class="btn btn-success">

                Update

            </button>



            <!-- ======================================== -->
            <!-- INI BUAT TOMBOL KEMBALI -->
            <!-- ======================================== -->

            <a
                href="{{ route('skema.index') }}"
                class="btn btn-secondary">

                Kembali

            </a>


        </form>

    </div>

</div>


@endsection