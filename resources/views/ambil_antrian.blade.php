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
        {{-- LOKET 1 --}}
        @foreach ($loket_1 as $l1)
        @if ($l1->status == 'Buka')
        <div class="col-sm-3">
            <form action="{{ route('antrian')  }}" method="post">
                @csrf
                <input type="hidden" name="antrian" value="Loket 1">
                <input type="hidden" name="poli" value="{{ $l1->poli }}">
                <input type="hidden" name="status" value="Belum Dipanggil">
                <button type="submit" class="mt-5">
                    {{ $l1->poli }}
                </button>
            </form>
        </div>
        @else
        <div class="col-sm-3">
            <button type="button" class="mt-5">
                Poli {{ $l1->poli }} Tutup
            </button>
        </div>
        @endif
        @endforeach
        {{-- LOKET 2 --}}
        @foreach ($loket_2 as $l2)
        @if ($l2->status == 'Buka')
        <div class="col-sm-3">
            <form action="{{ route('antrian')  }}" method="post">
                @csrf
                <input type="hidden" name="antrian" value="Loket 2">
                <input type="hidden" name="poli" value="{{ $l2->poli }}">
                <input type="hidden" name="status" value="Belum Dipanggil">
                <button type="submit" class="mt-5">
                    {{ $l2->poli }}
                </button>
            </form>
        </div>
        @else
        <div class="col-sm-3">
            <button type="button" class="mt-5">
                Poli {{ $l2->poli }} Tutup
            </button>
        </div>
        @endif
        @endforeach
        {{-- LOKET 3 --}}
        @foreach ($loket_3 as $l3)
        @if ($l3->status == 'Buka')
        <div class="col-sm-3">
            <form action="{{ route('antrian')  }}" method="post">
                @csrf
                <input type="hidden" name="antrian" value="Loket 3">
                <input type="hidden" name="poli" value="{{ $l3->poli }}">
                <input type="hidden" name="status" value="Belum Dipanggil">
                <button type="submit" class="mt-5">
                    {{ $l3->poli }}
                </button>
            </form>
        </div>
        @else
        <div class="col-sm-3">
            <button type="button" class="mt-5">
                Poli {{ $l3->poli }} Tutup
            </button>
        </div>
        @endif
        @endforeach
    </div>
</div>
@include('sweetalert::alert')

@endsection