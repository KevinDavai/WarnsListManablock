<template>
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <inertia-link :href="route('admin.dashboard.index')" class="brand-link">
       <a class="navbar-brand navbar-collapse justify-content-center d-flex">
          <Link :class="`d-none d-sm-block`">
                <img src="https://www.ycraft.fr/storage/img/logo.png" style="width: 80px">
          </Link>
        </a>
    </inertia-link>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="sidebar-user p-3">
        <div class="info pt-2">
          <ul class="navbar-nav align-items-baseline width-btn-back">
            <!-- Authentication Links -->
            <div class="profile-avatar">
                <div class="profile-description">
                    <p class="profile-title text-nav-head">{{ $page.props.auth.user.pseudo }}</p>
                    <p class="profile-description-text text-nav-head">
                      {{ role_name }}
                    </p>
                </div>
                <div class="profile-head">
                  <img class="avatar-head" :src="'https://cravatar.eu/helmavatar/' + $page.props.auth.user.pseudo + '/32.png'">
                </div>
            </div>
          </ul>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                         <li class="nav-header">PRINCIPAL</li>

          <li class="nav-item">
            <inertia-link :href="route('admin.dashboard.index')" class="nav-link" :class="urlPath == '/admin/dashboard' ? 'active' : '' ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </inertia-link>
          </li>
      
          <li class="nav-header">SITE</li>
          <li class="nav-item">
            <a :href="route('dashboard')" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                  Retour au site
              </p>
            </a> 
          </li>          
          <li class="nav-item">
            <a class="nav-link" href="/logout"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                 <i class="nav-icon fas fa-sign-out-alt"></i>
                 <p >Déconnexion</p>
            </a>
                 <form id="logout-form" action="/logout" method="POST" style="display: none;"> <input type="hidden" name="_token" :value="csrf">
                </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</template>

<script>
export default {
    computed: {
        csrf() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
    },
    data() {
      return {
        urlPath: location.pathname,
        role_name: "",
      }
    },
    created() {
        this.getRole();
    },
    methods: {
        getRole() {
            axios.get(route('getRoleUser')).then((res) => {
                this.role_name = res.data;
            });
        },
    } 
    
}
</script>