@extends('layouts.master')
@section('title', 'Video')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <div class="row">
        <div class="col-md-5 grid-margin">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Upload Video</p>
                    <p class="text-muted mb-4">Anda dapat mengupload file berupa video dalam bentuk mp4.</p>
                        <form action="{{ route('dashboard') }}" method="post" enctype="multipart/form-data"
                            id="image-upload" class="dropzone">
                            @csrf
                        </form>
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

            .dropzone {
                border: 2px dashed #4B49AC;
                border-radius: 5px;
                background: rgb(250, 250, 250);
                background-clip: border-box;
            }

            .dropzone .dz-message span {
                color: #b1b1b1 !important;
            }

        </style>
        <div class="col-md-7 grid-margin">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Daftar Video</p>
                    <div class="table-responsive">
                        <table id="video" class="display expandable-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Video</th>
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
        <script type="text/javascript">
            Dropzone.options.imageUpload = {
                maxFilesize: 1,
                acceptedFiles: ".jpeg,.jpg,.png,.gif"
            };

        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script>
            $(document).ready(function() {
                $('#video').DataTable();
            });

        </script>
    @endsection
