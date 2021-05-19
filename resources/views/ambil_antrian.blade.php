@extends('layouts.main')
@section('title', 'Antrian')
@section('content')
    <style>
        button {
            color: #6c757d !important;
            width: 250px;
            height: 120px;
            background-color: #ffffff;
            border-radius: 10px;
            border: 2px solid #acacac;
        }

        button:hover {
            background-color: #dad8d8 !important;
            color: #ffffff !important;

        }

        button:hover+h5 {
            color: red !important;

        }

    </style>
    <div class="container">
        <div class="row">
            @foreach ($poliklinik as $poli)
                @if ($poli->status == 'Buka')
                    <div class="col-sm-3">
                        <button class="mt-5">
                            {{ $poli->poli }}
                        </button>
                    </div>
                @else
                    <div class="col-sm-3">
                        <button type="button" class="mt-5">
                            Poli {{ $poli->poli }} Tutup
                        </button>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
@endsection
