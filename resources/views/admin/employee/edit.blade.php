@extends('layouts.dashboard')
@section('title', 'Data Karyawan')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Edit Data Karyawan</h1>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card shadow">
      <div class="card-body">
        <form action="{{ route('karyawan.update', $employee->id) }}" method="post">
          @csrf
          @method('put')
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="nik">NIK</label>
              <input type="number" name="nik" class="form-control" id="nik" placeholder="Input nik..." value="{{ $employee->nik }}">
              @error('nik')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="nama">Nama</label>
              <input type="text" name="nama" class="form-control" id="nama" placeholder="Input nama..." value="{{ $employee->nama }}">
              @error('nama')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="tempat_lahir">Tempat Lahir</label>
              <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Input tempat lahir..." value="{{ $employee->tempat_lahir }}">
              @error('tempat_lahir')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="tgl_lahir">Tanggal Lahir</label>
              <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" value="{{ $employee->tgl_lahir }}">
              @error('tgl_lahir')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="umur">Umur</label>
              <input type="number" name="umur" class="form-control" id="umur" placeholder="Input umur..." value="{{ $employee->umur }}">
              @error('umur')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="jabatan">Jabatan</label>
              <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Input jabatan..." value="{{ $employee->jabatan }}">
              @error('jabatan')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="telp">No. Telpon</label>
              <input type="number" name="telp" class="form-control" id="telp" placeholder="Input nomor telpon..." value="{{ $employee->telp }}">
              @error('telp')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="alamat">Alamat</label>
              <textarea name="alamat" id="alamat" rows="3" class="form-control">{{ $employee->alamat }}</textarea>
              @error('alamat')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="d-flex justify-content-end">
            <a href="{{ route('karyawan.index') }}" class="btn btn-warning mr-3">Kembali</a>
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection