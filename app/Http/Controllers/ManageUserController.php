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
        $validated = $request->validate([
            'name' => 'required|array',
            'name.*' => 'required|string|max:255',
            'username' => 'required|array',
            'username.*' => 'required|string|unique:users,username|max:255',
            'password' => 'required|array',
            'password.*' => 'required|string|min:6',
            'role' => 'required|array',
            'role.*' => 'required|string|in:admin,user',
            'jabatan' => 'nullable|array',
            'jabatan.*' => 'nullable|string|max:255',
        ]);

        foreach ($validated['name'] as $key => $name) {
            User::create([
                'name' => $name,
                'username' => $validated['username'][$key],
                'password' => Hash::make($validated['password'][$key]),
                'role' => $validated['role'][$key],
                'jabatan' => $validated['jabatan'][$key] ?? null,
            ]);
        }

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
