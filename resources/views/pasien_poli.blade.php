@extends('tubes_template.base_auto_refresh')
@section('content')
<h1>Pendaftaran Poli</h1>
<h3>Nomor yang dipanggil : {{$admin_call->poly}} - {{$admin_call->number_call_poly}}</h3>

<table class="table table-bordered">
    <tr>
        <th scope="row">No. Poli</th>
        <td>{{$no_poli}}</td>
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
    *Pastikan sebelum menekan tombol <b>Selesai</b> anda telah menjalani pemeriksaan.
</p>
<form action="{{route('update.nopoli_status',['id' => $pasien->id])}}" method="post">
    @method('PUT')
    @csrf
    <input type="hidden" name="numb_poly" value="{{$no_poli}}">
    <input type="hidden" name="status" value="{{'selesai'}}">

    <button type="submit" class="btn btn-success">Selesai</button>
    <a href="{{route('datapasien',['id' => $pasien->id])}}">
        <button type="button" class="btn btn-primary">Kembali</button>
    </a>
</form>
@endsection