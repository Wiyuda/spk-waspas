@extends('layouts.dashboard')
@section('title', 'Dasboard Admin')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-12">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Karyawan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $employee }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <div class="card shadow" style="height: 50vh">
            <div class="card-body text-center d-flex align-items-center">
                <h4 class="font-weight-bold text-capitalize">Selamat Datang di Sistem Penilaian Kinerja Karyawan Dengan Menggunakan Algoritma Simple additive weighting  (SAW) Pada Devisi AIRPORT RESCUE & FIRE FIGHTING (ARFF) PT ANGKASA PURA II</h4>
            </div>
        </div>
    </div>
</div>
@endsection