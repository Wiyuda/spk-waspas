@extends('layouts.dashboard')
@section('title', 'Data Karyawan')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Data Karyawan</h1>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card shadow">
      <div class="card-body">
        <a href="{{ route('karyawan.create') }}" class="btn btn-primary">Tambah Data Karyawan</a>
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('status') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
        <div class="table-responsive mt-3">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Umur</th>
                <th>Jabatan</th>
                <th>Alamat</th>
                <th>Telpon</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
                $i = 1;
              @endphp
              @foreach ($employees as $employee)
                <tr>
                  <th>{{ $i++ }}</th>
                  <td>{{ $employee->nik }}</td>
                  <td>{{ $employee->nama }}</td>
                  <td>{{ $employee->tempat_lahir }}</td>
                  <td>{{ $employee->tgl_lahir }}</td>
                  <td>{{ $employee->umur }}</td>
                  <td>{{ $employee->jabatan }}</td>
                  <td>{{ $employee->alamat }}</td>
                  <td>{{ $employee->telp }}</td>
                  <td>
                    <a href="{{ route('karyawan.edit', $employee->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('karyawan.destroy', $employee->id) }}" method="POST" class="d-inlie">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger d-inline"><i class="fas fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection