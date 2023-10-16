<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kunjungan;
use Illuminate\Http\Request;

class DashboardKunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return view('dashboard.kunjungans.index', [
        //     'kunjungans' => Kunjungan::whereNull('tanggal_approve')->get()
        // ]);
        $user = auth()->user();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if ($start_date && $end_date) {
            $end_date = Carbon::parse($end_date)->addDays(1);
            if($user->level_user === 'admin') {
                $kunjungans = Kunjungan::whereNull('tanggal_approve')
                                  ->whereBetween('waktu_kunjungan', [$start_date, $end_date])
                                  ->get();
            } else {
                $kunjungans = Kunjungan::whereNull('tanggal_approve')
                                  ->whereBetween('waktu_kunjungan', [$start_date, $end_date])
                                  ->get();
            }
            
        } else if ($start_date) {
            if($user->level_user === 'admin') {
                $kunjungans = Kunjungan::whereNull('tanggal_approve')
                                  ->whereDate('waktu_kunjungan', $start_date)
                                  ->get();
            } else {
                $kunjungans = Kunjungan::whereNull('tanggal_approve')
                                  ->whereDate('waktu_kunjungan', $start_date)
                                  ->get();
            }

        } else {
            if($user->level_user === 'admin') {
                $kunjungans = Kunjungan::whereNull('tanggal_approve')
                                  ->get();
            } else {
                $kunjungans = Kunjungan::whereNull('tanggal_approve')
                                  ->get();
            }
        }
    
        confirmDelete();

        return view('dashboard.kunjungans.index', ['kunjungans' => $kunjungans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function show(Kunjungan $kunjungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kunjungan $kunjungan)
    {
        return view('dashboard.kunjungans.edit', [
            'kunjungan' => $kunjungan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kunjungan $kunjungan)
    {
        $rules = [
            'name' => 'required|max:255',
            'waktu_kunjungan' => 'required|date_format:Y-m-d\TH:i',
            'keperluan' => 'required',
            'asal' => 'required',
            'no_hp' => 'required'
        ];

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        Kunjungan::where('id', $kunjungan->id)
                ->update($validatedData);

        return redirect('/dashboard/kunjungans')->with('success', 'Permintaan Kunjungan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kunjungan $kunjungan)
    {
        Kunjungan::destroy($kunjungan->id);
        return redirect('/dashboard/kunjungans')->with('success', 'Permintaan Kunjungan telah dihapus!');
    }

    public function approve(Kunjungan $kunjungan)
    {
        $kunjungan->update(['tanggal_approve' => now()]);
        return redirect()->back()->with('success', 'Kunjungan berhasil diapprove!');
    }
    
    public function approved(Request $request)
    {
        // $approvedKunjungans = Kunjungan::whereNotNull('tanggal_approve')->get();
        // return view('dashboard.kunjungans.approved', compact('approvedKunjungans'));
        $user = auth()->user();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if ($start_date && $end_date) {
            $end_date = Carbon::parse($end_date)->addDays(1);
            if($user->level_user === 'admin') {
                $kunjungans = Kunjungan::whereNotNull('tanggal_approve')
                                  ->whereBetween('waktu_kunjungan', [$start_date, $end_date])
                                  ->get();
            } else {
                $kunjungans = Kunjungan::whereNotNull('tanggal_approve')
                                  ->whereBetween('waktu_kunjungan', [$start_date, $end_date])
                                  ->get();
            }
            
        } else if ($start_date) {
            if($user->level_user === 'admin') {
                $kunjungans = Kunjungan::whereNotNull('tanggal_approve')
                                  ->whereDate('waktu_kunjungan', $start_date)
                                  ->get();
            } else {
                $kunjungans = Kunjungan::whereNotNull('tanggal_approve')
                                  ->whereDate('waktu_kunjungan', $start_date)
                                  ->get();
            }

        } else {
            if($user->level_user === 'admin') {
                $kunjungans = Kunjungan::whereNotNull('tanggal_approve')
                                  ->get();
            } else {
                $kunjungans = Kunjungan::whereNotNull('tanggal_approve')
                                  ->get();
            }
        }
    
        return view('dashboard.kunjungans.approved', ['kunjungans' => $kunjungans]);
    }

    public function softdelete(Request $request)
    {
        $user = auth()->user();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if ($start_date && $end_date) {
            $end_date = Carbon::parse($end_date)->addDays(1);
            if($user->level_user === 'admin') {
                $kunjungans = Kunjungan::onlyTrashed()
                                  ->whereBetween('waktu_kunjungan', [$start_date, $end_date])
                                  ->get();
            } else {
                $kunjungans = Kunjungan::onlyTrashed()
                                  ->whereBetween('waktu_kunjungan', [$start_date, $end_date])
                                  ->get();
            }
            
        } else if ($start_date) {
            if($user->level_user === 'admin') {
                $kunjungans = Kunjungan::onlyTrashed()
                                  ->whereDate('waktu_kunjungan', $start_date)
                                  ->get();
            } else {
                $kunjungans = Kunjungan::onlyTrashed()
                                  ->whereDate('waktu_kunjungan', $start_date)
                                  ->get();
            }

        } else {
            if($user->level_user === 'admin') {
                $kunjungans = Kunjungan::onlyTrashed()
                                  ->get();
            } else {
                $kunjungans = Kunjungan::onlyTrashed()
                                  ->get();
            }
        }
    
        confirmDelete();

        return view('dashboard.kunjungans.softdelete', ['kunjungans' => $kunjungans]);
    }
    
    public function restore(Request $request, $id)
    {
        $user = auth()->user();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $kunjungans = Kunjungan::query(); // Inisialisasi query builder

        if ($start_date && $end_date) {
            $end_date = Carbon::parse($end_date)->addDays(1);
            if ($user->level_user === 'admin') {
                $kunjungans->whereBetween('waktu_kunjungan', [$start_date, $end_date]);
            } else {
                $kunjungans->where('user_id', $user->id)
                    ->whereBetween('waktu_kunjungan', [$start_date, $end_date]);
            }
        } else if ($start_date) {
            if ($user->level_user === 'admin') {
                $kunjungans->whereDate('waktu_kunjungan', $start_date);
            } else {
                $kunjungans->where('user_id', $user->id)
                    ->whereDate('waktu_kunjungan', $start_date);
            }
        } else {
            if ($user->level_user !== 'admin') {
                $kunjungans->where('user_id', $user->id);
            }
        }

        $kunjungan = Kunjungan::withTrashed()->find($id); // Temukan data berdasarkan ID, termasuk yang terhapus
        if ($kunjungan) {
            $kunjungan->restore(); // Restore data yang dipilih
        } else {
            return redirect()->route('kunjungans.index')->with('error', 'Data Kunjungan tidak ditemukan');
        }

        return redirect()->route('kunjungans.index')->with('success', 'Permintaan Kunjungan berhasil dikembalikan!');
    }

    public function forcedelete($id)
    {
        $kunjungans = Kunjungan::onlyTrashed()->findOrFail($id);
        $kunjungans->forceDelete();
    
        return redirect()->route('dashboard.kunjungans.softdelete')->with('success', 'Permintaan Kunjungan berhasil dihapus!');
    }

}