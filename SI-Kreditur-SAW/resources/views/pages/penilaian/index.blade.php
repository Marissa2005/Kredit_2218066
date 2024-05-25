@extends('layout')
@section('content')
    <div class="animated">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-sm">
                                <h4 class="card-title">Management Penilaian</h4>
                            </div>
                            <div class="col-sm d-flex align-items-center justify-content-end mx-3">
                                <a href="{{ route('penilaian.print') }}"
                                    class="text-white font-weight-bold text-md btn btn-primary text-center px-4 mr-2">
                                    Cetak
                                </a>
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
                                    <th>Nama Calon</th>
                                    @foreach ($kriteria as $kr)
                                        <th>
                                            {{ $kr->nama_kriteria }} [{{ $kr->bobot_kriteria }}%]
                                        </th>
                                    @endforeach
                                    <th>
                                        Total
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($calonKreditur as $items)
                                    <tr>
                                        @php
                                            $total = 0;
                                        @endphp
                                        <td>
                                            {{ $items->nama_calon }}
                                        </td>
                                        @foreach ($kriteria as $kriterias)
                                            @foreach ($penilaian as $penilaians)
                                                @if ($items->id == $penilaians->calon_kreditur_id && $penilaians->kriteria_id == $kriterias->id)
                                                    <td class="px-6 py-4">
                                                        {{ $penilaians->nilai }}
                                                        @php
                                                            $total += $penilaians->nilai;
                                                        @endphp
                                                    </td>
                                                @endif
                                            @endforeach
                                        @endforeach
                                        <td>
                                            {{ $total }}
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('penilaian.destroy', ['id' => $items->id]) }}"
                                                class="text-secondary font-weight-bold text-md" data-toggle="tooltip"
                                                data-original-title="Delete user" data-confirm-delete="true">
                                                <i class="menu-icon fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-sm">
                                <h4 class="card-title">Normalisasi</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Calon</th>
                                    @foreach ($kriteria as $kr)
                                        <th>
                                            {{ $kr->nama_kriteria }} [{{ $kr->bobot_kriteria }}%]
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($calonKreditur as $items)
                                    <tr>
                                        <td>
                                            {{ $items->nama_calon }}
                                        </td>
                                        @foreach ($dataSAW as $datas)
                                            @if ($datas['calon_id'] == $items->id)
                                                <td class="px-6 py-4">
                                                    {{ $datas['hasil_normalisasi'] }}
                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-sm">
                                <h4 class="card-title">Tabel Perhitungan</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Calon</th>
                                    <th>
                                        Perhitungan
                                    </th>
                                    <th>
                                        Hasil
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($calonKreditur as $items)
                                    @php
                                        $total_akhir = 0;
                                    @endphp
                                    <tr>
                                        <td>
                                            {{ $items->nama_calon }}
                                        </td>
                                        <td>
                                            @foreach ($dataSAW as $datas)
                                                @if ($datas['calon_id'] == $items->id)
                                                    ({{ $datas['bobot_kriteria'] }} x {{ $datas['hasil_normalisasi'] }})
                                                    @php
                                                        $total_akhir += $datas['hasil_saw'];
                                                    @endphp
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $total_akhir }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-sm">
                                <h4 class="card-title">Tabel Hasil Perankingan</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Calon</th>
                                    <th>
                                        Hasil
                                    </th>
                                    <th>
                                        Rangking
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ranking as $items)
                                    @php
                                        $total_akhir = 0;
                                    @endphp
                                    <tr>
                                        <td>
                                            {{ $items['nama'] }}
                                        </td>
                                        <td>
                                            @foreach ($dataSAW as $datas)
                                                @if ($datas['calon_id'] == $items['calon_id'])
                                                    @php
                                                        $total_akhir += $datas['hasil_saw'];
                                                    @endphp
                                                @endif
                                            @endforeach
                                            {{ $total_akhir }}
                                        </td>
                                        <td>
                                            {{ $items['ranking'] }}
                                        </td>
                                    </tr>
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
                            <h5 class="modal-title" id="largeModalLabel">Tambah Penilaian</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('penilaian.store') }}" method="POST">
                            @csrf
                            <div class="modal-body add_kriteria">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Nama Calon</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="calonKreditur">
                                        <option selected disabled>pilih</option>
                                        @foreach ($getAllKreditur as $items)
                                            <option value="{{ $items->id }}">{{ $items->nama_calon }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @foreach ($kriteria as $kriterias)
                                    <div class="form-group">
                                        <label for="exampleInput"
                                            id="{{ $kriterias->nama_kriteria }}">{{ $kriterias->nama_kriteria }}</label>
                                        <select required class="form-control" id="exampleFormControlSelect1"
                                            name="data[{{ str_replace(' ', '_', $kriterias->nama_kriteria) }}]">
                                            <option selected disabled>pilih</option>
                                            @foreach ($subKriteria as $subKriterias)
                                                @if ($subKriterias->kriteria_id == $kriterias->id)
                                                    <option value="{{ $subKriterias->bobot_sub }}">
                                                        {{ $subKriterias->nama_sub }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                @endforeach
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
