<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('configs')->insert([
            'id' => Str::uuid(),
            'title' => 'Yayasan Putra Pariwisata Indonesia Online Voting System',
            'email' => 'vote@yayasanputra.com',
            'no_rek' => '057201001644569',
            'bank' => 'Bank BRI',
            'name_rek' => 'Yayasan Putra Pariwisata Indonesia',
            'tnc' => '<div>Sebelum melakukan vote untuk finalis jagoan kamu dan pemesanan tiket final, mohon pastikan beberapa hal berikut :</div><ol><li>Pastikan isi email dengan benar</li><li>Lakukan pembayaran ke nomor virtual account tertera dan <strong><em>pengisian angket maksimal 1 jam setelah melakukan pembayaran</em></strong><em>.</em> Lebih dari waktu, sistem tidak dapat membaca transaksi.</li><li>Proses verifikasi maksimal 1 x 24 jam, apabila sukses ter verifikasi kamu akan mendapatkan email notifikasi</li><li>Apabila ada kendala bisa menghubungi kami di :<ul><li>Email&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : <a href="mailto:humas@yayasanputrapariwisata.id">humas@yayasanputrapariwisata.id</a></li><li>Whatsapp&nbsp; &nbsp; &nbsp; &nbsp; : 08137 7070 1679 (Admin)</li></ul></li><li>Tiket yang sudah terverifikasi tidak dapat di refund</li></ol>',
        ]);
    }
}
