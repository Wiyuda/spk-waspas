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
          <input type="hidden" name="employee_id" value="{{ $evaluation->employee_id }}">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="karyawan">Nama Karyawan</label>
              <select name="karyawan" id="karyawan" class="form-control">
                <option>--Pilih Karyawan--</option>
                @foreach ($employees as $employee)
                  @if ($employee->id == $evaluation->employee_id)
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
            <div class="form-group col-md-6">
              <label for="perilaku">Perilaku</label>
              <select name="perilaku" id="perilaku" class="form-control">
                <option>--Pilih Perilaku--</option>
                @foreach ($looks as $look)
                  @if ($look == $evaluation->perilaku)
                    <option value="{{ $look }}" selected>{{ $look }}</option>
                  @else
                    <option value="{{ $look }}">{{ $look }}</option>
                  @endif
                @endforeach
              </select>
              @error('perilaku')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="penampilan">Penampilan</label>
              <select name="penampilan" id="penampilan" class="form-control">
                <option>--Pilih Penampilan--</option>
                @foreach ($looks as $look)
                  @if ($look == $evaluation->penampilan)
                    <option value="{{ $look }}" selected>{{ $look }}</option>
                  @else
                    <option value="{{ $look }}">{{ $look }}</option>
                  @endif
                @endforeach
              </select>
              @error('penampilan')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="kedisiplinan">Kedisiplinan</label>
              <select name="kedisiplinan" id="kedisiplinan" class="form-control">
                <option>--Pilih Kedisiplinan--</option>
                @foreach ($disciplines as $discipline)
                  @if ($discipline == $evaluation->kedisiplinan)
                    <option value="{{ $discipline }}" selected>{{ $discipline }}</option>
                  @else
                    <option value="{{ $discipline }}">{{ $discipline }}</option>
                  @endif
                @endforeach
              </select>
              @error('kedisiplinan')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="knowledge">Knowledge</label>
              <select name="knowledge" id="knowledge" class="form-control">
                <option>--Pilih Knowledge--</option>
                @foreach ($knowledges as $knowledge)
                  @if ($knowledge == $evaluation->knowledge)
                    <option value="{{ $knowledge }}" selected>{{ $knowledge }}</option>
                  @else
                    <option value="{{ $knowledge }}">{{ $knowledge }}</option>
                  @endif
                @endforeach
              </select>
              @error('knowledge')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="inovasi">Inovasi</label>
              <select name="inovasi" id="inovasi" class="form-control">
                <option>--Pilih Inovasi--</option>
                @foreach ($knowledges as $knowledge)
                  @if ($knowledge == $evaluation->inovasi)
                    <option value="{{ $knowledge }}" selected>{{ $knowledge }}</option>
                  @else
                    <option value="{{ $knowledge }}">{{ $knowledge }}</option>
                  @endif
                @endforeach
              </select>
              @error('inovasi')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
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