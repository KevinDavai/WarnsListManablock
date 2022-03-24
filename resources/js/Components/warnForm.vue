<template>

<div class="modal-header d-flex justify-content-center">
    <p class="heading">Ajouter un avertissement</p>
</div>

<svg v-if="loading" class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
    <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
</svg>
<div class="modal-body">
    <i class="fas fa-bell fa-4x animated rotateIn mb-4 mt-2 color-modal-header" :class="loading ? 'loading-modal-color-icon' : ''"></i>

    <div class="card-body text-start">

            <small id="passwordHelp" class="text-danger" v-if="hasError('description')">             
                {{getError('description')}}
            </small> 
            <small id="passwordHelp" class="text-danger" v-if="hasError('pseudo')">             
                {{getError('pseudo')}}
            </small> 
              <small id="passwordHelp" class="text-danger" v-if="hasError('raison')">             
                {{getError('raison')}}
            </small> 
        <form action="#" @submit.prevent="storeWarn()" id="warnForm" @keydown="clearError" :class="loading ? 'opacity-05' : ''">
            <div class="row justify-content-center">
                <div class="form-label-group mb-3 col-10">
                    <input type="text" class="form-control form-control-lg"  id="floatingInput2" placeholder="name@example.com" v-model="formData.pseudo" name="pseudo"/>
                    <label for="floatingInput2" style="padding-left: 20px;">Pseudo du joueur</label>
                </div>
            </div> 
            <div class="row justify-content-center">
                <div class="form-label-group mb-3 col-10">
                    <input type="text" class="form-control form-control-lg"  id="floatingInput2" placeholder="name@example.com" v-model="formData.raison" name="raison"/>
                    <label for="floatingInput2" style="padding-left: 20px;">Raison</label>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="form-label-group mb-3 col-10">
                    <input type="text" class="form-control form-control-lg"  id="floatingInput2" placeholder="name@example.com" v-model="formData.description" name="description"/>
                    <label for="floatingInput2" style="padding-left: 20px;">Information supplémentaire</label>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal-footer flex-center justify-content-center">
    <button type="button" class="btn-dismis-modal" data-bs-dismiss="modal" @click.prevent="resetHere">Annuler</button>
    <input type="submit" :disabled="hasAnyError" form="warnForm" :class="hasError('email') ? 'opacity-05' : ''" class="btn-valid-modal waves-effect waves-light" value="Ajouter"> 
</div>

</template>

<script>
import FormEdit from '@/Components/FormEdit'
export default {
    components: { FormEdit },
    name: 'AddWarnForm',
    mixins: [FormEdit],
    emits: ["childToParent"],
    data(){
        return{
            modalID: '#addWarnModal',
            formData: {
                pseudo: '',
                raison: '',
                description: '',
            },
        }
    },
    methods:{
        storeWarn(){
            this.post(route('postWarn'), this.formData, false, false)
         },   
        emitToParent (value) {
            this.$emit('childToParent', value)
        },
        resetHere() {
            this.formData.pseudo = ''
            this.formData.description = ''
            this.formData.raison = ''
        },
    },  
    computed: {
        csrf() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
    }, 
    mounted: function() {
        var vm = this;
        $(document).ready(function(){
            $(vm.modalID).on('hidden.bs.modal ', function (e) {
                console.log(vm.modalID + "has closed")
                vm.loading = false;
                vm.errors = {}
                vm.resetHere();
            })
        })
    },
     
}
</script>