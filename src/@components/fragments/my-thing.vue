<script setup>
import { ref } from 'vue';

const feeling = ref('great');
</script>

<template>
    <div>This is MyThing. Isn't it {{ feeling }}</div>
</template>
