<script setup>
const props = defineProps({
    action: String,
});
</script>

<template>
    <div>Here's another component. It {{ action }}</div>
</template>
