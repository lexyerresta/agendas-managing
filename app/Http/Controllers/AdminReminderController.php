<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Mail\ReminderKegiatan;
use Illuminate\Support\Facades\Mail;

class AdminReminderController extends Controller
{
    public function index(Request $request)
    {
        $now = Carbon::now();
        // Mendefinisikan daftar divisi yang ingin dikirimkan email
        $divisions = ['P2M', 'Rehabilitasi', 'Pemberantasan', 'Intelijen', 'Sarpras', 'Umum', 'Humas'];
    
        foreach ($divisions as $division) {
            $users = User::whereIn('level_user', ['admin', 'staff'])
                ->where('division_id', function ($query) use ($division) {
                    $query->select('id')->from('divisions')->where('name', $division);
                })
                ->select('email')
                ->get();

            $agendas = Agenda::where('waktu_pelaksanaan', '>', $now)
                ->where('division_id', function ($query) use ($division) {
                    $query->select('id')->from('divisions')->where('name', $division);
                })
                ->whereNull('tanggal_selesai') // hanya mencari agenda yang belum selesai
                ->get();            

            if ($agendas->isNotEmpty()) {
                $emailsPerBatch = 50;
                $emailBatches = array_chunk($users->toArray(), $emailsPerBatch);
                foreach ($emailBatches as $batch) {
                    $emails = array_column($batch, 'email');
                    Mail::to($emails)->send(new ReminderKegiatan($agendas));
                    usleep(500000); // delay 0.5 detik antara setiap batch
                }
            }
        }
    
        return redirect('/dashboard/agendas')->with('success', 'Email telah berhasil dikirim!');
    }     

}
