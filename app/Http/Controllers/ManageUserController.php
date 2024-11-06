<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->get();
        return view('dashboard.manage_user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.manage_user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validasi dan simpan data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username|max:255',
            'password' => 'required|string',
            'role' => 'required|string|in:admin,user',
            'jabatan' => 'nullable|string|max:255',
        ]);

        User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'jabatan' => $validated['jabatan'] ?? null,
        ]);

        return redirect()->route('ManageUser.index')->with('success', 'Pengguna berhasil ditambahkan');
    }



    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
