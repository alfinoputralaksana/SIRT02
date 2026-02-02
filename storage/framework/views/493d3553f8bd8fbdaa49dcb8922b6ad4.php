<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Dashboard Warga - SIRT'); ?></title>

    <!-- Favicons -->
    <link href="<?php echo e(asset('assets/img/logo.png')); ?>" rel="icon">
    <link href="<?php echo e(asset('assets/img/logo.png')); ?>" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Questrial:wght@400&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo e(asset('assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendor/aos/aos.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendor/glightbox/css/glightbox.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendor/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="<?php echo e(asset('assets/css/main.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/responsive.css')); ?>" rel="stylesheet">

    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body class="dashboard-page">

    <?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="main" style="min-height: 70vh; padding: 40px 0;">
        <div class="container">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>

    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Chatbot Modal -->
    <?php echo $__env->make('partials.chatbot-modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo e(asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/aos/aos.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/glightbox/js/glightbox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/swiper/swiper-bundle.min.js')); ?>"></script>

    <!-- Main JS File -->
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\sirt02\resources\views/layouts/app.blade.php ENDPATH**/ ?>