<template>
<Preloader></Preloader>
  <Head title="Log in" />

      <div class="row justify-content-around">
      <div class="col-6">
        <button style="--content: 'Connexion';" class="btn-edit-1" data-toggle="modal" data-target="#connexionModal">
          <div class="left-app"></div>
            Connexion
          <div class="right-app"></div>
        </button>
      </div>
      <div class="col-6">
        <button style="--content: 'S\'enregistrer';" class="btn-edit-1" data-toggle="modal" data-target="#registerModal">
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
      <div class="modal-header d-flex justify-content-center">
        <p class="heading">Connexion</p>
      </div>
      <div class="modal-body">
        <i class="fas fa-bell fa-4x animated rotateIn mb-4 mt-2 color-modal-header"></i>
        <div class="card-body text-start">

          <breeze-validation-errors class="mb-3" />

          <div v-if="status" class="alert alert-success mb-3 rounded-0" role="alert">
            {{ status }}
          </div>

          <form @submit.prevent="submit" id="loginForm">
            <div class="form-label-group mb-3">
                <input type="email" class="form-control form-control-lg"  id="floatingInput" placeholder="name@example.com" v-model="form.email" required autofocus/>
                <label for="floatingInput">Email</label>
            </div>

            <div class="form-label-group mb-3">
                <input type="password" class="form-control form-control-lg"  id="inputPassword" placeholder="Mot de passe" v-model="form.password" required autocomplete="current-password"/>
                <label for="inputPassword">Mot de passe</label>
            </div>
          </form>
        </div>
      </div>

      <div class="modal-footer flex-center justify-content-center">
        <button type="button" class="btn-dismis-modal" data-dismiss="modal">Annuler</button>
        <input type="submit" form="loginForm" class="btn-valid-modal waves-effect waves-light" value="Se connecter" data-bs-dismiss="modal"> 
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content text-center no-border">
      <div class="modal-header d-flex justify-content-center">
        <p class="heading">S'enregistrer</p>
      </div>
      <div class="modal-body">
        <i class="fas fa-bell fa-4x animated rotateIn mb-4 mt-2 color-modal-header"></i>
        <registerForm></registerForm>
      </div>
      <div class="modal-footer flex-center justify-content-center">
          <button type="button" class="btn-dismis-modal" data-dismiss="modal">Annuler</button>
          <input type="submit" form="registerForm" class="btn-valid-modal waves-effect waves-light" value="S'enregistrer" data-bs-dismiss="modal"> 
      </div>  
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
import registerForm from '@/Pages/Auth/Register.vue'

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
