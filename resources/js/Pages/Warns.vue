<template>
  <Head title="Double Compte" />
  <breeze-authenticated-layout>
    <Preloader>
    </Preloader>
    <div class="alert alert-info alert-dismissible">
        <h5><i class="icon fas fa-info"></i> Information - Suivi Avertissement</h5>
        <hr>
        Ce système est en cours de développement. Vous serez informé lorsque cette fonctionnalité sera disponible.
    </div>      
  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import Preloader from '@/Components/Preloader.vue'

export default {
  components: { BreezeAuthenticatedLayout, Preloader }
}
</script>
