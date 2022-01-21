<template>
    <button class="h-10 px-6 font-semibold rounded-full bg-blue-500 text-white">{{ skill?.name }} ({{ skill?.count+1 }})</button>
</template>

<script>
export default {
    props: ['skill']
};
</script>