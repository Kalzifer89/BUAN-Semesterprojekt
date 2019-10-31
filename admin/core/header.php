<!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <title>Admin Bereich iShop</title>
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
     <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
 </head>

 <body id="page-top">
     <div id="wrapper">
         <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
             <div class="container-fluid d-flex flex-column p-0">
                 <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                     <div class="sidebar-brand-icon rotate-n-15"><i class="far fa-money-bill-alt"></i></div>
                     <div class="sidebar-brand-text mx-3"><span>iSchool</span></div>
                 </a>
                 <hr class="sidebar-divider my-0">
                 <ul class="nav navbar-nav text-light" id="accordionSidebar">
                     <li class="nav-item" role="presentation"><a class="nav-link active" href="index.html"><i class="fas fa-tachometer-alt"></i><span>Statistik</span></a></li>
                     <li class="nav-item" role="presentation"><a class="nav-link" href="profile.html"><i class="fas fa-user"></i><span>User Verwaltung</span></a></li>
                     <li class="nav-item" role="presentation"><a class="nav-link" href="table.html"><i class="fas fa-table"></i><span>Produkte</span></a></li>
                     <li class="nav-item" role="presentation"><a class="nav-link" href="login.html"><i class="far fa-user-circle"></i><span>Login</span></a></li>
                     <li class="nav-item" role="presentation"><a class="nav-link" href="register.html"><i class="fas fa-user-circle"></i><span>User Anlegen</span></a></li>
                     <li class="nav-item" role="presentation"><a class="nav-link" href="forgot-password.html"><i class="fas fa-key"></i><span>Forgotten Password</span></a></li>
                     <li class="nav-item" role="presentation"><a class="nav-link" href="404.html"><i class="fas fa-exclamation-circle"></i><span>Page Not Found</span></a></li>
                     <li class="nav-item" role="presentation"><a class="nav-link" href="blank.html"><i class="fas fa-window-maximize"></i><span>Blank Page</span></a></li>
                     <li class="nav-item" role="presentation"><a class="nav-link" href="table-1.html"><i class="fas fa-table"></i><span>Table</span></a></li>
                 </ul>
                 <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
             </div>
         </nav>
         <div class="d-flex flex-column" id="content-wrapper">
             <div id="content">
                 <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                     <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                         <ul class="nav navbar-nav flex-nowrap ml-auto">
                             <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                 <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                     <form class="form-inline mr-auto navbar-search w-100">
                                         <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                             <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                         </div>
                                     </form>
                                 </div>
                             </li>
                             <div class="d-none d-sm-block topbar-divider"></div>
                             <li class="nav-item dropdown no-arrow" role="presentation">
                                 <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">Valerie Luna</span></a>
                                     <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in"
                                         role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                         <a
                                             class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                                             <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
                                 </div>
                             </li>
                         </ul>
                     </div>
                 </nav>
<?php include '../config/config.php'; ?>
