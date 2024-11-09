<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loc = Location::all();
        return view('dashboard.manage_location.index', compact('loc'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.manage_location.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name_location' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'radius' => 'required',
            'is_active' => 'required',
        ]);
        Location::create($validate);
        return redirect()->route('manage-location.index')->with('success', 'berhasil menambahkan lokasi');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $loc = Location::find($id);
        return view('dashboard.manage_location.edit', compact('loc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name_location' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'radius' => 'required',
            'is_active' => 'required',
        ]);
        $loc = Location::find($id);
        $loc->update($validate);
        return redirect()->route('manage-location.index')->with('success', 'berhasi edit ' . $loc->name_location);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $loc = Location::find($id);
        $loc->delete();
        return back()->with('success', 'berhasil hapus ' . $loc->name_location);
    }
}
