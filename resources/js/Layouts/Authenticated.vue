<template>
  <div class="bg-19191d">
   <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
              <div class="nav_list"> 
                  <inertia-link :href="route('dashboard')" class="nav_link" :class="urlPath == '/' ? 'active-app' : '' "> 
                    <i class="fas fa-address-book"></i>                      
                    <span class="nav_name">Ronde</span> 
                  </inertia-link> 
                  <inertia-link :href="route('dashboard.doubleacc')" class="nav_link" :class="urlPath == '/double-compte' ? 'active-app' : '' "> 
                    <i class="fas fa-user-check"></i>                      
                    <span class="nav_name">Double compte</span> 
                  </inertia-link> 
                  <inertia-link :href="route('dashboard.warns')" class="nav_link" :class="urlPath == '/warns' ? 'active-app' : '' "> 
                    <i class="fas fa-ban"></i>                      
                    <span class="nav_name">Suivi Avertissement</span> 
                  </inertia-link>  
              </div>
            </div> <a :href="route('admin.dashboard.index')" v-if="$page.props.auth.user.role_id == 3" class="nav_link"> <i class="fas fa-user-lock"></i> <span class="nav_name">Panel Administrateur</span> </a>
        </nav>
    </div>
    <nav class="navbar p-0 transition-navbar bg-navbar-deg navbar-expand navbar-light bg-purple-me sticky-top">
        <div class="header_toggle ml-4 ml-md-0"><i class="fas fa-bars" @click="sideBar" id="header-toggle" aria-hidden="true"></i></div>

      <div class="container container-pd">


      <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
       
          <!-- Right Side Of Navbar -->
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

        <!-- Logo -->
        <a class="navbar-brand navbar-collapse justify-content-center" href="/">
          <Link :href="route('dashboard')" :class="`d-none d-sm-block`">
                <img src="https://www.ycraft.fr/storage/img/logo.png" style="width: 80px">
          </Link>
        </a>

        <div class="collapse navbar-collapse justify-content-center width-²-back" id="navbarSupportedContent">
          <!-- Right Side Of Navbar -->
          <ul class="d-none d-sm-block navbar-nav align-items-baseline">
            <!-- Authentication Links -->
            
            <a @click="logout" as="button" class="back-btn"><i class="fas fa-sign-out-alt d-none d-sm-inline-block"></i> <span> Déconnexion</span></a>

          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <main class="container my-5 d-flex align-items-center flex-column">
      <slot />
    </main>
  </div>
</template>

<script>
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue'
import BreezeDropdown from '@/Components/Dropdown.vue'
import BreezeDropdownLink from '@/Components/DropdownLink.vue'
import BreezeNavLink from '@/Components/NavLink.vue'
import { Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
import $ from 'jquery'



export default {
  components: {
    BreezeApplicationLogo,
    BreezeDropdown,
    BreezeDropdownLink,
    BreezeNavLink,
    Link,
  },

  data() {
    return {
      showingNavigationDropdown: false,
      role_name: "",
      urlPath: location.pathname,
    }
  },

  created() {
    this.getRole();
  },

  methods: {
    logout() {
      Inertia.post(route("logout"));
    },
    getRole() {
      axios.get(route('getRoleUser')).then((res) => {
        this.role_name = res.data;
      });
    },
    sideBar() {

          const toggle = document.getElementById('header-toggle'),
          nav = document.getElementById('nav-bar')
          //bodypd = document.getElementById('body-pd'),

          var elem, style;
          elem = document.querySelector('.l-navbar');
          style = getComputedStyle(elem);
          console.log(style.left != "0px");
          if(style.left != "0px") {
            elem.classList.add('left-0per');
          } else {
            elem.classList.remove('left-0per');
          };
        
          // Validate that all variables exist
          console.log(toggle);
          console.log(nav);
          //console.log(bodypd);
          if(toggle && nav){
                                
              // show navbar
              nav.classList.toggle('show-pd')
              // change icon
              toggle.classList.toggle('fa-times')
              // add padding to body
              //bodypd.classList.toggle('body-pd')

          }
      
        
        
  
    },
  },
  mounted() { 
    var body = document.body;
    body.classList.add("bg-19191d");
    body.classList.remove("modal-open");
  

  }
}
</script>
