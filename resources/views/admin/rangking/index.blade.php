@extends('layouts.dashboard')
@section('title', 'Proses Perangkingan Karyawan')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Proses Perangkingan Karyawan</h1>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card shadow">
      <div class="card-body">
        <a href="{{ route('print') }}" class="btn btn-primary" target="_blank">Print</a>
        <div class="table-responsive mt-3">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Rank</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Perilaku</th>
                <th>Penampilan</th>
                <th>Kedisiplinan</th>
                <th>Knowledge</th>
                <th>Inovasi</th>
                <th>Preferensi</th>
                <th>Tanggal</th>
              </tr>
            </thead>
            <tbody>
              @php
                $i = 1;
              @endphp
              @foreach ($ranks as $rank)
                <tr>
                  <th>{{ $i++ }}</th>
                  <td>{{ $rank->employee->nik }}</td>
                  <td>{{ $rank->employee->nama }}</td>
                  <td>{{ $rank->employee->behavior->perilaku }}</td>
                  <td>{{ $rank->employee->appearance->penampilan }}</td>
                  <td>{{ $rank->employee->discipline->disiplin }}</td>
                  <td>{{ $rank->employee->knowledge->knowledge }}</td>
                  <td>{{ $rank->employee->inovation->inovasi }}</td>
                  <td>{{ $rank->preferensi }}</td>
                  <td>{{ $rank->date }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="d-flex justify-content-end">
            <a href="{{ route('penilaian.index') }}" class="btn btn-secondary mt-3">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection