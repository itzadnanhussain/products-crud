<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}"/>

  <title><?php echo (isset($title)) ? $title : '' ?></title>

  <!-- base:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="shortcut icon" href="assets/images/favicon.png" />
  <link rel="stylesheet" href="assets/vendors/jquery-toast-plugin/jquery.toast.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


  <!---- Script Tags------------->
  <script src="assets/vendors/base/vendor.bundle.base.js"></script>
  <script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

 
</head>

<body class="sidebar-fixed">
  <div class="container-scroller">

    <!--Top Navigation Bar -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

      <div class="text-left navbar-brand-wrapper d-flex align-items-center justify-content-between">
      <!-- admin purpose   -->
         <a class="navbar-brand brand-logo" href="/">Product Portal</a>
        <a class="navbar-brand brand-logo-mini" href="/">PM</a>
          
        <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>

      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav">
          
          <li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">

            <a class="dropdown-toggle btn btn-outline-secondary btn-fw" href="#" data-toggle="dropdown" id="pagesDropdown">
              <span class="nav-profile-name">Account</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="pagesDropdown">
           
           
              <a class="dropdown-item" href="javascript:void(0)">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>

            </div>
          </li>

        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>

    </nav>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link d-flex">
            
            </div>
          </li>

          <!-- Admin Settings -->
           <li class="nav-item">
            <a class="nav-link" href="/">
              <i class="mdi mdi-shield-check menu-icon"></i>
              <span class="menu-title"> Product Dashboard</span>
            </a>
          </li>
        
     

                                        <!-- Event Management-->

       

       



 
          
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">