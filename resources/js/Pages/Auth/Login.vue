<template>
<Preloader></Preloader>
  <Head title="Log in" />

      <div class="row justify-content-around">
      <div class="col-auto mb-3">
        <button style="--content: 'Connexion';" class="btn-edit-1" data-bs-toggle="modal" data-bs-target="#connexionModal">
          <div class="left-app"></div>
            Connexion
          <div class="right-app"></div>
        </button>
      </div>
      <div class="col-auto">
        <button style="--content: 'S\'enregistrer';" class="btn-edit-1" data-bs-toggle="modal" data-bs-target="#registerModal">
          <div class="left-app"></div>
            S'enregistrer
          <div class="right-app"></div>
        </button>
      </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="connexionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content text-center no-border">
      <LoginForm/>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content text-center no-border">
      <registerForm/>
    </div>
  </div>
</div>
</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeGuestLayout from "@/Layouts/Guest.vue"
import BreezeInput from '@/Components/Input.vue'
import BreezeCheckbox from '@/Components/Checkbox.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import Preloader from '@/Components/Preloader.vue'
import registerForm from '@/Components/RegisterForm.vue'
import LoginForm from '@/Components/LoginForm.vue'

export default {
  layout: BreezeGuestLayout,

  components: {
    Head,
    BreezeButton,
    BreezeInput,
    BreezeCheckbox,
    BreezeLabel,
    BreezeValidationErrors,
    Link,
    Preloader,
    registerForm,
    LoginForm,
  },

  props: {
    canResetPassword: Boolean,
    status: String
  },

  data() {
    return {
      form: this.$inertia.form({
        email: '',
        password: '',
        remember: false
      })
    }
  },

  methods: {
    submit() {
      this.form
          .transform(data => ({
            ... data,
            remember: this.form.remember ? 'on' : ''
          }))
          .post(this.route('login'), {
            onFinish: () => this.form.reset('password'),
          })
    }
  }
}
</script>
