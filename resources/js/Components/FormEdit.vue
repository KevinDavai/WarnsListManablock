<template>
    
</template>

<script>
import FormErrors from '@/Components/FormErrors';
export default {
    components: { FormErrors },
    name: 'FormEdit',
    mixins: [FormErrors],
    data() {
        return{
            success: false,
            loading: false,
            error: false,
        }
    },

    methods: {
        post(routeName, data, isRedirectable, isResetable) {
            this.loading = true;

            axios.post(routeName, data).then(response => {
                $(this.modalID).modal('hide');
                if(isResetable) this.onSuccess()
                if(isRedirectable) {
                    this.$inertia.get(window.location);
                }
                this.loading = false
            }).catch(error => {
                console.log(error.response.status);
                if(error.response.status == 422) {
                    this.setErrors(error.response.data.errors)
                    this.loading = false
                } else {
                    this.onFailure(error.response.data.message)
                    this.loading = false

                }
            })
        },

        get(routeName, data) {
            this.loading = true;
            axios.get(route(routeName), data).then(response => {
                console.log(this.modalID);
                $(this.modalID).modal('hide');

                this.onSuccess(response.data.message)
            
                                this.loading = false
            }).catch(error => {
                if(error.response.status == 422) {
                    this.setErrors(error.response.data.errors)
                    this.loading = false
                } else {
                    this.onFailure(error.response.data.message)
                    this.loading = false

                }
            })
        },

        onSuccess(message){
            this.reset()
            this.success = true;
        },

        onFailure(message){
            this.error = true;
        },

        reset() {
            this.clearAllErrors();
            for(let field in this.formData) {
                this.formData[field] = null;
            }
        },
    },
    mounted: function() {
        var vm = this;
        $(document).ready(function(){
            $(vm.modalID).on('hidden.bs.modal ', function (e) {
                console.log(vm.modalID + "has closed")
                vm.loading = false;
                vm.errors = {}
                if(vm.needReset) {
                    for(let field in vm.formData) {
                        vm.formData[field] = null;
                    }
                }
            })
        })
    },

}
</script>