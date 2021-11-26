<template>
  <Head title="Dashboard" />
  <breeze-authenticated-layout>
  <Preloader>
  </Preloader>



    <div class="container-xxl mt-5">
    <table class="table table-dark table-borderless table-responsive card-1 p-4 table-striped table-hover">
        <thead>
            <tr class="border-bottom border-top">
                <th class="col-1 p-top-table"><span class="ms-2">Pseudo</span></th>
                <th class="col-1 p-top-table"><span class="ms-2">Averti par</span></th>
                <th class="col-2 p-top-table"><span class="ms-2">Raison</span></th>
                <th class="col-4 p-top-table"><span class="ms-2">Description</span></th>
                <th class="col-1 p-top-table"><span class="ms-2">Date</span></th></tr>
        </thead>
        <tbody class="align-middle">
            <tr class="border-bottom border-top">
                <td>
                    <div class="p-2 d-flex flex-row align-items-center">
                        <div class="d-flex flex-column ml-2"> <span class="d-block font-weight-bold">N0urs86</span> </div>
                    </div>
                </td>
                <td>
                    <div class="p-2"> <span class="font-weight-bold">Selol</span> </div>
                </td>
                <td>
                    <div class="p-2 d-flex flex-column"> <span>Peche Semi-AFKPeche Semi-AFKPeche Semi-AFK</span> </div>
                </td>
                <td>
                    <div class="p-2 d-flex flex-column"> <span>IL A MANGER DES POISSONSIL A MANGER DES POISSONS PENDANT LA PECHE AFK</span> </div>
                </td>
                <td>
                    <div class="p-2"> <span class="d-block font-weight-bold">28/01/2002 à 21h34</span> </div>
                </td>
            </tr>
                        <tr class="border-bottom border-top">
                <td>
                    <div class="p-2 d-flex flex-row align-items-center">
                        <div class="d-flex flex-column ml-2"> <span class="d-block font-weight-bold">N0urs86</span> </div>
                    </div>
                </td>
                <td>
                    <div class="p-2"> <span class="font-weight-bold">Selol</span> </div>
                </td>
                <td>
                    <div class="p-2 d-flex flex-column"> <span>Peche Semi-AFK</span> </div>
                </td>
                <td>
                    <div class="p-2 d-flex flex-column"> <span>IL A MANGER DES POISSONS PENDANT LA PECHE AFK</span> </div>
                </td>
                <td>
                    <div class="p-2"> <span class="d-block font-weight-bold">28/01/2002 à 21h34</span> </div>
                </td>
            </tr>
                        <tr class="border-bottom border-top">
                <td>
                    <div class="p-2 d-flex flex-row align-items-center">
                        <div class="d-flex flex-column ml-2"> <span class="d-block font-weight-bold">N0urs86</span> </div>
                    </div>
                </td>
                <td>
                    <div class="p-2"> <span class="font-weight-bold">Selol</span> </div>
                </td>
                <td>
                    <div class="p-2 d-flex flex-column"> <span>Peche Semi-AFK</span> </div>
                </td>
                <td>
                    <div class="p-2 d-flex flex-column"> <span>IL A MANGER DES POISSONS PENDANT LA PECHE AFK</span> </div>
                </td>
                <td>
                    <div class="p-2"> <span class="d-block font-weight-bold">28/01/2002 à 21h34</span> </div>
                </td>
            </tr>
                        <tr class="border-bottom border-top">
                <td>
                    <div class="p-2 d-flex flex-row align-items-center">
                        <div class="d-flex flex-column ml-2"> <span class="d-block font-weight-bold">N0urs86</span> </div>
                    </div>
                </td>
                <td>
                    <div class="p-2"> <span class="font-weight-bold">Selol</span> </div>
                </td>
                <td>
                    <div class="p-2 d-flex flex-column"> <span>Peche Semi-AFK</span> </div>
                </td>
                <td>
                    <div class="p-2 d-flex flex-column"> <span>IL A MANGER DES POISSONS PENDANT LA PECHE AFK</span> </div>
                </td>
                <td>
                    <div class="p-2"> <span class="d-block font-weight-bold">28/01/2002 à 21h34</span> </div>
                </td>
            </tr>
                        <tr class="border-bottom border-top">
                <td>
                    <div class="p-2 d-flex flex-row align-items-center">
                        <div class="d-flex flex-column ml-2"> <span class="d-block font-weight-bold">N0urs86</span> </div>
                    </div>
                </td>
                <td>
                    <div class="p-2"> <span class="font-weight-bold">Selol</span> </div>
                </td>
                <td>
                    <div class="p-2 d-flex flex-column"> <span>Peche Semi-AFK</span> </div>
                </td>
                <td>
                    <div class="p-2 d-flex flex-column"> <span>IL A MANGER DES POISSONS PENDANT LA PECHE AFK</span> </div>
                </td>
                <td>
                    <div class="p-2"> <span class="d-block font-weight-bold">28/01/2002 à 21h34</span> </div>
                </td>
            </tr>
            
          
        </tbody>
    </table>
</div>

      <!--<table class="table table-dark table-striped table-hover mt-4 w-auto">
        <thead>
          <tr>
            <th scope="col">Pseudo</th>
            <th scope="col">Averti par</th>
            <th scope="col" class="d-lg-table-cell d-none">Raison</th>
            <th scope="col">Description</th>
            <th scope="col" class="d-lg-table-cell d-none">Date</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-nowrap" v-for="(warn, index) in warnList">
            <td>
                  {{ warn.pseudo }}
            </td>
            <td>
              {{ warn.pseudo }}
            </td>
            <td class="d-lg-table-cell d-none">
            {{ warn.pseudo }}
            </td>
            <td>
            {{ warn.pseudo }}
            </td>
          </tr>
        </tbody>
      </table>-->

    <div class='row'>
      <h1>Warns</h1>
      <h4>New warns</h4>
      <form action="#" @submit.prevent="createWarn()">
          <div class="input-group">
              <input v-model="warn.pseudo" type="text" name="pseudo" class="form-control" autofocus>
              <input v-model="warn.description" type="text" name="description" class="form-control">
              <input v-model="warn.warn" type="text" name="warn" class="form-control">
              <input v-model="warn.moderateur" type="hidden" name="moderateur">
              <span class="input-group-btn">
                  <button type="submit" class="btn btn-primary">New warn</button>
              </span>
          </div>

      </form>
      
    </div>
  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3'
import Preloader from '@/Components/Preloader.vue'


export default {
  components: { BreezeAuthenticatedLayout, Head, Preloader},
  data() {
    return {
        warnList: [],
        warn: {
            pseudo: null,
            description: null,
            warn: null,
            moderateur: this.$attrs.auth.user.pseudo
        },
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    };
  },
  created() {
      this.fetchWarnList();
  },
  methods: {
      fetchWarnList() {
          axios.get(route('api.getListWarn')).then((res) => {
              this.warnList = res.data;
          });
      },

      createWarn() {
          axios.post(route('api.postWarn'), this.warn)
      },
  },
  mounted() {

  },
}
</script>
