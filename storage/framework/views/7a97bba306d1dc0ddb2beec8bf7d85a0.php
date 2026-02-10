<?php $__env->startSection('title', 'Data Warga'); ?>
<?php $__env->startSection('page_title', 'Data Warga'); ?> 

<?php $__env->startSection('breadcrumb'); ?> 
    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
    <li class="breadcrumb-item active">Data Warga</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(auth()->user()->isAdmin()): ?>
    <div class="row mb-4">
        <div class="col-12">
            <a href="<?php echo e(route('admin.residents.create')); ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Warga
            </a>
            <a href="<?php echo e(route('admin.residents.import-show')); ?>" class="btn btn-info">
                <i class="fas fa-upload"></i> Impor Data
            </a>
            <a href="<?php echo e(route('admin.residents.download-template')); ?>" class="btn btn-success">
                <i class="fas fa-download"></i> Download Template
            </a>
        </div>
    </div>
<?php else: ?>
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1>Data Warga</h1>
                <p class="text-muted">Kelola data warga RT</p>
            </div>
            <div class="col-md-4 text-end">
                <a href="<?php echo e(route('residents.create')); ?>" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Tambah Warga
                </a>
            </div>
        </div>
<?php endif; ?>

<?php if($message = Session::get('success')): ?>
    <?php if(auth()->user()->isAdmin()): ?>
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
    <div class="card-header">
        <form method="GET" action="<?php echo e(auth()->user()->isAdmin() ? route('admin.residents.search') : route('residents.search')); ?>" class="d-flex gap-2">
            <input type="text" name="q" class="form-control" placeholder="Cari nama atau email..." value="<?php echo e(request('q')); ?>">
            <button type="submit" class="btn btn-outline-primary">
                <?php if(auth()->user()->isAdmin()): ?>
                    <i class="fas fa-search"></i>
                <?php else: ?>
                    <i class="bi bi-search"></i>
                <?php endif; ?>
                Cari
            </button>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $residents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resident): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><strong><?php echo e($resident->name); ?></strong></td>
                    <td><?php echo e($resident->gender ? ucfirst($resident->gender) : '-'); ?></td>
                    <td><?php echo e($resident->email); ?></td>
                    <td>
                        <?php if(auth()->user()->isAdmin()): ?>
                            <span class="badge badge-<?php echo e($resident->status === 'active' ? 'success' : 'warning'); ?>">
                                <?php echo e(ucfirst($resident->status)); ?>

                            </span>
                        <?php else: ?>
                            <span class="badge bg-<?php echo e($resident->status === 'active' ? 'success' : 'warning'); ?>">
                                <?php echo e(ucfirst($resident->status)); ?>

                            </span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route(auth()->user()->isAdmin() ? 'admin.residents.show' : 'residents.show', $resident)); ?>" class="btn btn-sm btn-info">
                            <?php if(auth()->user()->isAdmin()): ?>
                                <i class="fas fa-eye"></i>
                            <?php else: ?>
                                <i class="bi bi-eye"></i>
                            <?php endif; ?>
                            Lihat
                        </a>
                        <a href="<?php echo e(route(auth()->user()->isAdmin() ? 'admin.residents.edit' : 'residents.edit', $resident)); ?>" class="btn btn-sm btn-warning">
                            <?php if(auth()->user()->isAdmin()): ?>
                                <i class="fas fa-edit"></i>
                            <?php else: ?>
                                <i class="bi bi-pencil"></i>
                            <?php endif; ?>
                            Edit
                        </a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4" class="text-center text-muted py-4">
                        <?php if(auth()->user()->isAdmin()): ?>
                            <i class="fas fa-inbox"></i>
                        <?php else: ?>
                            <i class="bi bi-inbox"></i>
                        <?php endif; ?>
                        Tidak ada data warga
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-light">
        <?php echo e($residents->links(auth()->user()->isAdmin() ? 'pagination::default' : 'pagination::bootstrap-5')); ?>

    </div>
</div>

<?php if(!auth()->user()->isAdmin()): ?>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(auth()->user()->isAdmin() ? 'layouts.admin' : 'layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/SIRT02/resources/views/residents/index.blade.php ENDPATH**/ ?>