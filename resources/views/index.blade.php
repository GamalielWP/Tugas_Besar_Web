@extends('tubes_template.base')
@section('content')
    @if (session()->has('pesansukses'))
        <div class="alert alert-success">
            {{ session()->get('pesansukses') }}
        </div>
    @endif
    <div class="row justify-content-center">
    <div class="col-4">
    <a href="{{route('regisbaru')}}">
        <button type="button" class="btn btn-success">
            <img width="160px" height="160px" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTQ5MiA1MTJjLTExLjA0NiAwLTIwLTguOTU0LTIwLTIwIDAtMzkuNzAxLTMyLjA4Ni03Mi03MS41MjUtNzJoLTE2Ljk0OWMtMzkuNDQgMC03MS41MjYgMzIuMjk5LTcxLjUyNiA3MiAwIDExLjA0Ni04Ljk1NCAyMC0yMCAyMHMtMjAtOC45NTQtMjAtMjBjMC02MS43NTcgNTAuMDMtMTEyIDExMS41MjUtMTEyaDE2Ljk0OWM2MS40OTYgMCAxMTEuNTI2IDUwLjI0MyAxMTEuNTI2IDExMiAwIDExLjA0Ni04Ljk1NCAyMC0yMCAyMHptLTE2LTI0N2MwLTQ2Ljg2OS0zOC4xMzEtODUtODUtODVzLTg1IDM4LjEzMS04NSA4NSAzOC4xMzEgODUgODUgODUgODUtMzguMTMxIDg1LTg1em0tNDAgMGMwIDI0LjgxMy0yMC4xODcgNDUtNDUgNDVzLTQ1LTIwLjE4Ny00NS00NSAyMC4xODctNDUgNDUtNDUgNDUgMjAuMTg3IDQ1IDQ1em0tMjA0IDIyN2MwLTExLjA0Ni04Ljk1NC0yMC0yMC0yMGgtOTIuMDIxYy00NC4xIDAtNzkuOTc5LTM1Ljg3OS03OS45NzktNzkuOTc5di0yNzIuMDQyYzAtNDQuMSAzNS44NzktNzkuOTc5IDc5Ljk3OS03OS45NzloMTg0LjA2MmM0NC4xMDEgMCA3OS45NzkgMzUuODc5IDc5Ljk3OSA3OS45NzkgMCAxMS4wNDYgOC45NTQgMjAgMjAgMjBzMjAtOC45NTQgMjAtMjBjLjAwMS02Ni4xNTYtNTMuODIyLTExOS45NzktMTE5Ljk5OS0xMTkuOTc5aC0xODQuMDQyYy02Ni4xNTYgMC0xMTkuOTc5IDUzLjgyMy0xMTkuOTc5IDExOS45Nzl2MjcyLjA0MWMwIDY2LjE1NyA1My44MjMgMTE5Ljk4IDExOS45NzkgMTE5Ljk4aDkyLjAyMWMxMS4wNDYgMCAyMC04Ljk1NCAyMC0yMHptMzMtMjY1YzAtMTEuMDQ2LTguOTU0LTIwLTIwLTIwaC0xMDhjLTExLjA0NiAwLTIwIDguOTU0LTIwIDIwczguOTU0IDIwIDIwIDIwaDEwOGMxMS4wNDYgMCAyMC04Ljk1NCAyMC0yMHptNDAtNzdjMC0xMS4wNDYtOC45NTQtMjAtMjAtMjBoLTE0OGMtMTEuMDQ2IDAtMjAgOC45NTQtMjAgMjBzOC45NTQgMjAgMjAgMjBoMTQ4YzExLjA0NiAwIDIwLTguOTU0IDIwLTIwem0tNDAgMjMwYzAtMTEuMDQ2LTguOTU0LTIwLTIwLTIwaC0xMDhjLTExLjA0NiAwLTIwIDguOTU0LTIwIDIwczguOTU0IDIwIDIwIDIwaDEwOGMxMS4wNDYgMCAyMC04Ljk1NCAyMC0yMHptMC03N2MwLTExLjA0Ni04Ljk1NC0yMC0yMC0yMGgtMTA4Yy0xMS4wNDYgMC0yMCA4Ljk1NC0yMCAyMHM4Ljk1NCAyMCAyMCAyMGgxMDhjMTEuMDQ2IDAgMjAtOC45NTQgMjAtMjB6IiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIj48L3BhdGg+PC9nPjwvc3ZnPg==" />
            <b style="font-size: 20px;">Daftar</b> 
        </button>
    </a>
    </div>
    <div class="col-4">
    <a href="{{route('loginstaff')}}">
        <button type="button" class="btn btn-warning text-white">
            <img width="160px" height="160px" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDI0IDI0IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIiBjbGFzcz0iIj48Zz48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0xMy43NSA3aC0uNzV2LTJjMC0yLjc1Ny0yLjI0My01LTUtNXMtNSAyLjI0My01IDV2MmgtLjc1Yy0xLjI0IDAtMi4yNSAxLjAwOS0yLjI1IDIuMjV2OC41YzAgMS4yNDEgMS4wMSAyLjI1IDIuMjUgMi4yNWgxMS41YzEuMjQgMCAyLjI1LTEuMDA5IDIuMjUtMi4yNXYtOC41YzAtMS4yNDEtMS4wMS0yLjI1LTIuMjUtMi4yNXptLTguNzUtMmMwLTEuNjU0IDEuMzQ2LTMgMy0zczMgMS4zNDYgMyAzdjJoLTZ6IiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+PHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBkPSJtMjAgMTljLTEuMTAzIDAtMi0uODk3LTItMnMuODk3LTIgMi0yIDIgLjg5NyAyIDItLjg5NyAyLTIgMnoiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0yMy4yNSAyNGgtNi41Yy0uNDE0IDAtLjc1LS4zMzYtLjc1LS43NXYtLjVjMC0xLjUxNyAxLjIzMy0yLjc1IDIuNzUtMi43NWgyLjVjMS41MTcgMCAyLjc1IDEuMjMzIDIuNzUgMi43NXYuNWMwIC40MTQtLjMzNi43NS0uNzUuNzV6IiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+PC9nPjwvc3ZnPg=="/>
            <b style="font-size: 20px;">Admin</b>
        </button>
    </a>
    </div>
    </div>

    <form class="form-group row justify-content-center" style="margin:20px 15% 20px 15%;" action="{{route('loginpasien')}}" method="post">
        @csrf
        <div class="col-4">
        <input type="text" name="code" class="form-control" placeholder="Kode">
        </div>
        <div class="col-4">
        <button type="submit" class="btn btn-primary">Masuk</button>
        </div>
    </form>

    @if (session()->has('pesan'))
        <div class="alert alert-danger">
            {{ session()->get('pesan') }}
        </div>
    @endif

    <div>
        <p style="text-align: left; margin:15px 15% 15px 15%; font-size: 13px; color: #cf0202;">
            *Jika anda secara tidak sengaja keluar dari form <b>Pendaftaran Umum/Poli</b> gunakan NIK anda sebagai kode untuk
            <br>melihat nomor pendaftaran anda kembali.
        </p>
    </div>
@endsection