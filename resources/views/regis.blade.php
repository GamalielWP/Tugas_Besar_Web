@extends('tubes_template.base')
@section('content')
<h1>Pendaftaran Pasien</h1>
<form action="{{route('simpan')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="need_to">Keperluan</label>
        <select name="need_to" class="form-control">
            <option value=""></option>
            @foreach ($need_to as $nt)
                <option value="{{ $nt }}" {{ (old('need_to') == $nt) ? 'selected' : '' }}>{{ $nt }}</option>
            @endforeach
        </select>
        @error('need_to')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="poly">Poli</label>
        <select name="poly" class="form-control">
            <option value=""></option>
            @foreach ($poly as $pl)
                <option value="{{ $pl }}" {{ (old('poly') == $pl) ? 'selected' : '' }}>{{ $pl }}</option>
            @endforeach
        </select>
        @error('poly')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="nik">NIK</label>
        <input type="text" name="nik" class="form-control" placeholder="NIK" value="{{ old('nik') }}">
        @error('nik')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="bpjs">ID/Nomor BPJS</label>
        <input type="text" name="bpjs" class="form-control" placeholder="Isi jika ada" value="{{ old('bpjs') }}">
    </div>
    <div class="form-group">
        <label for="rm">Nomor Rekam Medis</label>
        <input type="text" name="rm" class="form-control" placeholder="Isi jika ada" value="{{ old('rm') }}">
    </div>
    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" name="name" class="form-control" placeholder="Nama" value="{{ old('name') }}">
        @error('name')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="birth">Tanggal Lahir</label>
        <input type="date" name="birth" class="form-control" placeholder="" value="{{ old('birth') }}">
        @error('birth')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="gender">Jenis Kelamin</label>
        <select name="gender" class="form-control">
            <option value=""></option>
            @foreach ($gender as $gd)
                <option value="{{ $gd }}" {{ (old('gender') == $gd) ? 'selected' : '' }}>{{ $gd }}</option>
            @endforeach
        </select>
        @error('gender')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="address">Alamat</label>
        <textarea name="address" class="form-control" placeholder="Alamat">{{ old('address') }}</textarea>
        @error('address')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="phone">Nomor HP</label>
        <input type="text" name="phone" class="form-control" placeholder="Nomor yang bisa dihubungi" value="{{ old('phone') }}">
        @error('phone')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Selesai</button>
    <a href="{{route('index')}}">
        <button type="button" class="btn btn-primary">Kembali</button>
    </a>
</form>
@endsection