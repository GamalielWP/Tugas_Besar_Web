@extends('template.base')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Data Mahasiswa</h1>
        @if (session()->has('pesan'))
            <div class="alert alert-success">
                {{ session()->get('pesan') }}
            </div>
        @endif
        <a href="{{route('mahasiswa.create')}}" class="btn btn-primary mb-2">Tambah</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
                @forelse ($mahasiswa as $mhs)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mhs->nim }}</td>
                    <td>{{ $mhs->name }}</td>
                    <td>{{ $mhs->gender }}</td>
                    <td>{{ $mhs->departement }}</td>
                    <td>{{ $mhs->address }}</td>
                    <td>
                        <form action="{{ route('mahasiswa.destroy',['id' => $mhs->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('mahasiswa.edit',['id' => $mhs->id]) }}" class="btn btn-info btn-sm">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="7">Data tidak ada!</td>
                </tr>
                @endforelse

            </table>
        </div>
    </div>
</div>
@endsection