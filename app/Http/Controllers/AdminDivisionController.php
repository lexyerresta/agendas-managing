<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class AdminDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.divisions.index', [
            'divisions' => Division::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.divisions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Division::create($validatedData);

        return redirect('/dashboard/divisions')->with('success', 'Divisi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function edit(Division $division)
    {
        return view('dashboard.divisions.edit', [
            'division' => $division
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {
        $rules = [
            'name' => 'required|max:255',
        ];

        $validatedData = $request->validate($rules);

        Division::where('id', $division->id)
                ->update($validatedData);

        return redirect('/dashboard/divisions')->with('success', 'Divisi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        Division::destroy($division->id);
        return redirect('/dashboard/divisions')->with('success', 'Divisi telah dihapus!');
    }

    public function unactive($id)
    {
        $divisions = Division::where('id', $id)->firstOrFail();
        $divisions->status = false;
        $divisions->save();
        
        return redirect('/dashboard/divisions')->with('success', 'Divisi berhasil dinonaktifkan.');
    }
    
    public function active($id)
    {
        $divisions = Division::where('id', $id)->firstOrFail();
        $divisions->status = true;
        $divisions->save();
    
        return redirect('/dashboard/divisions')->with('success', 'Divisi berhasil diaktifkan kembali.');
    }
}
