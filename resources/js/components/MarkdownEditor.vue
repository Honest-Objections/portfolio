<template>
    <div class="prose relative">
        <span class="material-icons absolute top-0 right-0" :class="[active?'material-icons-outlined':'']" @click="active = !active">preview</span>
        <textarea :name="inputName" class="w-full h-14" v-model="content" :class="[!active?'hidden':'']" />
        <markdown :source="content" :class="[active?'hidden':'']" ></markdown>
    </div>
</template>

<script>
import Markdown from 'vue3-markdown-it';

export default {
    props: ['inputName', 'content'],
    data() {
        return {
            active: false
        }
    },
    components: {
        Markdown
    }
};
</script>