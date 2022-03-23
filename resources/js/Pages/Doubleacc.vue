<template>
  <Head title="Double Compte" />
  <breeze-authenticated-layout>
    <Preloader>
    </Preloader>

      <a as="button" class="add-btn" data-bs-toggle="modal" data-bs-target="#addDoubleCompte"><i class="fas fa-plus"></i></a>

      <div class="container mt-2">
            <!-- Search form -->
            <div class="row justify-content-around px-4">
              <div class="d-sm-flex pt-4 pt-sm-0 d-md-block justify-content-center col-sm-8 col-md-4 col-lg-3 md-form active-pink active-pink-2 mb-3 mt-0">
                <div class="form-label-group mb-3">
                  <input class="form-control form-control-lg" type="text" placeholder="Search" id="floatingInput" aria-label="Search" v-model="this.keyword">
                  <label class="floatingLabelSearch" for="floatingInput">Search</label>
                </div>
              </div>
            </div>

            <div class="table-responsive-xl">
              <table class="table table-dark bg-19191d table-borderless card-1 p-4 table-striped table-hover">
                <thead>
                  <tr>
                  	<th></th>
                    <th>Pseudos</th>
                    <th class="w-50">Description</th>
                    <th>Modérateur en charge</th>
                  </tr>
                </thead>
                <tbody>
                  <tr data-bs-toggle="collapse" class="accordion-toggle" :data-bs-target="'#collapse' + index" v-for="(doubleAcc, index) in computedDoubleAcc.slice(index,index+7)">
                    <td>
                      <div style="height: 28px" class="d-flex align-items-end justify-content-center">
                          <i class="fas fa-angle-down color-primary-me fa-lg"></i>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex flex-column">
                        <div class="d-flex align-items-center mb-1 mt-1">
                          <div class="profile-head me-3">
                            <img class="avatar-head" :src="'https://mc-heads.net/avatar/' + doubleAcc.pseudo[0] + '/32'">
                          </div>
                            {{ doubleAcc.pseudo[0] }}
                        </div>
                        <div class="accordian-body">
                          <div class="collapse unset-height" :id="'collapse' + index">
                            <div class="d-flex align-items-center mb-1 mt-1" v-for="(psed, idx) in doubleAcc.pseudo.slice(1)">
                              <div class="profile-head me-3">
                                <img class="avatar-head" :src="'https://mc-heads.net/avatar/' + psed + '/32'">
                              </div>
                                {{ psed }}
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle">
                        <div  :class="{ 'text-nowrap' : doubleAcc.description.length >= 60}" >{{ doubleAcc.description }}</div>
                    </td>
                    <td class="align-middle">
                      <div class="d-flex align-items-center">
                          <div class="profile-head me-3">
                            <img class="avatar-head" :src="'https://mc-heads.net/avatar/' + doubleAcc.moderator + '/32'">
                          </div>
                            {{ doubleAcc.moderator }}
                        </div>
                    </td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
          <div>
            <nav class="px-0 px-sm-4 pb-0 pb-sm-4 pb-3">
                <ul class="p-0" style="display: flex; margin: 0px; justify-content: space-between;">
                    <li>
                        <button @click="setPreviousPage" v-if="this.index != 0" type="button" class="left-page-btn"><i class="fas fa-angle-left"></i></button>
                    </li>
                    <li>
                        <button @click="setNextPage" v-if="this.index < this.computedDoubleAcc.length - 5" type="button" class="right-page-btn"><i class="fas fa-angle-right"></i></button>
                    </li>
                </ul>
            </nav>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addDoubleCompte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content text-center no-border">
          <AddDoubleAccForm/>
        </div>
      </div>
    </div>
  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import Preloader from '@/Components/Preloader.vue'
import Pagination from 'v-pagination-3'
import MyPagination from '@/Components/Pagination.vue'
import VueDatepickerUi from 'vue-datepicker-ui'
import 'vue-datepicker-ui/lib/vuedatepickerui.css';
import AddDoubleAccForm from '@/Components/AddDoubleAccForm.vue'
import { Head } from '@inertiajs/inertia-vue3'


export default {
  components: 
  { 
    BreezeAuthenticatedLayout, 
    Head, 
    Preloader, 
    Pagination,
    MyPagination,
    Datepicker: VueDatepickerUi,
    AddDoubleAccForm,
  },
    props: {
    status: String
  },
  data() {
    return {
        btn_add: true,
        keyword: '',
        doubleAccList: [],
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        page: 1,
        index: 0,
    }
  },
  computed:  {
    computedDoubleAcc: function() {
      this.index = 0;
      
      return this.doubleAccList.filter((item) => {
        var lower = [];
        for (let i = 0; i <= 5; i++) {
          if(item.pseudo[i] === undefined)
            lower.push('');
          else
            lower.push(item.pseudo[i].toLowerCase())
        }
        console.log(lower)
        var keywordLowwer = this.keyword.toLowerCase();
        return this.keyword.length === 0 
                || lower[0].includes(keywordLowwer) 
                || lower[1].includes(keywordLowwer) 
                || lower[2].includes(keywordLowwer) 
                || lower[3].includes(keywordLowwer) 
                || lower[4].includes(keywordLowwer) 
                || lower[5].includes(keywordLowwer) 


      })
    },
  },
  created() {
      this.fetchDoubleAccList();
  },
  methods: {
      fetchDoubleAccList() {
          axios.get(route('getListDoubleAcc')).then((res) => {
              this.doubleAccList = res.data;
          });
      },
      isMultiple(index) {
        if(this.computedDoubleAcc[index].pseudo.length > 2) console.log(index + " OUI"); return true
        return false
      },
      list(page){
            axios.get(`/doubleAccList?page=${page}`).then(({data})=>{
                this.doubleAccList = data
            }).catch(({ response })=>{
                console.error(response)
            })
      },
      setPreviousPage() {
          if(this.index != 0) {
            this.index = this.index - 7;
          }
        },
      setNextPage() {
        if(this.index < this.computedDoubleAcc.length - 7) {
          this.index = this.index + 7;
        }
      },
  },
  mounted() {
    Pusher.logToConsole = true;
    var vm = this;
    var pusher = new Pusher('f6e2c5eefed30ef289a8', {
      cluster: 'eu'
    });
    var channel = pusher.subscribe('double-compte');
    channel.bind('addDoubleCompte', function(data) {
        console.log(data);
        vm.list(vm.page);
    });
    
  },
}
</script>
