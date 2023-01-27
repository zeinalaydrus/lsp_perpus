<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Identitas;
use App\Models\Kategori;
use App\Models\Pemberitahuan;
use App\Models\Peminjaman;
use App\Models\Penerbit;
use App\Models\Pesan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'kode' => 'SKDFHK',
            'fullname' => 'Aldy Revi',
            'nis' => '120318132',
            'username' => 'aldy',
            'password' => bcrypt('password'),
            'kelas' => 'XII-RPL',
            'alamat' => 'jl. Batu Kinyang II',
            'role' => 'user',
            'join_date' => '2023-01-05 09:01:07'
        ]);

        User::create([
            'kode' => 'SKDEAK',
            'fullname' => 'Admin',
            'nis' => '120318132',
            'username' => 'folksy',
            'password' => bcrypt('password'),
            'kelas' => 'XII-RPL',
            'alamat' => 'jl. Batu Kinyang II',
            'role' => 'admin',
            'join_date' => '2023-01-05 09:01:07'
        ]);

        User::create([
            'kode' => 'SKDFAK',
            'fullname' => 'Muhammad Zein',
            'nis' => '120318132',
            'username' => 'zein',
            'password' => bcrypt('password'),
            'kelas' => 'XII-RPL',
            'alamat' => 'jl. Batu Kinyang II',
            'role' => 'user',
            'join_date' => '2023-01-05 09:01:07'
        ]);

        Kategori::create([
            'kode' => 'SKDFHK',
            'nama' => 'Fiksi',
        ]);

        Kategori::create([
            'kode' => 'SKDEAK',
            'nama' => 'Non Fiksi',
        ]);

        Kategori::create([
            'kode' => 'SKDFAK',
            'nama' => 'Pengetahuan',
        ]);

        Penerbit::create([
            'kode' => 'JSHADKN',
            'nama' => 'PT. Sejahtera',
        ]);


        Penerbit::create([
            'kode' => 'JSDFHKB',
            'nama' => 'PT. Anugerah',
        ]);


        Penerbit::create([
            'kode' => 'ASIDOJ',
            'nama' => 'PT. Mutiara',
        ]);

        Buku::create([
            'judul' => 'Dongeng kancil',
            'kategori_id' => '1',
            'penerbit_id' => '1',
            'pengarang' => 'Ibnu Fajar',
            'tahun_terbit' => '2001',
            'isbn' => '',
            'j_buku_baik' => '2',
            'j_buku_rusak' => '2',
        ]);

        Buku::create([
            'judul' => 'Cara Cepat Kaya',
            'kategori_id' => '2',
            'penerbit_id' => '2',
            'pengarang' => 'Ahmad Rifai',
            'tahun_terbit' => '2011',
            'isbn' => '',
            'j_buku_baik' => '1',
            'j_buku_rusak' => '0',
        ]);

        Buku::create([
            'judul' => 'Sang Pemimpi',
            'kategori_id' => '3',
            'penerbit_id' => '3',
            'pengarang' => 'Zulfikar naim',
            'tahun_terbit' => '2020',
            'isbn' => '',
            'j_buku_baik' => '1',
            'j_buku_rusak' => '2',
        ]);

        Peminjaman::create([
            'user_id' => '1',
            'buku_id' => '1',
            'tanggal_peminjaman' => '2023-01-30 09:00:24',
            'tanggal_pengembalian' => '2023-01-10 09:00:24',
            'kondisi_buku_saat_dipinjam' => 'rusak',
            'kondisi_buku_saat_dikembalikan' => 'rusak',
        ]);

        Peminjaman::create([
            'user_id' => '1',
            'buku_id' => '2',
            'tanggal_peminjaman' => '2023-01-30 09:00:24',
            'tanggal_pengembalian' => '2003-01-20 09:00:24',
            'kondisi_buku_saat_dipinjam' => 'rusak',
            'kondisi_buku_saat_dikembalikan' => 'baik',
        ]);

        Peminjaman::create([
            'user_id' => '3',
            'buku_id' => '3',
            'tanggal_peminjaman' => '2023-04-30 01:00:24',
            'tanggal_pengembalian' => '2013-01-10 19:00:24',
            'kondisi_buku_saat_dipinjam' => 'baik',
            'kondisi_buku_saat_dikembalikan' => 'baik',
        ]);

        Pesan::create([
            'penerima_id' => '1',
            'pengirim_id' => '1',
            'judul' => 'Reminder',
            'isi' => 'Tolong dikembalikan ya!',
            'status' => 'terkirim',
            'tanggal_kirim' => '2013-01-10 19:00:24',
        ]);

        Pesan::create([
            'penerima_id' => '2',
            'pengirim_id' => '2',
            'judul' => 'Reminder',
            'isi' => 'Selamat membaca ya!',
            'status' => 'terkirim',
            'tanggal_kirim' => '2014-02-16 19:00:24',
        ]);

        Pesan::create([
            'penerima_id' => '3',
            'pengirim_id' => '3',
            'judul' => 'Reminder',
            'isi' => 'harap dikembalikan segera ya!',
            'status' => 'dibaca',
            'tanggal_kirim' => '2011-04-11 19:00:24',
        ]);

        Pemberitahuan::create([
            'isi' => 'Selamat Membaca Semuanya!',
            'level_user' => '',
            'status' => 'aktif',
        ]);

        Pemberitahuan::create([
            'isi' => 'Harap Tenang dan Tidak Berisik!',
            'level_user' => '',
            'status' => 'aktif',
        ]);

        Identitas::create([
            'nama_app' => 'Perpus 10',
            'alamat_app' => 'SMKN 1O Jakarta',
            'email_app' => 'aldy@gmail.com',
            'nomor_hp' => '08632846238',
        ]);
    }
}
