@extends('layouts.app')

@section('title', 'Edit Peserta')

@section('content')

<h2 class="mb-4">
    Edit Peserta
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
            action="{{ route('peserta.update', $peserta->id) }}"
            method="POST">

            @csrf
            @method('PUT')


            <div class="mb-3">

                <label class="form-label">
                    Nama Peserta
                </label>

                <input
                    type="text"
                    name="nama"
                    class="form-control"
                    value="{{ old('nama', $peserta->nama) }}">

            </div>


            <div class="mb-3">

                <label class="form-label">
                    NIK
                </label>

                <input
                    type="text"
                    name="nik"
                    class="form-control"
                    value="{{ old('nik', $peserta->nik) }}">

            </div>


            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $peserta->email) }}">

            </div>


            <div class="mb-3">

                <label class="form-label">
                    No. HP
                </label>

                <input
                    type="text"
                    name="no_hp"
                    class="form-control"
                    value="{{ old('no_hp', $peserta->no_hp) }}">

            </div>


            <div class="mb-3">

                <label class="form-label">
                    Alamat
                </label>

                <textarea
                    name="alamat"
                    class="form-control"
                    rows="3">{{ old('alamat', $peserta->alamat) }}</textarea>

            </div>


            <div class="mb-3">

                <label class="form-label">
                    Skema Sertifikasi
                </label>

                <select
                    name="skema_id"
                    class="form-select">

                    @foreach($skemas as $skema)

                        <option
                            value="{{ $skema->id }}"
                            {{ old('skema_id', $peserta->skema_id) == $skema->id ? 'selected' : '' }}>

                            {{ $skema->kode_skema }}
                            -
                            {{ $skema->nama_skema }}

                        </option>

                    @endforeach

                </select>

            </div>


            <button class="btn btn-success">
                Update
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