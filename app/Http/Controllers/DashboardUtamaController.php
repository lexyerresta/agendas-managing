<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Article;
use App\Models\Kunjungan;
use App\Models\Narasumber;
use App\Models\Pengumuman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Charts\FilteredChart;

class DashboardUtamaController extends Controller
{
    //Ini untuk dashboard paling atas
    public function dashboard(Request $request)
    {
        $user = auth()->user();
        $hari_ini = Carbon::now();
        $bulan_ini = Carbon::now()->month;
        $bulan_3 = Carbon::now()->subMonths(3)->month;
        $bulan_12 = Carbon::now()->endOfYear()->month;
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $filter = $request->input('filter');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $url_agenda = route('agendas.index', [
            // 'start_date' => $startOfMonth->format('Y-m-d'),
            // 'end_date' => $endOfMonth->format('Y-m-d'),
            'start_date' => $hari_ini->format('Y-m-d'),
        ]);

        $url_pengumuman = route('pengumumans.index', [
            'start_date' => $hari_ini->format('Y-m-d'),
        ]);

        if($user->level_user === 'admin') {
            // if($filter == 'tahun') {
            //     $chart_agenda = [
            //         'chart_title' => 'Agenda Kegiatan',
            //         'report_type' => 'group_by_date',
            //         'model' => 'App\Models\Agenda',
            //         'group_by_field' => 'waktu_pelaksanaan',
            //         'group_by_period' => 'year',
            //         'chart_type' => 'bar',
            //         'chart_color' => '255, 99, 71' // ubah warna menjadi tomato         
            //     ];
                
            //     $chart_pengumuman = [
            //         'chart_title' => 'Pengumuman',
            //         'report_type' => 'group_by_date',
            //         'model' => 'App\Models\Pengumuman',
            //         'group_by_field' => 'created_at',
            //         'group_by_period' => 'year',
            //         'chart_type' => 'bar',
            //         'chart_color' => '50, 205, 50' // ubah warna menjadi limegreen
            //     ];
                
            //     $chart_artikel = [
            //         'chart_title' => 'Artikel',
            //         'report_type' => 'group_by_date',
            //         'model' => 'App\Models\Article',
            //         'group_by_field' => 'created_at',
            //         'group_by_period' => 'year',
            //         'chart_type' => 'bar',
            //         'chart_color' => '65, 105, 225' // ubah warna menjadi royalblue
            //     ];
                
            //     $chart_narasumber = [
            //         'chart_title' => 'Narasumber',
            //         'report_type' => 'group_by_date',
            //         'model' => 'App\Models\Narasumber',
            //         'group_by_field' => 'tanggal_acara',
            //         'group_by_period' => 'year',
            //         'chart_type' => 'bar',
            //         'chart_color' => '238, 130, 238' // ubah warna menjadi violet
            //     ];
                
            //     $chart_kunjungan = [
            //         'chart_title' => 'Narasumber',
            //         'report_type' => 'group_by_date',
            //         'model' => 'App\Models\Narasumber',
            //         'group_by_field' => 'tanggal_acara',
            //         'group_by_period' => 'year',
            //         'chart_type' => 'bar',
            //         'chart_color' => '255, 165, 0' // ubah warna menjadi orange
            //     ];

            //     $chart = new LaravelChart($chart_agenda, $chart_pengumuman, $chart_artikel, $chart_narasumber, $chart_kunjungan);
            // }

            // if($filter == 'bulan') {
            //     $chart_agenda = [
            //         'chart_title' => 'Agenda Kegiatan',
            //         'report_type' => 'group_by_date',
            //         'model' => 'App\Models\Agenda',
            //         'group_by_field' => 'waktu_pelaksanaan',
            //         'date_format' => 'M Y',
            //         'group_by_period' => 'month',
            //         'chart_type' => 'bar',
            //         'chart_color' => '255, 99, 71' // ubah warna menjadi tomato         
            //     ];
                
            //     $chart_pengumuman = [
            //         'chart_title' => 'Pengumuman',
            //         'report_type' => 'group_by_date',
            //         'model' => 'App\Models\Pengumuman',
            //         'group_by_field' => 'created_at',
            //         'date_format' => 'M Y',
            //         'group_by_period' => 'month',
            //         'chart_type' => 'bar',
            //         'chart_color' => '50, 205, 50' // ubah warna menjadi limegreen
            //     ];
                
            //     $chart_artikel = [
            //         'chart_title' => 'Artikel',
            //         'report_type' => 'group_by_date',
            //         'model' => 'App\Models\Article',
            //         'group_by_field' => 'created_at',
            //         'date_format' => 'M Y',
            //         'group_by_period' => 'month',
            //         'chart_type' => 'bar',
            //         'chart_color' => '65, 105, 225' // ubah warna menjadi royalblue
            //     ];
                
            //     $chart_narasumber = [
            //         'chart_title' => 'Narasumber',
            //         'report_type' => 'group_by_date',
            //         'model' => 'App\Models\Narasumber',
            //         'group_by_field' => 'tanggal_acara',
            //         'date_format' => 'M Y',
            //         'group_by_period' => 'month',
            //         'chart_type' => 'bar',
            //         'chart_color' => '238, 130, 238' // ubah warna menjadi violet
            //     ];
                
            //     $chart_kunjungan = [
            //         'chart_title' => 'Narasumber',
            //         'report_type' => 'group_by_date',
            //         'model' => 'App\Models\Narasumber',
            //         'group_by_field' => 'tanggal_acara',
            //         'date_format' => 'M Y',
            //         'group_by_period' => 'month',
            //         'chart_type' => 'bar',
            //         'chart_color' => '255, 165, 0' // ubah warna menjadi orange
            //     ];

            //     $chart = new LaravelChart($chart_agenda, $chart_pengumuman, $chart_artikel, $chart_narasumber, $chart_kunjungan);
            // }

            // if($filter == 'minggu') {
            //     $chart_agenda = [
            //         'chart_title' => 'Agenda Kegiatan',
            //         'report_type' => 'group_by_date',
            //         'model' => 'App\Models\Agenda',
            //         'group_by_field' => 'waktu_pelaksanaan',
            //         'group_by_period' => 'week',
            //         'chart_type' => 'bar',
            //         'chart_color' => '255, 99, 71' // ubah warna menjadi tomato         
            //     ];
                
            //     $chart_pengumuman = [
            //         'chart_title' => 'Pengumuman',
            //         'report_type' => 'group_by_date',
            //         'model' => 'App\Models\Pengumuman',
            //         'group_by_field' => 'created_at',
            //         'group_by_period' => 'week',
            //         'chart_type' => 'bar',
            //         'chart_color' => '50, 205, 50' // ubah warna menjadi limegreen
            //     ];
                
            //     $chart_artikel = [
            //         'chart_title' => 'Artikel',
            //         'report_type' => 'group_by_date',
            //         'model' => 'App\Models\Article',
            //         'group_by_field' => 'created_at',
            //         'group_by_period' => 'week',
            //         'chart_type' => 'bar',
            //         'chart_color' => '65, 105, 225' // ubah warna menjadi royalblue
            //     ];
                
            //     $chart_narasumber = [
            //         'chart_title' => 'Narasumber',
            //         'report_type' => 'group_by_date',
            //         'model' => 'App\Models\Narasumber',
            //         'group_by_field' => 'tanggal_acara',
            //         'group_by_period' => 'week',
            //         'chart_type' => 'bar',
            //         'chart_color' => '238, 130, 238' // ubah warna menjadi violet
            //     ];
                
            //     $chart_kunjungan = [
            //         'chart_title' => 'Narasumber',
            //         'report_type' => 'group_by_date',
            //         'model' => 'App\Models\Narasumber',
            //         'group_by_field' => 'tanggal_acara',
            //         'group_by_period' => 'week',
            //         'chart_type' => 'bar',
            //         'chart_color' => '255, 165, 0' // ubah warna menjadi orange
            //     ];

            //     $chart = new LaravelChart($chart_agenda, $chart_pengumuman, $chart_artikel, $chart_narasumber, $chart_kunjungan);
            // }

            if ($start_date && $end_date) {
                $end_date = Carbon::parse($end_date)->addDays(1);
                // $chart_agenda = [
                // // 'chart_title' => 'Agenda Kegiatan',
                //     // 'chart_type' => 'bar',
                //     // 'report_type' => 'group_by_date',
                //     // 'model' => 'App\Models\Agenda',
                
                //     // 'group_by_field' => 'waktu_pelaksanaan',
                //     // 'group_by_period' => 'month',
                    
                //     'filter_field' => 'waktu_pelaksanaan',
                //     'range_date_start'  => $start_date,
                //     'range_date_end'  => $end_date
                // ];
                // $chart = new LaravelChart($chart_agenda);
                
                $chart_agenda = [
                    'chart_title' => 'Agenda Kegiatan',
                    'report_type' => 'group_by_date',
                    'model' => 'App\Models\Agenda',
                    'group_by_field' => 'waktu_pelaksanaan',
                    'date_format' => 'M Y',
                    'group_by_period' => 'month',
                    'chart_type' => 'bar',
                    'chart_color' => '255, 99, 71', // ubah warna menjadi tomato
                    'filter_field' => 'waktu_pelaksanaan',
                    'range_date_start'  => $start_date,
                    'range_date_end'  => $end_date
                ];
                
                $chart_pengumuman = [
                    'chart_title' => 'Pengumuman',
                    'report_type' => 'group_by_date',
                    'model' => 'App\Models\Pengumuman',
                    'group_by_field' => 'created_at',
                    'date_format' => 'M Y',
                    'group_by_period' => 'month',
                    'chart_type' => 'bar',
                    'chart_color' => '50, 205, 50', // ubah warna menjadi limegreen
                    'filter_field' => 'created_at',
                    'range_date_start'  => $start_date,
                    'range_date_end'  => $end_date
                ];
                
                $chart_artikel = [
                    'chart_title' => 'Artikel',
                    'report_type' => 'group_by_date',
                    'model' => 'App\Models\Article',
                    'group_by_field' => 'created_at',
                    'date_format' => 'M Y',
                    'group_by_period' => 'month',
                    'chart_type' => 'bar',
                    'chart_color' => '65, 105, 225', // ubah warna menjadi royalblue
                    'filter_field' => 'created_at',
                    'range_date_start'  => $start_date,
                    'range_date_end'  => $end_date
                ];
                
                $chart_narasumber = [
                    'chart_title' => 'Narasumber',
                    'report_type' => 'group_by_date',
                    'model' => 'App\Models\Narasumber',
                    'group_by_field' => 'tanggal_acara',
                    'date_format' => 'M Y',
                    'group_by_period' => 'month',
                    'chart_type' => 'bar',
                    'chart_color' => '238, 130, 238', // ubah warna menjadi violet
                    'filter_field' => 'tanggal_acara',
                    'range_date_start'  => $start_date,
                    'range_date_end'  => $end_date
                ];
        
                $chart_kunjungan = [
                    'chart_title' => 'Kunjungan',
                    'report_type' => 'group_by_date',
                    'model' => 'App\Models\Kunjungan',
                    'group_by_field' => 'waktu_kunjungan',
                    'date_format' => 'M Y',
                    'group_by_period' => 'month',
                    'chart_type' => 'bar',
                    'chart_color' => '255, 165, 0', // ubah warna menjadi orange
                    'filter_field' => 'waktu_kunjungan',
                    'range_date_start'  => $start_date,
                    'range_date_end'  => $end_date
                ];
                
                $chart = new LaravelChart($chart_agenda, $chart_pengumuman, $chart_artikel, $chart_narasumber, $chart_kunjungan);

            } else if ($start_date) {
                // $chart_agenda = [
                //     'chart_title' => 'Agenda Kegiatan',
                //         'chart_type' => 'bar',
                //         'report_type' => 'group_by_date',
                //         'model' => 'App\Models\Agenda',
                    
                //         'group_by_field' => 'waktu_pelaksanaan',
                //         'group_by_period' => 'month',
                        
                //         'filter_field' => 'waktu_pelaksanaan',
                //         'range_date_start'  => $start_date,
                //         'range_date_end'  => Carbon::now()
                //     ];
                //     $chart = new LaravelChart($chart_agenda);

                $chart_agenda = [
                    'chart_title' => 'Agenda Kegiatan',
                    'report_type' => 'group_by_date',
                    'model' => 'App\Models\Agenda',
                    'group_by_field' => 'waktu_pelaksanaan',
                    'date_format' => 'M Y',
                    'group_by_period' => 'month',
                    'chart_type' => 'bar',
                    'chart_color' => '255, 99, 71', // ubah warna menjadi tomato
                    'filter_field' => 'waktu_pelaksanaan',
                    'range_date_start'  => $start_date,
                    'range_date_end'  => Carbon::now()
                ];
                
                $chart_pengumuman = [
                    'chart_title' => 'Pengumuman',
                    'report_type' => 'group_by_date',
                    'model' => 'App\Models\Pengumuman',
                    'group_by_field' => 'created_at',
                    'date_format' => 'M Y',
                    'group_by_period' => 'month',
                    'chart_type' => 'bar',
                    'chart_color' => '50, 205, 50', // ubah warna menjadi limegreen
                    'filter_field' => 'created_at',
                    'range_date_start'  => $start_date,
                    'range_date_end'  => Carbon::now()
                ];
                
                $chart_artikel = [
                    'chart_title' => 'Artikel',
                    'report_type' => 'group_by_date',
                    'model' => 'App\Models\Article',
                    'group_by_field' => 'created_at',
                    'date_format' => 'M Y',
                    'group_by_period' => 'month',
                    'chart_type' => 'bar',
                    'chart_color' => '65, 105, 225', // ubah warna menjadi royalblue
                    'filter_field' => 'created_at',
                    'range_date_start'  => $start_date,
                    'range_date_end'  => Carbon::now()
                ];
                
                $chart_narasumber = [
                    'chart_title' => 'Narasumber',
                    'report_type' => 'group_by_date',
                    'model' => 'App\Models\Narasumber',
                    'group_by_field' => 'tanggal_acara',
                    'date_format' => 'M Y',
                    'group_by_period' => 'month',
                    'chart_type' => 'bar',
                    'chart_color' => '238, 130, 238', // ubah warna menjadi violet
                    'filter_field' => 'tanggal_acara',
                    'range_date_start'  => $start_date,
                    'range_date_end'  => Carbon::now()
                ];
        
                $chart_kunjungan = [
                    'chart_title' => 'Kunjungan',
                    'report_type' => 'group_by_date',
                    'model' => 'App\Models\Kunjungan',
                    'group_by_field' => 'waktu_kunjungan',
                    'date_format' => 'M Y',
                    'group_by_period' => 'month',
                    'chart_type' => 'bar',
                    'chart_color' => '255, 165, 0', // ubah warna menjadi orange
                    'filter_field' => 'waktu_kunjungan',
                    'range_date_start'  => $start_date,
                    'range_date_end'  => Carbon::now()
                ];
                
                $chart = new LaravelChart($chart_agenda, $chart_pengumuman, $chart_artikel, $chart_narasumber, $chart_kunjungan);
    
            } else {
                $chart_agenda = [
                    'chart_title' => 'Agenda Kegiatan',
                    'report_type' => 'group_by_date',
                    'model' => 'App\Models\Agenda',
                    'group_by_field' => 'waktu_pelaksanaan',
                    'date_format' => 'M Y',
                    'group_by_period' => 'month',
                    'chart_type' => 'bar',
                    'chart_color' => '255, 99, 71' // ubah warna menjadi tomato
                ];
                
                $chart_pengumuman = [
                    'chart_title' => 'Pengumuman',
                    'report_type' => 'group_by_date',
                    'model' => 'App\Models\Pengumuman',
                    'group_by_field' => 'created_at',
                    'date_format' => 'M Y',
                    'group_by_period' => 'month',
                    'chart_type' => 'bar',
                    'chart_color' => '50, 205, 50' // ubah warna menjadi limegreen
                ];
                
                $chart_artikel = [
                    'chart_title' => 'Artikel',
                    'report_type' => 'group_by_date',
                    'model' => 'App\Models\Article',
                    'group_by_field' => 'created_at',
                    'date_format' => 'M Y',
                    'group_by_period' => 'month',
                    'chart_type' => 'bar',
                    'chart_color' => '65, 105, 225' // ubah warna menjadi royalblue
                ];
                
                $chart_narasumber = [
                    'chart_title' => 'Narasumber',
                    'report_type' => 'group_by_date',
                    'model' => 'App\Models\Narasumber',
                    'group_by_field' => 'tanggal_acara',
                    'date_format' => 'M Y',
                    'group_by_period' => 'month',
                    'chart_type' => 'bar',
                    'chart_color' => '238, 130, 238' // ubah warna menjadi violet
                ];
        
                $chart_kunjungan = [
                    'chart_title' => 'Kunjungan',
                    'report_type' => 'group_by_date',
                    'model' => 'App\Models\Kunjungan',
                    'group_by_field' => 'waktu_kunjungan',
                    'date_format' => 'M Y',
                    'group_by_period' => 'month',
                    'chart_type' => 'bar',
                    'chart_color' => '255, 165, 0' // ubah warna menjadi orange
                ];
                
                $chart = new LaravelChart($chart_agenda, $chart_pengumuman, $chart_artikel, $chart_narasumber, $chart_kunjungan);
            }

            $pengumuman_today = Pengumuman::whereDate('created_at', $hari_ini)
                                    ->count();

            $pengumuman_monthly = Pengumuman::whereMonth('created_at', $bulan_ini)
                                    ->count();

            $agenda_today = Agenda::whereDate('waktu_pelaksanaan', $hari_ini)
                                    ->count();

            $agenda_monthly = Agenda::whereMonth('waktu_pelaksanaan', $bulan_ini)
                                    ->count();

            $agenda_done = Agenda::whereNotNull('tanggal_selesai')
                                    ->whereMonth('waktu_pelaksanaan', $bulan_ini)
                                    ->count();
            
            $agenda_not_done = Agenda::whereNull('tanggal_selesai')
                                    ->whereMonth('waktu_pelaksanaan', $bulan_ini)
                                    ->count();
                                    
            $artikel_anda = Article::all()->count();

            $artikel_terbaru = Article::latest()->first();

            } else {

                if ($start_date && $end_date) {
                    $end_date = Carbon::parse($end_date)->addDays(1);
                    // $chart_agenda = [
                    // // 'chart_title' => 'Agenda Kegiatan',
                    //     // 'chart_type' => 'bar',
                    //     // 'report_type' => 'group_by_date',
                    //     // 'model' => 'App\Models\Agenda',
                    
                    //     // 'group_by_field' => 'waktu_pelaksanaan',
                    //     // 'group_by_period' => 'month',
                        
                    //     'filter_field' => 'waktu_pelaksanaan',
                    //     'range_date_start'  => $start_date,
                    //     'range_date_end'  => $end_date
                    // ];
                    // $chart = new LaravelChart($chart_agenda);
                    
                    $chart_agenda = [
                        'chart_title' => 'Agenda Kegiatan',
                        'report_type' => 'group_by_date',
                        'model' => 'App\Models\Agenda',
                        'group_by_field' => 'waktu_pelaksanaan',
                        'date_format' => 'M Y',
                        'group_by_period' => 'month',
                        'chart_type' => 'bar',
                        'chart_color' => '255, 99, 71', // ubah warna menjadi tomato
                        'filter_field' => 'waktu_pelaksanaan',
                        'range_date_start'  => $start_date,
                        'range_date_end'  => $end_date
                    ];
                    
                    $chart_pengumuman = [
                        'chart_title' => 'Pengumuman',
                        'report_type' => 'group_by_date',
                        'model' => 'App\Models\Pengumuman',
                        'group_by_field' => 'created_at',
                        'date_format' => 'M Y',
                        'group_by_period' => 'month',
                        'chart_type' => 'bar',
                        'chart_color' => '50, 205, 50', // ubah warna menjadi limegreen
                        'filter_field' => 'created_at',
                        'range_date_start'  => $start_date,
                        'range_date_end'  => $end_date
                    ];
                    
                    $chart_artikel = [
                        'chart_title' => 'Artikel',
                        'report_type' => 'group_by_date',
                        'model' => 'App\Models\Article',
                        'group_by_field' => 'created_at',
                        'date_format' => 'M Y',
                        'group_by_period' => 'month',
                        'chart_type' => 'bar',
                        'chart_color' => '65, 105, 225', // ubah warna menjadi royalblue
                        'filter_field' => 'created_at',
                        'range_date_start'  => $start_date,
                        'range_date_end'  => $end_date
                    ];
                    
                    $chart_narasumber = [
                        'chart_title' => 'Narasumber',
                        'report_type' => 'group_by_date',
                        'model' => 'App\Models\Narasumber',
                        'group_by_field' => 'tanggal_acara',
                        'date_format' => 'M Y',
                        'group_by_period' => 'month',
                        'chart_type' => 'bar',
                        'chart_color' => '238, 130, 238', // ubah warna menjadi violet
                        'filter_field' => 'tanggal_acara',
                        'range_date_start'  => $start_date,
                        'range_date_end'  => $end_date
                    ];
            
                    $chart_kunjungan = [
                        'chart_title' => 'Kunjungan',
                        'report_type' => 'group_by_date',
                        'model' => 'App\Models\Kunjungan',
                        'group_by_field' => 'waktu_kunjungan',
                        'date_format' => 'M Y',
                        'group_by_period' => 'month',
                        'chart_type' => 'bar',
                        'chart_color' => '255, 165, 0', // ubah warna menjadi orange
                        'filter_field' => 'waktu_kunjungan',
                        'range_date_start'  => $start_date,
                        'range_date_end'  => $end_date
                    ];
                    
                    $chart = new LaravelChart($chart_agenda, $chart_pengumuman, $chart_artikel, $chart_narasumber, $chart_kunjungan);
    
                } else if ($start_date) {
                    // $chart_agenda = [
                    //     'chart_title' => 'Agenda Kegiatan',
                    //         'chart_type' => 'bar',
                    //         'report_type' => 'group_by_date',
                    //         'model' => 'App\Models\Agenda',
                        
                    //         'group_by_field' => 'waktu_pelaksanaan',
                    //         'group_by_period' => 'month',
                            
                    //         'filter_field' => 'waktu_pelaksanaan',
                    //         'range_date_start'  => $start_date,
                    //         'range_date_end'  => Carbon::now()
                    //     ];
                    //     $chart = new LaravelChart($chart_agenda);
    
                    $chart_agenda = [
                        'chart_title' => 'Agenda Kegiatan',
                        'report_type' => 'group_by_date',
                        'model' => 'App\Models\Agenda',
                        'group_by_field' => 'waktu_pelaksanaan',
                        'date_format' => 'M Y',
                        'group_by_period' => 'month',
                        'chart_type' => 'bar',
                        'chart_color' => '255, 99, 71', // ubah warna menjadi tomato
                        'filter_field' => 'waktu_pelaksanaan',
                        'range_date_start'  => $start_date,
                        'range_date_end'  => Carbon::now()
                    ];
                    
                    $chart_pengumuman = [
                        'chart_title' => 'Pengumuman',
                        'report_type' => 'group_by_date',
                        'model' => 'App\Models\Pengumuman',
                        'group_by_field' => 'created_at',
                        'date_format' => 'M Y',
                        'group_by_period' => 'month',
                        'chart_type' => 'bar',
                        'chart_color' => '50, 205, 50', // ubah warna menjadi limegreen
                        'filter_field' => 'created_at',
                        'range_date_start'  => $start_date,
                        'range_date_end'  => Carbon::now()
                    ];
                    
                    $chart_artikel = [
                        'chart_title' => 'Artikel',
                        'report_type' => 'group_by_date',
                        'model' => 'App\Models\Article',
                        'group_by_field' => 'created_at',
                        'date_format' => 'M Y',
                        'group_by_period' => 'month',
                        'chart_type' => 'bar',
                        'chart_color' => '65, 105, 225', // ubah warna menjadi royalblue
                        'filter_field' => 'created_at',
                        'range_date_start'  => $start_date,
                        'range_date_end'  => Carbon::now()
                    ];
                    
                    $chart_narasumber = [
                        'chart_title' => 'Narasumber',
                        'report_type' => 'group_by_date',
                        'model' => 'App\Models\Narasumber',
                        'group_by_field' => 'tanggal_acara',
                        'date_format' => 'M Y',
                        'group_by_period' => 'month',
                        'chart_type' => 'bar',
                        'chart_color' => '238, 130, 238', // ubah warna menjadi violet
                        'filter_field' => 'tanggal_acara',
                        'range_date_start'  => $start_date,
                        'range_date_end'  => Carbon::now()
                    ];
            
                    $chart_kunjungan = [
                        'chart_title' => 'Kunjungan',
                        'report_type' => 'group_by_date',
                        'model' => 'App\Models\Kunjungan',
                        'group_by_field' => 'waktu_kunjungan',
                        'date_format' => 'M Y',
                        'group_by_period' => 'month',
                        'chart_type' => 'bar',
                        'chart_color' => '255, 165, 0', // ubah warna menjadi orange
                        'filter_field' => 'waktu_kunjungan',
                        'range_date_start'  => $start_date,
                        'range_date_end'  => Carbon::now()
                    ];
                    
                    $chart = new LaravelChart($chart_agenda, $chart_pengumuman, $chart_artikel, $chart_narasumber, $chart_kunjungan);
        
                } else {
                    $chart_agenda = [
                        'chart_title' => 'Agenda Kegiatan',
                        'report_type' => 'group_by_date',
                        'model' => 'App\Models\Agenda',
                        'group_by_field' => 'waktu_pelaksanaan',
                        'date_format' => 'M Y',
                        'group_by_period' => 'month',
                        'chart_type' => 'bar',
                        'chart_color' => '255, 99, 71' // ubah warna menjadi tomato
                    ];
                    
                    $chart_pengumuman = [
                        'chart_title' => 'Pengumuman',
                        'report_type' => 'group_by_date',
                        'model' => 'App\Models\Pengumuman',
                        'group_by_field' => 'created_at',
                        'date_format' => 'M Y',
                        'group_by_period' => 'month',
                        'chart_type' => 'bar',
                        'chart_color' => '50, 205, 50' // ubah warna menjadi limegreen
                    ];
                    
                    $chart_artikel = [
                        'chart_title' => 'Artikel',
                        'report_type' => 'group_by_date',
                        'model' => 'App\Models\Article',
                        'group_by_field' => 'created_at',
                        'date_format' => 'M Y',
                        'group_by_period' => 'month',
                        'chart_type' => 'bar',
                        'chart_color' => '65, 105, 225' // ubah warna menjadi royalblue
                    ];
                    
                    $chart_narasumber = [
                        'chart_title' => 'Narasumber',
                        'report_type' => 'group_by_date',
                        'model' => 'App\Models\Narasumber',
                        'group_by_field' => 'tanggal_acara',
                        'date_format' => 'M Y',
                        'group_by_period' => 'month',
                        'chart_type' => 'bar',
                        'chart_color' => '238, 130, 238' // ubah warna menjadi violet
                    ];
            
                    $chart_kunjungan = [
                        'chart_title' => 'Kunjungan',
                        'report_type' => 'group_by_date',
                        'model' => 'App\Models\Kunjungan',
                        'group_by_field' => 'waktu_kunjungan',
                        'date_format' => 'M Y',
                        'group_by_period' => 'month',
                        'chart_type' => 'bar',
                        'chart_color' => '255, 165, 0' // ubah warna menjadi orange
                    ];
                    
                    $chart = new LaravelChart($chart_agenda, $chart_pengumuman, $chart_artikel, $chart_narasumber, $chart_kunjungan);
                }

            $pengumuman_today = Pengumuman::where('division_id', $user->division_id)
                                    ->whereDate('created_at', $hari_ini)
                                    ->count();

            $pengumuman_monthly = Pengumuman::where('division_id', $user->division_id)
                                    ->whereMonth('created_at', $bulan_ini)
                                    ->count();

            $agenda_today = Agenda::where('division_id', $user->division_id)
                                    ->whereDate('waktu_pelaksanaan', $hari_ini)
                                    ->count();

            $agenda_monthly = Agenda::where('division_id', $user->division_id)
                                    ->whereMonth('waktu_pelaksanaan', $bulan_ini)
                                    ->count();
            
            $agenda_done = Agenda::where('division_id', $user->division_id)
                                    ->whereNotNull('tanggal_selesai')
                                    ->whereMonth('waktu_pelaksanaan', $bulan_ini)
                                    ->count();

            $agenda_not_done = Agenda::where('division_id', $user->division_id)
                                    ->whereNull('tanggal_selesai')
                                    ->whereMonth('waktu_pelaksanaan', $bulan_ini)
                                    ->count();
                        
            $artikel_anda = Article::where('user_id', auth()->user()->id)
                                    ->count();

            $artikel_terbaru = Article::where('user_id', auth()->user()->id)                   
                                    ->latest()->first();

        }
    
        // return view('dashboard.index', ['pengumuman_today' => $pengumuman_today]);
        return view('dashboard.index', compact(
            'url_agenda',
            'url_pengumuman',
            'pengumuman_today', 
            'pengumuman_monthly', 
            'agenda_today', 
            'agenda_monthly',
            'agenda_done',
            'agenda_not_done',
            'artikel_anda',
            'artikel_terbaru',
            'chart',
            'bulan_ini',
            'bulan_3',
            'bulan_12'
        ));
        
    }
}
