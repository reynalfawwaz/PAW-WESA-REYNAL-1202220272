<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        // ==================2==================
        // - Buat object mahasiswa dengan data dummy (nama, nim, email, jurusan, fakultas, foto)
        // - Kirim object tersebut ke view 'profil'
        $mahasiswa = (object)[
            'nama' => 'reynal',
            'nim' => '1202220272',
            'email' => 'fawwazreynal1@gmail.com',
            'jurusan' => 'Sistem Informasi',
            'fakultas' => 'FRI',
            'foto' => 'reynal.jpg',
        ];
        return view('profil', ['mahasiswa' => $mahasiswa]);
    }
}
