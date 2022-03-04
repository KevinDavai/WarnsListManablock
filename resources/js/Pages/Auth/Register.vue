<template>
  <Head title="Register" />

    <div class="card-body text-start">
      <breeze-validation-errors class="mb-3" />

      <div v-if="status" class="alert alert-success mb-3 rounded-0" role="alert">
        {{ status }}
      </div>

      <form @submit.prevent="submit" id="registerForm">
        <div class="form-floating mb-3">
          <input id="floatingInput" class="form-control form-control-lg" type="text" placeholder="name@example.com" v-model="form.pseudo" required autofocus />
          <label for="floatingInput">Pseudo minecraft</label>
        </div>

        <div class="form-floating mb-3">
          <input class="form-control form-control-lg" id="floatingInput" type="email" placeholder="name@example.com" v-model="form.email" required />
          <label for="floatingInput">Email</label>
        </div>

        <div class="form-floating mb-3">
          <input class="form-control form-control-lg" id="floatingInput" type="password" placeholder="name@example.com" v-model="form.password" required />
          <label for="floatingInput">Mot de passe</label>
        </div>

        <div class="form-floating mb-3">
          <input type="password" class="form-control form-control-lg" id="floatingInput" placeholder="name@example.com" v-model="form.password_confirmation" required />
          <label for="floatingInput">Confirmation du mot de passe</label>
        </div>
      </form>
    </div>
</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeCheckbox from "@/Components/Checkbox.vue";
import BreezeGuestLayout from "@/Layouts/Guest.vue"
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'

export default {
  layout: BreezeGuestLayout,

  components: {
    Head,
    BreezeButton,
    BreezeCheckbox,
    BreezeInput,
    BreezeLabel,
    BreezeValidationErrors,
    Link,
  },

  data() {
    return {
      form: this.$inertia.form({
        pseudo: '',
        email: '',
        password: '',
        password_confirmation: '',
        terms: false,
      })
    }
  },

  methods: {
    submit() {
      this.form.post(this.route('register'), {
        onFinish: () => this.form.reset('password', 'password_confirmation'),
      })
    }
  }
}
</script>
