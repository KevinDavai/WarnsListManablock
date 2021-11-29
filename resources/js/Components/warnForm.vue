<template>
        
         <div class="card-body text-start">

    <breeze-validation-errors class="mb-3" />

    <div v-if="status" class="alert alert-success mb-3 rounded-0" role="alert">
      {{ status }}
    </div>

    <form @submit.prevent="submit" id="warnForm">
      <div class="form-floating mb-3">
          <input type="text" class="form-control form-control-lg"  id="floatingInput" placeholder="name@example.com"  required autofocus/>
          <label for="floatingInput">Pseudo du joueur*</label>
      </div>


    <div class="form-floating mb-3">
        <input class="form-control form-control-lg" list="datalistOptions" id="floatingInput1" required>
        <datalist id="datalistOptions">
            <option value="San Francisco"/>
            <option value="New York"/>
            <option value="Seattle"/>
            <option value="Los Angeles"/>
            <option value="Chicago"/>
        </datalist>
        <label for="floatingInput1">Raison*</label>
      </div>

      <div class="form-floating mb-3">
          <input type="text" class="form-control form-control-lg"  id="floatingInput2" placeholder="name@example.com"  required autocomplete="current-password"/>
          <label for="floatingInput2">Informations complémentaires</label>
      </div>
    </form>
  </div>
</template>

<script>
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
 
export default {
    Components: { BreezeValidationErrors },

}
</script>