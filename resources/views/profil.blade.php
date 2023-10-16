@extends('layouts.about')

@section('about')

<style>
  div.col img {
  transform: scale(0.75); /* Skala gambar sebesar 75% */
  }
  .row {
    display: flex;
    flex-wrap: wrap;
    max-width: 100%;
  }
  .col {
    padding: 20px;
    box-sizing: border-box;
  }
  .col:first-child {
    margin: auto;
    height: 100vh; /* Mengatur tinggi menjadi 100% tinggi tampilan viewport */
    width: 100%;
    background: linear-gradient(to bottom, #1a2a6c, #2c3e50);
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .col:first-child img {
    margin: auto;
    max-width: 100%;
    max-height: 100%;
    height: auto; /* Menambahkan properti height untuk memastikan gambar tidak melebihi ketinggian kolom */
  }
  @media only screen and (min-width: 768px) {
    .col:first-child {
      width: 50%;
    }
    .col:last-child {
      width: 50%;
    }
  }
</style>

<div class="row align-items-start">
<div class="col">
    <img src="img/logo-bnn.png" alt="logo-bnn" style="max-width: 100%; height: auto;">            
  </div>
    <div class="col pt-5 px-5">
    <h3> {{ $profil->judul_profil }} </h3>
    <p>
      {!! $profil->isi_profil !!}
    </p>
    {{-- <h3>Profil BNN Provinsi Bali</h3>
      <p>
        Menghadapi permasalahan  narkoba yang berkecenderungan terus miningkat, Pemerintah dan Dewan Perwakilan Rakyat Republik Indonesia (DPR-RI) mengesahkan Undang-Undang Nomor 5 Tahun 1997 tentang Psikotropika dan Undang-Undang Nomor 22 Tahun 1997 tentang Narkotika. Berdasarkan kedua Undang-undang tersebut, Pemerintah (Presiden Abdurahman Wahid) membentuk Badan Koordinasi Narkotika Nasional (BKNN), dengan Keputusan Presiden Nomor 116 Tahun 1999. BKNN adalah suatu Badan Koordinasi penanggulangan narkoba yang beranggotakan 25 Instansi Pemerintah terkait. BKNN diketuai oleh Kepala Kepolisian Republik Indonesia (Kapolri) secara ex-officio.
      </p>

      <p>
        Mulai tahun 2003 BNN baru mendapatkan alokasi anggaran dari APBN. Dengan alokasi anggaran APBN tersebut, BNN terus berupaya meningkatkan kinerjanya bersama-sama dengan BNP dan BNK. Namun karena tanpa struktur kelembagaan yang memilki jalur komando yang tegas dan hanya bersifat koordinatif (kesamaan fungsional semata), maka BNN dinilai tidak dapat bekerja optimal dan tidak akan mampu menghadapi permasalahan narkoba yang terus meningkat dan makin serius.  Oleh karena itu pemegang otoritas dalam hal ini segera menerbitkan Peraturan Presiden Nomor 83 Tahun 2007 tentang Badan Narkotika Nasional, Badan Narkotika Provinsi (BNP) dan Badan Narkotika Kabupaten/Kota (BNK), yang memiliki kewenangan operasional melalui kewenangan Anggota BNN terkait dalam satuan tugas, yang mana BNN-BNP-BNKab/Kota merupakan mitra kerja pada tingkat nasional, Provinsi dan kabupaten/kota yang masing-masing bertanggung jawab kepada Presiden, Gubernur dan Bupati/Walikota.
      </p> --}}
    </div>
</div>

@endsection