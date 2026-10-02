@extends('layouts.app')

@section('title', 'Data Skema')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Data Sertifikasi</h2>

    <a href="{{ route('skema.create') }}"
       class="btn btn-success">
        + Tambah Sertifikasi
    </a>

</div>

<div class="card shadow-sm">

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Sertifikasi</th>
                    <th>Nama Sertifikasi</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($skemas as $skema)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $skema->kode_skema }}
                        </td>

                        <td>
                            {{ $skema->nama_skema }}
                        </td>

                        <td>
                            {{ $skema->deskripsi ?? '-' }}
                        </td>

                        <td>

                            <a
                                href="{{ route('skema.edit', $skema->id) }}"
                                class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form
                                action="{{ route('skema.destroy', $skema->id) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Yakin ingin menghapus skema ini?')"
                                    class="btn btn-danger btn-sm">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5"
                            class="text-center">

                            Belum ada data sertifikasi.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection