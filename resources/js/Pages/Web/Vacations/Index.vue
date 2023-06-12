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
});
</script>

<template>
  <AppLayout title="Vacations">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Vacations
      </h2>
      
      <div class="flex justify-end">
        <Link :href="route('vacations.create')" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
          Vacation request
        </link>
      </div>
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
          <td class="px-6 py-4 whitespace-nowrap"><Link :href="route('vacations.edit', vacation.id)">{{ (vacation.user_id === $page.props.auth?.user.id) && !vacation.approved ? 'Edit' : '' }}</Link></td>
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