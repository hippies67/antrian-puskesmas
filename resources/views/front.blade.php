@extends('layouts.main')
@section('title', 'Front Page')
@section('content')

<style>
    video {
        width: 600px !important;
    }
</style>
<div class="container">
    <div class="row mt-4">
        <div class="col-sm-6">
            <h2>AAP</h2>
        </div>
        <div class="col-sm-6 text-right">
            <h2>10.00 AM</h2>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="display-4 text-center">LOKET 4</h1>

                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <h1 class="display-4 text-center">NOMOR ANTRIAN</h1>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <h1 class="display-4 text-center">A-015</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-6 text-right">
            <div class="card">
                <div class="card-body">
                    <video src="{{ asset('video/1.mp4') }}" controls></video>
                </div>
            </div>

        </div>
    </div>
    <div class="row mt-5">
        <div class="col-sm-3">
            <div class="card-body">
                <h1 class="display-4 text-center">A-015</h1>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card-body">
                <h1 class="display-4 text-center">A-015</h1>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card-body">
                <h1 class="display-4 text-center">A-015</h1>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card-body">
                <h1 class="display-4 text-center">A-015</h1>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-sm-12">
            <marquee behavior="scroll" direction="left">Scrolling Slide Text</marquee>
        </div>
    </div>
</div>
@endsection