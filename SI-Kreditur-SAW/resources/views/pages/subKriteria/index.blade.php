@extends('layout')
@section('content')
    <div class="animated">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-sm">
                                <h4 class="card-title">Management Sub Kriteria</h4>
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
                                    <th>Nama Sub Kriteria</th>
                                    <th>Bobot Sub</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subKriteria as $items)
                                    <tr>
                                        <td>{{ $items->kriterias->nama_kriteria }}</td>
                                        <td>{{ $items->nama_sub }}</td>
                                        <td>{{ $items->bobot_sub }}</td>
                                        <td>
                                            <a href="#" class="text-secondary font-weight-bold text-md edit-user"
                                                data-original-title="Edit user" data-toggle="modal"
                                                data-target="#largeModal{{ $items->id }}">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            <a href="{{ route('subKriteria.destroy', ['id' => $items->id]) }}"
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
                                                    <h5 class="modal-title" id="largeModalLabel">Update Sub Kriteria</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('subKriteria.update', ['id' => $items->id]) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="nf-nama" class="form-control-label">Nama
                                                                Kriteria</label>
                                                            <select class="form-control" id="exampleFormControlSelect1"
                                                                name="kriteria">
                                                                <option selected disabled>pilih</option>
                                                                @foreach ($kriteria as $kr)
                                                                <option
                                                                    value="{{ $kr->id }}"{{ $items->kriteria_id == $kr->id ? 'selected' : '' }}>
                                                                    {{ $kr->nama_kriteria }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInput">Nama Sub Kriteria</label>
                                                            <input type="text" class="form-control" id="exampleInput"
                                                                value="{{ $items->nama_sub }}" name="nama_sub"
                                                                aria-describedby="emailHelp" placeholder="Enter nama">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInput">Bobot</label>
                                                            <input type="number" class="form-control" id="exampleInput"
                                                                value="{{ $items->bobot_sub }}" name="bobot_sub"
                                                                aria-describedby="emailHelp">
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
                            <h5 class="modal-title" id="largeModalLabel">Tambah Sub kriteria</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('subKriteria.store') }}" method="POST">
                            @csrf
                            <div class="modal-body add_kriteria">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Kriteria</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="kriteria">
                                        <option selected disabled>pilih</option>
                                        @foreach ($kriteria as $items)
                                        <option value="{{ $items->id }}">{{ $items->nama_kriteria }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput">Nama Sub Kriteria</label>
                                    <input type="text" class="form-control" id="exampleInput" name="nama_sub"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput">Bobot</label>
                                    <input type="number" class="form-control" id="exampleInput" name="bobot_sub"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
