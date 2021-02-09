@extends('tubes_template.base')
@section('content')

<div>
<a href="{{route('index')}}">
    <button style="float: right; display:block;" type="submit" class="btn btn-success">Selesai</button>
</a>
<h1>Admin Umum</h1>
</div>
<div>
    <b>~ {{$admin->staff_name}} ~</b>
</div>

    <form class="form-group row" style="margin-left: 2px; margin-top: 10px;" action="{{route('panggil',['id' => $admin->id])}}" method="post">
        @method('PUT')
        @csrf
        <div class="">
        <label for="quantity">Nomor Daftar : </label>
        </div>
        <div class="col-2">
        <input type="number" class="form-control" name="quantity" min="0" value="{{$admin_call->number_call}}">
        </div>
        <div class="col-2">
        <button type="submit" class="btn btn-warning text-white">Panggil</button>
        </div>
    </form>

<div class="row">
    <div class="col-lg-12">
        <!-- route untuk menambahkan data mahasiswa -->
        <div class="table-responsive">
            <table class="table table-striped data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Keperluan</th>
                        <th>No. Daftar</th>
                        <th>No. Poli</th>
                        <th>Poli</th>
                        <th>NIK</th>
                        <th>BPJS</th>
                        <th>Rekam Medis</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No. Telp.</th>
                        <th>Status</th>
                        <th>Terdaftar Pada</th>
                        <th>Selesai Pada</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('.data-table').DataTable({
    	// menampilkan data
        processing: true,
        serverSide: true,
        ajax: "{{ route('adminumum',['id' => $admin->id]) }}",
        columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
            },
            {
                data: 'need_to',
                name: 'need_to',
            },
            {
                data: 'numb_regis',
                name: 'numb_regis',
            },
            {
                data: 'numb_poly',
                name: 'numb_poly',
            },
            {
                data: 'poly',
                name: 'poly',
            },
            {
                data: 'nik',
                name: 'nik',
            },
            {
                data: 'bpjs',
                name: 'bpjs',
            },
            {
                data: 'med_rec',
                name: 'med_rec',
            },
            {
                data: 'name',
                name: 'name',
            },
            {
                data: 'birth',
                name: 'birth',
            },
            {
                data: 'gender',
                name: 'gender',
            },
            {
                data: 'address',
                name: 'address',
            },
            {
                data: 'phone',
                name: 'phone',
            },
            {
                data: 'status',
                name: 'status',
            },
            {
                data: 'created_at',
                name: 'created_at',
            },
            {
                data: 'updated_at',
                name: 'updated_at',
            },
        ]
    });
</script>
@endsection