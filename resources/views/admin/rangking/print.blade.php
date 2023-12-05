<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Hasil Perangkingan Karyawan</title>
  <style>
    h3 {
      text-align: center
    }
    table tr th,td {
      font-size: 10px;
      text-align: center
    }
  </style>
</head>
<body>
  <h3>
    DATA HASIL PENILAIAN KINERJA KARYAWAN PADA DIVISI AIRPORT RESCUE & FIRE FIGHTING (ARFF) PT ANGKASA PURA II PADA {{ $date }}
  </h3>
  <table border="1px solid black" cellpadding="10" cellspacing="0" class="main-table">
    <thead>
      <tr>
        <th rowspan="2">Rank</th>
        <th rowspan="2">NIK</th>
        <th rowspan="2">Nama</th>
        <th>Perilaku Pelayanan</th>
        <th>Penampilan dan Kelengkapan Seragam dalam Dinas</th>
        <th>Kedisiplinan</th>
        <th>Product Knowledge</th>
        <th rowspan="2">Inovasi dan atau Prestasi dan atau Giat lainnya</th>
        <th rowspan="2">Preferensi</th>
      </tr>
      <tr>
        <th>
          <table border="1px solid black" cellpadding="5" cellspacing="0" class="second-table">
            <thead>
              <tr>
                <th>Station Routine</th>
                <th>briefing</th>
                <th>standby</th>
                <th>koordinasi</th>
              </tr>
            </thead>
          </table>
        </th>
        <th>
          <table border="1px solid black" cellpadding="5" cellspacing="0" class="second-table">
            <thead>
              <tr>
                <th>Kerapihan</th>
                <th>Kesesuaian</th>
                <th>Alat Pelindung</th>
              </tr>
            </thead>
          </table>
        </th>
        <th>
          <table border="1px solid black" cellpadding="5" cellspacing="0" class="second-table">
            <thead>
              <tr>
                <th>Kehadiran</th>
                <th>Kegiatan</th>
              </tr>
            </thead>
          </table>
        </th>
        <th>
          <table border="1px solid black" cellpadding="5" cellspacing="0" class="second-table">
            <thead>
              <tr>
                <th>Soft Skills</th>
                <th>Hard Skills</th>
                <th>Keaktifan</th>
                <th>Pricipal Objective</th>
              </tr>
            </thead>
          </table>
        </th>
      </tr>
    </thead>
    <tbody>
      @php
        $i = 1;
      @endphp
      @foreach ($ranks as $rank)
        <tr>
          <th rowspan="2">{{ $i++ }}</th>
          <td rowspan="2">{{ $rank->employee->nik }}</td>
          <td rowspan="2">{{ $rank->employee->nama }}</td>
          <td>{{ $rank->employee->behavior->perilaku }}</td>
          <td>{{ $rank->employee->appearance->penampilan }}</td>
          <td>{{ $rank->employee->discipline->disiplin }}</td>
          <td>{{ $rank->employee->knowledge->knowledge }}</td>
          <td rowspan="2">{{ $rank->employee->inovation->inovasi }}</td>
          <td rowspan="2">{{ $rank->preferensi }}</td>
        </tr>
        <tr>
          <th>
            <table border="1px solid black" cellpadding="5" cellspacing="0" class="second-table" width="100%">
              <thead>
                <tr>
                  <th>{{ $rank->employee->behavior->subBehavior->station_routine }}</th>
                  <th>{{ $rank->employee->behavior->subBehavior->breefing }}</th>
                  <th>{{ $rank->employee->behavior->subBehavior->standby }}</th>
                  <th>{{ $rank->employee->behavior->subBehavior->koordinasi }}</th>
                </tr>
              </thead>
            </table>
          </th>
          <th>
            <table border="1px solid black" cellpadding="5" cellspacing="0" class="second-table" width="100%">
              <thead>
                <tr>
                  <th>{{ $rank->employee->appearance->subAppearance->kerapian }}</th>
                  <th>{{ $rank->employee->appearance->subAppearance->kesesuaian }}</th>
                  <th>{{ $rank->employee->appearance->subAppearance->alat_perlindungan }}</th>
                </tr>
              </thead>
            </table>
          </th>
          <th>
            <table border="1px solid black" cellpadding="5" cellspacing="0" class="second-table" width="100%">
              <thead>
                <tr>
                  <th>{{ $rank->employee->discipline->subDiscipline->kehadiran }}</th>
                  <th>{{ $rank->employee->discipline->subDiscipline->kegiatan }}</th>
                </tr>
              </thead>
            </table>
          </th>
          <th>
            <table border="1px solid black" cellpadding="5" cellspacing="0" class="second-table" width="100%">
              <thead>
                <tr>
                  <th>{{ $rank->employee->knowledge->subKnowledge->soft_skills }}</th>
                  <th>{{ $rank->employee->knowledge->subKnowledge->hard_skills }}</th>
                  <th>{{ $rank->employee->knowledge->subKnowledge->aktif }}</th>
                  <th>{{ $rank->employee->knowledge->subKnowledge->parcipal_objective }}</th>
                </tr>
              </thead>
            </table>
          </th>
        </tr>
      @endforeach
    </tbody>
  </table>

</body>
</html>