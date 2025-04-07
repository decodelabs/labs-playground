<script setup>
import { ref } from 'vue';

const props = defineProps({
    action: String,
});

const counter = ref(0);
const increment = () => {
    counter.value++;
};
</script>

<template>
    <div @click="increment">Here's another component. It {{ action }}</div>
    <div>Counter: {{ counter }}</div>
</template>
