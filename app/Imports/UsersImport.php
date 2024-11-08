<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'name'      => $row[0],
            'username'  => $row[1],
            'password'  => bcrypt($row[2]),
            'role'      => $row[3] ?? 'user',
            'jabatan'   => $row[4] ?? null,
        ]);
    }

    /**
     * Validasi kolom data Excel.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            '0' => 'required|string',
            '1' => 'required|string|unique:users,username',
            '2' => 'required|string',
            '3' => 'nullable|in:admin,user',
            '4' => 'nullable|string',
        ];
    }
}
