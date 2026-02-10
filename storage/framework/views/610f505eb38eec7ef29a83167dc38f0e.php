<?php $__env->startSection('title', 'Tambah Konfigurasi Gemini API'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-plus"></i> Tambah Konfigurasi Gemini API
                    </h3>
                </div>

                <form action="<?php echo e(route('admin.gemini-configs.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="card-body">
                        <!-- Name -->
                        <div class="form-group">
                            <label for="name">Nama Konfigurasi <span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   id="name" name="name" value="<?php echo e(old('name')); ?>" 
                                   placeholder="Contoh: Production, Development" required>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- API Key -->
                        <div class="form-group">
                            <label for="api_key">API Key <span class="text-danger">*</span></label>
                            <textarea class="form-control <?php $__errorArgs = ['api_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                      id="api_key" name="api_key" rows="3" 
                                      placeholder="Masukkan API key dari Google Cloud Console" required><?php echo e(old('api_key')); ?></textarea>
                            <?php $__errorArgs = ['api_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <small class="form-text text-muted">
                                Dapatkan API key dari <a href="https://aistudio.google.com/apikey" target="_blank">Google AI Studio</a>
                            </small>
                        </div>

                        <!-- Model -->
                        <div class="form-group">
                            <label for="model">Model <span class="text-danger">*</span></label>
                            <select class="form-control <?php $__errorArgs = ['model'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="model" name="model" required>
                                <option value="">-- Pilih Model --</option>
                                <option value="gemini-2.5-flash" <?php echo e(old('model') == 'gemini-2.5-flash' ? 'selected' : ''); ?>>Gemini 2.5 Flash (Latest)</option>
                                <option value="gemini-2.0-flash" <?php echo e(old('model') == 'gemini-2.0-flash' ? 'selected' : ''); ?>>Gemini 2.0 Flash (Recommended)</option>
                                <option value="gemini-1.5-pro" <?php echo e(old('model') == 'gemini-1.5-pro' ? 'selected' : ''); ?>>Gemini 1.5 Pro</option>
                                <option value="gemini-1.5-flash" <?php echo e(old('model') == 'gemini-1.5-flash' ? 'selected' : ''); ?>>Gemini 1.5 Flash</option>
                            </select>
                            <?php $__errorArgs = ['model'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="row">
                            <!-- Temperature -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="temperature">Temperature <span class="text-danger">*</span></label>
                                    <input type="number" step="0.1" min="0" max="2" 
                                           class="form-control <?php $__errorArgs = ['temperature'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="temperature" name="temperature" value="<?php echo e(old('temperature', 0.7)); ?>" required>
                                    <?php $__errorArgs = ['temperature'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <small class="form-text text-muted">0 = Deterministic, 1 = Balanced, 2 = Creative</small>
                                </div>
                            </div>

                            <!-- Max Output Tokens -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="max_output_tokens">Max Output Tokens <span class="text-danger">*</span></label>
                                    <input type="number" min="1" max="4096" 
                                           class="form-control <?php $__errorArgs = ['max_output_tokens'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="max_output_tokens" name="max_output_tokens" value="<?php echo e(old('max_output_tokens', 1024)); ?>" required>
                                    <?php $__errorArgs = ['max_output_tokens'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <!-- System Prompt -->
                        <div class="form-group">
                            <label for="system_prompt">System Prompt <span class="text-danger">*</span></label>
                            <textarea class="form-control <?php $__errorArgs = ['system_prompt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                      id="system_prompt" name="system_prompt" rows="5" required><?php echo e(old('system_prompt', 'Anda adalah chatbot asisten administrasi RT (Rukun Tetangga) yang helpful dan ramah.

Tugas Anda:
1. Membantu warga dalam pertanyaan tentang administrasi RT
2. Memberikan informasi persyaratan surat
3. Menjelaskan prosedur dan jadwal pelayanan RT
4. Menjawab pertanyaan seputar laporan dan permasalahan di RT

Berikan jawaban yang jelas, ringkas, dan helpful dalam Bahasa Indonesia.')); ?></textarea>
                            <?php $__errorArgs = ['system_prompt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                      id="description" name="description" rows="3" 
                                      placeholder="Deskripsi konfigurasi ini..."><?php echo e(old('description')); ?></textarea>
                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Is Active -->
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" <?php echo e(old('is_active') ? 'checked' : ''); ?>>
                                <label class="custom-control-label" for="is_active">
                                    Aktifkan konfigurasi ini
                                </label>
                            </div>
                            <small class="form-text text-muted">
                                Jika dicentang, konfigurasi lain akan otomatis dinonaktifkan
                            </small>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="<?php echo e(route('admin.gemini-configs.index')); ?>" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/SIRT02/resources/views/admin/gemini-configs/create.blade.php ENDPATH**/ ?>