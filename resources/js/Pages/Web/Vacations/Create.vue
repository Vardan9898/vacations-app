<script>
import {defineComponent} from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link} from '@inertiajs/vue3';
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';
import PrimaryButton from '@/Components/PrimaryButton.vue';

export default defineComponent({
  name: 'Create',
  components: {
    PrimaryButton,
    Link,
    AppLayout,
    VueDatePicker
  },
  data () {
    return {
      start_at: null,
      end_at: null,
      errors: {}
    };
  },
  methods: {
    save () {
      window.axios.post(route('vacations.store'), {
        start_at: this.start_at,
        end_at: this.end_at,
      }).then((response) => {
        if (response.status === 200) {
          this.$inertia.get('/vacations')
        }
      }).catch((errors) => {
        this.errors = errors.response.data.errors
      });
    }
  }
});
</script>

<template>
  <AppLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Vacations
      </h2>
    </template>
    
    <div class="mt-8 w-full flex justify-center">
      <div class="max-w-7xl flex justify-between">
        <div>
          <p>Start at</p>
          <VueDatePicker v-model="start_at" />
        </div>
        <div>
          <p>End at</p>
          <VueDatePicker v-model="end_at" />
        </div>
      </div>
    </div>
    <div class="w-full flex justify-center mt-6" v-if="errors">
      <p>{{ errors.start_at }}</p>
      <p>{{ errors.end_at }}</p>
    </div>
    <div class="w-full flex justify-center mt-6">
      <primary-button @click="save">
        Save
      </primary-button>
    </div>
  </AppLayout>
</template>

<style scoped>

</style>