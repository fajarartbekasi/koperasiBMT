<?php

namespace App\Http\Controllers\Types;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Type;
use App\Http\Requests\TypesRequest;

class TypeController extends Controller
{
    /**
     * menampilkan data jenis pinjaman
     *
     */
    public function index()
    {
        $types = Type::latest()->paginate(10);

        return view('types.index', compact('types'));
    }

    /**
     * authorize for create jenis pinjaman
     *
     */
    public function create()
    {
        $this->authorize('create', Type::class);

        return view('types.create');
    }

    /**
     * masukan data jenis pinjaman kedalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypesRequest $request)
    {
        $this->authorize('create', Type::class);

        Type::create($request->all());

        flash('Jenis pinjaman berhasil ditambahkan.');

        return redirect()->route('types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * menampilkan form edit jenis pinjaman.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        $this->authorize('create', Type::class);

        return view('types.edit', compact('type'));
    }

    /**
     * Update data jenis pinjaman.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypesRequest $request, Type $type)
    {
        $this->authorize('create', Type::class);

        $type->update($request->all());

        flash('Jenis pinjaman berhasil diperbaharui.');

        return redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
