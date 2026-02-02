

<?php $__env->startSection('title', 'Tambah Warga'); ?>
<?php $__env->startSection('page_title', 'Tambah Warga'); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('residents.index')); ?>">Data Warga</a></li>
    <li class="breadcrumb-item active">Tambah</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(auth()->user()->isAdmin()): ?>
    <div class="row mb-4">
        <div class="col-12">
            <a href="<?php echo e(route('admin.residents.index')); ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
<?php else: ?>
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-md-6">
                <h1>Tambah Warga</h1>
            </div>
            <div class="col-md-6 text-end">
                <a href="<?php echo e(route('residents.index')); ?>" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
<?php endif; ?>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(auth()->user()->isAdmin() ? route('admin.residents.store') : route('residents.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name" required value="<?php echo e(old('name')); ?>">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label">Jenis Kelamin</label>
                            <select class="form-select <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="gender" name="gender">
                                <option value="">- Pilih -</option>
                                <option value="laki-laki" <?php echo e(old('gender') === 'laki-laki' ? 'selected' : ''); ?>>Laki-laki</option>
                                <option value="perempuan" <?php echo e(old('gender') === 'perempuan' ? 'selected' : ''); ?>>Perempuan</option>
                            </select>
                            <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" required value="<?php echo e(old('email')); ?>">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <textarea class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="address" name="address" rows="3" required><?php echo e(old('address')); ?></textarea>
                            <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="status" name="status" required>
                                <option value="active" <?php echo e(old('status') === 'active' ? 'selected' : ''); ?>>Aktif</option>
                                <option value="inactive" <?php echo e(old('status') === 'inactive' ? 'selected' : ''); ?>>Tidak Aktif</option>
                                <option value="pindah" <?php echo e(old('status') === 'pindah' ? 'selected' : ''); ?>>Pindah</option>
                            </select>
                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label for="notes" class="form-label">Catatan</label>
                            <textarea class="form-control <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="notes" name="notes" rows="2"><?php echo e(old('notes')); ?></textarea>
                            <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="d-grid gap-2 d-sm-flex">
                            <button type="submit" class="btn btn-primary">
                                <?php if(auth()->user()->isAdmin()): ?>
                                    <i class="fas fa-save"></i>
                                <?php else: ?>
                                    <i class="bi bi-check-lg"></i>
                                <?php endif; ?>
                                Simpan
                            </button>
                            <a href="<?php echo e(route('residents.index')); ?>" class="btn btn-outline-secondary">
                                <?php if(auth()->user()->isAdmin()): ?>
                                    <i class="fas fa-times"></i>
                                <?php else: ?>
                                    <i class="bi bi-x-lg"></i>
                                <?php endif; ?>
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php if(!auth()->user()->isAdmin()): ?>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(auth()->user()->isAdmin() ? 'layouts.admin' : 'layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sirt02\resources\views/residents/create.blade.php ENDPATH**/ ?>