@extends('admin.layout.appadmin')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@foreach ($pelanggan as $pl)
    <form method="POST" action="{{ route('pelanggan.update', $pl->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT') {{-- Gunakan metode PUT untuk operasi update --}}
        <div class="form-group row">
            <label for="text" class="col-4 col-form-label">Kode</label> 
            <div class="col-8">
                <input id="text" name="kode" type="text" class="form-control" value="{{ $pl->kode }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="text1" class="col-4 col-form-label">Nama</label> 
            <div class="col-8">
                <input id="text1" name="nama" type="text" class="form-control" value="{{ $pl->nama }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4">Jenis Kelamin</label> 
            <div class="col-8">
                @foreach($gender as $g)
                    @php $cek = ($g == $pl->jk) ? 'checked' : ''; @endphp
                    <div class="form-check">
                        <input name="jk" id="radio_{{ $g }}" type="radio" class="form-check-input" value="{{ $g }}" {{ $cek }}> 
                        <label for="radio_{{ $g }}" class="form-check-label">{{ $g }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="form-group row">
            <label for="text2" class="col-4 col-form-label">Tempat Lahir</label> 
            <div class="col-8">
                <input id="text2" name="tmp_lahir" type="text" class="form-control" value="{{ $pl->tmp_lahir }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="text3" class="col-4 col-form-label">Tanggal Lahir</label> 
            <div class="col-8">
                <input id="text3" name="tgl_lahir" type="date" class="form-control" value="{{ $pl->tgl_lahir }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="text4" class="col-4 col-form-label">Email</label> 
            <div class="col-8">
                <input id="text4" name="email" type="text" class="form-control" value="{{ $pl->email }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="select" class="col-4 col-form-label">Kartu</label> 
            <div class="col-8">
                <select id="select" name="kartu_id" class="custom-select">
                    @foreach ($kartu as $k)
                        @php $sel = ($k->id == $pl->kartu_id) ? 'selected' : ''; @endphp
                        <option value="{{ $k->id }}" {{ $sel }}>{{ $k->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div> 
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endforeach
@endsection
