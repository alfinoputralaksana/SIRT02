@extends(auth()->user()->isAdmin() ? 'layouts.admin' : 'layouts.app')

@section('title', 'Edit Data Warga')
@section('page_title', 'Edit Data Warga')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.residents.index') }}">Data Warga</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
@if(auth()->user()->isAdmin())
    <div class="row mb-4">
        <div class="col-12">
            <a href="{{ route('admin.residents.show', $resident) }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
@else
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-md-6">
                <h1>Edit Data Warga</h1>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('residents.show', $resident) }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
@endif

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ auth()->user()->isAdmin() ? route('admin.residents.update', $resident) : route('residents.update', $resident) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required value="{{ old('name', $resident->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" placeholder="16 digit" required value="{{ old('nik', $resident->nik) }}">
                                    @error('nik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email', $resident->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">No. Telepon</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $resident->phone) }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="family_members" class="form-label">Jumlah Anggota Keluarga</label>
                                    <input type="number" class="form-control @error('family_members') is-invalid @enderror" id="family_members" name="family_members" min="1" required value="{{ old('family_members', $resident->family_members) }}">
                                    @error('family_members')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3" required>{{ old('address', $resident->address) }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="family_head" class="form-label">Kepala Keluarga</label>
                                    <input type="text" class="form-control @error('family_head') is-invalid @enderror" id="family_head" name="family_head" value="{{ old('family_head', $resident->family_head) }}">
                                    @error('family_head')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                        <option value="active" {{ old('status', $resident->status) === 'active' ? 'selected' : '' }}>Aktif</option>
                                        <option value="inactive" {{ old('status', $resident->status) === 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                                        <option value="pindah" {{ old('status', $resident->status) === 'pindah' ? 'selected' : '' }}>Pindah</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="notes" class="form-label">Catatan</label>
                            <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="2">{{ old('notes', $resident->notes) }}</textarea>
                            @error('notes')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-sm-flex">
                            <button type="submit" class="btn btn-primary">
                                @if(auth()->user()->isAdmin())
                                    <i class="fas fa-save"></i>
                                @else
                                    <i class="bi bi-check-lg"></i>
                                @endif
                                Simpan Perubahan
                            </button>
                            <a href="{{ route('residents.show', $resident) }}" class="btn btn-outline-secondary">
                                @if(auth()->user()->isAdmin())
                                    <i class="fas fa-times"></i>
                                @else
                                    <i class="bi bi-x-lg"></i>
                                @endif
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@if(!auth()->user()->isAdmin())
    </div>
@endif
@endsection
