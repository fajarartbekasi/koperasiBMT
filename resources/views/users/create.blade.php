@extends('layouts.app')

@section('content')
<div class="col-lg-12">

    <div class="card">
        <h5 class="card-header">Formulir pengguna baru</h5>
        <div class="card-body">
            <form action="{{route('users.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nip">NIP:</label>
                            <input type="number" name="nip" value="{{old('nip')}}" id="nip" class="form-control" placeholder="Nip...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" name="email" value="{{old('email')}}" id="email" class="form-control" placeholder="Email...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" name="name" value="{{old('name')}}" id="nama" class="form-control" placeholder="Nama...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin:</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="">Pleace select one</option>
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="jabatan">Jabatan:</label>
                            <input type="text" name="jabatan" value="{{old('jabatan')}}" id="jabatan" class="form-control" placeholder="Jabatan...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <input type="text" name="alamat" value="{{old('alamat')}}" id="alamat" class="form-control" placeholder="Alamat...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="phone">No Hp:</label>
                            <input type="number" name="phone" value="{{old('phone')}}" id="phone" class="form-control" placeholder="+62...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" value="" id="password" class="form-control" placeholder="******">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="roles">Akses:</label>
                            <select name="roles" id="roles" class="form-control">
                                <option value="">Pleace select one</option>
                                @foreach ($roles as $role)
                                    <option value="{{$role}}">{{$role}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-outline-primary">
                            Simpan
                        </button>
                        <button type="submit" class="btn btn-outline-secondary">
                            Cancel
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
