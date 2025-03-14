<script setup>
import { ref } from 'vue';

const action = ref('does things');
</script>

<template>
    <div>Here's another component. It {{ action }}</div>
</template>
