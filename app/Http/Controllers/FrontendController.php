<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // =========================================================
    // FUNCTION INDEX
    // Digunakan untuk menampilkan halaman frontend
    // =========================================================
    public function index(Request $request)
    {
        // =====================================================
        // MENGHITUNG TOTAL DATA
        // =====================================================

        // Menghitung jumlah seluruh peserta
        $totalPeserta = Peserta::count();

        // Menghitung jumlah seluruh skema
        $totalSkema = Skema::count();


        // =====================================================
        // MENGAMBIL DATA PESERTA DAN SKEMA
        // =====================================================

        // Mengambil data peserta beserta data skema
        // latest() = data terbaru ditampilkan terlebih dahulu
        $pesertas = Peserta::with('skema')->latest()->get();

        // Mengambil semua data skema
        $skemas = Skema::latest()->get();


        // =====================================================
        // VARIABEL PESERTA UNTUK HASIL PENCARIAN
        // =====================================================

        // Nilai awal dibuat null karena belum ada pencarian
        $peserta = null;


        // =====================================================
        // CEK APAKAH ADA INPUT PENCARIAN
        // =====================================================

        // filled() mengecek apakah input search berisi
        if ($request->filled('search')) {

            // Mengambil nilai dari input search
            $search = $request->search;


            // =================================================
            // PENCARIAN BERDASARKAN ID
            // =================================================

            // Jika input berupa angka
            if (is_numeric($search)) {

                // Mencari peserta berdasarkan ID
                $peserta = Peserta::with('skema')
                    ->where('id', $search)
                    ->first();


            // =================================================
            // PENCARIAN BERDASARKAN DATA PESERTA
            // =================================================
            } else {

                // Mencari berdasarkan nama, NIK, email, atau nomor HP
                $peserta = Peserta::with('skema')
                    ->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('nik', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('no_hp', 'like', '%' . $search . '%')
                    ->first();
            }
        }


        // =====================================================
        // MENGIRIM DATA KE VIEW
        // =====================================================

        // Mengirim semua data ke halaman frontend.index
        return view('frontend.index', compact(
            'totalPeserta',
            'totalSkema',
            'pesertas',
            'skemas',
            'peserta'
        ));
    }
}

