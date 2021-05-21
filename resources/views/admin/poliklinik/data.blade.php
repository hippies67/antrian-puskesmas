@extends('layouts.master')
@section('title', 'Poli Klinik')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row">
    <style>
        .dataTables_wrapper .dataTables_length select {
            padding: 3px 15px !important;
            height: 30px !important;
        }

        div.dataTables_wrapper div.dataTables_filter input {
            padding: 3px 15px !important;
            height: 30px !important;
        }

        label.error {
            color: #f1556c;
            font-size: 13px;
            font-size: .875rem;
            font-weight: 400;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }

        input.error {
            color: #f1556c;
            border: 1px solid #f1556c;
        }
    </style>
    <div class="col-md-7  grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Poli Klinik</p>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-outline-primary mb-3" data-toggle="modal"
                    data-target="#modalTambah">
                    Tambah Poli Klinik
                </button>


                <div class="table-responsive">
                    <table id="loket" class="display expandable-table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Poli</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($poliklinik as $poli)
                            <tr>
                                <td>{{ $poli->poli }}</td>
                                <td>{{ $poli->status }}</td>
                                <td>
                                    {{-- @if ($poli->status == 'buka')
                                                <form action="{{ route('poliklinik.update', $poli->id) }}"
                                    method="post">
                                    @csrf

                                    <input type="hidden" name="poli" value="{{ $poli->poli }}">
                                    <input type="hidden" name="status" value="Tutup">
                                    <button class="btn btn-primary" type="submit"
                                        style="padding:5px 15px;">Tutup</button>
                                    </form>
                                    @else

                                    <form action="{{ route('poliklinik.update', $poli->id) }}" method="post">
                                        @csrf

                                        <input type="hidden" name="poli" value="{{ $poli->poli }}">
                                        <input type="hidden" name="status" value="Buka">
                                        <button class="btn btn-primary" type="submit"
                                            style="padding:5px 15px;">Buka</button>
                                    </form>
                                    @endif --}}
                                    <button type="button" data-toggle="modal" data-target="#modalEdit"
                                        data-idpoli="{{ $poli->id }}" data-poli="{{ $poli->poli }}"
                                        data-status="{{ $poli->status }}" onclick="setEditData({{ $poli }})"
                                        class="btn btn-warning editButton">Edit</button>
                                    <form style="display: inline" action="{{ route('poliklinik.delete', $poli) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="button"
                                            class="btn btn-danger btn-sm rounded waves-light waves-effect buttonHapus"
                                            onclick="deleteAlert(this)">Hapus
                                        </button>
                                    </form>
                                    @if ($poli->status == 'Buka')
                                    <form style="display: inline"
                                        action="{{ route('poliklinik.updateStatus', $poli->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="edit_poli" id="edit_poli" value="{{ $poli->poli }}">
                                        <input type="hidden" name="edit_status" id="edit_status" value="Tutup">
                                        <button type="button" class="btn btn-dark btn-sm waves-effect waves-light"
                                            onclick="updateStatusTutup(this)">Tutup</button>
                                    </form>
                                    @else
                                    <form style=" display: inline"
                                        action="{{ route('poliklinik.updateStatus', $poli->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="edit_poli" id="edit_poli" value="{{ $poli->poli }}">
                                        <input type="hidden" name="edit_status" id="edit_status" value="Buka">
                                        <button type="button" class="btn btn-dark btn-sm waves-effect waves-light"
                                            onclick="updateStatusBuka(this)">Buka</button>
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

    {{-- Modal Tambah --}}
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Poli Klinik</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" action="{{ route('poliklinik') }}" method="POST" id="tambahPoli">
                        @csrf
                        <div class="form-group">
                            <label for="PoliKlinik">Poli Klinik</label>
                            <input type="text" class="form-control mb-1" name="poli" id="poli" placeholder="Poliklinik">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control mb-1">
                                <option value="Buka">Buka</option>
                                <option value="Tutup">Tutup</option>
                            </select>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                    <button class="btn btn-light" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit --}}
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Poli Klinik</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" action="{{ route('poliklinik.update', '') }}" id="modalActionId"
                        method="POST">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="checkPoli">
                        <div class="form-group">
                            <label for="PoliKlinik">Poli Klinik</label>
                            <input type="text" class="form-control mb-1" name="edit_poli" id="edit_poli"
                                placeholder="Poliklinik">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="edit_status" id="edit_status" class="form-control mb-1">
                                <option value="Buka">Buka</option>
                                <option value="Tutup">Tutup</option>
                            </select>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                    <button class="btn btn-light" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    @endsection
    @section('js')
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>

    <script>
        $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $("#tambahPoli").validate({
                    rules: {
                        poli: {
                            required: true,
                            minlength: 2,
                            remote: {
                                url: "{{ route('poliklinik.checkPoli') }}",
                                type: "post",
                            }
                        },
                        status: {
                            required: true,
                        },
                    },
                    messages: {
                        poli: {
                            required: "Poli harus di isi",
                            remote: "Poli sudah tersedia"
                        },
                        status: {
                            required: "Status harus di isi"
                        }
                    }
                });
            });

    </script>

    <script>
        $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $("#modalActionId").validate({
                    rules: {
                        edit_poli: {
                            required: true,
                            minlength: 3,
                            maxlength: 30,
                            remote: {
                                param: {
                                    url: "{{ route('poliklinik.checkPoli') }}",
                                    type: "post",
                                },
                                /* fungsi untuk submit modal tanpa ada validasi
                                exist pada field yang belum di ubah */
                                depends: function(element) {
                                    // compare name in form to hidden field
                                    return ($(element).val() !== $('#checkPoli').val());
                                },

                            }
                        },
                        edit_status: {
                            required: true,
                        }
                    },
                    messages: {
                        edit_poli: {
                            required: "Poli harus di isi",
                            minlength: "Poli tidak boleh kurang dari 3 karakter",
                            maxlength: "Poli tidak boleh lebih dari 30 karakter",
                            remote: "Poli sudah tersedia"
                        },
                        edit_status: {
                            required: "Status harus di isi"
                        }
                    }
                });
            });

    </script>

    <script>
        $(document).ready(function() {
                $('#loket').DataTable();
            });

            const modalAction = $("#modalActionId").attr('action');

            function setEditData(poli) {
                $("#modalActionId").attr('action', `${modalAction}/${poli.id}`);
                $('#checkPoli').val(poli.poli);
                $('[name="edit_poli"]').val(poli.poli);
                $('[name="edit_status"]').val(poli.status);
            }

    </script>

    <script>
        // sweetalert delete one data
            function updateStatusBuka(e) {
                Swal.fire({
                    title: "Buka Poli?",
                    text: `Poli akan dibuka apabila anda mengklik Ya, buka!`,
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, buka!",
                    cancelButtonText: "Batal"
                }).then(function(t) {
                    if (t.value) {
                        e.parentNode.submit()
                    }
                })
            }

            function updateStatusTutup(e) {
                Swal.fire({
                    title: "Tutup Poli?",
                    text: `Poli akan dibuka apabila anda mengklik Ya, tutup!`,
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, tutup!",
                    cancelButtonText: "Batal"
                }).then(function(t) {
                    if (t.value) {
                        e.parentNode.submit()
                    }
                })
            }

    </script>

    <script>
        // sweetalert delete one data
            function deleteAlert(e) {
                Swal.fire({
                    title: "Hapus user?",
                    text: `Seluruh data terkait user akan terhapus. Anda tidak akan dapat mengembalikan aksi
                            ini!`,
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Batal"
                }).then(function(t) {
                    if (t.value) {
                        e.parentNode.submit()
                    }
                })
            }

    </script>

    @endsection