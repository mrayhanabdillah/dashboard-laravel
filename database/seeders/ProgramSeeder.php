<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('programs')->insert([
            'id' => Str::uuid(),
            'name' => 'Ning Ayu 2024',
            'location' => 'Ballroom Sunset 100',
            'date_program' => '2024-12-31',
            'time_program' => '18:00:00',
            'open_vote' => '2024-10-27',
            'close_vote' => '2024-12-27',
            'description' => 'Kontes kecantikan khusus remaja putri pertama dan nomor satu di Bali, terselenggara sejak tahun 2017. Ning Ayu merupakan sosok remaja putri Bali yang diharapkan dapat menjadi Ikon generasi muda Bali yang cantik, berprestasi serta ikut berkontribusi dalam pembangunan Bali di beberapa sektor sesuai dengan visi misi Yayasan Putra Pariwisata Indonesia.',
            'target_vote' => 10000,

        ]);
    }
}
