@extends('layouts.app')

@section('title', 'Data Peserta')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Data Peserta</h2>

    <a href="{{ route('peserta.create') }}"
       class="btn btn-success">
        + Tambah Peserta
    </a>

</div>

<div class="card shadow-sm">

    <div class="card-body">

        {{-- SEARCH --}}
        <form action="{{ route('peserta.index') }}"
              method="GET"
              class="mb-4">

            <div class="input-group">

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari nama, NIK, atau email..."
                    value="{{ request('search') }}">

                <button class="btn btn-success">
                    Cari
                </button>

                @if(request('search'))
                    <a href="{{ route('peserta.index') }}"
                       class="btn btn-secondary">
                        Reset
                    </a>
                @endif

            </div>

        </form>


        {{-- TABLE --}}
        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Sertifikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($pesertas as $peserta)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $peserta->nama }}
                            </td>

                            <td>
                                {{ $peserta->nik }}
                            </td>

                            <td>
                                {{ $peserta->email }}
                            </td>

                            <td>
                                {{ $peserta->no_hp }}
                            </td>

                            <td>
                                {{ $peserta->skema->nama_skema }}
                            </td>

                            <td>

                                <a
                                    href="{{ route('peserta.show', $peserta->id) }}"
                                    class="btn btn-success btn-sm">
                                    Detail
                                </a>

                                <a
                                    href="{{ route('peserta.edit', $peserta->id) }}"
                                    class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form
                                    action="{{ route('peserta.destroy', $peserta->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        onclick="return confirm('Yakin ingin menghapus peserta ini?')"
                                        class="btn btn-danger btn-sm">

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7"
                                class="text-center">

                                Belum ada data peserta.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection