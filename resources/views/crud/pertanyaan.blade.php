@extends('adminlte.master')

@section('content')
<div class="card">
    <a href="{{ url('/pertanyaan/create') }}">
        <button class="btn btn-primary"> Create New Question </button>
    </a>
    <br>
    <table class="table table-bordered">
        <thead>
            <th>No</th>
            <th>List Pertanyaan</th>
            <th>Edit Pertanyaan</th>
            <th>Detail Jawaban</th>
            <th>Form Jawaban</th>
            <th>Detail QnA</th>
            <th>Delete Pertanyaan</th>
        </thead>

        <tbody>
            @foreach ($pertanyaans as $pertanyaan)
            <tr>
                <td> {{$loop->iteration}} </td>
                <td> {{$pertanyaan->isi}} </td>
                <td>
                    <a href="{{ url('/pertanyaan/'.$pertanyaan->id.'/edit') }}">
                        <button  class="btn btn-warning">Edit</button>
                    </a>
                </td>
                <td>
                    <a href="{{ url('/jawaban/'. $pertanyaan->id) }}">
                        <button  class="btn btn-success"> Lihat Jawaban </button>
                    </a>
                </td>
                <td>
                    <form action="{{ url('/jawaban/'.$pertanyaan->id) }}" method="POST">
                        @csrf
                        <input type="text" name="isi">
                        <input hidden name="pertanyaan_id" value="{{ $pertanyaan->id }}">
                        <input hidden name="tanggal_dibuat" value=" {{ \Carbon\Carbon::now() }} ">
                        <input hidden name="tanggal_diperbaharui" value=" {{ \Carbon\Carbon::now() }} ">
                        <button type="submit" class="btn btn-success"> Submit Jawaban </button>
                    </form>
                </td>
                <td>
                    <a href=" {{ url( '/pertanyaan/'. $pertanyaan->id) }} ">
                        <button class="btn btn-primary"> Lihat QnA </button>
                    </a>
                </td>
                <td>
                    <form method="POST" action=" {{url('/pertanyaan/'.$pertanyaan->id)}} ">
                        @csrf
                        {{method_field('delete')}}
                        <button class="btn btn-danger" type="submit">Delete Pertanyaan</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection