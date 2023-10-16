<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Narasumber;
use Illuminate\Http\Request;

class DashboardNarasumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if ($start_date && $end_date) {
            $end_date = Carbon::parse($end_date)->addDays(1);
            if($user->level_user === 'admin') {
                $narasumbers = Narasumber::whereNull('tanggal_approve')
                                  ->whereBetween('tanggal_acara', [$start_date, $end_date])
                                  ->get();
            } else {
                $narasumbers = Narasumber::whereNull('tanggal_approve')
                                  ->whereBetween('tanggal_acara', [$start_date, $end_date])
                                  ->get();
            }
            
        } else if ($start_date) {
            if($user->level_user === 'admin') {
                $narasumbers = Narasumber::whereNull('tanggal_approve')
                                  ->whereDate('tanggal_acara', $start_date)
                                  ->get();
            } else {
                $narasumbers = Narasumber::whereNull('tanggal_approve')
                                  ->whereDate('tanggal_acara', $start_date)
                                  ->get();
            }

        } else {
            if($user->level_user === 'admin') {
                $narasumbers = Narasumber::whereNull('tanggal_approve')
                                //   ->withTrashed() 
                                  //Untuk menampilkan data yang kena softdelete
                                  ->get();
            } else {
                $narasumbers = Narasumber::whereNull('tanggal_approve')
                                  ->get();
            }
        }
    
        confirmDelete();

        return view('dashboard.narasumbers.index', ['narasumbers' => $narasumbers]);
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
     * @param  \App\Models\Narasumber  $narasumber
     * @return \Illuminate\Http\Response
     */
    public function show(Narasumber $narasumber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Narasumber  $narasumber
     * @return \Illuminate\Http\Response
     */
    public function edit(Narasumber $narasumber)
    {
        return view('dashboard.narasumbers.edit', [
            'narasumber' => $narasumber,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Narasumber  $narasumber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Narasumber $narasumber)
    {
        $rules = [
            'name' => 'required|max:255',
            'tanggal_acara' => 'required|date_format:Y-m-d\TH:i',
            'tempat' => 'required',
            'asal' => 'required',
            'no_hp' => 'required'
        ];

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        Narasumber::where('id', $narasumber->id)
                ->update($validatedData);

        return redirect('/dashboard/narasumbers')->with('success', 'Permintaan Narasumber berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Narasumber  $narasumber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Narasumber $narasumber)
    {
        Narasumber::destroy($narasumber->id);
        return redirect('/dashboard/narasumbers')->with('success', 'Permintaan Narasumber telah dihapus!');
        // $narasumber = Narasumber::where('id', $id)->first();
        // $narasumber->delete();
        // return redirect('/dashboard/narasumbers')->with('success', 'Narasumber successfully deleted.');
    }

    //coba
    // public function approved()
    // {
    //     $approvedNarasumbers = Narasumber::whereNotNull('tanggal_approve')->get();
    
    //     return view('dashboard.narasumbers.approved', [
    //         'approvedNarasumbers' => $approvedNarasumbers
    //     ]);
    // }
    // public function approved()
    // {
    //     $approvedNarasumbers = Narasumber::whereNotNull('tanggal_approve')->get();
    //     return view('dashboard.narasumbers.approved', compact('approvedNarasumbers'));
    // }
    public function approve(Narasumber $narasumber)
    {
        $narasumber->update(['tanggal_approve' => now()]);
        return redirect()->back()->with('success', 'Narasumber berhasil diapprove!');
    }
    
    public function approved(Request $request)
    {
        // $approvedNarasumbers = Narasumber::whereNotNull('tanggal_approve')->get();
        // return view('dashboard.narasumbers.approved', compact('approvedNarasumbers'));
        $user = auth()->user();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if ($start_date && $end_date) {
            $end_date = Carbon::parse($end_date)->addDays(1);
            if($user->level_user === 'admin') {
                $narasumbers = Narasumber::whereNotNull('tanggal_approve')
                                  ->whereBetween('tanggal_acara', [$start_date, $end_date])
                                  ->get();
            } else {
                $narasumbers = Narasumber::whereNotNull('tanggal_approve')
                                  ->whereBetween('tanggal_acara', [$start_date, $end_date])
                                  ->get();
            }
            
        } else if ($start_date) {
            if($user->level_user === 'admin') {
                $narasumbers = Narasumber::whereNotNull('tanggal_approve')
                                  ->whereDate('tanggal_acara', $start_date)
                                  ->get();
            } else {
                $narasumbers = Narasumber::whereNotNull('tanggal_approve')
                                  ->whereDate('tanggal_acara', $start_date)
                                  ->get();
            }

        } else {
            if($user->level_user === 'admin') {
                $narasumbers = Narasumber::whereNotNull('tanggal_approve')
                                  ->get();
            } else {
                $narasumbers = Narasumber::whereNotNull('tanggal_approve')
                                  ->get();
            }
        }
    
        return view('dashboard.narasumbers.approved', ['narasumbers' => $narasumbers]);
    }
    
    public function softdelete(Request $request)
    {
        $user = auth()->user();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if ($start_date && $end_date) {
            $end_date = Carbon::parse($end_date)->addDays(1);
            if($user->level_user === 'admin') {
                $narasumbers = Narasumber::onlyTrashed()
                                  ->whereBetween('tanggal_acara', [$start_date, $end_date])
                                  ->get();
            } else {
                $narasumbers = Narasumber::onlyTrashed()
                                  ->whereBetween('tanggal_acara', [$start_date, $end_date])
                                  ->get();
            }
            
        } else if ($start_date) {
            if($user->level_user === 'admin') {
                $narasumbers = Narasumber::onlyTrashed()
                                  ->whereDate('tanggal_acara', $start_date)
                                  ->get();
            } else {
                $narasumbers = Narasumber::onlyTrashed()
                                  ->whereDate('tanggal_acara', $start_date)
                                  ->get();
            }

        } else {
            if($user->level_user === 'admin') {
                $narasumbers = Narasumber::onlyTrashed()
                                  ->get();
            } else {
                $narasumbers = Narasumber::onlyTrashed()
                                  ->get();
            }
        }
    
        confirmDelete();

        return view('dashboard.narasumbers.softdelete', ['narasumbers' => $narasumbers]);
    }
    
    public function restore(Request $request, $id)
    {
        $user = auth()->user();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $narasumbers = Narasumber::query(); // Inisialisasi query builder

        if ($start_date && $end_date) {
            $end_date = Carbon::parse($end_date)->addDays(1);
            if ($user->level_user === 'admin') {
                $narasumbers->whereBetween('tanggal_acara', [$start_date, $end_date]);
            } else {
                $narasumbers->where('user_id', $user->id)
                    ->whereBetween('tanggal_acara', [$start_date, $end_date]);
            }
        } else if ($start_date) {
            if ($user->level_user === 'admin') {
                $narasumbers->whereDate('tanggal_acara', $start_date);
            } else {
                $narasumbers->where('user_id', $user->id)
                    ->whereDate('tanggal_acara', $start_date);
            }
        } else {
            if ($user->level_user !== 'admin') {
                $narasumbers->where('user_id', $user->id);
            }
        }

        $narasumber = Narasumber::withTrashed()->find($id); // Temukan data berdasarkan ID, termasuk yang terhapus
        if ($narasumber) {
            $narasumber->restore(); // Restore data yang dipilih
        } else {
            return redirect()->route('narasumbers.index')->with('error', 'Data Narasumber tidak ditemukan');
        }

        return redirect()->route('narasumbers.index')->with('success', 'Permintaan narasumber berhasil dikembalikan!');
    }

    public function forcedelete($id)
    {
        $narasumbers = Narasumber::onlyTrashed()->findOrFail($id);
        $narasumbers->forceDelete();
    
        return redirect()->route('dashboard.narasumbers.softdelete')->with('success', 'Permintaan Narasumber berhasil dihapus!');
    }
    
}
