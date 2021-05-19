@extends('layouts.main')
@section('title', 'Display')
@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-10">
                <h2>AAP</h2>
            </div>
            <div class="col-sm-2">
                <h2>10.00 AM</h2>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-6">
             
                <div class="card mt-4">
                    <div class="card-body">
                        <h1>LOKET 4</h1>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                       
                        <h1 class="">NOMOR ANTRIAN</h1>
                        <h1 class="mt-3">A2-001</h1>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

            </div>
            <div class="col-sm-6">
                <video src="{{ asset('video/1.mp4') }}" class="d-none d-sm-block" controls autoplay muted loop width="510"></video>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="card mt-4">
                    <div class="card-body">
                        <h3>LOKET 1</h3>
                        <h5>A2-2001</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card mt-4">
                    <div class="card-body">
                        <h3>LOKET 2</h3>
                        <h5>A2-2002</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card mt-4">
                    <div class="card-body">
                        <h3>LOKET 3</h3>
                        <h5>A2-2003</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <marquee behavior="scroll" direction="left">Here is some scrolling text... right to left!</marquee>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
