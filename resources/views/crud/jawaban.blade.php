@extends('adminlte.master')

@section('content')
    <div class="card">
        @foreach ($jawabans as $jawaban)
            <h1> {{ $jawaban->isi }} </h1> <br>
        @endforeach
    </div>
@endsection