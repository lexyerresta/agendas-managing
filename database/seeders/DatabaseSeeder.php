<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Models\Agenda;
use App\Models\Division;
use App\Models\Kunjungan;
use App\Models\Narasumber;
use App\Models\Pengumuman;
use App\Models\Profil;
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
        // //1
        // User::create([
        //     'name' => 'Lexy Erresta',
        //     'username' => 'lexluthor',
        //     'email' => 'lexluthor@gmail.com',
        //     'password' => bcrypt('123123'),
        //     'level_user' => 'admin',
        //     'division_id' => 1
        // ]);

        // //2
        // User::create([
        //     'name' => 'Made Mila',
        //     'username' => 'mdmila',
        //     'email' => 'mdmila@gmail.com',
        //     'password' => bcrypt('123123'),
        //     'level_user' => 'admin',
        //     'division_id' => 7
        // ]);

        // //3
        // User::create([
        //     'name' => 'Admin',
        //     'username' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('123123'),
        //     'level_user' => 'admin',
        //     'division_id' => 1
        // ]);

        // //4
        // User::create([
        //     'name' => 'Staff',
        //     'username' => 'staff',
        //     'email' => 'staff@gmail.com',
        //     'password' => bcrypt('123123'),
        //     'level_user' => 'staff',
        //     'division_id' => 4
        // ]);

        // //5
        // User::create([
        //     'name' => 'Eksternal',
        //     'username' => 'eksternal',
        //     'email' => 'eksternal@gmail.com',
        //     'password' => bcrypt('123123'),
        //     'level_user' => 'eksternal',
        //     'division_id' => 8
        // ]);

        // //1
        // Category::create([
        //     'name' => 'War On Drugs',
        //     'slug' => 'war-on-drugs'
        // ]);

        // //2
        // Category::create([
        //     'name' => 'Narcotics',
        //     'slug' => 'narcotics'
        // ]);

        // //3
        // Category::create([
        //     'name' => 'Criminal',
        //     'slug' => 'criminal'
        // ]);

        // //4
        // Category::create([
        //     'name' => 'Biotech',
        //     'slug' => 'biotech'
        // ]);

        // //5
        // Category::create([
        //     'name' => 'Metaverse',
        //     'slug' => 'metaverse'
        // ]);

        // //6
        // Category::create([
        //     'name' => 'Science',
        //     'slug' => 'science'
        // ]);
        

        // //1
        // Division::create([
        //     'name' => 'P2M'
        // ]);

        // //2
        // Division::create([
        //     'name' => 'Rehabilitasi'
        // ]);

        // //3
        // Division::create([
        //     'name' => 'Pemberantasan'
        // ]);

        // //4
        // Division::create([
        //     'name' => 'Intelijen'
        // ]);

        // //5
        // Division::create([
        //     'name' => 'Sarpras'
        // ]);

        // //6
        // Division::create([
        //     'name' => 'Umum'
        // ]);

        // //7
        // Division::create([
        //     'name' => 'Humas'
        // ]);

        // //8
        // Division::create([
        //     'name' => 'Masyarakat'
        // ]);

        Article::factory(10)->create();
        
        Agenda::factory(10)->create();

        // User::factory(20)->create();

        Narasumber::factory(10)->create();

        Kunjungan::factory(10)->create();

        Pengumuman::factory(10)->create();

        //5 User, 3 Kategori, 8 Divisi

        //Profil BNNP
        // Profil::create([
        //     'judul_profil' => 'Profil BNN Provinsi Bali',
        //     'isi_profil' =>
        //     '<div> Menghadapi permasalahan narkoba yang berkecenderungan terus miningkat, Pemerintah dan Dewan Perwakilan Rakyat Republik Indonesia (DPR-RI) mengesahkan Undang-Undang Nomor 5 Tahun 1997 tentang Psikotropika dan Undang-Undang Nomor 22 Tahun 1997 tentang Narkotika. Berdasarkan kedua Undang-undang tersebut, Pemerintah (Presiden Abdurahman Wahid) membentuk Badan Koordinasi Narkotika Nasional (BKNN), dengan Keputusan Presiden Nomor 116 Tahun 1999. BKNN adalah suatu Badan Koordinasi penanggulangan narkoba yang beranggotakan 25 Instansi Pemerintah terkait. BKNN diketuai oleh Kepala Kepolisian Republik Indonesia (Kapolri) secara ex-officio. </div>

        //     <div> Mulai tahun 2003 BNN baru mendapatkan alokasi anggaran dari APBN. Dengan alokasi anggaran APBN tersebut, BNN terus berupaya meningkatkan kinerjanya bersama-sama dengan BNP dan BNK. Namun karena tanpa struktur kelembagaan yang memilki jalur komando yang tegas dan hanya bersifat koordinatif (kesamaan fungsional semata), maka BNN dinilai tidak dapat bekerja optimal dan tidak akan mampu menghadapi permasalahan narkoba yang terus meningkat dan makin serius. Oleh karena itu pemegang otoritas dalam hal ini segera menerbitkan Peraturan Presiden Nomor 83 Tahun 2007 tentang Badan Narkotika Nasional, Badan Narkotika Provinsi (BNP) dan Badan Narkotika Kabupaten/Kota (BNK), yang memiliki kewenangan operasional melalui kewenangan Anggota BNN terkait dalam satuan tugas, yang mana BNN-BNP-BNKab/Kota merupakan mitra kerja pada tingkat nasional, Provinsi dan kabupaten/kota yang masing-masing bertanggung jawab kepada Presiden, Gubernur dan Bupati/Walikota. </div>',
        //     'user_id' => 3
        // ]);
    }
}
