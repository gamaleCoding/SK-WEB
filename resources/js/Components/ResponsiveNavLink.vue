<script setup>
  import { computed } from 'vue'
  import { Link } from '@inertiajs/vue3'

  const props = defineProps({
    href: {
      type: String,
      required: true,
    },
    active: {
      type: Boolean,
    },
  })

  const classes = computed(() =>
    props.active
      ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-orange-400 text-start text-base font-medium text-orange-700 bg-orange-50 focus:outline-none focus:text-orange-800 focus:bg-orange-100 focus:border-orange-700 transition duration-150 ease-in-out'
      : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-orange-800 hover:bg-orange-50 hover:border-orange-300 focus:outline-none focus:text-orange-800 focus:bg-orange-50 focus:border-orange-300 transition duration-150 ease-in-out',
  )
</script>

<template>
  <Link :href="href" :class="classes">
    <slot />
  </Link>
</template>
