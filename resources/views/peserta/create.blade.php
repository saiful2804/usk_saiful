@extends('layouts.app')

@section('title', 'Tambah Peserta')

@section('content')

<h2 class="mb-4">
    Tambah Peserta
</h2>

<div class="card shadow-sm">

    <div class="card-body">

        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif

        <form
            action="{{ route('peserta.store') }}"
            method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Nama Peserta
                </label>

                <input
                    type="text"
                    name="nama"
                    class="form-control"
                    value="{{ old('nama') }}"
                    placeholder="Masukkan nama lengkap">

            </div>


            <div class="mb-3">

                <label class="form-label">
                    NIK
                </label>

                <input
                    type="text"
                    name="nik"
                    class="form-control"
                    value="{{ old('nik') }}"
                    placeholder="Masukkan NIK">

            </div>


            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email">

            </div>


            <div class="mb-3">

                <label class="form-label">
                    No. HP
                </label>

                <input
                    type="text"
                    name="no_hp"
                    class="form-control"
                    value="{{ old('no_hp') }}"
                    placeholder="Masukkan nomor HP">

            </div>


            <div class="mb-3">

                <label class="form-label">
                    Alamat
                </label>

                <textarea
                    name="alamat"
                    class="form-control"
                    rows="3"
                    placeholder="Masukkan alamat">{{ old('alamat') }}</textarea>

            </div>


            <div class="mb-3">

                <label class="form-label">
                    Skema Sertifikasi
                </label>

                <select
                    name="skema_id"
                    class="form-select">

                    <option value="">
                        -- Pilih Skema --
                    </option>

                    @foreach($skemas as $skema)

                        <option
                            value="{{ $skema->id }}"
                            {{ old('skema_id') == $skema->id ? 'selected' : '' }}>

                            {{ $skema->kode_skema }}
                            -
                            {{ $skema->nama_skema }}

                        </option>

                    @endforeach

                </select>

            </div>


            <button class="btn btn-success">
                Simpan
            </button>

            <a
                href="{{ route('peserta.index') }}"
                class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection