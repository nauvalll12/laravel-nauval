@extends('layouts.app')

@section('title', 'Daftar Siswa')

@section('content')
    <div class="card">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="fas fa-users text-primary me-2"></i>Data Siswa</h4>
            <a href="{{ route('siswa.create') }}" class="btn btn-success">
                <i class="fas fa-plus-circle me-1"></i> Tambah Siswa
            </a>
        </div>
        <div class="card-body">
            <!-- Search Form -->
            <div class="row mb-3">
                <div class="col-md-6 offset-md-6">
                    <form action="{{ route('siswa.index') }}" method="GET" class="d-flex">
                        <input type="text" name="search" class="form-control" placeholder="Cari nama atau NIS..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary ms-2">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="15%">NIS</th>
                            <th width="25%">Nama</th>
                            <th width="10%">Gender</th>
                            <th width="15%">Tanggal Lahir</th>
                            <th width="10%">No. Telp</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswa as $s)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $s->nis }}</td>
                            <td>{{ $s->nama }}</td>
                            <td>
                                @if($s->jenis_kelamin == 'L')
                                    <span class="badge bg-primary"><i class="fas fa-male me-1"></i> Laki-laki</span>
                                @else
                                    <span class="badge bg-info"><i class="fas fa-female me-1"></i> Perempuan</span>
                                @endif
                            </td>
                            <td>{{ date('d F Y', strtotime($s->tanggal_lahir)) }}</td>
                            <td>{{ $s->no_telp }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('siswa.show', $s->id) }}" class="btn btn-sm btn-info text-white">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-sm btn-warning text-white">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger btn-delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                <div class="py-5">
                                    <img src="https://cdn.jsdelivr.net/npm/twemoji@14.0.2/assets/svg/1f615.svg" width="80" class="mb-3">
                                    <h4>Tidak ada data siswa</h4>
                                    <p class="text-muted">Silakan tambahkan data siswa baru.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Menampilkan {{ $siswa->count() }} dari {{ $siswa->total() }} data</small>
                </div>
                <div>
                    {{ $siswa->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection