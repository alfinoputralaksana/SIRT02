<!-- Latest Letters -->
<div class="col-md-4">
    <div class="card">
        <div class="card-header border-transparent">
            <h3 class="card-title">Surat Terbaru</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <ul class="products-list product-list-in-card pl-2 pr-2">
                <?php $__empty_1 = true; $__currentLoopData = \App\Models\Letter::latest()->take(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li class="item">
                        <div class="product-info">
                            <a href="<?php echo e(route('admin.letters.show', $letter->id)); ?>" class="product-title">
                                <?php echo e($letter->category->name ?? 'Surat'); ?>

                                <span class="badge badge-success float-right"><?php echo e($letter->created_at->format('d M Y')); ?></span>
                            </a>
                            <span class="product-description">
                                Pemohon: <?php echo e($letter->applicant_name ?? 'N/A'); ?>

                            </span>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <li class="item text-center text-muted py-3">Belum ada surat</li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- /.card-body -->
    </div>
</div>
<!-- /.col -->
<?php /**PATH /Applications/MAMP/htdocs/SIRT02/resources/views/partials/admin/latest-letters.blade.php ENDPATH**/ ?>