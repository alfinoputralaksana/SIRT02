@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">Dashboard Warga</h1>
            @if (session('head_of_family_id'))
                <p class="text-muted">Selamat datang, {{ session('head_of_family_name') }}!</p>
            @else
                <p class="text-muted">Selamat datang, {{ auth()->user()->name }}!</p>
            @endif
        </div>
    </div>

    <!-- Stats Row -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-primary text-uppercase mb-1" style="font-weight: 800; font-size: .8rem">Data Warga</div>
                    <div class="h3 mb-0">{{ \App\Models\Resident::count() }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-success text-uppercase mb-1" style="font-weight: 800; font-size: .8rem">Laporan Saya</div>
                    <div class="h3 mb-0">
                        @if (session('head_of_family_id'))
                            0
                        @elseif (auth()->user())
                            {{ auth()->user()->reports()->count() ?? 0 }}
                        @else
                            0
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-warning text-uppercase mb-1" style="font-weight: 800; font-size: .8rem">Surat Saya</div>
                    <div class="h3 mb-0">
                        @if (session('head_of_family_id'))
                            0
                        @elseif (auth()->user())
                            {{ auth()->user()->letters()->count() ?? 0 }}
                        @else
                            0
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-info text-uppercase mb-1" style="font-weight: 800; font-size: .8rem">Anggaran Percakapan</div>
                    <div class="h3 mb-0">Aktif</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions Row -->
    <div class="row mb-4">
        <div class="col-md-12">
            <h5 class="mb-3">Menu Cepat</h5>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('residents.index') }}" class="card text-decoration-none text-dark h-100 shadow-sm hover-shadow">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-3x text-primary mb-3"></i>
                    <h6 class="card-title">Data Warga</h6>
                    <small class="text-muted">Lihat & kelola data warga</small>
                </div>
            </a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('reports.index') }}" class="card text-decoration-none text-dark h-100 shadow-sm hover-shadow">
                <div class="card-body text-center">
                    <i class="fas fa-file-alt fa-3x text-success mb-3"></i>
                    <h6 class="card-title">Laporan</h6>
                    <small class="text-muted">Buat & lihat laporan</small>
                </div>
            </a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('letters.index') }}" class="card text-decoration-none text-dark h-100 shadow-sm hover-shadow">
                <div class="card-body text-center">
                    <i class="fas fa-envelope fa-3x text-warning mb-3"></i>
                    <h6 class="card-title">Surat</h6>
                    <small class="text-muted">Buat permintaan surat</small>
                </div>
            </a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('chatbot.index') }}" class="card text-decoration-none text-dark h-100 shadow-sm hover-shadow">
                <div class="card-body text-center">
                    <i class="fas fa-robot fa-3x text-info mb-3"></i>
                    <h6 class="card-title">Chatbot</h6>
                    <small class="text-muted">Tanya jawab dengan AI</small>
                </div>
            </a>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-white border-bottom">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Terbaru</h6>
                </div>
                <div class="card-body">
                    @if (session('head_of_family_id'))
                        <p class="text-muted text-center py-3">Belum ada laporan</p>
                    @elseif (auth()->user())
                        @forelse(auth()->user()->reports()->latest()->take(5)->get() as $report)
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                <div>
                                    <strong>{{ $report->title ?? 'Laporan Tanpa Judul' }}</strong>
                                    <br>
                                    <small class="text-muted">{{ $report->created_at->diffForHumans() }}</small>
                                </div>
                                <div>
                                    <span class="badge badge-success">Diterima</span>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted text-center py-3">Belum ada laporan</p>
                        @endforelse
                    @else
                        <p class="text-muted text-center py-3">Belum ada laporan</p>
                    @endif
                </div>
                <div class="card-footer">
                    <a href="{{ route('reports.index') }}" class="btn btn-sm btn-primary">Lihat Semua Laporan</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header bg-white border-bottom">
                    <h6 class="m-0 font-weight-bold text-primary">Surat Terbaru</h6>
                </div>
                <div class="card-body">
                    @if (session('head_of_family_id'))
                        <p class="text-muted text-center py-3">Belum ada surat</p>
                    @elseif (auth()->user())
                        @forelse(auth()->user()->letters()->latest()->take(3)->get() as $letter)
                            <div class="py-2 border-bottom">
                                <strong class="d-block">{{ $letter->letter_type ?? 'Surat' }}</strong>
                                <small class="text-muted">{{ $letter->created_at->format('d M Y') }}</small>
                            </div>
                        @empty
                            <p class="text-muted text-center py-3">Belum ada surat</p>
                        @endforelse
                    @else
                        <p class="text-muted text-center py-3">Belum ada surat</p>
                    @endif
                </div>
                <div class="card-footer">
                    <a href="{{ route('letters.index') }}" class="btn btn-sm btn-primary">Lihat Semua Surat</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .border-left-primary {
        border-left: 0.25rem solid #4e73df !important;
    }
    .border-left-success {
        border-left: 0.25rem solid #1cc88a !important;
    }
    .border-left-warning {
        border-left: 0.25rem solid #f6c23e !important;
    }
    .border-left-info {
        border-left: 0.25rem solid #36b9cc !important;
    }
    .text-primary {
        color: #4e73df !important;
    }
    .text-success {
        color: #1cc88a !important;
    }
    .text-warning {
        color: #f6c23e !important;
    }
    .text-info {
        color: #36b9cc !important;
    }
    .hover-shadow:hover {
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15) !important;
    }
</style>
@endsection
