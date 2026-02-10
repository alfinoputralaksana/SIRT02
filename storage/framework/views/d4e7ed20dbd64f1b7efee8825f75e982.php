<?php $__env->startSection('title', 'Kelola Permintaan Surat'); ?>
<?php $__env->startSection('page_title', 'Kelola Permintaan Surat'); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
    <li class="breadcrumb-item active">Permintaan Surat</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<?php if($message = Session::get('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle"></i> <?php echo e($message); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if($message = Session::get('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle"></i> <?php echo e($message); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-header bg-primary">
        <h3 class="card-title">Daftar Permintaan Surat</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped mb-0">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Pemohon</th>
                    <th>NIK</th>
                    <th>Jenis Surat</th>
                    <th>Tujuan</th>
                    <th>Status</th>
                    <th>Tanggal Buat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $letters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e(($letters->currentPage() - 1) * $letters->perPage() + $loop->iteration); ?></td>
                    <td><strong><?php echo e($letter->applicant_name); ?></strong></td>
                    <td><?php echo e($letter->applicant_nik); ?></td>
                    <td><?php echo e($letter->category->name ?? '-'); ?></td>
                    <td><?php echo e(Str::limit($letter->purpose, 40)); ?></td>
                    <td>
                        <?php switch($letter->status):
                            case ('menunggu'): ?>
                                <span class="badge badge-warning">Menunggu</span>
                                <?php break; ?>
                            <?php case ('diproses'): ?>
                                <span class="badge badge-info">Diproses</span>
                                <?php break; ?>
                            <?php case ('siap_diambil'): ?>
                                <span class="badge badge-success">Siap Diambil</span>
                                <?php break; ?>
                            <?php case ('diambil'): ?>
                                <span class="badge badge-primary">Diambil</span>
                                <?php break; ?>
                            <?php case ('ditolak'): ?>
                                <span class="badge badge-danger">Ditolak</span>
                                <?php break; ?>
                        <?php endswitch; ?>
                    </td>
                    <td><?php echo e($letter->created_at->format('d-m-Y')); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.letters.show', $letter->id)); ?>" class="btn btn-sm btn-info" title="Lihat">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="<?php echo e(route('admin.letters.edit', $letter->id)); ?>" class="btn btn-sm btn-warning" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="<?php echo e(route('admin.letters.destroy', $letter->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus permintaan surat ini?')" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="8" class="text-center text-muted py-4">
                        <i class="fas fa-inbox"></i> Tidak ada permintaan surat
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if($letters->count() > 0): ?>
        <div class="card-footer">
            <div class="d-flex justify-content-center">
                <?php echo e($letters->links()); ?>

            </div>
        </div>
    <?php endif; ?>
</div>

<?php echo $__env->make('admin.letters.partials.create-modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/SIRT02/resources/views/admin/letters/index.blade.php ENDPATH**/ ?>