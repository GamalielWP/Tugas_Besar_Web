@extends('tubes_template.base_auto_refresh')
@section('content')
<h1>Pendaftaran Umum</h1>
<h3>Nomor yang dipanggil : {{$admin_call->number_call}}</h3>
<table class="table table-bordered">
    <tr>
        <th scope="row">No. Daftar</th>
        <td>{{$no_daftar}}</td>
    </tr>
    <tr>
        <th scope="row">Keperluan</th>
        <td>{{$pasien->need_to}}</td>
    </tr>
    <tr>
        <th scope="row">Poli</th>
        <td>{{$pasien->poly}}</td>
    </tr>
    <tr>
        <th scope="row">NIK</th>
        <td>{{$pasien->nik}}</td>
    </tr>
    <tr>
        <th scope="row">BPJS</th>
        <td>{{$pasien->bpjs}}</td>
    </tr>
    <tr>
        <th scope="row">Rekam Medis</th>
        <td>{{$pasien->med_rec}}</td>
    </tr>
    <tr>
        <th scope="row">Nama</th>
        <td>{{$pasien->name}}</td>
    </tr>
    <tr>
        <th scope="row">Tanggal Lahir</th>
        <td>{{$pasien->birth}}</td>
    </tr>
    <tr>
        <th scope="row">Jenis Kelamin</th>
        <td>{{$pasien->gender}}</td>
    </tr>
    <tr>
        <th scope="row">Alamat</th>
        <td>{{$pasien->address}}</td>
    </tr>
    <tr>
        <th scope="row">No. Handphone</th>
        <td>{{$pasien->phone}}</td>
    </tr>
</table>
<p style="text-align: left; font-size: 13px; color: #cf0202;">
    *Pastikan sebelum menekan tombol <b>Lanjut</b> anda telah menerima berkas dari <b>Petugas Pendaftaran Umum</b>.
</p>
<form action="{{route('update.noregis',['id' => $pasien->id])}}" method="post">
    @method('PUT')
    @csrf
    <input type="hidden" name="numb_regis" value="{{$no_daftar}}">
    <button type="submit" class="btn btn-success">Lanjut</button>
</form>
@endsection