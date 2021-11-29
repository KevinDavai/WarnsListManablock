<template>
  <Head title="Dashboard" />
  <breeze-authenticated-layout>
  <Preloader>
  </Preloader>

  <a @click="logout" as="button" class="add-btn" data-bs-toggle="modal" data-bs-target="#addwarnModal" style="margin-right: 13px"><i class="fas fa-plus"></i></a>

    <div class="container-xxl mt-2">
            <pagination 
          v-model="page" 
          :records="500" 
          :per-page="7" 
          @paginate="list(this.page)"
          :options="options">
        </pagination>
    <table class="table table-dark table-borderless table-responsive card-1 p-4 table-striped table-hover go-next-line">
        <thead>
            <tr class="border-bottom border-top table-header-deg">
                <th class="col-1 p-top-table"><span class="ms-2">Pseudo</span></th>
                <th class="col-1 p-top-table"><span class="ms-2">Averti par</span></th>
                <th class="col-2 p-top-table"><span class="ms-2">Raison</span></th>
                <th class="col-4 p-top-table"><span class="ms-2">Description</span></th>
                <th class="col-1 p-top-table"><span class="ms-2">Date</span></th></tr>
        </thead>
        <tbody class="align-middle">
            <tr class="border-bottom border-top" v-for="(warn, index) in warnList.data">
                <td>
                    <div class="p-2 d-flex flex-row align-items-center">
                        <div class="d-flex flex-column ml-2"> <span class="d-block font-weight-bold">{{ warn.pseudo }}</span> </div>
                    </div>
                </td>
                <td>
                    <div class="p-2"> <span class="font-weight-bold">{{ warn.moderateur }}</span> </div>
                </td>
                <td>
                    <div class="p-2 d-flex flex-column"> <span>{{ warn.warn_name }}</span> </div>
                </td>
                <td>
                    <div class="p-2 d-flex flex-column"> <span>{{ warn.description }}</span> </div>
                </td>
                <td>
                    <div class="p-2"> <span class="d-block font-weight-bold">{{ warn.created_at }}</span> </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!--
      <table class="table table-dark table-striped table-hover mt-4 w-auto">
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


    <!--<div class='row'>
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
      
    </div>-->

    <!-- Modal -->
    <div class="modal fade" id="addwarnModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content text-center no-border">
          <div class="modal-header d-flex justify-content-center">
            <p class="heading">Ajouter un avertissement</p>
          </div>
          <div class="modal-body">
          <i class="fas fa-bell fa-4x animated rotateIn mb-4 mt-2 color-modal-header"></i>
                   <div class="card-body text-start">

    <breeze-validation-errors class="mb-3" />

    <div v-if="status" class="alert alert-success mb-3 rounded-0" role="alert">
      {{ status }}
    </div>

    <form action="#" @submit.prevent="createWarn()" id="warnForm">
      <div class="form-floating mb-3">
          <input type="text" class="form-control form-control-lg"  id="floatingInput" placeholder="name@example.com" v-model="warn.pseudo" required autofocus/>
          <label for="floatingInput">Pseudo du joueur*</label>
      </div>


    <div class="form-floating mb-3">
      <select class="form-select" id="floatingSelect" v-model="warn.warn">
        <option value="" selected disabled hidden>Selectionne la raison:</option>
        <option v-for="(typewarn, index) in typeWarnList" :value="typewarn.name">{{ typewarn.name }}</option>
      </select>
      <label for="floatingSelect">Raison*</label>
      </div>

      <div class="form-floating mb-3">
          <input type="text" class="form-control form-control-lg"  id="floatingInput2" placeholder="name@example.com" v-model="warn.description" autocomplete="current-password"/>
          <label for="floatingInput2">Informations complémentaires</label>
      </div>
    </form>
  </div>
</div>

          <div class="modal-footer flex-center justify-content-center">
        <button type="button" class="btn-dismis-modal" data-bs-dismiss="modal">Annuler</button>
        <input type="submit" form="warnForm" class="btn-valid-modal waves-effect waves-light" value="Ajouter" data-bs-dismiss="modal"> 
      </div>
    </div>
      </div>
    </div>
  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3'
import Preloader from '@/Components/Preloader.vue'
import Pagination from 'v-pagination-3'
import MyPagination from '@/Components/Pagination.vue'

export default {
  components: 
  { 
    BreezeAuthenticatedLayout, 
    Head, 
    Preloader, 
    Pagination,
    MyPagination,
  },
  props: {
    status: String
  },
  data() {
    return {
        warnList: [],
        typeWarnList: [],
        warn: {
            pseudo: null,
            description: null,
            warn: null,
            moderateur: this.$attrs.auth.user.pseudo
        },
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        page: 1,
        options:{
            format: true,
            chunk: 1,
            chunksNavigation:'scroll',
            edgeNavigation: true,
            theme:'bootstrap3',
            template:MyPagination,
            texts:{
                count:'Showing {from} to {to} of {count} records|{count} records|One record',
                first:'First',
                last:'Last',
                nextPage:'>',
                nextChunk:'>>',
                prevPage:'<',
                prevChunk:'<<'
            }
        }
    };
  },
  created() {
      this.fetchWarnList();
      this.fetchTypeWarnList();
  },
  methods: {
      fetchWarnList() {
          axios.get(route('api.getListWarn')).then((res) => {
              this.warnList = res.data;
          });
      },

      fetchTypeWarnList() {
        axios.get(route('api.getListTypeWarn')).then((res) => {
          this.typeWarnList = res.data
        });
      },

      createWarn() {
          console.log("test");
          axios.post(route('api.postWarn'), this.warn)
      },

      list(page){
            axios.get(`/api/warnlist?page=${page}`).then(({data})=>{
                this.warnList = data
            }).catch(({ response })=>{
                console.error(response)
            })
      }
  },
  mounted() {
    Pusher.logToConsole = true;
    var vm = this;
    var pusher = new Pusher('f6e2c5eefed30ef289a8', {
      cluster: 'eu'
    });
    var channel = pusher.subscribe('warns');
    channel.bind('addWarn', function(data) {
        console.log(data);
        vm.list(vm.page);
    });
  },
}
</script>
