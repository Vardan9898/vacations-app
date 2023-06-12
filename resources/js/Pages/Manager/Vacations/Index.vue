<script>
import {defineComponent} from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import {Link} from '@inertiajs/vue3';

export default defineComponent({
  name: 'Index',
  components: {
    PrimaryButton,
    AppLayout,
    Pagination,
    Link,
  },
  props: {
    vacations: {},
  },
  methods: {
    approve(vacationId) {
      window.axios.post(route('manager.vacations.approve', vacationId)).then((response) => {
          if (response.status === 200) {
            this.$inertia.get('/manager/vacations')
          }
      }).catch((errors) => {
        console.log(errors);
      })
    }
  }
});
</script>

<template>
  <AppLayout title="Vacations">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Vacations
      </h2>
    </template>
    
    <div class="flex justify-center mt-20">
      <table class="min-w-[1200px] bg-white border border-gray-200">
        <thead>
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Worker Name</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start At</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End At</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Approved By Manager</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="vacation in vacations.data" :key="vacation.id">
          <td class="px-6 py-4 whitespace-nowrap">{{ vacation.user.name }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ vacation.user.email }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ vacation.start_at }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ vacation.end_at }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ vacation.approved ? 'Approved' : 'Not approved' }}</td>
          <td class="px-6 py-4 whitespace-nowrap"><primary-button @click="approve(vacation.id)" v-if="!vacation.approved">approve</primary-button></td>
        </tr>
        </tbody>
      </table>
    </div>
    <div class="flex justify-center">
      <pagination class="mt-6" :links="vacations.links"/>
    </div>
  </AppLayout>
</template>

<style scoped>

</style>