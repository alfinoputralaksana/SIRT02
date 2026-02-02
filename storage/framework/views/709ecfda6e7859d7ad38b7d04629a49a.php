

<?php $__env->startSection('title', 'Kelola Berita'); ?>
<?php $__env->startSection('page_title', 'Kelola Berita'); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
    <li class="breadcrumb-item active">Berita</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-4">
    <div class="col-12">
        <a href="<?php echo e(route('admin.news.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Berita
        </a>
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

<?php if($message = Session::get('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo e($message); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Berita</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Status</th>
                    <th>Tanggal Publikasi</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td>
                        <strong><?php echo e($item->title); ?></strong><br>
                        <small class="text-muted"><?php echo e(Str::limit($item->content, 50)); ?></small>
                    </td>
                    <td><?php echo e($item->user->name); ?></td>
                    <td>
                        <?php if($item->status === 'published'): ?>
                            <span class="badge badge-success">Dipublikasikan</span>
                        <?php elseif($item->status === 'draft'): ?>
                            <span class="badge badge-warning">Draft</span>
                        <?php else: ?>
                            <span class="badge badge-secondary">Diarsipkan</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($item->published_at): ?>
                            <?php echo e($item->published_at->format('d-m-Y H:i')); ?>

                        <?php else: ?>
                            <em class="text-muted">-</em>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($item->created_at->format('d-m-Y')); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.news.show', $item->id)); ?>" class="btn btn-sm btn-info" title="Lihat">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="<?php echo e(route('admin.news.edit', $item->id)); ?>" class="btn btn-sm btn-warning" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="<?php echo e(route('admin.news.destroy', $item->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        <i class="fas fa-inbox"></i> Tidak ada berita
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination -->
<?php if($news->total() > 0): ?>
<div class="row mt-4">
    <div class="col-12">
        <nav aria-label="Page navigation">
            <?php echo e($news->links()); ?>

        </nav>
    </div>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sirt02\resources\views/admin/news/index.blade.php ENDPATH**/ ?>