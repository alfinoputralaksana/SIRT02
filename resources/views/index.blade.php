<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Sistem Informasi Administrasi RT</title>
  <meta name="description" content="Sistem Informasi Administrasi RT - Pengelolaan administrasi Rukun Tetangga dengan Chatbot AI">
  <meta name="keywords" content="RT, administrasi, chatbot">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Questrial:wght@400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/responsive.css" rel="stylesheet">
</head>

<body class="index-page">

  @include('partials.header')

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center content">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <h2>Sistem Informasi<br><span style="color: #6bb8a1;">Administrasi RT</span></h2>
            <p class="lead">Website berbasis Chatbot AI untuk digitalisasi laporan, surat, dan pendataan warga yang lebih efisien.</p>
            <div class="cta-buttons" data-aos="fade-up" data-aos-delay="300">
              @if(auth()->check() || session('head_of_family_id'))
                @if(session('head_of_family_id'))
                  <a href="{{ route('user.dashboard') }}" class="btn btn-primary">Dashboard</a>
                @elseif(auth()->user()->role === 'admin')
                  <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Dashboard Admin</a>
                @else
                  <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
                @endif
                <a href="{{ route('chatbot.index') }}" class="btn btn-outline">Konsultasi dengan Bot</a>
              @else
                <a href="{{ route('login') }}" class="btn btn-primary">Login Sekarang</a>
              @endif
            </div>
          </div>
          <div class="col-lg-6">
            <div class="hero-image">
              <img src="assets/img/fotountukwebsite .jpg" alt="Portfolio Hero Image" class="img-fluid" data-aos="zoom-out" data-aos-delay="300">
              <div class="shape-1"></div>
              <div class="shape-2"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Vision Mission Section -->
    <section id="vision-mission" class="vision-mission section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="section-title">
          <h2>Visi & Misi</h2>
          <p>Komitmen kami dalam melayani masyarakat</p>
        </div>

        <div class="row align-items-center">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="vision-mission-card vision-card">
              <div class="vision-mission-icon">
                <i class="bi bi-eye"></i>
              </div>
              <h3>Visi</h3>
              <p>Mewujudkan Rukun Tetangga yang harmonis, transparan, dan berbasis teknologi digital untuk meningkatkan kualitas hidup dan kesejahteraan masyarakat</p>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="vision-mission-card mission-card">
              <div class="vision-mission-icon">
                <i class="bi bi-eye"></i>
              </div>
              <h3>Misi</h3>
              <ul class="mission-list">
                <li><i class="bi bi-check-circle-fill"></i> Menyediakan platform digital untuk pengelolaan administrasi RT yang efisien</li>
                <li><i class="bi bi-check-circle-fill"></i> Meningkatkan komunikasi dan transparansi antar warga dan pengurus RT</li>
                <li><i class="bi bi-check-circle-fill"></i> Mempercepat proses pelayanan administratif kepada seluruh warga</li>
                <li><i class="bi bi-check-circle-fill"></i> Memberdayakan masyarakat melalui teknologi informasi</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="section-title">
          <h2>Fitur Utama</h2>
          <p>Sistem Informasi Administrasi RT dengan berbagai fitur pendukung</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="feature-item">
              <i class="bi bi-people"></i>
              <h3>Pendataan Warga</h3>
              <p>Kelola data warga secara terpusat dengan informasi lengkap dan terstruktur</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="feature-item">
              <i class="bi bi-file-text"></i>
              <h3>Pembuatan Surat</h3>
              <p>Proses pembuatan surat keterangan, domisili, dan dokumen penting lainnya</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="feature-item">
              <i class="bi bi-exclamation-circle"></i>
              <h3>Pelaporan Warga</h3>
              <p>Warga dapat melaporkan masalah atau kejadian yang perlu ditangani RT</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="feature-item">
              <i class="bi bi-chat-dots"></i>
              <h3>Chatbot Asisten</h3>
              <p>Dapatkan informasi administrasi dan persyaratan surat 24/7 melalui chatbot AI</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="feature-item">
              <i class="bi bi-shield-check"></i>
              <h3>Keamanan Data</h3>
              <p>Data terenkripsi dan terlindungi dengan sistem keamanan berlapis</p>
            </div>
          </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Statistics Section -->
    <section id="statistics" class="statistics section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="section-title">
          <h2>Statistik Warga</h2>
          <p>Data jumlah warga RT saat ini</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="100">
            <div class="stats-card text-center">
              <div class="stats-icon">
                <i class="bi bi-people"></i>
              </div>
              <h3>{{ $totalResidents }}</h3>
              <p>Total Warga</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="200">
            <div class="stats-card text-center">
              <div class="stats-icon male">
                <i class="bi bi-person"></i>
              </div>
              <h3>{{ $maleResidents }}</h3>
              <p>Warga Laki-laki</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="300">
            <div class="stats-card text-center">
              <div class="stats-icon female">
                <i class="bi bi-person"></i>
              </div>
              <h3>{{ $femaleResidents }}</h3>
              <p>Warga Perempuan</p>
            </div>
          </div>
        </div>
      </div>
    </section>

   

  </main>

 
   

    

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section testimonial-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Struktur Pengurus RT 02</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="org-tree-wrapper">
          
          <!-- Level 1: KETUA RT -->
          <div class="org-level-1">
            <div class="org-card-box org-card-top">
              <div class="org-card text-center">
                <div class="org-card-header bg-primary">
                  <i class="bi bi-person-badge-fill me-2 fs-5"></i>
                  <span class="fw-bold fs-6">KETUA RT</span>
                </div>
                <div class="org-card-body">
                  <p class="mb-0 fw-bold fs-5 text-dark">Hudariati</p>
                </div>
              </div>
            </div>
            <!-- Line down from Ketua -->
            <div class="tree-line-v tree-line-v-1 d-none d-md-block"></div>
          </div>

          <!-- Level 2: SEKRETARIS & BENDAHARA -->
          <div class="org-level-2-wrapper">
            <!-- Horizontal Connector Line between Sekretaris & Bendahara -->
            <div class="tree-line-h-level2 d-none d-md-block"></div>
            
            <div class="row justify-content-center g-4 w-100">
              <div class="col-md-5 col-lg-4 col-sm-6">
                <div class="org-card-item">
                  <div class="tree-line-v-top d-none d-md-block"></div>
                  <div class="org-card text-center">
                    <div class="org-card-header bg-success">
                      <i class="bi bi-file-earmark-text-fill me-2 fs-5"></i>
                      <span class="fw-bold fs-6">SEKRETARIS</span>
                    </div>
                    <div class="org-card-body">
                      <p class="mb-0 fw-bold text-dark">Fikri Ubaydillah</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-5 col-lg-4 col-sm-6">
                <div class="org-card-item">
                  <div class="tree-line-v-top d-none d-md-block"></div>
                  <div class="org-card text-center">
                    <div class="org-card-header bg-warning">
                      <i class="bi bi-wallet2 me-2 fs-5"></i>
                      <span class="fw-bold fs-6">BENDAHARA</span>
                    </div>
                    <div class="org-card-body">
                      <p class="mb-1 fw-bold text-dark">Vitri Prahantini</p>
                      <p class="mb-0 fw-bold text-dark">Tri Tusiwartini</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Line down from Level 2 to Level 3 -->
            <div class="tree-line-v tree-line-v-2 d-none d-lg-block"></div>
          </div>

          <!-- Level 3: BIDANG-BIDANG (7 BIDANG) -->
          <div class="org-level-3-wrapper">
            <!-- Horizontal Distribution Line for 7 Bidang -->
            <div class="tree-line-h-level3 d-none d-lg-block"></div>

            <div class="bidang-grid">
              
              <div class="bidang-col">
                <div class="tree-line-v-stem d-none d-lg-block"></div>
                <div class="org-card text-center">
                  <div class="org-card-header bg-info">
                    <i class="bi bi-people-fill fs-5"></i>
                  </div>
                  <div class="org-card-body">
                    <h6>Bidang Humas</h6>
                    <p>Subiyanto</p>
                    <p>Yuliantrini</p>
                  </div>
                </div>
              </div>

              <div class="bidang-col">
                <div class="tree-line-v-stem d-none d-lg-block"></div>
                <div class="org-card text-center">
                  <div class="org-card-header bg-info">
                    <i class="bi bi-moon-stars-fill fs-5"></i>
                  </div>
                  <div class="org-card-body">
                    <h6>Keagamaan</h6>
                    <p>Matsani</p>
                    <p>Nachrowi</p>
                  </div>
                </div>
              </div>

              <div class="bidang-col">
                <div class="tree-line-v-stem d-none d-lg-block"></div>
                <div class="org-card text-center">
                  <div class="org-card-header bg-danger">
                    <i class="bi bi-trophy-fill fs-5"></i>
                  </div>
                  <div class="org-card-body">
                    <h6>Pemuda & Olahraga</h6>
                    <p>Joni Akta</p>
                    <p>Dwi Wanti</p>
                  </div>
                </div>
              </div>

              <div class="bidang-col">
                <div class="tree-line-v-stem d-none d-lg-block"></div>
                <div class="org-card text-center">
                  <div class="org-card-header bg-secondary">
                    <i class="bi bi-laptop-fill fs-5"></i>
                  </div>
                  <div class="org-card-body">
                    <h6>Pendidikan, IT & UKM</h6>
                    <p>Jani Sabtriady</p>
                    <p>Yuyun Suhaedah</p>
                  </div>
                </div>
              </div>

              <div class="bidang-col">
                <div class="tree-line-v-stem d-none d-lg-block"></div>
                <div class="org-card text-center">
                  <div class="org-card-header bg-success">
                    <i class="bi bi-tree-fill fs-5"></i>
                  </div>
                  <div class="org-card-body">
                    <h6>Bidang PLKH</h6>
                    <p>Kuswa</p>
                    <p>Khoiri</p>
                  </div>
                </div>
              </div>

              <div class="bidang-col">
                <div class="tree-line-v-stem d-none d-lg-block"></div>
                <div class="org-card text-center">
                  <div class="org-card-header bg-primary">
                    <i class="bi bi-heart-pulse-fill fs-5"></i>
                  </div>
                  <div class="org-card-body">
                    <h6>PKK & Posyandu</h6>
                    <p>Susi H</p>
                    <p>Hamidah</p>
                  </div>
                </div>
              </div>

              <div class="bidang-col">
                <div class="tree-line-v-stem d-none d-lg-block"></div>
                <div class="org-card text-center">
                  <div class="org-card-header bg-dark">
                    <i class="bi bi-shield-lock-fill fs-5"></i>
                  </div>
                  <div class="org-card-body">
                    <h6>Bidang Keamanan</h6>
                    <p>M. Fajrin</p>
                    <p>Hasan Bakar</p>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>

    </section><!-- /Testimonials Section -->

    

    <!-- News Section -->
    <section id="berita" class="berita section berita-background">

      <div class="container section-title" data-aos="fade-up">
        <h2>Berita Terbaru</h2>
        <div class="title-shape">
          <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor" stroke-width="2"></path>
          </svg>
        </div>
        <p>Informasi terkini dan update berita penting dari komunitas RT kami</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-4">
          @forelse($latestNews as $index => $item)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
              <div class="news-card">
                <div class="news-image">
                  @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="img-fluid">
                  @else
                    <div style="background: linear-gradient(135deg, #A8D5BA 0%, #C5E8A0 100%); height: 250px; display: flex; align-items: center; justify-content: center;">
                      <i class="bi bi-newspaper" style="font-size: 3rem; color: rgba(44, 62, 80, 0.2);"></i>
                    </div>
                  @endif
                  <span class="news-date">{{ $item->published_at->format('d M Y') }}</span>
                </div>
                <div class="news-content">
                  <div class="news-category">
                    @if(str_contains($item->title, 'Pengumuman'))
                      Pengumuman
                    @elseif(str_contains($item->title, 'Program'))
                      Program
                    @elseif(str_contains($item->title, 'Rapat'))
                      Rapat
                    @elseif(str_contains($item->title, 'Renovasi') || str_contains($item->title, 'Perbaikan'))
                      Infrastruktur
                    @elseif(str_contains($item->title, 'Kesehatan'))
                      Kesehatan
                    @elseif(str_contains($item->title, 'Kebersihan'))
                      Lingkungan
                    @elseif(str_contains($item->title, 'Olahraga') || str_contains($item->title, 'Rekreasi'))
                      Kegiatan
                    @else
                      Pengumuman
                    @endif
                  </div>
                  <h3>{{ $item->title }}</h3>
                  <p>{{ Str::limit(strip_tags($item->content), 100, '...') }}</p>
                  <a href="{{ route('news.show', $item->slug) }}" class="read-more">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>
          @empty
            <div class="col-12 text-center py-5">
              <p class="text-muted">Belum ada berita yang tersedia</p>
            </div>
          @endforelse
        </div>

        <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="700">
          <a href="{{ route('news.index') }}" class="btn btn-primary">Lihat Semua Berita</a>
        </div>
      </div>

    </section><!-- /News Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section testimonial-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Pertanyaan yang sering diajukan</h2>
        <div class="title-shape">
          <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor" stroke-width="2"></path>
          </svg>
        </div>
        <p>Belum menemukan jawaban yang kamu cari? Chatbot Asisten RT siap membantu kapan saja, atau simak dulu pertanyaan yang sering diajukan berikut ini.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row justify-content-center">

          <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

            <div class="faq-container">

              <div class="faq-item faq-active">
                <h3>Dokumen apa saja yang perlu disiapkan untuk membuat surat keterangan domisili?</h3>
                <div class="faq-content">
                  <div class="faq-body">
                    <ol class="mb-0">
                      <li>Fotokopi KTP</li>
                      <li>Fotokopi KK</li>
                      <li>Surat pengantar dari RT/RW</li>
                      <li>Formulir permohonan yang telah diisi</li>
                      <li>Dokumen pendukung lainnya sesuai kebutuhan</li>
                    </ol>
                  </div>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Jenis surat pengantar apa saja yang bisa diajukan melalui sistem ini (misalnya SKCK, domisili, usaha, dll)?</h3>
                <div class="faq-content">
                  <div class="faq-body">
                    <ol class="mb-0">
                      <li>Surat SKCK</li>
                      <li>Surat Domisili</li>
                      <li>Surat Usaha</li>
                      <li>Surat Keterangan Tidak Mampu (SKTM)</li>
                      <li>Surat Pengantar Nikah</li>
                      <li>Surat Keterangan Pindah</li>
                      <li>Surat Keterangan Kehilangan</li>
                      <li>Surat Keterangan Kelahiran</li>
                      <li>Surat Keterangan Kematian</li>
                    </ol>
                  </div>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Apa saja syarat yang diperlukan untuk mengurus surat pengantar pembuatan KTP?</h3>
                <div class="faq-content">
                  <div class="faq-body">
                    <ol class="mb-0">
                      <li>Fotokopi KK</li>
                      <li>Surat pengantar dari RT/RW</li>
                      <li>Formulir permohonan yang telah diisi</li>
                    </ol>
                  </div>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Apa saja syarat yang diperlukan untuk mengurus surat pengantar nikah dari RT?</h3>
                <div class="faq-content">
                  <div class="faq-body">
                    <ul class="mb-0">
                      <li>Fotokopi KTP calon pengantin pria dan wanita</li>
                      <li>Surat pengantar dari RT/RW</li>
                      <li>Formulir permohonan yang telah diisi</li>
                      <li>Fotokopi akta kelahiran</li>
                      <li>Surat persetujuan orang tua/wali (jika diperlukan)</li>
                    </ul>
                  </div>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Apa saja syarat yang diperlukan untuk mengajukan pembuatan KK baru melalui RT?</h3>
                <div class="faq-content">
                  <div class="faq-body">
                    <ol class="mb-0">
                      <li>Fotokopi KTP</li>
                    </ol>
                  </div>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Untuk keperluan apa saja SKTM ini biasanya digunakan (sekolah, kesehatan, dll)?</h3>
                <div class="faq-content">
                  <div class="faq-body">
                    <ol class="mb-0">
                      <li>Untuk keperluan pendaftaran sekolah</li>
                      <li>Untuk keperluan pendaftaran rumah sakit</li>
                      <li>Untuk keperluan pendaftaran beasiswa</li>
                    </ol>
                  </div>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div><!-- End Faq Column-->

        </div>

      </div>

    </section><!-- /Faq Section -->

    <!-- Maps Section -->
    <section id="maps" class="maps section berita-background">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Lokasi Rumah Ketua RT</h2>
          <div class="title-shape">
            <svg viewBox="0 0 200 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M 0,10 C 40,0 60,20 100,10 C 140,0 160,20 200,10" fill="none" stroke="currentColor" stroke-width="2"></path>
            </svg>
          </div>
          <p></p>
        </div>

        <div class="row align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="maps-container">
              <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d247.8320073491402!2d106.85269259787869!3d-6.353625682069832!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMjEnMTMuNSJTIDEwNsKwNTEnMTAuMiJF!5e0!3m2!1sen!2sid!4v1769668063616!5m2!1sen!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center">
            <div class="maps-content">
              <h3>Rumah Ketua RT</h3>
              <div class="maps-info">
                <div class="maps-info-item" data-aos="fade-up" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <div>
                    <h4>Alamat</h4>
                    <p>Jl. Bhakti 3 RT 02/ RW 06 No.100<br>Cimanggis, Depok, 16451</p>
                  </div>
                </div>

                <div class="maps-info-item" data-aos="fade-up" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <div>
                    <h4>Nomor Telepon</h4>
                    <p> 0895391790535<br>

                  </div>
                </div>

                <div class="maps-info-item" data-aos="fade-up" data-aos-delay="400">
                  <i class="bi bi-clock"></i>
                  <div>
                    <h4>Jam Konsultasi</h4>
                    <p>Senin - Jumat: 09:00 - 17:00<br>Sabtu - Minggu 09:00 - 12:00</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Maps Section -->

    
  </main>

  @include('partials.footer')

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Chatbot Modal -->
  @if(auth()->check() || session('head_of_family_id'))
    @include('partials.chatbot-modal')
  @endif

</body>

</html>