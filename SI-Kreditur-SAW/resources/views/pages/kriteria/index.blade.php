@extends('layout')
@section('content')
    <div class="animated">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-sm">
                                <h4 class="card-title">Management Kriteria</h4>
                            </div>
                            <div class="col-sm  d-flex align-items-center justify-content-end mx-3">
                                <button type="button" class="btn btn-success mb-1" data-toggle="modal"
                                    data-target="#largeModal">
                                    Tambah
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Kriteria</th>
                                    <th>Kategori</th>
                                    <th>Bobot</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $items)
                                    <tr>
                                        <td>{{ $items->nama_kriteria }}</td>
                                        <td>{{ $items->kategori }}</td>
                                        <td>{{ $items->bobot_kriteria }}</td>
                                        <td>
                                            <a href="#" class="text-secondary font-weight-bold text-md edit-user"
                                                data-original-title="Edit user" data-toggle="modal"
                                                data-target="#largeModal{{ $items->id }}">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            <a href="{{ route('kriteria.destroy', ['id' => $items->id]) }}"
                                                class="text-secondary font-weight-bold text-md" data-toggle="tooltip"
                                                data-original-title="Delete user" data-confirm-delete="true">
                                                <i class="menu-icon fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    {{-- Modal Update Data --}}
                                    <div class="modal fade" id="largeModal{{ $items->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="largeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="largeModalLabel">Update Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('kriteria.update', ['id' => $items->id]) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="nf-nama" class="form-control-label">Nama
                                                                Kriteria</label>
                                                            <input type="text" id="nf-nama_kriteria" name="nama_kriteria"
                                                                placeholder="Enter nama kriteria.." class="form-control"
                                                                value="{{ $items->nama_kriteria }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nf-kategori" class="form-control-label">Kategori</label>
                                                            <select class="form-control" id="exampleFormControlSelect1"
                                                                name="kategori">
                                                                <option selected disabled>pilih</option>
                                                                <option
                                                                    value="Benefit"{{ $items->kategori == 'Benefit' ? 'selected' : '' }}>
                                                                    Benefit</option>
                                                                <option
                                                                    value="Cost"{{ $items->kategori == 'Cost' ? 'selected' : '' }}>
                                                                    Cost</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInput">Bobot</label>
                                                            <input type="number" class="form-control" id="exampleInput"
                                                                value="{{ $items->bobot_kriteria }}" name="bobot_kriteria"
                                                                aria-describedby="emailHelp" placeholder="Enter Bobot..">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- Modal Tambah Data --}}
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="largeModalLabel">Tambah Calon Kreditur</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('kriteria.store') }}" method="POST">
                            @csrf
                            <div class="modal-body add_kriteria">
                                 <div class="form-group">
                                    <label for="exampleInput">Nama Kriteria</label>
                                    <input type="text" class="form-control" id="exampleInput" name="nama_kriteria"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Kategori</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="kategori">
                                        <option selected disabled>pilih</option>
                                        <option value="Benefit">Benefit</option>
                                        <option value="Cost">Cost</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput">Bobot</label>
                                    <input type="number" class="form-control" id="exampleInput" name="bobot_kriteria"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>
                            {{-- button untuk menambahkan sub kriteria --}}
                            <button type="button"
                                class="add-more btn btn-primary mx-4">
                                Add Sub Kriteria
                            </button>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="copy invisible">
                <div class="form-group mx-3">
                    <label for="exampleInput">Sub Kriteria</label>
                    <input type="text" class="form-control" name="sub_kriteria[]" aria-describedby="emailHelp"
                        id="sub_kriteria">
                </div>
                <div class="form-group mx-3">
                    <label for="exampleInput">Bobot Sub Kriteria</label>
                    <input type="number" class="form-control" name="bobot_sub_kriteria[]" aria-describedby="emailHelp"
                        id="bobot_sub_kriteria">
                </div>
            </div>
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script>
            $(document).ready(function() {
                $(".add-more").click(function() {
                    var html = $(".copy").html();
                    $(".add_kriteria").after(html);
                });
            });
        </script>
    </div>
@endsection
