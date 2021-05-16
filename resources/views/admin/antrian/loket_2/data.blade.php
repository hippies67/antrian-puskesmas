@extends('layouts.master')
@section('title', 'Loket 2')
@section('content')
    <div class="row">
        <div class="col-md-5  grid-margiN">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Loket 2</p>
                    <div class="d-flex flex-wrap mb-1">
                        <div class="mr-5 mt-1">
                            <p class="text-muted">Antrian Sekarang</p>
                            <h3 class="text-primary fs-30 font-weight-medium">A-04</h3>
                        </div>
                        <div class="mr-5 mt-1">
                            <p class="text-muted">Belum Datang</p>
                            <h3 class="text-secondary fs-30 font-weight-medium">A-01</h3>
                        </div>
                        <div class="mt-4">
                            <button class="btn btn-sm btn-outline-primary">Panggil</button>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap">
                        <div class="mr-5 mt-3">
                            <button class="btn btn-sm btn-light">Kembali</button>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-sm btn-primary">Lanjut</button>
                        </div>
                    </div>
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
        <div class="col-md-7  grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Antrian Masuk</p>
                    <div class="table-responsive">
                        <table id="loket2" class="display expandable-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nomor Antrian</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Yada</td>
                                    <td>Yada</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script>
            $(document).ready(function() {
                $('#loket2').DataTable();
            });

        </script>
    @endsection
