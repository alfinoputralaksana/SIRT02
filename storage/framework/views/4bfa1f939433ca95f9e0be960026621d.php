

<?php $__env->startSection('content'); ?>
<?php if(auth()->user()->isAdmin()): ?>
    <!-- Admin View -->
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1><?php echo e($report->title); ?></h1>
                <p class="text-muted">Detail Laporan</p>
            </div>
            <div class="col-md-4 text-end">
                <a href="<?php echo e(route('admin.reports.edit', $report)); ?>" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Edit Status
                </a>
                <a href="<?php echo e(route('admin.reports.index')); ?>" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Informasi Laporan</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong>Kepala Keluarga</strong>
                                <p>
                                    <a href="<?php echo e(route('admin.head-of-families.show', $report->headOfFamily)); ?>">
                                        <?php echo e($report->headOfFamily->name); ?>

                                    </a>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <strong>Kategori</strong>
                                <p><?php echo e(ucfirst(str_replace('_', ' ', $report->category))); ?></p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong>Status</strong>
                                <p>
                                    <span class="badge bg-<?php echo e($report->status === 'selesai' ? 'success' : 
                                        ($report->status === 'diproses' ? 'warning' : 
                                        ($report->status === 'ditolak' ? 'danger' : 'secondary'))); ?>">
                                        <?php echo e(ucfirst($report->status)); ?>

                                    </span>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <strong>Tanggal Dibuat</strong>
                                <p><?php echo e($report->created_at->format('d M Y H:i')); ?></p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <strong>Deskripsi</strong>
                            <p><?php echo e($report->description); ?></p>
                        </div>

                        <?php if($report->evidence_images && count($report->evidence_images) > 0): ?>
                        <div class="mb-3">
                            <strong>Foto Bukti (<?php echo e(count($report->evidence_images)); ?>)</strong>
                            <div class="mt-3">
                                <div class="row g-3">
                                    <?php $__currentLoopData = $report->evidence_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12 col-sm-6">
                                        <div style="overflow: hidden; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
                                            <img src="<?php echo e(asset('storage/' . $image)); ?>" alt="Bukti" style="width: 100%; height: 250px; object-fit: cover; cursor: pointer; display: block;" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="setModalImage(this.src)">
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <?php elseif($report->evidence_image): ?>
                        <div class="mb-3">
                            <strong>Foto Bukti</strong>
                            <div class="mt-2">
                                <img src="<?php echo e(asset('storage/' . $report->evidence_image)); ?>" alt="Bukti" style="max-width: 100%; height: auto; border-radius: 8px;">
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if($report->admin_response): ?>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Respons Admin</h5>
                    </div>
                    <div class="card-body">
                        <p><?php echo e($report->admin_response); ?></p>
                        
                        <?php if($report->admin_file): ?>
                        <div class="mt-3">
                            <strong>File/Dokumen Terlampir</strong>
                            <div class="mt-2">
                                <?php if(in_array(pathinfo($report->admin_file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif'])): ?>
                                    <img src="<?php echo e(asset('storage/' . $report->admin_file)); ?>" alt="File Admin" style="max-width: 100%; height: auto; border-radius: 8px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="setModalImage(this.src)">
                                <?php else: ?>
                                    <a href="<?php echo e(asset('storage/' . $report->admin_file)); ?>" class="btn btn-sm btn-primary" download>
                                        <i class="bi bi-download"></i> Download File
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <small class="text-muted d-block mt-3">
                            Direspons: <?php echo e($report->responded_at->format('d M Y H:i')); ?>

                        </small>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Informasi Kepala Keluarga</h5>
                    </div>
                    <div class="card-body">
                        <p>
                            <strong>Nama</strong><br>
                            <?php echo e($report->headOfFamily->name); ?>

                        </p>
                        <p>
                            <strong>Email</strong><br>
                            <?php echo e($report->headOfFamily->email); ?>

                        </p>
                        <p>
                            <strong>Telepon</strong><br>
                            <?php echo e($report->headOfFamily->phone ?? '-'); ?>

                        </p>
                        <a href="<?php echo e(route('admin.head-of-families.show', $report->headOfFamily)); ?>" class="btn btn-sm btn-outline-primary">
                            Lihat Profil
                        </a>
                    </div>
                </div>
                
                <div class="card mt-3">
                    <div class="card-header">
                        <h5 class="mb-0">Aksi</h5>
                    </div>
                    <div class="card-body">
                        <a href="<?php echo e(route('admin.reports.edit', $report)); ?>" class="btn btn-warning btn-sm w-100 mb-2">
                            <i class="bi bi-pencil"></i> Edit Status
                        </a>
                        <form action="<?php echo e(route('admin.reports.destroy', $report)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm w-100" onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <!-- User View - Modal Style -->
    <div class="modal fade" id="reportDetailModal" tabindex="-1" aria-labelledby="reportDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportDetailModalLabel"><?php echo e($report->title); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Kategori</strong>
                            <p><?php echo e(ucfirst(str_replace('_', ' ', $report->category))); ?></p>
                        </div>
                        <div class="col-md-6">
                            <strong>Status</strong>
                            <p>
                                <span class="badge bg-<?php echo e($report->status === 'selesai' ? 'success' : 
                                    ($report->status === 'diproses' ? 'warning' : 
                                    ($report->status === 'ditolak' ? 'danger' : 'secondary'))); ?>">
                                    <?php echo e(ucfirst($report->status)); ?>

                                </span>
                            </p>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-12">
                            <strong>Tanggal Dibuat</strong>
                            <p><?php echo e($report->created_at->format('d M Y H:i')); ?></p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <strong>Deskripsi</strong>
                        <p><?php echo e($report->description); ?></p>
                    </div>

                    <?php if($report->evidence_images && count($report->evidence_images) > 0): ?>
                    <div class="mb-3">
                        <strong>Foto Bukti (<?php echo e(count($report->evidence_images)); ?>)</strong>
                        <div class="mt-3">
                            <div class="row g-3">
                                <?php $__currentLoopData = $report->evidence_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-12 col-sm-6">
                                    <div style="overflow: hidden; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
                                        <img src="<?php echo e(asset('storage/' . $image)); ?>" alt="Bukti" style="width: 100%; height: 250px; object-fit: cover; cursor: pointer; display: block;" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="setModalImage(this.src)">
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <?php elseif($report->evidence_image): ?>
                    <div class="mb-3">
                        <strong>Foto Bukti</strong>
                        <div class="mt-2">
                            <img src="<?php echo e(asset('storage/' . $report->evidence_image)); ?>" alt="Bukti" style="max-width: 100%; height: auto; border-radius: 8px;">
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if($report->admin_response): ?>
                    <hr>
                    <div class="mb-3">
                        <strong>Respons Admin</strong>
                        <p><?php echo e($report->admin_response); ?></p>
                        
                        <?php if($report->admin_file): ?>
                        <div class="mt-3">
                            <strong>File/Dokumen Terlampir</strong>
                            <div class="mt-2">
                                <?php if(in_array(pathinfo($report->admin_file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif'])): ?>
                                    <img src="<?php echo e(asset('storage/' . $report->admin_file)); ?>" alt="File Admin" style="max-width: 100%; height: auto; border-radius: 8px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="setModalImage(this.src)">
                                <?php else: ?>
                                    <a href="<?php echo e(asset('storage/' . $report->admin_file)); ?>" class="btn btn-sm btn-primary" download>
                                        <i class="bi bi-download"></i> Download File
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <small class="text-muted d-block mt-3">
                            Direspons: <?php echo e($report->responded_at->format('d M Y H:i')); ?>

                        </small>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = new bootstrap.Modal(document.getElementById('reportDetailModal'));
            modal.show();
            
            document.getElementById('reportDetailModal').addEventListener('hidden.bs.modal', function() {
                window.location.href = '<?php echo e(route("reports.index")); ?>';
            });
        });
    </script>

    <!-- Image Modal for Zoom -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Foto Bukti</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" src="" alt="Bukti" style="width: 100%; height: auto;">
                </div>
            </div>
        </div>
    </div>

    <script>
        function setModalImage(src) {
            document.getElementById('modalImage').src = src;
        }
    </script>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make(auth()->user()->isAdmin() ? 'layouts.admin' : 'layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sirt02\resources\views/reports/show.blade.php ENDPATH**/ ?>