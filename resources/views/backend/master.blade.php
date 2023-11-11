<!DOCTYPE html>
<html lang="en">

<head>
  
  @include('backend.layouts.includes.head')
 
</head>

<body>

  <!-- ======= Header ======= -->
  @include('backend.layouts.includes.navbar')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

   @include('backend.layouts.includes.sidebar')

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('backend.layouts.includes.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  @include('backend.layouts.includes.script')
</body>

</html>