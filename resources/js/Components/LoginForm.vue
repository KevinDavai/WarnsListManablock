<template>
    <div class="modal-header d-flex justify-content-center">
        <p class="heading">Connexion</p>
    </div>

    <svg v-if="loading" class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
        <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
    </svg>
      <div class="modal-body">
        <i class="fas fa-bell fa-4x animated rotateIn mb-4 mt-2 color-modal-header" :class="loading ? 'loading-modal-color-icon' : ''"></i>
        <div class="card-body text-start">
            <small id="passwordHelp" class="text-danger" v-if="hasError('pseudo')">             
                {{getError('pseudo')}}
            </small> 
          <form @submit.prevent="storeLogin" id="loginForm" @keydown="clearError" :class="loading ? 'opacity-05' : ''">
            <div class="form-label-group mb-3">
                <input type="text" class="form-control form-control-lg"  id="floatingInput" placeholder="name@example.com" v-model="formData.pseudo" name="pseudo" required autofocus/>
                <label for="floatingInput">Pseudo</label>
            </div>

            <div class="form-label-group mb-3">
                <input type="password" class="form-control form-control-lg"  id="inputPassword" placeholder="Mot de passe" v-model="formData.password" name="password" required autocomplete="current-password"/>
                <label for="inputPassword">Mot de passe</label>
            </div>
          </form>
        </div>
      </div>

      <div class="modal-footer flex-center justify-content-center">
        <button type="button" class="btn-dismis-modal" data-bs-dismiss="modal" @click.prevent="reset">Annuler</button>
        <input type="submit" form="loginForm" class="btn-valid-modal waves-effect waves-light" value="Se connecter"> 
      </div>

</template>

<script>
import FormEdit from '@/Components/FormEdit'
export default {
    components: { FormEdit },
    name: 'LoginForm',
    mixins: [FormEdit],
    emits: ["childToParent"],
    data(){
        return{ 
            modalID: '#connexionModal',
            formData: {
                pseudo: null,
                password: null,
            },
            needReset: true,
        }
    },
    methods:{
        storeLogin(){
            this.post(route('login'), this.formData, true, true)
         },   
        emitToParent (value) {
            this.$emit('childToParent', value)
        }
    },  
    computed: {
        csrf() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
    }, 
     
}
</script>