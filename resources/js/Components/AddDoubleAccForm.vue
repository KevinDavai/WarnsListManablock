<template>

<div class="modal-header d-flex justify-content-center">
    <p class="heading">Ajouter un double compte</p>
</div>

<svg v-if="loading" class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
    <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
</svg>
<div class="modal-body">
    <div class="d-flex flex-column align-items-center">
        <a as="button" class="add-btn bg-purple-me col-1" @click.prevent="addMorePseudo"><i class="fas fa-plus"></i></a>
    </div>

    <div class="card-body text-start">

            <small id="passwordHelp" class="text-danger" v-if="hasError('description')">             
                {{getError('description')}}
            </small> 
            <small id="passwordHelp" class="text-danger" v-if="hasError('pseudo')">             
                {{getError('pseudo')}}
            </small> 
        <form action="#" @submit.prevent="storeDoubleAcc()" id="doubleAccForm" @keydown="clearError" :class="loading ? 'opacity-05' : ''">
            <div class="row justify-content-center">
                <div class="form-label-group mb-3 col-5">
                    <input type="text" class="form-control form-control-lg"  id="floatingInput2" placeholder="name@example.com" v-model="formData.pseudo[0]" name="pseudo"/>
                    <label for="floatingInput2" style="padding-left: 20px;">Pseudo 1</label>
                </div>
                <div class="form-label-group mb-3 col-5">
                    <input type="text" class="form-control form-control-lg"  id="floatingInput2" placeholder="name@example.com" v-model="formData.pseudo[1]" name="pseudo"/>
                    <label for="floatingInput2" style="padding-left: 20px;">Pseudo 2</label>
                </div>
            </div>           
            <div class="row justify-content-center" :class="rowStatus(1) ? 'd-relative' : 'd-none'">
                <div class="form-label-group mb-3 col-5">
                    <input type="text" class="form-control form-control-lg"  id="floatingInput2" placeholder="name@example.com" v-model="formData.pseudo[2]" name="pseudo"/>
                    <label for="floatingInput2" style="padding-left: 20px;">Pseudo 3</label>
                </div>
                <div class="form-label-group mb-3 col-5">
                    <input type="text" class="form-control form-control-lg"  id="floatingInput2" placeholder="name@example.com" v-model="formData.pseudo[3]" name="pseudo"/>
                    <label for="floatingInput2" style="padding-left: 20px;">Pseudo 4</label>
                </div>
            </div>            
            <div class="row justify-content-center" :class="rowStatus(2) ? 'd-relative' : 'd-none'">
                <div class="form-label-group mb-3 col-5">
                    <input type="text" class="form-control form-control-lg"  id="floatingInput2" placeholder="name@example.com" v-model="formData.pseudo[4]" name="pseudo"/>
                    <label for="floatingInput2" style="padding-left: 20px;">Pseudo 5</label>
                </div>
                <div class="form-label-group mb-3 col-5">
                    <input type="text" class="form-control form-control-lg"  id="floatingInput2" placeholder="name@example.com" v-model="formData.pseudo[5]" name="pseudo"/>
                    <label for="floatingInput2" style="padding-left: 20px;">Pseudo 6</label>
                </div>
            </div> 
            <div class="row justify-content-center">
                <div class="form-label-group mb-3 col-10">
                    <input type="text" class="form-control form-control-lg"  id="floatingInput2" placeholder="name@example.com" v-model="formData.description" name="description"/>
                    <label for="floatingInput2" style="padding-left: 20px;">Description</label>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal-footer flex-center justify-content-center">
    <button type="button" class="btn-dismis-modal" data-bs-dismiss="modal" @click.prevent="resetHere">Annuler</button>
    <input type="submit" :disabled="hasAnyError" form="doubleAccForm" :class="hasError('email') ? 'opacity-05' : ''" class="btn-valid-modal waves-effect waves-light" value="Ajouter"> 
</div>

</template>

<script>
import FormEdit from '@/Components/FormEdit'
export default {
    components: { FormEdit },
    name: 'AddDoubleAccForm',
    mixins: [FormEdit],
    emits: ["childToParent"],
    data(){
        return{
            modalID: '#addDoubleCompte',
            formData: {
                pseudo: [],
                description: '',
            },
            nbRowPseudo: 0,
            needReset: false,
        }
    },
    methods:{
        storeDoubleAcc(){
            this.checkNullablePseudo();
            this.post(route('postDoubleAcc'), this.formData, false, false)
         },   
        emitToParent (value) {
            this.$emit('childToParent', value)
        },
        addMorePseudo(){
            if(this.nbRowPseudo > 2) return
            this.nbRowPseudo = this.nbRowPseudo + 1
        },
        rowStatus(val) {
            if(this.nbRowPseudo >= val) return true
            return false
        },
        resetHere() {
            this.nbRowPseudo = 0
            this.formData.pseudo = []
            this.formData.description = ''
        },
        checkNullablePseudo() {
            for(let idx in this.formData.pseudo) {
                if(this.formData.pseudo[idx] == null) this.formData.pseudo.splice(idx, 1);
            }
            this.formData.pseudo = this.formData.pseudo.filter(function(val){return val});

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