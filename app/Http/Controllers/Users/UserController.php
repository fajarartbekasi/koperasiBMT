<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;

class UserController extends Controller
{
    public function create()
    {
        $roles = Role::pluck('name','id');

        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nip'           => 'required|unique:users',
            'name'          => 'bail|required|min:2',
            'email'         => 'required',
            'jenis_kelamin' => 'required',
            'jabatan'       => 'required',
            'alamat'        => 'required',
            'phone'         => 'required',
            'password'      => 'required|min:6',
            'roles'         => 'required|min:1',
        ]);

        $request->merge(['password' => bcrypt($request->get('password'))]);

        if($user = User::create($request->except('roles'))){
            $user->syncRoles($request->get('roles'));

            flash()->success('Pengguna berhasil ditambahkan');

        }else{
            flash()->error('Tidak dapat menambahkan pengguna');
        }

        return redirect()->route('anggota.index');
    }
}
