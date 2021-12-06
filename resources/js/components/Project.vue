<template>
    <div class="w-screen px-8  flex justify-center items-center transition-height background-image-blur"  :style="{'--bg-image': `url('/images/${this.project.photos[0]}')`}" :class="active ? 'h-screen text-left' : 'h-80 text-center' ">
        <div>
            <div class="prose divide-y-4 text-white">
                <h2 class="bg-clip-text bg-gradient-to-r from-green-400 to-blue-500" style="color:transparent">{{ project.name }}</h2>
                <markdown :source="(active ? project.description : project.description.split('.')[0])"></markdown>
            </div>
            <button @click="active=!active">See {{ active ? 'less' : 'more' }}</button>
        </div>
    </div>
</template>

<script>
import Markdown from 'vue3-markdown-it';
const { getPaletteFromURL } = require('color-thief-node');

export default {
    props: ['project'],
    data() {
        return {
            activeDuration: 500,
            active: false
        }
    },
    mounted() {
        var self = this; 
        this.activeDuration = window.getComputedStyle(this.$el)['transition-duration'].replace('s', '') * 1000

        getPaletteFromURL(`/images/${this.project.photos[0]}`).then((swatch) => {
            var rgb = swatch[2]
            self.$el.style.background = `rgb(${rgb[0]}, ${rgb[1]}, ${rgb[2]})`; 

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