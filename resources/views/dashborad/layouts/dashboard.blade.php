@include('dashborad.layouts.header')


<!-- Navbar -->
@include('dashborad.layouts.navbar')
  <!-- /.navbar -->

<!-- Main Sidebar Container -->
@include('dashborad.layouts.sidebar')



  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  

@include('dashborad.layouts.footer')