<template>
  <breeze-authenticated-layout>
    <Preloader></Preloader>
    <div class="bg-19191d">
        <main class="container my-5 d-flex align-items-center flex-column">
            <div>
            <p class="text-white text-center">Ton compte est en attente de validation ou tu n'as certainement pas l'acces pour acceder a cette page!</p>
            </div>
        </main>
    </div>
</breeze-authenticated-layout>
</template>

<script>
import Preloader from '@/Components/Preloader.vue'
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'


export default {
    components: 
    { 
        BreezeAuthenticatedLayout,
        Preloader, 
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
    },
    mounted() { 
        var body = document.body;
        body.classList.add("bg-19191d");
        body.classList.remove("modal-open");
    }
}
</script>
