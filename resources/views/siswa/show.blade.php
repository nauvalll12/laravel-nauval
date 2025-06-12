@extends('layouts.app')

@section('title', 'Detail Siswa')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0"><i class="fas fa-user-circle text-info me-2"></i>Detail Siswa</h4>
                        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <div class="avatar-circle mx-auto mb-3">
                            @if($siswa->jenis_kelamin == 'L')
                                <i class="fas fa-user-tie fa-4x text-primary"></i>
                            @else
                                <i class="fas fa-user-alt fa-4x text-info"></i>
                            @endif
                        </div>
                        <h3>{{ $siswa->nama }}</h3>
                        <span class="badge bg-primary">NIS: {{ $siswa->nis }}</span>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th style="width: 30%;" class="bg-light">Jenis Kelamin</th>
                                            <td>
                                                @if($siswa->jenis_kelamin == 'L')
                                                    <span class="text-primary"><i class="fas fa-male me-1"></i> Laki-laki</span>
                                                @else
                                                    <span class="text-info"><i class="fas fa-female me-1"></i> Perempuan</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">Tanggal Lahir</th>
                                            <td>
                                                <i class="fas fa-birthday-cake me-1 text-danger"></i>
                                                {{ date('d F Y', strtotime($siswa->tanggal_lahir)) }}
                                                <span class="text-muted">({{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->age }} tahun)</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">Alamat</th>
                                            <td>
                                                <i class="fas fa-map-marker-alt me-1 text-success"></i>
                                                {{ $siswa->alamat }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">Nomor Telepon</th>
                                            <td>
                                                <i class="fas fa-phone me-1 text-primary"></i>
                                                {{ $siswa->no_telp }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">Terdaftar Sejak</th>
                                            <td>
                                                <i class="fas fa-clock me-1 text-secondary"></i>
                                                {{ date('d F Y H:i', strtotime($siswa->created_at)) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">Terakhir Diperbarui</th>
                                            <td>
                                                <i class="fas fa-sync-alt me-1 text-secondary"></i>
                                                {{ date('d F Y H:i', strtotime($siswa->updated_at)) }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning text-white">
                            <i class="fas fa-edit me-1"></i> Edit Data
                        </a>
                        <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-delete">
                                <i class="fas fa-trash-alt me-1"></i> Hapus Data
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Untuk tampilan Avatar -->
    @section('styles')
    <style>
        .avatar-circle {
            width: 120px;
            height: 120px;
            background-color: #f8f9fa;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 5px solid #e9ecef;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
    </style>
    @endsection
@endsection