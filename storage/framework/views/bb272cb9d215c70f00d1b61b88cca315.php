<?php $__env->startSection('title', 'Permintaan Surat'); ?>
<?php $__env->startSection('page_title', 'Permintaan Surat'); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
    <li class="breadcrumb-item active">Permintaan Surat</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(auth()->check() && auth()->user()->isAdmin()): ?>
    <div class="row mb-4">
        <div class="col-12">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createLetterModal">
                <i class="fas fa-plus"></i> Buat Permintaan
            </button>
        </div>
    </div>
<?php else: ?>
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1>Permintaan Surat</h1>
                <p class="text-muted">Kelola permintaan surat warga</p>
            </div>
            <div class="col-md-4 text-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createLetterModal">
                    <i class="bi bi-plus-lg"></i> Buat Permintaan
                </button>
            </div>
        </div>
<?php endif; ?>

<?php if($message = Session::get('success')): ?>
    <?php if(auth()->check() && auth()->user()->isAdmin()): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e($message); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php else: ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle"></i> <?php echo e($message); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
<?php endif; ?>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>Nama Pemohon</th>
                    <th>Jenis Surat</th>
                    <th>Status</th>
                    <th>Dibuat</th>
                    <th>Siap Diambil</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $letters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><strong><?php echo e($letter->applicant_name); ?></strong></td>
                    <td><?php echo e($letter->category->name ?? '-'); ?></td>
                    <td>
                        <?php if(auth()->check() && auth()->user()->isAdmin()): ?>
                            <span class="badge badge-<?php echo e($letter->status === 'diambil' ? 'success' :
                                ($letter->status === 'siap_diambil' ? 'info' :
                                ($letter->status === 'diproses' ? 'warning' :
                                ($letter->status === 'ditolak' ? 'danger' : 'secondary')))); ?>">
                                <?php echo e(ucfirst(str_replace('_', ' ', $letter->status))); ?>

                            </span>
                        <?php else: ?>
                            <span class="badge bg-<?php echo e($letter->status === 'diambil' ? 'success' :
                                ($letter->status === 'siap_diambil' ? 'info' :
                                ($letter->status === 'diproses' ? 'warning' :
                                ($letter->status === 'ditolak' ? 'danger' : 'secondary')))); ?>">
                                <?php echo e(ucfirst(str_replace('_', ' ', $letter->status))); ?>

                            </span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($letter->created_at->format('d M Y')); ?></td>
                    <td><?php echo e($letter->ready_at ? $letter->ready_at->format('d M Y') : '-'); ?></td>
                    <td>
                        <?php if(auth()->check() && auth()->user()->isAdmin()): ?>
                            <a href="<?php echo e(route('admin.letters.show', $letter)); ?>" class="btn btn-xs btn-info btn-outline-info">
                                Lihat
                            </a>
                            <a href="<?php echo e(route('admin.letters.edit', $letter)); ?>" class="btn btn-xs btn-warning btn-outline-warning">
                                Edit
                            </a>
                        <?php else: ?>
                            <button type="button" class="btn btn-xs btn-info btn-outline-info" data-bs-toggle="modal" data-bs-target="#letterDetailModal<?php echo e($letter->id); ?>">
                                Lihat
                            </button>
                            <form action="<?php echo e(route('letters.destroy', $letter)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-xs btn-danger btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus permintaan surat ini?')">
                                    Hapus
                                </button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">
                        <?php if(auth()->check() && auth()->user()->isAdmin()): ?>
                            <i class="fas fa-inbox"></i>
                        <?php else: ?>
                            <i class="bi bi-inbox"></i>
                        <?php endif; ?>
                        Tidak ada permintaan surat
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-light">
        <?php echo e($letters->links((auth()->check() && auth()->user()->isAdmin()) ? 'pagination::default' : 'pagination::bootstrap-5')); ?>

    </div>
</div>

<?php if(!(auth()->check() && auth()->user()->isAdmin())): ?>
<!-- Modals untuk Detail Surat User -->
<?php $__currentLoopData = $letters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="letterDetailModal<?php echo e($letter->id); ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Permintaan Surat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Nama Pemohon</strong>
                        <p><?php echo e($letter->applicant_name ?? '-'); ?></p>
                    </div>
                    <div class="col-md-6">
                        <strong>NIK</strong>
                        <p><?php echo e($letter->applicant_nik ?? '-'); ?></p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Jenis Surat</strong>
                        <p><?php echo e($letter->category->name ?? '-'); ?></p>
                    </div>
                    <div class="col-md-6">
                        <strong>Tanggal Dibuat</strong>
                        <p><?php echo e($letter->created_at->format('d M Y H:i')); ?></p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Status</strong>
                        <p>
                            <span class="badge bg-<?php echo e($letter->status === 'diambil' ? 'success' :
                                ($letter->status === 'siap_diambil' ? 'info' :
                                ($letter->status === 'diproses' ? 'warning' :
                                ($letter->status === 'ditolak' ? 'danger' : 'secondary')))); ?>">
                                <?php echo e(ucfirst(str_replace('_', ' ', $letter->status))); ?>

                            </span>
                        </p>
                    </div>
                </div>

                <div class="mb-3">
                    <strong>Tujuan Penggunaan</strong>
                    <p><?php echo e($letter->purpose); ?></p>
                </div>

                <?php if($letter->notes): ?>
                <div class="mb-3">
                    <strong>Catatan</strong>
                    <p><?php echo e($letter->notes); ?></p>
                </div>
                <?php endif; ?>

                <?php if($letter->ready_at): ?>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Siap Diambil</strong>
                        <p><?php echo e($letter->ready_at->format('d M Y H:i')); ?></p>
                    </div>
                    <?php if($letter->taken_at): ?>
                    <div class="col-md-6">
                        <strong>Tanggal Diambil</strong>
                        <p><?php echo e($letter->taken_at->format('d M Y H:i')); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <?php if($letter->identity_image): ?>
                <div class="mb-3">
                    <strong>Foto KTP/KK</strong>
                    <div class="card border-light mt-2">
                        <div class="card-body p-2">
                            <img src="<?php echo e(asset('storage/' . $letter->identity_image)); ?>" alt="KTP/KK" class="img-fluid rounded" style="max-width: 100%; max-height: 400px; object-fit: contain;">
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if($letter->letter_file): ?>
                <div class="mb-3">
                    <strong>File Surat</strong>
                    <p>
                        <a href="<?php echo e(asset('storage/' . $letter->letter_file)); ?>" class="btn btn-sm btn-outline-primary" target="_blank">
                            <i class="bi bi-download"></i> Download PDF
                        </a>
                    </p>
                </div>
                <?php endif; ?>

                <?php if($letter->admin_notes): ?>
                <div class="alert alert-info mb-0">
                    <strong>Catatan Admin:</strong>
                    <p class="mb-0"><?php echo e($letter->admin_notes); ?></p>
                </div>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php echo $__env->make('letters.partials.create-modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make((auth()->check() && auth()->user()->isAdmin()) ? 'layouts.admin' : 'layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/SIRT02/resources/views/letters/index.blade.php ENDPATH**/ ?>