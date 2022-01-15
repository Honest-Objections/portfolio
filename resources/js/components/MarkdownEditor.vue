<template>
    <div class="prose relative">   
        <textarea :name="inputName" v-model="content" class="w-1/2 inline-block" />
        <markdown :source="content" class="w-1/2 inline-block absolute top-0 right-0" ></markdown>
    </div>
</template>

<script>
import Markdown from 'vue3-markdown-it';

export default {
    props: ['inputName', 'content'],
    data() {
        return {
        }
    },
    components: {
        Markdown
    }
};
</script>