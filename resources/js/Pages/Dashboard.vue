<template>
  <Head title="Dashboard" />
  <breeze-authenticated-layout>
    <Preloader>
    </Preloader>

      <a v-if="$page.props.auth.user.role_id != 1" as="button" class="add-btn" data-toggle="modal" data-target="#addrondeModal"><i class="fas fa-plus"></i></a>

      <div class="container mt-2">
        <div v-if="$page.props.auth.user.role_id == 1">
          <p class="text-white text-center">Ton compte est en attente de validation</p>
        </div>
        <div v-else>
        
          <pagination v-model="page" :records="500" :per-page="7" @paginate="list(this.page)" :options="options"></pagination>
          <div class="table-responsive">
            <div class="table-responsive-xl">
              <table class="table table-dark bg-19191d table-borderless card-1 p-4 table-striped table-hover">
                <thead>
                  <tr>
                    <th>Pseudo</th>
                    <th class="w-75">Description</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(ronde, index) in rondeListe.data">
                                        <td>
                                            <div>
                                                {{ ronde.pseudo }}
                                            </div>
                                        </td>
                                        <td>
                                            <div :class="{ 'text-nowrap' : ronde.description.length >= 60}" >{{ ronde.description }}</div>
                                        </td>
                                        <td>
                                            <div>{{ ronde.created_at }}</div>
                                        </td>
                                    </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    <!-- Modal -->
    <div class="modal fade" id="addrondeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content text-center no-border">
          <div class="modal-header d-flex justify-content-center">
            <p class="heading">Ajouter une ronde</p>
          </div>
          <div class="modal-body">
            <i class="fas fa-bell fa-4x animated rotateIn mb-4 mt-2 color-modal-header"></i>
            <div class="card-body text-start">

              <breeze-validation-errors class="mb-3" />

              <div v-if="status" class="alert alert-success mb-3 rounded-0" role="alert">
                {{ status }}
              </div>

              <form action="#" @submit.prevent="createRonde()" id="rondeForm">

                <div class="form-label-group mb-3">
                    <input type="text" class="form-control form-control-lg"  id="floatingInput2" placeholder="name@example.com" v-model="ronde.description"/>
                    <label for="floatingInput2">Description</label>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer flex-center justify-content-center">
            <button type="button" class="btn-dismis-modal" data-dismiss="modal">Annuler</button>
            <input type="submit" form="rondeForm" class="btn-valid-modal waves-effect waves-light" value="Ajouter" data-bs-dismiss="modal"> 
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
import $ from 'jquery'


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
        rondeListe: [],
        ronde: {
            description: null,
            pseudo_moderator: this.$attrs.auth.user.pseudo
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
      this.fetchRondeList();
  },
  methods: {
      fetchRondeList() {
          axios.get(route('getListRonde')).then((res) => {
              this.rondeListe = res.data;
          });
      },


      createRonde() {
          axios.post(route('postRonde'), this.ronde).then(() => {
            $('#addrondeModal').modal('hide');
          })
      },

      list(page){
            axios.get(`/rondelist?page=${page}`).then(({data})=>{
                this.rondeListe = data
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
    var channel = pusher.subscribe('rondes');
    channel.bind('addRonde', function(data) {
        console.log(data);
        vm.list(vm.page);
    });
    
  },
}
</script>
