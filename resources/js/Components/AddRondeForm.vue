<template>

<div class="modal-header d-flex justify-content-center">
    <p class="heading">Ajouter une ronde</p>
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
        <form action="#" @submit.prevent="storeRonde()" id="rondeForm" @keydown="clearError" :class="loading ? 'opacity-05' : ''">
            <div class="form-label-group mb-3">
                <input type="text" class="form-control form-control-lg"  id="floatingInput2" placeholder="name@example.com" v-model="formData.description" name="description"/>
                <label for="floatingInput2">Description</label>
            </div>
        </form>
    </div>
</div>
<div class="modal-footer flex-center justify-content-center">
    <button type="button" class="btn-dismis-modal" data-bs-dismiss="modal" @click.prevent="reset">Annuler</button>
    <input type="submit" :disabled="hasAnyError" form="rondeForm" :class="hasError('email') ? 'opacity-05' : ''" class="btn-valid-modal waves-effect waves-light" value="Ajouter"> 
</div>

</template>

<script>
import FormEdit from '@/Components/FormEdit'
export default {
    components: { FormEdit },
    name: 'AddRondeForm',
    mixins: [FormEdit],
    emits: ["childToParent"],
    data(){
        return{
            modalID: '#addrondeModal',
            formData: {
                description: '',
            },
            needReset: true,
        }
    },
    methods:{
        storeRonde(){
            this.post(route('postRonde'), this.formData, false, true)
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