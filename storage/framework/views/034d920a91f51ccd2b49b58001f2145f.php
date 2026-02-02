<!-- Latest Reports -->
<div class="col-md-8">
    <div class="card">
        <div class="card-header border-transparent">
            <h3 class="card-title">Laporan Terbaru</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>Laporan</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = \App\Models\Report::latest()->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($report->title ?? 'Laporan'); ?></td>
                                <td><span class="badge badge-success">Diterima</span></td>
                                <td><?php echo e($report->created_at->format('d M Y')); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="3" class="text-center text-muted">Belum ada laporan</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>
<!-- /.col -->
<?php /**PATH C:\laragon\www\sirt02\resources\views/partials/admin/latest-reports.blade.php ENDPATH**/ ?>