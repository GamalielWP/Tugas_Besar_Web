@extends('tubes_template.base')
@section('content')
@if (session()->has('pesan'))
        <div class="alert alert-danger">
            {{ session()->get('pesan') }}
        </div>
@endif
<form class="form-group row justify-content-center" style="margin:0px 15% 0px 15%;" action="{{route('loginadmin')}}" method="post">
    @csrf
    <div class="col-4">
    <input type="password" name="nip" class="form-control" placeholder="Password">
    </div>
    <div class="col-4">
    <button type="submit" class="btn btn-primary">Masuk</button>
    </div>
</form>
@endsection