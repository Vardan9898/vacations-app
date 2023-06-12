<template>
  <div v-if="links.length > 3">
    <div class="flex flex-wrap -mb-1">
      <template v-for="(link, key) in links">
        <div v-if="link.url === null" :key="key"
             class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded" v-html="link.label" />
        <NavLink v-if="link.url !== null" :key="key"
                      class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-green-500 focus:text-green-500"
                      :class="{ 'bg-white': link.active }" :href="link.url" v-html="link.label" />
      </template>
    </div>
  </div>
</template>

<script>
import {defineComponent} from 'vue';
import NavLink from '@/Components/NavLink.vue';

export default defineComponent({
  components: {
    NavLink,
},
  props: {
    links: Array,
  },
})
</script>
