<template>
    <div class="timeline">
        
    </div>
</template>

<script>
export default {
    mounted() {
        var self = this; 
        this.activeDuration = window.getComputedStyle(this.$el)['transition-duration'].replace('s', '') * 1000

        getPaletteFromURL(`/images/${this.project.photos[0]}`).then((swatch) => {
            var rgb = swatch[2]
            self.$el.style.background = `rgb(${rgb[0]}, ${rgb[1]}, ${rgb[2]})`; 

        })
        
            
    }
};
</script>