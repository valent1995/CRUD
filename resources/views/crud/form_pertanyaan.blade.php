@extends('adminlte.master')

@section('content')
<div>
    <form action="{{ url("/pertanyaan") }}" method="POST">
    @csrf
    <label for="">Judul Pertanyaan</label>
    <input class="form-control" type="text" name="judul">
    <label for="">Pertanyaan Baru</label>
    <textarea class="form-control " name="isi" id="" cols="30" rows="10"></textarea>
    <input hidden name="tanggal_dibuat" value="{{ \Carbon\Carbon::now()}}">
    <input hidden name="tanggal_diperbaharui" value="{{ \Carbon\Carbon::now()}}">
    <br>
    <button class="btn btn-primary" type="submit"> Create </button>
    </form>
</div>
@endsection