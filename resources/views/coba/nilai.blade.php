@php
$nama = "nando";
$nilai = 80.9;
@endphp

@if ($nilai >= 70) @php $ket = "lulus"; @endphp
@else @php $ket = "Gagal"; @endphp
@endif

siswa {{ $nama }} dengan nilai {{ $nilai }} dinyatakan {{ $ket }}