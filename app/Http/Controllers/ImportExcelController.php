<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use Illuminate\Http\Request;

class ImportExcelController extends Controller
{
    public function import(Request $request)
    {
        // Validasi file yang diunggah
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv|max:2048', // Maksimal ukuran file 2MB
        ]);

        try {
            Excel::import(new UsersImport, $request->file('file'));

            return redirect()->back()->with('success', 'Pengguna berhasil diimpor!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengimpor pengguna: ' . $e->getMessage());
        }
    }
}
