<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="<?php echo e(route('index') ?? '/'); ?>" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="">
        <h1 class="sitename">SiRT02.Id</h1>
      </a>

      <div style="display: flex; align-items: center; gap: 30px;">
        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="/" >Home</a></li>
            <li><a href="<?php echo e(route('news.index')); ?>">Berita</a></li>
            <?php if(auth()->check() || session('head_of_family_id')): ?>
              <?php if(session('head_of_family_id')): ?>
                <!-- HeadOfFamily menu -->
                <li><a href="<?php echo e(route('reports.index')); ?>">Laporan</a></li>
                <li><a href="<?php echo e(route('letters.index')); ?>">Surat</a></li>
                <li><a href="javascript:void(0)" onclick="openChatbot()">Chatbot</a></li>
              <?php elseif(auth()->user()->role !== 'admin'): ?>
                <li><a href="<?php echo e(route('reports.index')); ?>">Laporan</a></li>
                <li><a href="<?php echo e(route('letters.index')); ?>">Surat</a></li>
                <li><a href="javascript:void(0)" onclick="openChatbot()">Chatbot</a></li>
              <?php else: ?>
                <li><a href="<?php echo e(route('admin.dashboard')); ?>">Admin Dashboard</a></li>
              <?php endif; ?>
            <?php endif; ?>
          </ul>
        </nav>

        <div class="header-social-links" style="display: flex; align-items: center; gap: 12px;">
          <?php if(auth()->check() || session('head_of_family_id')): ?>
            <div class="dropdown">
              <a href="#" class="d-flex align-items-center gap-2" style="text-decoration: none; color: inherit; cursor: pointer;" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle" style="font-size: 1.5rem; color: #6bb8a1;"></i>
                <span style="color: #333;">
                  <?php if(session('head_of_family_id')): ?>
                    <?php echo e(session('head_of_family_name')); ?>

                  <?php else: ?>
                    <?php echo e(auth()->user()->name); ?>

                  <?php endif; ?>
                </span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <?php if(session('head_of_family_id')): ?>
                  <li><a class="dropdown-item" href="<?php echo e(route('user.dashboard')); ?>">Dashboard</a></li>
                  <li><a class="dropdown-item" href="<?php echo e(route('password.change')); ?>">Ubah Password</a></li>
                <?php elseif(auth()->check()): ?>
                  <?php if(auth()->user()->role === 'admin'): ?>
                    <li><a class="dropdown-item" href="<?php echo e(route('admin.dashboard')); ?>">Admin Dashboard</a></li>
                  <?php else: ?>
                    <li><a class="dropdown-item" href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
                  <?php endif; ?>
                  <li><a class="dropdown-item" href="<?php echo e(route('password.change')); ?>">Ubah Password</a></li>
                <?php endif; ?>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="<?php echo e(route('logout')); ?>" method="POST" style="display: inline;">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="dropdown-item">Logout</button>
                  </form>
                </li>
              </ul>
            </div>
          <?php else: ?>
            <a href="<?php echo e(route('login')); ?>" class="btn btn-auth-primary" style="padding: 0.6rem 1.5rem; font-weight: 500; border-radius: 25px; background: linear-gradient(135deg, #6bb8a1 0%, #5a9b89 100%); border: none; color: white; box-shadow: 0px 4px 12px rgba(107, 184, 161, 0.25); transition: all 0.3s ease;">Login</a>
          <?php endif; ?>
        </div>
      </div>

    </div>
  </header>

  <script>
    function openChatbot() {
      const toggleBtn = document.getElementById('chatbot-toggle-btn');
      if (toggleBtn) {
        toggleBtn.click();
      }
    }
  </script>
<?php /**PATH C:\laragon\www\sirt02\resources\views/partials/header.blade.php ENDPATH**/ ?>