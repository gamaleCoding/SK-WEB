<script setup>
  import { onMounted, ref } from 'vue'

  const model = defineModel({
    type: String,
    required: true,
  })

  const input = ref(null)

  onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
      input.value.focus()
    }
  })

  defineExpose({ focus: () => input.value.focus() })
</script>

<template>
  <input
    class="rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500"
    v-model="model"
    ref="input"
  />
</template>
