@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="col-12 mb-3">
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                Tambah
            </button>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pegawai</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Tgl Lahir</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Agama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Kelurahan</th>
                            <th scope="col">Kecamatan</th>
                            <th scope="col">Provinsi</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($results as $result)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $result->nama }}</td>
                                <td>{{ $result->tempat_lahir }}</td>
                                <td>{{ $result->tgl_lahir_f }}</td>
                                <td>{{ $result->jk_f }}</td>
                                <td>{{ $result->agama }}</td>
                                <td>{{ $result->alamat }}</td>
                                <td>{{ $result->kelurahan?->nama }}</td>
                                <td>{{ $result->kelurahan?->kecamatan?->nama }}</td>
                                <td>{{ $result->provinsi?->nama }}</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="modal fade" id="editModal{{ $result->id }}" tabindex="-1"
                                            aria-labelledby="editModal{{ $result->id }}Label" aria-hidden="true"
                                            data-bs-backdrop="static" data-bs-keyboard="false">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="editModal{{ $result->id }}Label">
                                                            Ubah</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('pegawai.update', $result->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="mb-3">
                                                                        <label for="nama" class="form-label">Nama
                                                                            pegawai</label>
                                                                        <input type="text" class="form-control"
                                                                            id="nama" name="nama"
                                                                            value="{{ $result->nama }}">
                                                                        @error('nama')
                                                                            <div class="form-text text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="tempat_lahir" class="form-label">Tempat
                                                                            Lahir</label>
                                                                        <input type="text" class="form-control"
                                                                            id="tempat_lahir" name="tempat_lahir"
                                                                            value="{{ $result->tempat_lahir }}">
                                                                        @error('tempat_lahir')
                                                                            <div class="form-text text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="tgl_lahir" class="form-label">Tgl
                                                                            Lahir</label>
                                                                        <input type="date" class="form-control"
                                                                            id="tgl_lahir" name="tgl_lahir"
                                                                            value="{{ $result->tgl_lahir }}">
                                                                        @error('tgl_lahir')
                                                                            <div class="form-text text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="jk" class="form-label">Jenis
                                                                            Kelamin</label>
                                                                        <select name="jk" id="jk"
                                                                            class="form-select">
                                                                            <option hidden>Plih</option>
                                                                            <option value="L"
                                                                                {{ $result->jk == 'L' ? 'selected' : '' }}>
                                                                                Pria</option>
                                                                            <option value="P"
                                                                                {{ $result->jk == 'P' ? 'selected' : '' }}>
                                                                                Wanita</option>
                                                                        </select>
                                                                        @error('tgl_lahir')
                                                                            <div class="form-text text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="agama"
                                                                            class="form-label">Agama</label>
                                                                        <input type="text" class="form-control"
                                                                            id="agama" name="agama"
                                                                            value="{{ $result->agama }}">
                                                                        @error('agama')
                                                                            <div class="form-text text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="mb-3">
                                                                        <label for="alamat"
                                                                            class="form-label">Alamat</label>
                                                                        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control">{{ $result->alamat }}</textarea>
                                                                        @error('alamat')
                                                                            <div class="form-text text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="mb-3">
                                                                        <label for="kode_provinsi" class="form-label">Nama
                                                                            Provinsi</label>
                                                                        <select class="form-select"
                                                                            aria-label="Default select example"
                                                                            id="kode_provinsi" name="kode_provinsi"
                                                                            value="{{ $result->kode_provinsi }}">
                                                                            <option hidden>Pilih</option>
                                                                            @foreach ($provinsi as $prov)
                                                                                <option value="{{ $prov->kode }}"
                                                                                    {{ $prov->kode == $result->kode_provinsi ? 'selected' : '' }}>
                                                                                    {{ $prov->nama }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('kode_provinsi')
                                                                            <div class="form-text text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="mb-3">
                                                                        <label for="kode_kecamatan"
                                                                            class="form-label">Nama Kecamatan</label>
                                                                        <select class="form-select"
                                                                            aria-label="Default select example"
                                                                            name="kode_kecamatan"
                                                                            id="kode_kecamatan_{{ $result->id }}"
                                                                            value="{{ $result->kode_kecamatan }}"
                                                                            onchange="changeKecamatanEdit('{{ $result->id }}')">
                                                                            <option hidden>Pilih</option>
                                                                            @foreach ($kecamatan as $kec)
                                                                                <option value="{{ $kec->kode }}"
                                                                                    {{ $result->kelurahan?->kode_kecamatan == $kec->kode ? 'selected' : '' }}>
                                                                                    {{ $kec->nama }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('kode_kecamatan')
                                                                            <div class="form-text text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="mb-3">
                                                                        <label for="kode_kelurahan"
                                                                            class="form-label">Nama Kelurahan</label>
                                                                        <select class="form-select"
                                                                            aria-label="Default select example"
                                                                            id="kode_kelurahan_{{ $result->id }}"
                                                                            name="kode_kelurahan"
                                                                            value="{{ $result->kode_kelurahan }}">
                                                                            @foreach ($result->kelurahan?->kecamatan?->kelurahan as $kel)
                                                                                <option value="{{ $kel->kode }}"
                                                                                    {{ $result->kelurahan?->kode_kelurahan == $kel->kode ? 'selected' : '' }}>
                                                                                    {{ $kel->nama }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('kode_kelurahan')
                                                                            <div class="form-text text-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <button class="btn btn-sm btn-primary"
                                                                        type="submit">Simpan</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-sm btn-primary me-2" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $result->id }}">
                                            Edit
                                        </button>
                                        <form action="{{ route('pegawai.destroy', $result->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-primary">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="11">Data tidak ada</td>
                            </tr>
                        @endforelse
                        <tr></tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true"
            data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createModalLabel">Tambah</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pegawai.store') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama pegawai</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            value="{{ old('nama') }}">
                                        @error('nama')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                            value="{{ old('tempat_lahir') }}">
                                        @error('tempat_lahir')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="tgl_lahir" class="form-label">Tgl Lahir</label>
                                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                            value="{{ old('tgl_lahir') }}">
                                        @error('tgl_lahir')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="jk" class="form-label">Jenis Kelamin</label>
                                        <select name="jk" id="jk" class="form-select">
                                            <option hidden>Plih</option>
                                            <option value="L">Pria</option>
                                            <option value="P">Wanita</option>
                                        </select>
                                        @error('tgl_lahir')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="agama" class="form-label">Agama</label>
                                        <input type="text" class="form-control" id="agama" name="agama"
                                            value="{{ old('agama') }}">
                                        @error('agama')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control">{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="kode_provinsi" class="form-label">Nama Provinsi</label>
                                        <select class="form-select" aria-label="Default select example"
                                            id="kode_provinsi" name="kode_provinsi" value="{{ old('kode_provinsi') }}">
                                            <option hidden>Pilih</option>
                                            @foreach ($provinsi as $prov)
                                                <option value="{{ $prov->kode }}">{{ $prov->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('kode_provinsi')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="kode_kecamatan" class="form-label">Nama Kecamatan</label>
                                        <select class="form-select" aria-label="Default select example"
                                            id="kode_kecamatan" name="kode_kecamatan"
                                            value="{{ old('kode_kecamatan') }}">
                                            <option hidden>Pilih</option>
                                            @foreach ($kecamatan as $kec)
                                                <option value="{{ $kec->kode }}">{{ $kec->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('kode_kecamatan')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="kode_kelurahan" class="form-label">Nama Kelurahan</label>
                                        <select class="form-select" aria-label="Default select example"
                                            id="kode_kelurahan" name="kode_kelurahan"
                                            value="{{ old('kode_kelurahan') }}">
                                        </select>
                                        @error('kode_kelurahan')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function changeKecamatanEdit(id) {
            $(`#kode_kelurahan_${id}`).empty();
            let kec = $(`#kode_kecamatan_${id}`).val();
            $.ajax({
                url: `/api/kelurahan/${kec}`,
                method: 'GET',
                success: function(data) {
                    data.forEach((val) => {
                        $(`#kode_kelurahan_${id}`).append(
                            `<option value='${val.kode}'>${val.nama}</option>`)
                    })
                }
            })
        }

        $(function() {
            $('#kode_kecamatan').on('change', function(e) {
                $('#kode_kelurahan').empty();
                $.ajax({
                    url: `/api/kelurahan/${e.target.value}`,
                    method: 'GET',
                    success: function(data) {
                        data.forEach((val) => {
                            $('#kode_kelurahan').append(
                                `<option value='${val.kode}'>${val.nama}</option>`)
                        })
                    }
                })
            });
        })
    </script>
@endsection
