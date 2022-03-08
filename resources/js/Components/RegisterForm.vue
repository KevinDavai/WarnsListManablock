<template>
    <div class="modal-header d-flex justify-content-center">
        <p class="heading">S'enregistrer</p>
    </div>

    <svg v-if="loading" class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
        <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
    </svg>
    <div class="modal-body">
        <i class="fas fa-bell fa-4x animated rotateIn mb-4 mt-2 color-modal-header" :class="loading ? 'loading-modal-color-icon' : ''"></i>
        <div class="card-body text-start">

            <form @submit.prevent="storeRegister" id="registerForm" @keydown="clearError" :class="loading ? 'opacity-05' : ''">
                <small id="passwordHelp" class="text-danger" v-if="hasError('pseudo')">             
                    {{getError('pseudo')}}
                </small> 
                <div class="form-label-group mb-3">
                    <input id="floatingInput" class="form-control form-control-lg" type="text" placeholder="name@example.com" v-model="formData.pseudo" name="pseudo"  autofocus />
                    <label for="floatingInput">Pseudo minecraft</label>
                </div>

                <small id="passwordHelp" class="text-danger" v-if="hasError('email')">             
                    {{getError('email')}}
                </small> 
                <div class="form-label-group mb-3">
                <input class="form-control form-control-lg" id="floatingInput" type="email" placeholder="name@example.com" name="email" v-model="formData.email"  />
                <label for="floatingInput">Email</label>
                </div>

                <small id="passwordHelp" class="text-danger" v-if="hasError('password')">             
                    {{getError('password')}}
                </small> 
                <div class="form-label-group mb-3">
                <input class="form-control form-control-lg" id="floatingInput" type="password" placeholder="name@example.com" name="password" v-model="formData.password"  />
                <label for="floatingInput">Mot de passe</label>
                </div>

                <div class="form-label-group mb-3">
                <input type="password" class="form-control form-control-lg" id="floatingInput" placeholder="name@example.com" name="password" v-model="formData.password_confirmation"  />
                <label for="floatingInput">Confirmation du mot de passe</label>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer flex-center justify-content-center">
        <button type="button" class="btn-dismis-modal" data-bs-dismiss="modal" @click.prevent="reset">Annuler</button>
        <input type="submit" :disabled="hasAnyError" form="registerForm" :class="hasError('email') ? 'opacity-05' : ''" class="btn-valid-modal waves-effect waves-light" value="S'enregistrer"> 
    </div>  
</template>

<script>
import FormEdit from '@/Components/FormEdit'
export default {
    components: { FormEdit },
    name: 'RegisterForm',
    mixins: [FormEdit],
    emits: ["childToParent"],
    data(){
        return{
            modalID: '#registerModal',
            formData: {
                pseudo: '',
                email: '',
                password: '',
                password_confirmation: '',
            },
        }
    },
    methods:{
        storeRegister(){
            this.post(route('register'), this.formData, true)
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