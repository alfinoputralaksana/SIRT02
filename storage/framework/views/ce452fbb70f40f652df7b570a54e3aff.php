<?php $__env->startSection('title', 'Konfigurasi Gemini API'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">
                        <i class="fas fa-cog"></i> Konfigurasi Gemini API
                    </h3>
                    <a href="<?php echo e(route('admin.gemini-configs.create')); ?>" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah Konfigurasi
                    </a>
                </div>
                <div class="card-body">
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

                    <?php if($configs->isEmpty()): ?>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> Belum ada konfigurasi Gemini API. 
                            <a href="<?php echo e(route('admin.gemini-configs.create')); ?>">Buat yang baru</a>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Model</th>
                                        <th>Status</th>
                                        <th>Temperature</th>
                                        <th>Max Tokens</th>
                                        <th>Dibuat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $configs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $config): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <strong><?php echo e($config->name); ?></strong>
                                                <?php if($config->is_active): ?>
                                                    <span class="badge badge-success ml-2">AKTIF</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <code><?php echo e($config->model); ?></code>
                                            </td>
                                            <td>
                                                <?php if($config->is_active): ?>
                                                    <span class="badge badge-success">
                                                        <i class="fas fa-check-circle"></i> Aktif
                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge badge-secondary">
                                                        <i class="fas fa-times-circle"></i> Tidak Aktif
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($config->temperature); ?></td>
                                            <td><?php echo e($config->max_output_tokens); ?></td>
                                            <td>
                                                <small class="text-muted"><?php echo e($config->created_at->format('d M Y')); ?></small>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <a href="<?php echo e(route('admin.gemini-configs.show', $config)); ?>" 
                                                       class="btn btn-info" title="Lihat">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="<?php echo e(route('admin.gemini-configs.edit', $config)); ?>" 
                                                       class="btn btn-warning" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <?php if(!$config->is_active): ?>
                                                        <form action="<?php echo e(route('admin.gemini-configs.set-active', $config)); ?>" 
                                                              method="POST" style="display: inline;">
                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit" class="btn btn-success" title="Aktifkan">
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                        </form>
                                                        <form action="<?php echo e(route('admin.gemini-configs.destroy', $config)); ?>" 
                                                              method="POST" style="display: inline;" 
                                                              onsubmit="return confirm('Yakin ingin menghapus?')">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button type="submit" class="btn btn-danger" title="Hapus">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            <?php echo e($configs->links()); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/SIRT02/resources/views/admin/gemini-configs/index.blade.php ENDPATH**/ ?>