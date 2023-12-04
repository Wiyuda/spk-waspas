@extends('layouts.dashboard')
@section('title', 'Data Penilaian Karyawan')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Edit Data Penilaian Karyawan</h1>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card shadow">
      <div class="card-body">
        <form action="{{ route('penilaian.update', $evaluation->id) }}" method="post">
          @csrf
          @method('put')
          @if (session('status'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
          <input type="hidden" name="employee_id" value="{{ $evaluation->employee_id }}">
          <div class="form-group">
            <label for="karyawan">Nama Karyawan</label>
            <select name="karyawan" id="karyawan" class="form-control">
              <option>--Pilih Karyawan--</option>
              @foreach ($employees as $employee)
                @if ($employee->id == $evaluation->id)
                  <option value="{{ $employee->id }}" selected>{{ $employee->nama }}</option>
                @else
                  <option value="{{ $employee->id }}">{{ $employee->nama }}</option>
                @endif
              @endforeach
            </select>
            @error('karyawan')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <h5>1. Perilaku Pelayanan</h5>
          <hr>
          <h6>Melaksanakan Station Routine dan memastikan dan mengontrol  kesiapan fasilitas kerja dengan disiplin dan penuh tanggung jawab</h6>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="station_routine" id="station_routine1" value="1" {{ $evaluation->behavior->subBehavior->station_routine == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="station_routine1">
              1
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="station_routine" id="station_routine2" value="2" {{ $evaluation->behavior->subBehavior->station_routine == 2 ? 'checked' : '' }}>
            <label class="form-check-label" for="station_routine2">
              2
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="station_routine" id="station_routine3" value="3" {{ $evaluation->behavior->subBehavior->station_routine == 3 ? 'checked' : '' }}>
            <label class="form-check-label" for="station_routine3">
              3
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="station_routine" id="station_routine4" value="4" {{ $evaluation->behavior->subBehavior->station_routine == 4 ? 'checked' : '' }}>
            <label class="form-check-label" for="station_routine4">
              4
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="station_routine" id="station_routine5" value="5" {{ $evaluation->behavior->subBehavior->station_routine == 5 ? 'checked' : '' }}>
            <label class="form-check-label" for="station_routine5">
              5
            </label>
          </div>
          @error('station_routine')
            <p class="text-danger">{{ $message }}</p>
          @enderror
          <h6>Melakukan tugas,  Mengikuti dan melaksanakan briefing serta arahan kerja dengan disiplin dan Profesional</h6>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="breefing" id="breefing1" value="1" {{ $evaluation->behavior->subBehavior->breefing == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="breefing1">
              1
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="breefing" id="breefing2" value="2" {{ $evaluation->behavior->subBehavior->breefing == 2 ? 'checked' : '' }}>
            <label class="form-check-label" for="breefing2">
              2
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="breefing" id="breefing3" value="3" {{ $evaluation->behavior->subBehavior->breefing == 3 ? 'checked' : '' }}>
            <label class="form-check-label" for="breefing3">
              3
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="breefing" id="breefing4" value="4" {{ $evaluation->behavior->subBehavior->breefing == 4 ? 'checked' : '' }}>
            <label class="form-check-label" for="breefing4">
              4
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="breefing" id="breefing5" value="5" {{ $evaluation->behavior->subBehavior->breefing == 5 ? 'checked' : '' }}>
            <label class="form-check-label" for="breefing5">
              5
            </label>
          </div>
          @error('breefing')
            <p class="text-danger">{{ $message }}</p>
          @enderror
          <h6>Menempati posisi kerja dan standby posisi kerja</h6>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="standby" id="standby1" value="1" {{ $evaluation->behavior->subBehavior->standby == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="standby1">
              1
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="standby" id="standby2" value="2" {{ $evaluation->behavior->subBehavior->standby == 2 ? 'checked' : '' }}>
            <label class="form-check-label" for="standby2">
              2
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="standby" id="standby3" value="3" {{ $evaluation->behavior->subBehavior->standby == 3 ? 'checked' : '' }}>
            <label class="form-check-label" for="standby3">
              3
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="standby" id="standby4" value="4" {{ $evaluation->behavior->subBehavior->standby == 4 ? 'checked' : '' }}>
            <label class="form-check-label" for="standby4">
              4
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="standby" id="standby5" value="5" {{ $evaluation->behavior->subBehavior->standby == 5 ? 'checked' : '' }}>
            <label class="form-check-label" for="standby5">
              5
            </label>
          </div>
          @error('standby')
            <p class="text-danger">{{ $message }}</p>
          @enderror
          <h6>Melakukan komunikasi dan koordinasi dengan rekan kerja, atasan dan memberikan solusi kepada pelanggan serta rekan kerja maupun atasan</h6>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="koordinasi" id="koordinasi1" value="1" {{ $evaluation->behavior->subBehavior->koordinasi == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="koordinasi1">
              1
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="koordinasi" id="koordinasi2" value="2" {{ $evaluation->behavior->subBehavior->koordinasi == 2 ? 'checked' : '' }}>
            <label class="form-check-label" for="koordinasi2">
              2
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="koordinasi" id="koordinasi3" value="3" {{ $evaluation->behavior->subBehavior->koordinasi == 3 ? 'checked' : '' }}>
            <label class="form-check-label" for="koordinasi3">
              3
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="koordinasi" id="koordinasi4" value="4" {{ $evaluation->behavior->subBehavior->koordinasi == 4 ? 'checked' : '' }}>
            <label class="form-check-label" for="koordinasi4">
              4
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="koordinasi" id="koordinasi5" value="5" {{ $evaluation->behavior->subBehavior->koordinasi == 5 ? 'checked' : '' }}>
            <label class="form-check-label" for="koordinasi5">
              5
            </label>
          </div>
          @error('koordinasi')
            <p class="text-danger">{{ $message }}</p>
          @enderror
          <hr>
          <h5>2. Penampilan dan Kelengkapan Seragam dalam Dinas</h5>
          <hr>
          <h6>Kerapihan seragam sesuai dengan aturan yang berlaku</h6>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kerapihan" id="kerapihan1" value="1" {{ $evaluation->appearance->subAppearance->kerapian == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="kerapihan1">
              1
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kerapihan" id="kerapihan2" value="2" {{ $evaluation->appearance->subAppearance->kerapian == 2 ? 'checked' : '' }}>
            <label class="form-check-label" for="kerapihan2">
              2
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kerapihan" id="kerapihan3" value="3" {{ $evaluation->appearance->subAppearance->kerapian == 3 ? 'checked' : '' }}>
            <label class="form-check-label" for="kerapihan3">
              3
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kerapihan" id="kerapihan4" value="4" {{ $evaluation->appearance->subAppearance->kerapian == 4 ? 'checked' : '' }}>
            <label class="form-check-label" for="kerapihan4">
              4
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kerapihan" id="kerapihan5" value="5" {{ $evaluation->appearance->subAppearance->kerapian == 5 ? 'checked' : '' }}>
            <label class="form-check-label" for="kerapihan5">
              5
            </label>
          </div>
          @error('kerapihan')
            <p class="text-danger">{{ $message }}</p>
          @enderror
          <h6>Kesesuaian seragam dengan kegiatan</h6>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kesesuaian" id="kesesuaian1" value="1" {{ $evaluation->appearance->subAppearance->kesesuaian == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="kesesuaian1">
              1
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kesesuaian" id="kesesuaian2" value="2" {{ $evaluation->appearance->subAppearance->kesesuaian == 2 ? 'checked' : '' }}>
            <label class="form-check-label" for="kesesuaian2">
              2
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kesesuaian" id="kesesuaian3" value="3" {{ $evaluation->appearance->subAppearance->kesesuaian == 3 ? 'checked' : '' }}>
            <label class="form-check-label" for="kesesuaian3">
              3
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kesesuaian" id="kesesuaian4" value="4" {{ $evaluation->appearance->subAppearance->kesesuaian == 4 ? 'checked' : '' }}>
            <label class="form-check-label" for="kesesuaian4">
              4
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kesesuaian" id="kesesuaian5" value="5" {{ $evaluation->appearance->subAppearance->kesesuaian == 5 ? 'checked' : '' }}>
            <label class="form-check-label" for="kesesuaian5">
              5
            </label>
          </div>
          @error('kesesuaian')
            <p class="text-danger">{{ $message }}</p>
          @enderror
          <h6>Alat Pelindung Diri</h6>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="alat_perlindungan" id="alat_perlindungan1" value="1" {{ $evaluation->appearance->subAppearance->alat_perlindungan == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="alat_perlindungan1">
              1
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="alat_perlindungan" id="alat_perlindungan2" value="2" {{ $evaluation->appearance->subAppearance->alat_perlindungan == 2 ? 'checked' : '' }}>
            <label class="form-check-label" for="alat_perlindungan2">
              2
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="alat_perlindungan" id="alat_perlindungan3" value="3" {{ $evaluation->appearance->subAppearance->alat_perlindungan == 3 ? 'checked' : '' }}>
            <label class="form-check-label" for="alat_perlindungan3">
              3
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="alat_perlindungan" id="alat_perlindungan4" value="4" {{ $evaluation->appearance->subAppearance->alat_perlindungan == 4 ? 'checked' : '' }}>
            <label class="form-check-label" for="alat_perlindungan4">
              4
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="alat_perlindungan" id="alat_perlindungan5" value="5" {{ $evaluation->appearance->subAppearance->alat_perlindungan == 5 ? 'checked' : '' }}>
            <label class="form-check-label" for="alat_perlindungan5">
              5
            </label>
          </div>
          @error('alat_perlindungan')
            <p class="text-danger">{{ $message }}</p>
          @enderror
          <hr>
          <h5>3. Kedisiplinan</h5>
          <hr>
          <h6>Kehadiran</h6>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kehadiran" id="kehadiran1" value="1" {{ $evaluation->discipline->subDiscipline->kehadiran == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="kehadiran1">
              1
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kehadiran" id="kehadiran2" value="2" {{ $evaluation->discipline->subDiscipline->kehadiran == 2 ? 'checked' : '' }}>
            <label class="form-check-label" for="kehadiran2">
              2
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kehadiran" id="kehadiran3" value="3" {{ $evaluation->discipline->subDiscipline->kehadiran == 3 ? 'checked' : '' }}>
            <label class="form-check-label" for="kehadiran3">
              3
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kehadiran" id="kehadiran4" value="4" {{ $evaluation->discipline->subDiscipline->kehadiran == 4 ? 'checked' : '' }}>
            <label class="form-check-label" for="kehadiran4">
              4
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kehadiran" id="kehadiran5" value="5" {{ $evaluation->discipline->subDiscipline->kehadiran == 5 ? 'checked' : '' }}>
            <label class="form-check-label" for="kehadiran5">
              5
            </label>
          </div>
          @error('kehadiran')
            <p class="text-danger">{{ $message }}</p>
          @enderror
          <h6>Mengikuti kegiatan dan atau program kerja</h6>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kegiatan" id="kegiatan1" value="1" {{ $evaluation->discipline->subDiscipline->kegiatan == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="kegiatan1">
              1
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kegiatan" id="kegiatan2" value="2" {{ $evaluation->discipline->subDiscipline->kegiatan == 2 ? 'checked' : '' }}>
            <label class="form-check-label" for="kegiatan2">
              2
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kegiatan" id="kegiatan3" value="3" {{ $evaluation->discipline->subDiscipline->kegiatan == 3 ? 'checked' : '' }}>
            <label class="form-check-label" for="kegiatan3">
              3
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kegiatan" id="kegiatan4" value="4" {{ $evaluation->discipline->subDiscipline->kegiatan == 4 ? 'checked' : '' }}>
            <label class="form-check-label" for="kegiatan4">
              4
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kegiatan" id="kegiatan5" value="5" {{ $evaluation->discipline->subDiscipline->kegiatan == 5 ? 'checked' : '' }}>
            <label class="form-check-label" for="kegiatan5">
              5
            </label>
          </div>
          @error('kegiatan')
            <p class="text-danger">{{ $message }}</p>
          @enderror
          <hr>
          <h5>4. Product Knowledge</h5>
          <hr>
          <h6>Pemahaman pengetahuan di levelnya (soft skills)</h6>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="soft_skills" id="soft_skills1" value="1" {{ $evaluation->knowledge->subKnowledge->soft_skills == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="soft_skills1">
              1
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="soft_skills" id="soft_skills2" value="2" {{ $evaluation->knowledge->subKnowledge->soft_skills == 2 ? 'checked' : '' }}>
            <label class="form-check-label" for="soft_skills2">
              2
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="soft_skills" id="soft_skills3" value="3" {{ $evaluation->knowledge->subKnowledge->soft_skills == 3 ? 'checked' : '' }}>
            <label class="form-check-label" for="soft_skills3">
              3
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="soft_skills" id="soft_skills4" value="4" {{ $evaluation->knowledge->subKnowledge->soft_skills == 4 ? 'checked' : '' }}>
            <label class="form-check-label" for="soft_skills4">
              4
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="soft_skills" id="soft_skills5" value="5" {{ $evaluation->knowledge->subKnowledge->soft_skills == 5 ? 'checked' : '' }}> 
            <label class="form-check-label" for="soft_skills5">
              5
            </label>
          </div>
          @error('soft_skills')
            <p class="text-danger">{{ $message }}</p>
          @enderror
          <h6>Pemahaman keterampilan di levelnya (hard skills)</h6>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="hard_skills" id="hard_skills1" value="1" {{ $evaluation->knowledge->subKnowledge->hard_skills == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="hard_skills1">
              1
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="hard_skills" id="hard_skills2" value="2" {{ $evaluation->knowledge->subKnowledge->hard_skills == 2 ? 'checked' : '' }}>
            <label class="form-check-label" for="hard_skills2">
              2
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="hard_skills" id="hard_skills3" value="3" {{ $evaluation->knowledge->subKnowledge->hard_skills == 3 ? 'checked' : '' }}>
            <label class="form-check-label" for="hard_skills3">
              3
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="hard_skills" id="hard_skills4" value="4" {{ $evaluation->knowledge->subKnowledge->hard_skills == 4 ? 'checked' : '' }}>
            <label class="form-check-label" for="hard_skills4">
              4
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="hard_skills" id="hard_skills5" value="5" {{ $evaluation->knowledge->subKnowledge->hard_skills == 5 ? 'checked' : '' }}>
            <label class="form-check-label" for="hard_skills5">
              5
            </label>
          </div>
          @error('hard_skills')
            <p class="text-danger">{{ $message }}</p>
          @enderror
          <h6>Keaktifan menggali dan membagi pengetahuan</h6>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="aktif" id="aktif1" value="1" {{ $evaluation->knowledge->subKnowledge->aktif == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="aktif1">
              1
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="aktif" id="aktif2" value="2" {{ $evaluation->knowledge->subKnowledge->aktif == 2 ? 'checked' : '' }}>
            <label class="form-check-label" for="aktif2">
              2
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="aktif" id="aktif3" value="3" {{ $evaluation->knowledge->subKnowledge->aktif == 3 ? 'checked' : '' }}>
            <label class="form-check-label" for="aktif3">
              3
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="aktif" id="aktif4" value="4" {{ $evaluation->knowledge->subKnowledge->aktif == 4 ? 'checked' : '' }}>
            <label class="form-check-label" for="aktif4">
              4
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="aktif" id="aktif5" value="5" {{ $evaluation->knowledge->subKnowledge->aktif == 5 ? 'checked' : '' }}>
            <label class="form-check-label" for="aktif5">
              5
            </label>
          </div>
          @error('aktif')
            <p class="text-danger">{{ $message }}</p>
          @enderror
          <h6>Memahami dan mengetahui tentang fungsi tugas (dilevelnya) dan pricipal objective ARFF</h6>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="pricipal_objective" id="pricipal_objective1" value="1" {{ $evaluation->knowledge->subKnowledge->pricipal_objective == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="pricipal_objective1">
              1
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="pricipal_objective" id="pricipal_objective2" value="2" {{ $evaluation->knowledge->subKnowledge->pricipal_objective == 2 ? 'checked' : '' }}>
            <label class="form-check-label" for="pricipal_objective2">
              2
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="pricipal_objective" id="pricipal_objective3" value="3" {{ $evaluation->knowledge->subKnowledge->pricipal_objective == 3 ? 'checked' : '' }}>
            <label class="form-check-label" for="pricipal_objective3">
              3
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="pricipal_objective" id="pricipal_objective4" value="4" {{ $evaluation->knowledge->subKnowledge->pricipal_objective == 4 ? 'checked' : '' }}>
            <label class="form-check-label" for="pricipal_objective4">
              4
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="pricipal_objective" id="pricipal_objective5" value="5" {{ $evaluation->knowledge->subKnowledge->pricipal_objective == 5 ? 'checked' : '' }}>
            <label class="form-check-label" for="pricipal_objective5">
              5
            </label>
          </div>
          @error('pricipal_objective')
            <p class="text-danger">{{ $message }}</p>
          @enderror
          <hr>
          <h5>5. Inovasi dan atau Prestasi dan atau Giat lainnya</h5>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inovasi" id="inovasi1" value="1" {{ $evaluation->inovation->inovasi == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="inovasi1">
              1
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inovasi" id="inovasi2" value="2" {{ $evaluation->inovation->inovasi == 2 ? 'checked' : '' }}>
            <label class="form-check-label" for="inovasi2">
              2
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inovasi" id="inovasi3" value="3" {{ $evaluation->inovation->inovasi == 3 ? 'checked' : '' }}>
            <label class="form-check-label" for="inovasi3">
              3
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inovasi" id="inovasi4" value="4" {{ $evaluation->inovation->inovasi == 4 ? 'checked' : '' }}>
            <label class="form-check-label" for="inovasi4">
              4
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inovasi" id="inovasi5" value="5" {{ $evaluation->inovation->inovasi == 5 ? 'checked' : '' }}>
            <label class="form-check-label" for="inovasi5">
              5
            </label>
          </div>
          @error('inovasi')
            <p class="text-danger">{{ $message }}</p>
          @enderror
          <div class="d-flex justify-content-end">
            <a href="{{ route('penilaian.index') }}" class="btn btn-warning mr-3">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection