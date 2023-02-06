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
                            <th scope="col">Kode</th>
                            <th scope="col">Nama Kecamatan</th>
                            <th scope="col">Active</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($results as $result)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $result->kode }}</td>
                                <td>{{ $result->nama }}</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                            checked>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="modal fade" id="editModal{{ $result->kode }}" tabindex="-1"
                                            aria-labelledby="editModal{{ $result->kode }}Label" aria-hidden="true"
                                            data-bs-backdrop="static" data-bs-keyboard="false">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="editModal{{ $result->kode }}Label">
                                                            Ubah</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('kecamatan.update', $result->kode) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="mb-3">
                                                                        <label for="kode"
                                                                            class="form-label">Kode</label>
                                                                        <input type="text" class="form-control"
                                                                            id="kode" value="{{ $result->kode }}"
                                                                            disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="mb-3">
                                                                        <label for="nama" class="form-label">Nama
                                                                            Kecamatan</label>
                                                                        <input type="text" class="form-control"
                                                                            id="nama" name="nama"
                                                                            value="{{ $result->nama }}">
                                                                        @error('nama')
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
                                            data-bs-target="#editModal{{ $result->kode }}">
                                            Edit
                                        </button>
                                        <form action="{{ route('kecamatan.destroy', $result->kode) }}" method="POST">
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
                                <td class="text-center" colspan="5">Data tidak ada</td>
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
                        <form action="{{ route('kecamatan.store') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="kode" class="form-label">Kode</label>
                                        <input type="text" class="form-control" id="kode" name="kode"
                                            value="{{ old('kode') }}">
                                        @error('kode')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama kecamatan</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            value="{{ old('nama') }}">
                                        @error('nama')
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
