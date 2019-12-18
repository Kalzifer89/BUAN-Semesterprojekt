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
                     <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Statistik</span></a></li>
                     <li class="nav-item" role="presentation"><a class="nav-link" href="user_mangement.php"><i class="fas fa-user"></i><span>User Mangement</span></a></li>
                     <li class="nav-item" role="presentation"><a class="nav-link" href="../registration.php"><i class="fas fa-user"></i><span>User Anlegen</span></a></li>
                     <li class="nav-item" role="presentation"><a class="nav-link" href="product_mangement.php"><i class="far fa-window-maximize"></i><span>Produkte</span></a></li>
                     <li class="nav-item" role="presentation"><a class="nav-link" href="create_product.php"><i class="far fa-window-maximize"></i><span>Produkt erstellen</span></a></li>
                     <li class="nav-item" role="presentation"><a class="nav-link" href="admin_management.php"><i class="fas fa-key"></i><span>Admin Mangement</span></a></li>
                     <li class="nav-item" role="presentation"><a class="nav-link" href="create_admin.php"><i class="fas fa-key"></i><span>Admin Anlegen</span></a></li>
                     <li class="nav-item" role="presentation"><a class="nav-link" href="category_management.php"><i class="far fa-window-maximize"></i><span>Kategorie Verwaltung</span></a></li>
                     <li class="nav-item" role="presentation"><a class="nav-link" href="create_category.php"><i class="far fa-window-maximize"></i><span>Kategorie Anlegen</span></a></li>
                     <li class="nav-item" role="presentation"><a class="nav-link" href="login.php"><i class="fas fa-user"></i><span>Login</span></a></li>
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
                         </ul>
                     </div>
                 </nav>
<?php include '../config/config.php'; ?>
