<template>
    <div class="w-screen px-8 flex flex-col justify-center items-center transition-height snap-start bg-cover text-white" :class="[active ? 'h-screen text-left' : 'h-80 text-center']" :style="{'background-image': background }">
        <div class="divide-y-4 overflow-y-auto overscroll-contain prose text-white">
            <h2 class="bg-clip-text bg-gradient-to-r from-green-400 to-blue-500" style="font-size: 2rem; color:transparent">{{ project.name }}</h2>
            <markdown :source="(active ? project.description : project.description.split('.')[0])"></markdown>
        </div>
        <button @click="active=!active">See {{ active ? 'less' : 'more' }}</button>
    </div>
</template>

<script>
import Markdown from 'vue3-markdown-it';

export default {
    props: ['project'],
    data() {
        return {
            activeDuration: 500,
            active: false,
            background: `url("/storage/images/projects/${this.project.id}/background.png")`
        }
    },
    mounted() {
        var self = this

        this.activeDuration = window.getComputedStyle(this.$el)['transition-duration'].replace('s', '') * 1000  
        
        this.project.description = this.project.description.replace(/!\[([\w\s]*)\]\((.*)\)/g, function(complete, description, name) {
            
            var photo = self.project.photos.filter(p => {
                return p.name == name
            })[0];
            if (photo) {
                console.log('replacing', complete, 'with', photo.src)
                return `![${description}](${photo.src})`
            } else {
                return `![${description}](${name})`
            }
        })
    },
    components: {
        Markdown
    },
    watch: {
        active(newValue, oldValue) {
            if (newValue === true) {
                var self = this; 
                setTimeout(() => {
                    self.$el.scrollIntoView({
                        behavior: 'smooth'
                    }); 
                }, this.activeDuration)
            }
        }
    }
};
</script>