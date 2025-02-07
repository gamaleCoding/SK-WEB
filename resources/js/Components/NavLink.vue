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
      ? 'inline-flex items-center px-1 pt-1 border-b-2 border-orange-400 text- font-medium leading-5 text-orange-900 focus:outline-none focus:border-orange-700 transition duration-150 ease-in-out'
      : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-medium font-sm leading-5 text-gray-600 hover:text-orange-700 hover:border-orange-300 focus:outline-none focus:text-orange-700 focus:border-orange-300 transition duration-150 ease-in-out',
  )
</script>

<template>
  <Link :href="href" :class="classes">
    <slot />
  </Link>
</template>
