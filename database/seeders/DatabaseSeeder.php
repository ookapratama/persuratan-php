<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //tabel user
        DB::table('users')->insert([
            'name' =>'Baharuddin Kasim',
            'email' =>'kasim.baharuddin@gmail.com',
            'password' => Hash::make('12121212'),
        ]);

        // DB::table('users')->insert([
        //     'name' =>'Ulla',
        //     'email' =>'ulla@gmail.com',
        //     'password' => Hash::make('13131313'),
        // ]);

        // DB::table('users')->insert([
        //     'name' =>'Rudi',
        //     'email' =>'rudi@gmail.com',
        //     'password' => Hash::make('11111111'),
        // ]);

        // DB::table('users')->insert([
        //     'name' =>'Aco',
        //     'email' =>'aco@gmail.com',
        //     'password' => Hash::make('12341234'),
        // ]);


        //tebel ref surat
        // DB::table('tbl_ref_surat')->insert([
        //     'jenis_surat' =>'Surat Keterangan Tidak Mampu',
        //     'kd_surat' =>'SKT',
        // ]);

        // DB::table('tbl_ref_surat')->insert([
        //     'jenis_surat' =>'Surat Keterangan Kelahiran',
        //     'kd_surat' =>'SKK',
        // ]);

        // DB::table('tbl_ref_surat')->insert([
        //     'jenis_surat' =>'Surat Keterangan Pindah',
        //     'kd_surat' =>'SKP',
        // ]);

        // DB::table('tbl_ref_surat')->insert([
        //     'jenis_surat' =>'Surat Keterangan Kematian',
        //     'kd_surat' =>'SKM',
        // ]);

        // DB::table('tbl_ref_surat')->insert([
        //     'jenis_surat' =>'Surat Keterangan Domisili',
        //     'kd_surat' =>'SKD',
        // ]);

        // DB::table('tbl_ref_surat')->insert([
        //     'jenis_surat' =>'Surat Keterangan Berkelakuan Baik',
        //     'kd_surat' =>'SKB',
        // ]);

        // DB::table('tbl_ref_surat')->insert([
        //     'jenis_surat' =>'Surat Keterangan Kehilangan',
        //     'kd_surat' =>'SKH',
        // ]);

        // DB::table('tbl_ref_surat')->insert([
        //     'jenis_surat' =>'Surat Keterangan Usaha',
        //     'kd_surat' =>'SKU',
        // ]);


        // //tebel ref level
        // DB::table('tbl_ref_level')->insert([
        //     'level_name' =>'superAdmin',
        // ]);

        // DB::table('tbl_ref_level')->insert([
        //     'level_name' =>'admin',
        // ]);

        // DB::table('tbl_ref_level')->insert([
        //     'level_name' =>'pimpinan',
        // ]);

        // DB::table('tbl_ref_level')->insert([
        //     'level_name' =>'kurir',
        // ]);
    }
}
