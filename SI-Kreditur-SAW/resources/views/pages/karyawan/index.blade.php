@extends('layout')
@section('content')
    <div class="animated">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-sm">
                                <h4 class="card-title">Management Karyawan</h4>
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
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telp</th>
                                    <th>Alamat</th>
                                    <th>Jabatan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $items)
                                    <tr>
                                        <td>{{ $items->nama_karyawan }}</td>
                                        <td>{{ $items->users?->email }}</td>
                                        <td>{{ $items->no_telp }}</td>
                                        <td>{{ $items->alamat }}</td>
                                        <td>{{ $items->jabatan }}</td>
                                        <td>
                                            <a href="#" class="text-secondary font-weight-bold text-md edit-user"
                                                data-original-title="Edit user" data-toggle="modal"
                                                data-target="#largeModal{{ $items->id }}">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            <a href="{{ route('karyawan.destroy', ['id' => $items->id]) }}"
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
                                                <form action="{{ route('karyawan.update', ['id' => $items->id]) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="text" hidden name="user_id"
                                                            value="{{ $items->users->id }}">
                                                        <div class="form-group">
                                                            <label for="nf-email" class="form-control-label">Email</label>
                                                            <input type="email" id="nf-email" name="email"
                                                                placeholder="Enter Email.." class="form-control"
                                                                value="{{ $items->users->email }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nf-nama" class="form-control-label">Nama
                                                                Karyawan</label>
                                                            <input type="text" id="nf-nama_karyawan" name="nama_karyawan"
                                                                placeholder="Enter nama karyawan.." class="form-control"
                                                                value="{{ $items->nama_karyawan }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nf-no_telp" class="form-control-label">No
                                                                Telp</label>
                                                            <input type="telp" id="nf-no_telp" name="no_telp"
                                                                placeholder="Enter no_telp.." class="form-control"
                                                                value="{{ $items->no_telp }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nf-alamat" class="form-control-label">Alamat</label>
                                                            <input type="text" id="nf-alamat" name="alamat"
                                                                placeholder="Enter alamat.." class="form-control"
                                                                value="{{ $items->alamat }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nf-jabatan"
                                                                class="form-control-label">Jabatan</label>
                                                            <input type="text" id="nf-jabatan" name="jabatan"
                                                                placeholder="Enter nama jabatan.." class="form-control"
                                                                value="{{ $items->jabatan }}">
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
                            <h5 class="modal-title" id="largeModalLabel">Tambah Karyawan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('karyawan.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nf-email" class="form-control-label">Email</label>
                                            <input type="email" id="nf-email" name="email"
                                                placeholder="Enter Email.." class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nf-password" class="form-control-label">Password</label>
                                            <input type="password" id="nf-password" name="password"
                                                placeholder="Enter Password.." class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nf-nama" class="form-control-label">Nama Karyawan</label>
                                            <input type="text" id="nf-nama_karyawan" name="nama_karyawan"
                                                placeholder="Enter nama karyawan.." class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nf-no_telp" class="form-control-label">No Telp</label>
                                            <input type="telp" id="nf-no_telp" name="no_telp"
                                                placeholder="Enter no_telp.." class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nf-alamat" class="form-control-label">Alamat</label>
                                            <input type="text" id="nf-alamat" name="alamat"
                                                placeholder="Enter alamat.." class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nf-jabatan" class="form-control-label">Jabatan</label>
                                            <input type="text" id="nf-jabatan" name="jabatan"
                                                placeholder="Enter nama jabatan.." class="form-control">
                                        </div>
                                    </div>
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
