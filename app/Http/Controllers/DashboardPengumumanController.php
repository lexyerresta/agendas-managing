<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Article;
use Carbon\Carbon;
use App\Models\Division;
use App\Models\Pengumuman;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardPengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        // $user = auth()->user();
    
        // if($user->level_user === 'admin') {
        //     $pengumumans = Pengumuman::all();
        // } else {
        //     $pengumumans = Pengumuman::where('division_id', $user->division_id)
        //                       ->get();
        // }
    
        // return view('dashboard.pengumumans.index', ['pengumumans' => $pengumumans]);

        $user = auth()->user();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if ($start_date && $end_date) {
            $end_date = Carbon::parse($end_date)->addDays(1);
            if($user->level_user === 'admin') {
                $pengumumans = Pengumuman::whereBetween('created_at', [$start_date, $end_date])
                                  ->get();
            } else {
                $pengumumans = Pengumuman::where('division_id', $user->division_id)
                                  ->whereBetween('created_at', [$start_date, $end_date])
                                  ->where('status', true)
                                  ->get();
            }
            
        } else if ($start_date) {
            if($user->level_user === 'admin') {
                $pengumumans = Pengumuman::whereDate('created_at', $start_date)
                                  ->get();
            } else {
                $pengumumans = Pengumuman::where('division_id', $user->division_id)
                                  ->whereDate('created_at', $start_date)
                                  ->where('status', true)
                                  ->get();
            }

        } else {
            if($user->level_user === 'admin') {
                $pengumumans = Pengumuman::get();
            } else {
                $pengumumans = Pengumuman::where('division_id', $user->division_id)
                                  ->where('status', true)
                                  ->get();
            }
        }
    
        return view('dashboard.pengumumans.index', ['pengumumans' => $pengumumans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::all();
    
        return view('dashboard.pengumumans.create', ['divisions' => $divisions]);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'division' => 'required',
            'body' => 'required'
        ];
    
        $validatedData = $request->validate($rules);
    
        $validatedData['user_id'] = auth()->user()->id;
        
        // tambahkan division_id dengan nilai dari input division
        $validatedData['division_id'] = $request->input('division');
    
        Pengumuman::create($validatedData);
    
        return redirect('/dashboard/pengumumans')->with('success', 'Pengumuman berhasil ditambahkan!');
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengumuman $pengumuman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumuman $pengumuman)
    {
        $user = auth()->user();
        $divisions = Division::all();
    
        if ($user->level_user !== 'admin') {
            $divisions = $divisions->where('id', $user->division_id);
        }
    
        return view('dashboard.pengumumans.edit', compact('pengumuman', 'divisions'));
    }
    
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $rules = [
            'title' => 'required|max:255',
            'division' => 'required',
            'body' => 'required'
        ];
    
        $validatedData = $request->validate($rules);
    
        $validatedData['user_id'] = auth()->user()->id;
    
        $validatedData['division_id'] = $validatedData['division'];
        unset($validatedData['division']);
    
        Pengumuman::where('id', $pengumuman->id)
                ->update($validatedData);
    
        return redirect('/dashboard/pengumumans')->with('success', 'Pengumuman berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman)
    {
        Pengumuman::destroy($pengumuman->id);
        return redirect('/dashboard/pengumumans')->with('success', 'Pengumuman telah dihapus!');
    }

    public function unactive($id)
    {
        $pengumumans = Pengumuman::where('id', $id)->firstOrFail();
        $pengumumans->status = false;
        $pengumumans->save();
        
        return redirect('/dashboard/pengumumans')->with('success', 'Pengumuman berhasil dinonaktifkan.');
    }
    
    public function active($id)
    {
        $pengumumans = Pengumuman::where('id', $id)->firstOrFail();
        $pengumumans->status = true;
        $pengumumans->save();
    
        return redirect('/dashboard/pengumumans')->with('success', 'Pengumuman berhasil diaktifkan kembali.');
    }
}
