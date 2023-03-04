<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title }} - Animal Auction</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/DataTables/datatables.css" rel="stylesheet">
  <link href="/assets/vendor/DataTables/datatables.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/styleAdmin.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <!-- End Logo -->
    <div class="d-flex align-items-center justify-content-between">
      <a href="/" class="logo d-flex align-items-center">
        <img src="/assets/img/Logo_Animal_2.png" alt="AnimalAuction">
      </a>
    </div>
    
    {{-- Account --}}
    <nav class="header-nav ms-auto p-3">
      <ul class="d-flex align-items-center">
        <li class="bi bi-list toggle-sidebar-btn p-2"></li>
      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  {{-- Sidebar --}}
  @include('admin.includes.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      
      {{-- <h1>Dashboard</h1> --}}
      <h1 class="fw-bold text-dark">{{ $title }}</h1>
      {{-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav> --}}
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
      @yield('content')
    </section>

  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/assets/vendor/quill/quill.min.js"></script>
  <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>
  <script src="/assets/js/jquery-3.6.3.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
  <script src="/assets/vendor/DataTables/datatables.js"></script>
  <script src="/assets/js/numeral.js"></script>
  {{-- Iconify --}}
  <script src="https://code.iconify.design/iconify-icon/1.0.5/iconify-icon.min.js"></script>

  @stack('addon-script')

</body>

</html>