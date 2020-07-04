@extends('adminlte.master')

@section('content')
    <div class="card">
        <form action="{{ url('/pertanyaan/'.$id) }}" method="POST">
            {{ method_field('put') }}
            @csrf
            <input hidden name="id" value="{{$id}}">
            <label for="">Judul</label>
            <input class="form-control" type="text" name="judul" value="{{$pertanyaan->judul}}"><br>
            <label for="">Isi</label>
            <input class="form-control" type="text" name="isi" value="{{$pertanyaan->isi}}"><br>
            <input hidden class="form-control" type="text" name="tanggal_dibuat" value="{{$pertanyaan->tanggal_dibuat}}"><br>
            <input hidden class="form-control" type="text" name="tanggal_diperbaharui" value="{{ \Carbon\Carbon::now() }}"><br>
            <br>
            <button class="btn btn-warning" type="submit">Update Pertanyaan</button>
        </form>
    </div>
@endsection