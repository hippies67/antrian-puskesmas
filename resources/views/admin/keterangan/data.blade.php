@extends('layouts.master')
@section('title', 'Keterangan')
@section('content')
    <div class="row">
        <div class="col-md-6  grid-margin">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Edit Keterangan</p>
                    <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>
        <style>
            .dataTables_wrapper .dataTables_length select {
                padding: 3px 15px !important;
                height: 30px !important;
            }

            div.dataTables_wrapper div.dataTables_filter input {
                padding: 3px 15px !important;
                height: 30px !important;
            }

        </style>
        <div class="col-md-6  grid-margin">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Keterangan </p>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo fugiat rem exercitationem recusandae at illo unde earum iste quisquam fuga. Accusamus earum, maxime labore id libero porro voluptates fuga architecto?</p>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script>
            $(document).ready(function() {
                $('#loket3').DataTable();
            });

        </script>
    @endsection
