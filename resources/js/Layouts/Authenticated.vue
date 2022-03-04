<template>
  <div class="bg-19191d">
    <nav class="navbar bg-navbar-deg navbar-expand-md navbar-light bg-purple-me sticky-top">
      <div class="container-xxl">

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
                  <img class="avatar-head" src="https://cravatar.eu/helmavatar/n0urs86/32.png" alt="n0urs86's Head">
                </div>
            </div>
          </ul>
        </div>

        <!-- Logo -->
        <a class="navbar-brand navbar-collapse justify-content-center" href="/">
          <Link :href="route('dashboard')">
                <img src="https://www.ycraft.fr/storage/img/logo.png" style="width: 80px">
          </Link>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center width-btn-back" id="navbarSupportedContent">
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav align-items-baseline">
            <!-- Authentication Links -->
            
            <a @click="logout" as="button" class="back-btn"><i class="fas fa-sign-out-alt"></i> <span> Déconnexion</span></a>

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
    }
  },
  mounted() {
    var body = document.body;
    body.classList.add("bg-19191d");
  }
}
</script>
