@extends('layouts.master')
@section('title', 'Video')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
    integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"
    integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row">
    <div class="col-md-5 grid-margin">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Upload Video</p>
                <p class="text-muted mb-4">Anda dapat mengupload file berupa video dalam bentuk mp4.</p>
                <form action="{{ route('video') }}" method="post" enctype="multipart/form-data" id="dropzone"
                    class="dropzone">
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($video as $v)
                            <tr>
                                <td>{{ $v->filename }}</td>
                                <td>{{ $v->status }}</td>
                                <td>
                                    @if ($v->status == 'Ditampilkan')

                                    <form style="display: inline" action="{{ route('video.update', $v->id) }}"
                                        method="post">
                                        @csrf
                                        <input type="hidden" name="filename" id="filename" value="{{ $v->filename }}">
                                        <input type="hidden" name="status" id="status" value="">
                                        <button type="button" id="ganti"
                                            class="btn btn-dark btn-sm waves-effect waves-light but"
                                            onclick="unshowVideo(this)">Ganti Tampilan</button>
                                    </form>

                                    @else
                                    
                                    @if( $v->filename == '1.mp4')
                                    <form style="display: inline" action="{{ route('video.update', $v->id) }}"
                                        method="post">
                                        @csrf
                                        <input type="hidden" name="filename" id="filename" value="{{ $v->filename }}">
                                        <input type="hidden" name="status" id="status" value="Ditampilkan">
                                        <button type="button" id="tampil"
                                            class="btn btn-dark btn-sm waves-effect waves-light but"
                                            onclick="showVideo(this)" disabled>Tampilkan</button>

                                    </form>
                                    @endif
                                    <form style="display: inline" action="{{ route('video.update', $v->id) }}"
                                        method="post">
                                        @csrf
                                        <input type="hidden" name="filename" id="filename" value="{{ $v->filename }}">
                                        <input type="hidden" name="status" id="status" value="Ditampilkan">
                                        <button type="button" id="tampil"
                                            class="btn btn-dark btn-sm waves-effect waves-light but"
                                            onclick="showVideo(this)">Tampilkan</button>

                                    </form>

                                    @endif


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        Dropzone.options.dropzone =
        {
            maxFilesize: 9999,
            resizeQuality: 1.0,
            acceptedFiles: ".mp4",
            addRemoveLinks: true,
            timeout: 180000,
            removedfile: function(file) 
            {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                    type: 'POST',
                    url: '{{ url("files/destroy") }}',
                    data: {filename: name},
                    success: function (data){
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            success: function (file, response) {
                console.log(response);
            },
            error: function (file, response) {
                return false;
            }
        };
    </script>
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>

    

    <script>
        // sweetalert delete one data
        function showVideo(e) {
            Swal.fire({
                title: "Tampilkan Video?",
                text: `Video akan akan tampil di halaman display apabila anda mengklik Ya, tampilkan!`,
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, tampilkan!",
                cancelButtonText: "Batal"
            }).then(function(t) {
                if (t.value) {
                    e.parentNode.submit()
                }
            })
        }

        function unshowVideo(e) {
            Swal.fire({
                title: "Ganti Tampilan?",
                text: `Status tampilan video akan diubah ababila anda mengklik Ya, ubah!`,
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, ubah!",
                cancelButtonText: "Batal"
            }).then(function(t) {
                if (t.value) {
                    e.parentNode.submit()
                }
            })
        }

    </script>

    <script>
        $(document).ready(function() {
                $('#video').DataTable();
            });

    </script>
    @endsection