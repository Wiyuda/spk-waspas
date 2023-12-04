@extends('layouts.dashboard')
@section('title', 'Data Penilaian Karyawan')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Data Penilaian Karyawan</h1>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card shadow">
      <div class="card-body">
        <a href="{{ route('penilaian.create') }}" class="btn btn-primary">Tambah Data Penilaian</a>
        <a href="{{ route('rangking') }}" class="btn btn-success">Rangking</a>
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
                <th>Perilaku</th>
                <th>Penampilan</th>
                <th>Kedisiplinan</th>
                <th>Knowledge</th>
                <th>Inovasi</th>
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
                  <td>{{ $employee->behavior->perilaku }}</td>
                  <td>{{ $employee->appearance->penampilan }}</td>
                  <td>{{ $employee->discipline->disiplin }}</td>
                  <td>{{ $employee->knowledge->knowledge }}</td>
                  <td>{{ $employee->inovation->inovasi }}</td>
                  <td>
                    <a href="{{ route('penilaian.edit', $employee->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('penilaian.destroy', $employee->id) }}" method="POST" class="d-inlie">
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