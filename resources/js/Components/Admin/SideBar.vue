<template>
            <div class="leftside-menu">
    
                <!-- LOGO -->
                <inertia-link :href="route('admin.dashboard.index')" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="https://www.ycraft.fr/storage/img/logo.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="https://www.ycraft.fr/storage/img/logo.png" alt="" height="16">
                    </span>
                </inertia-link>

                <!-- LOGO -->
                <inertia-link :href="route('admin.dashboard.index')" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="https://www.ycraft.fr/storage/img/logo.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="https://www.ycraft.fr/storage/img/logo.png" alt="" height="16">
                    </span>
                </inertia-link>
    
                <div class="h-100" id="leftside-menu-container" data-simplebar>

                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title side-nav-item">Navigation</li>

                        <li class="side-nav-item">
                            <inertia-link :href="route('admin.dashboard.index')" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> Dashboard </span>
                            </inertia-link>
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
                                        <inertia-link :href="route('admin.dashboard.utilisateur')">Utilisateurs</inertia-link>
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
</template>

<script>
export default {

    
}
</script>