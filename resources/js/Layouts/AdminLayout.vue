
<template>
       <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">
    
                <!-- LOGO -->
                <a href="/admin/dashboard" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="https://www.ycraft.fr/storage/img/logo.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="https://www.ycraft.fr/storage/img/logo.png" alt="" height="16">
                    </span>
                </a>

                <!-- LOGO -->
                <a href="/admin/dashboard" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="https://www.ycraft.fr/storage/img/logo.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="https://www.ycraft.fr/storage/img/logo.png" alt="" height="16">
                    </span>
                </a>
    
                <div class="h-100" id="leftside-menu-container" data-simplebar>

                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title side-nav-item">Navigation</li>

                        <li class="side-nav-item">
                            <a href="/admin/dashboard" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarUtilisateur" aria-expanded="false" aria-controls="sidebarUtilisateur" class="side-nav-link">
                                <i class="uil-briefcase"></i>
                                <span> Utilisateurs </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarUtilisateur">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="#">Utilisateurs</a>
                                    </li>
                                    <li>
                                        <a href="#">Rôles</a>
                                    </li>
                            
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-title side-nav-item">Site</li>

                        <li class="side-nav-item">
                            <a href="/" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> Retour au site </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> Déconnexion </span>
                            </a>
                        </li>
                    </ul>

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-menu float-end mb-0">
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-bell noti-icon"></i>
                                    <span class="noti-icon-badge"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">

                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5 class="m-0">
                                            <span class="float-end">
                                                <a href="javascript: void(0);" class="text-dark">
                                                    <small>Clear All</small>
                                                </a>
                                            </span>Notification
                                        </h5>
                                    </div>

                                    <div style="max-height: 230px;" data-simplebar>
                                        <!-- item-->
                                        
                                    </div>

                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                        View All
                                    </a>

                                </div>
                            </li>


                            <li class="notification-list">
                                <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                                    <i class="dripicons-gear noti-icon"></i>
                                </a>
                            </li>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                  <img class="avatar-head" :src="'https://cravatar.eu/helmavatar/' + $page.props.auth.user.pseudo + '/32.png'">
                                    </span>
                                    <span>
                                        <span class="account-user-name">{{ $page.props.auth.user.pseudo }}</span>
                                        <span class="account-position">Administrateur</span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <!-- item-->
                                    <div class=" dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Bienvenue !</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle me-1"></i>
                                        <span>Mon compte</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-lock-outline me-1"></i>
                                        <span>Ecran de verrouillage</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout me-1"></i>
                                        <span>Déconnexion</span>
                                    </a>
                                </div>
                            </li>

                        </ul>
                        <button class="button-menu-mobile open-left">
                            <i class="mdi mdi-menu"></i>
                        </button>
                        <div class="app-search dropdown d-none d-lg-block">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control dropdown-toggle"  placeholder="Recherche..." id="top-search">
                                    <span class="mdi mdi-magnify search-icon"></span>
                                    <button class="input-group-text btn-primary" type="submit">Recherche</button>
                                </div>
                            </form>

                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
            
                            </div>
                        </div>
                    </div>
                    <!-- end Topbar -->
                    
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <form class="d-flex">
                                            <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                                <i class="mdi mdi-autorenew"></i>
                                            </a>
                                            <a href="javascript: void(0);" class="btn btn-primary ms-1">
                                                <i class="mdi mdi-filter-variant"></i>
                                            </a>
                                        </form>
                                    </div>
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-5 col-lg-6">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                               
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                                    <div class="col-lg-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                                    <div class="col-lg-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                               
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row -->

                            </div> <!-- end col -->

                            <div class="col-xl-7 col-lg-6">
                                <div class="card card-h-100">
                                    <div class="card-body">
                                        
                                        
                                        <h4 class="header-title mb-3">TEST GRAPHICS</h4>

                                        <div dir="ltr">
                                            <div id="high-performing-product" class="apex-charts" data-colors="#727cf5,#e3eaef"></div>
                                        </div>
                                            
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->

                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <h4 class="header-title mb-3">TEST GRAPHICS 2</h4>

                                       

                                       
                                        <div dir="ltr">
                                            <div id="revenue-chart" class="apex-charts mt-3" data-colors="#727cf5,#0acf97"></div>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            
                        </div>
                        <!-- end row -->


                        
                        <!-- end row -->

                    </div>
                    <!-- container -->

                </div>
                <!-- content -->

            

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


</template>

<script>
    import Footer from '@/Components/Admin/Footer'
    import NavBar from '@/Components/Admin/NavBar'
    import SideBar from '@/Components/Admin/SideBar'
    export default {
        components: {
          Footer,
          NavBar,
          SideBar,
        },
    }
    
</script>