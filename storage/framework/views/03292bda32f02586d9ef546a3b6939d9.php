

<?php $__env->startSection('title', 'Impor Data Warga'); ?>
<?php $__env->startSection('page_title', 'Impor Data Warga'); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.residents.index')); ?>">Data Warga</a></li>
    <li class="breadcrumb-item active">Impor</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-4">
    <div class="col-12">
        <a href="<?php echo e(route('admin.residents.index')); ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<?php if($message = Session::get('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle"></i> <?php echo e($message); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Impor Data Warga dari Excel</h5>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.residents.import')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="mb-3">
                        <label for="file" class="form-label">Pilih File Excel</label>
                        <input type="file" class="form-control <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="file" name="file" accept=".xlsx,.xls,.csv" required>
                        <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <small class="form-text text-muted">Format yang didukung: .xlsx, .xls, .csv</small>
                    </div>

                    <div class="alert alert-info" role="alert">
                        <h6 class="alert-heading">
                            <i class="fas fa-info-circle"></i> Informasi Impor
                        </h6>
                        <ul class="mb-0">
                            <li>File harus memiliki header kolom yang sesuai</li>
                            <li>Kolom yang diperlukan: Nama, Email, Alamat</li>
                            <li>Kolom opsional: Jenis Kelamin, Status, Catatan</li>
                            <li>Email harus unik (belum ada di database)</li>
                            <li>Status default adalah "active" jika tidak ditentukan</li>
                        </ul>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-upload"></i> Impor Data
                        </button>
                        <a href="<?php echo e(route('admin.residents.download-template')); ?>" class="btn btn-success">
                            <i class="fas fa-download"></i> Download Template
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Format Kolom Excel</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Kolom</th>
                                <th>Deskripsi</th>
                                <th>Tipe Data</th>
                                <th>Wajib</th>
                                <th>Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Nama Lengkap</strong></td>
                                <td>Nama lengkap warga</td>
                                <td>Teks</td>
                                <td><span class="badge badge-danger">Ya</span></td>
                                <td>Maksimal 255 karakter</td>
                            </tr>
                            <tr>
                                <td><strong>Jenis Kelamin</strong></td>
                                <td>Jenis kelamin warga</td>
                                <td>Pilihan</td>
                                <td><span class="badge badge-warning">Tidak</span></td>
                                <td>Nilai: Laki-laki, Perempuan</td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td>Email warga</td>
                                <td>Email</td>
                                <td><span class="badge badge-danger">Ya</span></td>
                                <td>Harus unik dan format email valid</td>
                            </tr>
                            <tr>
                                <td><strong>Alamat</strong></td>
                                <td>Alamat tinggal warga</td>
                                <td>Teks</td>
                                <td><span class="badge badge-danger">Ya</span></td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td><strong>Status</strong></td>
                                <td>Status warga</td>
                                <td>Pilihan</td>
                                <td><span class="badge badge-warning">Tidak</span></td>
                                <td>Nilai: active, inactive, pindah. Default: active</td>
                            </tr>
                            <tr>
                                <td><strong>Catatan</strong></td>
                                <td>Catatan tambahan</td>
                                <td>Teks</td>
                                <td><span class="badge badge-warning">Tidak</span></td>
                                <td>Opsional</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Panduan Impor</h5>
            </div>
            <div class="card-body">
                <h6>Langkah-langkah:</h6>
                <ol>
                    <li>Download template Excel dengan tombol "Download Template"</li>
                    <li>Isi data warga sesuai format yang ada</li>
                    <li>Pastikan email belum ada di database</li>
                    <li>Simpan file sebagai Excel (.xlsx atau .xls)</li>
                    <li>Pilih file dan klik "Impor Data"</li>
                    <li>Tunggu proses impor selesai</li>
                </ol>
                <hr>
                <p class="text-muted small"><strong>Catatan:</strong> Jika ada error, data tidak akan tersimpan. Periksa format kolom dan pastikan semua data wajib terisi.</p>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sirt02\resources\views/residents/import.blade.php ENDPATH**/ ?>