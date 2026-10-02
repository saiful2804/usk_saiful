@extends('layouts.app')

@section('title', 'Detail Peserta')

@section('content')

<h2 class="mb-4">
    Detail Peserta
</h2>

<div class="card shadow-sm">

    <div class="card-body">

        <table class="table">

            <tr>
                <th width="200">Nama</th>
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
                <th>Alamat</th>
                <td>{{ $peserta->alamat }}</td>
            </tr>

            <tr>
                <th>Kode Skema sertifikasi</th>
                <td>
                    {{ $peserta->skema?->kode_skema ?? '-' }}
                </td>
            </tr>

            <tr>
                <th>Nama Skema sertifikasi</th>
                <td>
                    {{ $peserta->skema?->nama_skema ?? '-' }}
                </td>
            </tr>

        </table>

        <a href="{{ route('peserta.edit', $peserta->id) }}"
           class="btn btn-warning">
            Edit
        </a>

        <a
            href="{{ route('peserta.index') }}"
            class="btn btn-secondary">
            Kembali
        </a>

    </div>

</div>

@endsection