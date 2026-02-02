

<?php $__env->startSection('title', 'Kepala Keluarga'); ?>
<?php $__env->startSection('page_title', 'Kepala Keluarga'); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
    <li class="breadcrumb-item active">Kepala Keluarga</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-4">
    <div class="col-12">
        <a href="<?php echo e(route('admin.head-of-families.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Kepala Keluarga
        </a>
        <a href="<?php echo e(route('admin.head-of-families.import-template')); ?>" class="btn btn-info">
            <i class="fas fa-download"></i> Download Template
        </a>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#importModal">
            <i class="fas fa-upload"></i> Import dari Excel
        </button>
    </div>
</div>

<?php if($message = Session::get('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e($message); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $headOfFamilies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hof): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><strong><?php echo e($hof->nama); ?></strong></td>
                    <td><?php echo e($hof->email); ?></td>
                    <td><?php echo e(Str::limit($hof->alamat, 50)); ?></td>
                    <td>
                        <?php if($hof->active): ?>
                            <span class="badge badge-success">Aktif</span>
                        <?php else: ?>
                            <span class="badge badge-secondary">Nonaktif</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route('admin.head-of-families.show', $hof)); ?>" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        <a href="<?php echo e(route('admin.head-of-families.edit', $hof)); ?>" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="<?php echo e(route('admin.head-of-families.destroy', $hof)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin?')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">
                        <i class="fas fa-inbox"></i> Tidak ada data kepala keluarga
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-light">
        <?php echo e($headOfFamilies->links()); ?>

    </div>
</div>

<!-- Import Modal -->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Import Data Kepala Keluarga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo e(route('admin.head-of-families.import')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">Pilih File Excel <span class="text-danger">*</span></label>
                        <input type="file" class="form-control <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                               id="file" name="file" accept=".xlsx,.xls,.csv" required>
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
                        <small class="form-text text-muted">Format: Excel (.xlsx, .xls) atau CSV</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-upload"></i> Import
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sirt02\resources\views/admin/head-of-families/index.blade.php ENDPATH**/ ?>