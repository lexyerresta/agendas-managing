<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Agenda;
use App\Models\Division;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Notifications\ReminderNotification;
use Illuminate\Support\Facades\Gate;

class DashboardAgendaController extends Controller
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
                $agendas = Agenda::whereNull('tanggal_selesai')
                                  ->whereBetween('waktu_pelaksanaan', [$start_date, $end_date])
                                  ->get();
            } else {
                $agendas = Agenda::where('division_id', $user->division_id)
                                  ->whereNull('tanggal_selesai')
                                  ->whereBetween('waktu_pelaksanaan', [$start_date, $end_date])
                                  ->where('status', true)
                                  ->get();
            }
            
        } else if ($start_date) {
            if($user->level_user === 'admin') {
                $agendas = Agenda::whereNull('tanggal_selesai')
                                  ->whereDate('waktu_pelaksanaan', $start_date)
                                  ->get();
            } else {
                $agendas = Agenda::where('division_id', $user->division_id)
                                  ->whereNull('tanggal_selesai')
                                  ->whereDate('waktu_pelaksanaan', $start_date)
                                  ->where('status', true)
                                  ->get();
            }

        } else {
            if($user->level_user === 'admin') {
                $agendas = Agenda::whereNull('tanggal_selesai')
                                  ->get();
            } else {
                $agendas = Agenda::where('division_id', $user->division_id)
                                  ->whereNull('tanggal_selesai')
                                  ->where('status', true)
                                  ->get();
            }
        }
    
        return view('dashboard.agendas.index', ['agendas' => $agendas]);
    }    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::all();
        return view('dashboard.agendas.create', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_agenda' => 'required|max:255',
            'division' => 'required',
            'perihal' => 'required|max:255',
            'notulensi' => 'required',
            'waktu_pelaksanaan' => 'required|date_format:Y-m-d\TH:i|after_or_equal:'.now()->format('Y-m-d\TH:i'),
            'tempat_pelaksanaan' => 'required|max:255',
            'link_dokumentasi' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);
    
        $agenda = new Agenda;
        $agenda->nama_agenda = $request->nama_agenda;
        $agenda->division_id = $request->division;
        $agenda->perihal = $request->perihal;
        $agenda->notulensi = $request->notulensi;
        $agenda->waktu_pelaksanaan = $request->waktu_pelaksanaan;
        $agenda->tempat_pelaksanaan = $request->tempat_pelaksanaan;
        $agenda->link_dokumentasi = $request->link_dokumentasi;
        $agenda->user_id = $request->user_id;
        $agenda->save();
    
        return redirect('/dashboard/agendas')->with('success', 'Agenda berhasil ditambahkan!');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        $divisions = Division::all();

        return view('dashboard.agendas.edit', [
            'agenda' => $agenda,
            'divisions' => $divisions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */

    //  oldcode
    // public function update(Request $request, Agenda $agenda)
    // {
    //     $rules = [
    //         'nama_agenda' => 'required|max:255',
    //         'division' => 'required|exists:divisions,id',
    //         'perihal' => 'required|max:255',
    //         'notulensi' => 'required',
    //         'waktu_pelaksanaan' => 'required|date_format:Y-m-d\TH:i',
    //         'tempat_pelaksanaan' => 'required|max:255',
    //         'link_dokumentasi' => 'required',
    //     ];
    
    //     $validatedData = $request->except('_token', '_method');
    //     $request->validate($rules);
    
    //     // $validatedData['division_id'] = $request->division;
    //     if (Auth::user()->can('admin')) {
    //         $validatedData['division_id'] = $request->division;
    //     } else {
    //         $validatedData['division_id'] = $agenda->division_id;
    //     }
        
    //     $validatedData['user_id'] = auth()->user()->id;
    
    //     Agenda::where('id', $agenda->id)
    //     ->update([
    //         'nama_agenda' => $request->nama_agenda,
    //         'division_id' => $request->division,
    //         'perihal' => $request->perihal,
    //         'notulensi' => $request->notulensi,
    //         'waktu_pelaksanaan' => $request->waktu_pelaksanaan,
    //         'tempat_pelaksanaan' => $request->tempat_pelaksanaan,
    //         'link_dokumentasi' => $request->link_dokumentasi,
    //         'user_id' => auth()->user()->id
    //     ]);  
    
    //     return redirect('/dashboard/agendas')->with('success', 'Agenda berhasil diubah!');
    // }
    
    public function update(Request $request, Agenda $agenda)
    {
        $rules = [
            'nama_agenda' => 'required|max:255',
            'perihal' => 'required|max:255',
            'notulensi' => 'required',
            'waktu_pelaksanaan' => 'required|date_format:Y-m-d\TH:i',
            'tempat_pelaksanaan' => 'required|max:255',
            'link_dokumentasi' => 'required',
        ];

        // Jika pengguna adalah admin, validasi juga mencakup field division
        if (Gate::allows('admin')) {
            $rules['division'] = 'required|exists:divisions,id';
        }

        $validatedData = $request->validate($rules);

        // Update data agenda
        $agenda->nama_agenda = $validatedData['nama_agenda'];
        $agenda->perihal = $validatedData['perihal'];
        $agenda->notulensi = $validatedData['notulensi'];
        $agenda->waktu_pelaksanaan = $validatedData['waktu_pelaksanaan'];
        $agenda->tempat_pelaksanaan = $validatedData['tempat_pelaksanaan'];
        $agenda->link_dokumentasi = $validatedData['link_dokumentasi'];

        // Jika pengguna adalah admin, update juga division_id
        if (Gate::allows('admin')) {
            $agenda->division_id = $validatedData['division'];
        }

        $agenda->save();

        return redirect('/dashboard/agendas')->with('success', 'Agenda berhasil diubah!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        Agenda::destroy($agenda->id);
        return redirect('/dashboard/agendas')->with('success', 'Agenda telah dihapus!');
    }

    public function approve(Agenda $agenda)
    {
        $agenda->update(['tanggal_selesai' => now()]);
        return redirect()->back()->with('success', 'Agenda telah diselesaikan!');
    }
    
    public function approved(Request $request)
    {
        // $approvedAgendas = Agenda::whereNotNull('tanggal_selesai')->get();
        // return view('dashboard.agendas.approved', compact('approvedAgendas'));
        $user = auth()->user();
        $divisions = Division::all();
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if ($start_date && $end_date) {
            $end_date = Carbon::parse($end_date)->addDays(1);
            if($user->level_user === 'admin') {
                $agendas = Agenda::whereNotNull('tanggal_selesai')
                                  ->whereBetween('waktu_pelaksanaan', [$start_date, $end_date])
                                  ->get();
            } else {
                $agendas = Agenda::where('division_id', $user->division_id)
                                  ->whereNotNull('tanggal_selesai')
                                  ->whereBetween('waktu_pelaksanaan', [$start_date, $end_date])
                                  ->get();
            }
            
        } else if ($start_date) {
            if($user->level_user === 'admin') {
                $agendas = Agenda::whereNotNull('tanggal_selesai')
                                  ->whereDate('waktu_pelaksanaan', $start_date)
                                  ->get();
            } else {
                $agendas = Agenda::where('division_id', $user->division_id)
                                  ->whereNotNull('tanggal_selesai')
                                  ->whereDate('waktu_pelaksanaan', $start_date)
                                  ->get();
            }

        } else {
            if($user->level_user === 'admin') {
                $agendas = Agenda::whereNotNull('tanggal_selesai')
                                  ->get();
            } else {
                $agendas = Agenda::where('division_id', $user->division_id)
                                  ->whereNotNull('tanggal_selesai')
                                  ->get();
            }
        }
    
        return view('dashboard.agendas.approved', ['agendas' => $agendas], ['divisions' => $divisions]);
    }

    // public function exportPdf($id)
    // {
    //     $agenda = Agenda::find($id);
        
    //     $pdf = PDF::loadView('pdf.export-agenda', ['agenda' => $agenda]);
            
    //     $headers = [
    //         'Content-Type' => 'application/pdf',
    //         'Content-Disposition' => 'attachment; filename="Agenda_kegiatan_'.Carbon::now()->timestamp.'.pdf"'
    //     ];
            
    //     return response()->make($pdf->output(), 200, $headers);
    // }

    public function Print($id)
    {
        $agenda = Agenda::find($id);

        $datetime = new DateTime($agenda->waktu_pelaksanaan);
        $datetime2 = new DateTime($agenda->tanggal_selesai);
        //date time untuk ambil jam:menit
        $waktu_mulai = $datetime->format('H:i');        
        $waktu_selesai = $datetime2->format('H:i');        

        return view('pdf.export-agenda', compact('agenda', 'waktu_mulai' , 'waktu_selesai'));
    }

    public function rekap(Request $request)
    {
        $user = auth()->user();
        $divisions = Division::all();
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $division_id = $request->input('division');
        $division = Division::find($division_id); // Fetch the division based on the division ID

        if ($division_id) {
            if ($start_date && $end_date) {
                $end_date = Carbon::parse($end_date);
                    $agendas = Agenda::whereNotNull('tanggal_selesai')
                                      ->whereBetween('waktu_pelaksanaan', [$start_date, $end_date])
                                      ->where('division_id', $division_id)
                                      ->get();
    
            } else if ($start_date) {
                    $agendas = Agenda::whereNotNull('tanggal_selesai')
                                      ->whereDate('waktu_pelaksanaan', $start_date)
                                      ->where('division_id', $division_id)
                                      ->get();
            
            } else {
                    $agendas = Agenda::whereNotNull('tanggal_selesai')
                                      ->where('division_id', $division_id)
                                      ->get();
            }
        } else {
            if ($start_date && $end_date) {
                $end_date = Carbon::parse($end_date);
                    $agendas = Agenda::whereNotNull('tanggal_selesai')
                                      ->whereBetween('waktu_pelaksanaan', [$start_date, $end_date])
                                      ->get();
    
            } else if ($start_date) {
                    $agendas = Agenda::whereNotNull('tanggal_selesai')
                                      ->whereDate('waktu_pelaksanaan', $start_date)
                                      ->get();
            
            } else {
                    $agendas = Agenda::whereNotNull('tanggal_selesai')
                                      ->get();
            }
        }
    
        return view('pdf.rekap-agenda', compact(
            'agendas',
            'divisions',
            'start_date',
            'end_date',
            'division'
        ));
    }
     
    // public function status(Request $request, $id)
    // {
    //     $agenda = Agenda::findOrFail($id);
    //     $agenda->active = $request->input('active', false);
    //     $agenda->save();

    //     return response()->json(['active' => $agenda->active]);
    // }

    public function unactive($id)
    {
        $agendas = Agenda::where('id', $id)->firstOrFail();
        $agendas->status = false;
        $agendas->save();
        
        return redirect('/dashboard/agendas')->with('success', 'Agenda berhasil dinonaktifkan.');
    }
    
    public function active($id)
    {
        $agendas = Agenda::where('id', $id)->firstOrFail();
        $agendas->status = true;
        $agendas->save();
    
        return redirect('/dashboard/agendas')->with('success', 'Agenda berhasil diaktifkan kembali.');
    }
    

}

