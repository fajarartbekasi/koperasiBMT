<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;

class UserController extends Controller
{
    /**
     * new usercontroller instance.
     *
     */
    public function __construct()
    {
        $this->middleware(['role:bendahara', 'verified']);
    }
     /**
      * Tampilkan formulir pengguna baru
      *
      */
    public function create()
    {
        $roles = Role::pluck('name','id');

        return view('users.create', compact('roles'));
    }
    /**
     * simpan data pengguna baru ke dalam database.
     *
     */
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
    /**
     * tampilkan form edit pengguna
     *
     * @param [type] $id
     */
    public function edit($id)
    {
        $data = [
            'pegawai'   => User::findOrFail($id),
            'roles'     => Role::pluck('name', 'id'),
        ];

        return view('users.edit', $data);
    }
    /**
     * perbaharui data pengguna
     *
     * @param Request $request
     * @param [type] $id
     */
    public function update(Request $request, $id)
    {
        if(auth()->user()->id == $id){
            flash('Peringatan ! Pembaruan pengguna yang saat ini masuk tidak diizinkan,
                   silahkan menggunakan fitur pengaturan.')->warning();
            return redirect()->back();
        }

        $user = User::findOrFail($id);
        $user->fill($request->except('roles','password'));

        if($request->get('password')){
            $user->password = bcrypt($request->get('password'));
        }

        $user->save();
        $user->syncRoles($request->get('roles'));

        flash()->success('Data penguna berhasil di perbaharui');

        return redirect()->route('anggota.index');
    }
}
