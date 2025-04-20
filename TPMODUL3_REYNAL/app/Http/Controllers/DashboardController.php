<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // ==================2==================
        // - Set timezone ke Asia/Jakarta
        date_default_timezone_set('Asia/Jakarta');

        // - Buat variabel nama, jam, waktu
        $nama = 'Reynal'; // Ganti dengan nama kamu
        $jam = date('H:i:s');
        $waktu = date('H');

        // - Tentukan $salam berdasarkan jam (pagi, siang, sore, malam)
        if ($waktu >= 5 && $waktu <= 11) {
            $salam = 'Selamat Pagi';
        } elseif ($waktu >= 12 && $waktu <= 14) {
            $salam = 'Selamat Siang';
        } elseif ($waktu >= 15 && $waktu <= 17) {
            $salam = 'Selamat Sore';
        } else {
            $salam = 'Selamat Malam';
        }

        // - Panggil fungsi getTanggal()
        $tanggal = $this->getTanggal();

        // - Kirim data ke view 'dashboard' 
        return view('dashboard', compact('nama', 'jam', 'tanggal', 'salam'));
    }

    private function getTanggal()
    {
        // ==================3==================
        // - Kembalikan tanggal sekarang dalam format dd-mm-yyyy
        return date('d-m-Y');
    }
}
