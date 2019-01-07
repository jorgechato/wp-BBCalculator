<template>
  <div>
    <slot name="height"></slot>
    <slot name="weight"></slot>
    <slot name="waist"></slot>
    <slot name="neck"></slot>
    <slot name="hip"></slot>
  </div>
</template>

<script>
export default {
  name: 'BaseForm',
}
</script>

<style lang="scss">
</style>

