<template>
<div class="area">
              <ul :v-if="urlPath == '/login'" class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
            </ul></div>

  <div class="container height-100 d-flex justify-content-center align-items-center">
      

          <slot />
  </div>
</template>

<script>
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue'
import { Link } from '@inertiajs/inertia-vue3';

export default {
  components: {
    BreezeApplicationLogo,
    Link,
  },
  data() {
    return {
        urlPath: location.pathname,
    }
  },
}
</script>
