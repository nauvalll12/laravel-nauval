@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card bg-primary text-white">
            <div class="card-body p-4">
                <h2 class="mb-4"><i class="fas fa-school me-2"></i> Sistem Informasi Siswa</h2>
                <p class="mb-1">Selamat datang di Sistem Informasi Siswa!</p>
                <p>Kelola data siswa dengan mudah dan efisien.</p>
                <a href="{{ route('siswa.index') }}" class="btn btn-light mt-3">
                    <i class="fas fa-users me-1"></i> Lihat Data Siswa
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body text-center">
                <div class="display-4 text-primary mb-3">
                    <i class="fas fa-users"></i>
                </div>
                <h5 class="card-title">Total Siswa</h5>
                <h2 class="mb-0">{{ \App\Models\Siswa::count() }}</h2>
                <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-outline-primary mt-3">Lihat Semua</a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body text-center">
                <div class="display-4 text-success mb-3">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h5 class="card-title">Tambah Siswa</h5>
                <p class="card-text">Daftarkan siswa baru ke sistem</p>
                <a href="{{ route('siswa.create') }}" class="btn btn-sm btn-success mt-3">Tambah Sekarang</a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body text-center">
                <div class="display-4 text-warning mb-3">
                    <i class="fas fa-search"></i>
                </div>
                <h5 class="card-title">Cari Siswa</h5>
                <form action="{{ route('siswa.index') }}" method="GET" class="mt-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Nama atau NIS...">
                        <button class="btn btn-warning" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="fas fa-chart-pie me-2 text-primary"></i> Statistik Siswa</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="card-title">Berdasarkan Jenis Kelamin</h6>
                                <div class="d-flex justify-content-around text-center mt-4">
                                    <div>
                                        <div class="display-6 text-primary mb-1">
                                            <i class="fas fa-male"></i> {{ \App\Models\Siswa::where('jenis_kelamin', 'L')->count() }}
                                        </div>
                                        <div>Laki-laki</div>
                                    </div>
                                    <div>
                                        <div class="display-6 text-info mb-1">
                                            <i class="fas fa-female"></i> {{ \App\Models\Siswa::where('jenis_kelamin', 'P')->count() }}
                                        </div>
                                        <div>Perempuan</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="card-title">Aktivitas Terbaru</h6>
                                <ul class="list-group list-group-flush">
                                    @foreach(\App\Models\Siswa::latest()->take(3)->get() as $s)
                                    <li class="list-group-item px-0">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <i class="fas fa-user-circle me-2 text-{{ $s->jenis_kelamin == 'L' ? 'primary' : 'info' }}"></i>
                                                <strong>{{ $s->nama }}</strong> ({{ $s->nis }})
                                            </div>
                                            <small class="text-muted">{{ $s->created_at->diffForHumans() }}</small>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection