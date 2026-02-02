

<?php $__env->startSection('title', 'Kelola Kategori Surat - Admin'); ?>
<?php $__env->startSection('page_title', 'Kelola Kategori Surat'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Daftar Kategori Surat</h3>
                    <div class="card-tools">
                        <a href="<?php echo e(route('admin.letter-categories.create')); ?>" class="btn btn-sm btn-success">
                            <i class="fas fa-plus"></i> Tambah Kategori
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> <?php echo e($message); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <?php if($message = Session::get('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Gagal!</strong> <?php echo e($message); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Jumlah Surat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e(($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration); ?></td>
                                        <td><strong><?php echo e($category->name); ?></strong></td>
                                        <td><?php echo e(Str::limit($category->description, 50)); ?></td>
                                        <td><span class="badge badge-info"><?php echo e($category->letters_count); ?></span></td>
                                        <td>
                                            <a href="<?php echo e(route('admin.letter-categories.edit', $category->id)); ?>" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="<?php echo e(route('admin.letter-categories.destroy', $category->id)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('Anda yakin ingin menghapus kategori ini?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Belum ada kategori surat</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        <?php echo e($categories->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sirt02\resources\views/admin/letter-categories/index.blade.php ENDPATH**/ ?>